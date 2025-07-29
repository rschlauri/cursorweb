<?php
session_start();
// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set content type to JSON
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Methode nicht erlaubt']);
    exit;
}

// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to send email
function sendEmail($vorname, $name, $ort, $email, $bemerkung) {
    $to = 'info@ahnenforscher.ch';
    $subject = 'Neue Lizenzbestellung - Ahnenforscher';
    
    $message = "Neue Lizenzbestellung eingegangen:\n\n";
    $message .= "Vorname: $vorname\n";
    $message .= "Name: $name\n";
    $message .= "Ort: $ort\n";
    $message .= "E-Mail: $email\n";
    if (!empty($bemerkung)) {
        $message .= "Bemerkung: $bemerkung\n";
    }
    $message .= "\nDatum: " . date('d.m.Y H:i:s') . "\n";
    $message .= "IP-Adresse: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unbekannt') . "\n";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    return mail($to, $subject, $message, $headers);
}

// Get form data
$vorname = isset($_POST['vorname']) ? sanitizeInput($_POST['vorname']) : '';
$name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
$ort = isset($_POST['ort']) ? sanitizeInput($_POST['ort']) : '';
$email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
$bemerkung = isset($_POST['bemerkung']) ? sanitizeInput($_POST['bemerkung']) : '';
$captcha = isset($_POST['captcha']) ? intval($_POST['captcha']) : null;

// Validation
$errors = [];

if (empty($vorname)) {
    $errors[] = 'Vorname ist erforderlich';
}

if (empty($name)) {
    $errors[] = 'Name ist erforderlich';
}

if (empty($ort)) {
    $errors[] = 'Ort ist erforderlich';
}

if (empty($email)) {
    $errors[] = 'E-Mail ist erforderlich';
} elseif (!isValidEmail($email)) {
    $errors[] = 'Bitte geben Sie eine gültige E-Mail-Adresse ein';
}

if (!isset($_SESSION['captcha_answer']) || $captcha !== $_SESSION['captcha_answer']) {
    $errors[] = 'Captcha falsch gelöst. Bitte versuchen Sie es erneut.';
}
unset($_SESSION['captcha_answer']);

// Check for errors
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'errors' => $errors
    ]);
    exit;
}

// If validation passes, process the form
try {
    // Create a log entry
    $logEntry = [
        'timestamp' => date('Y-m-d H:i:s'),
        'vorname' => $vorname,
        'name' => $name,
        'ort' => $ort,
        'email' => $email,
        'bemerkung' => $bemerkung,
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'Unbekannt'
    ];
    
    // Save to a log file
    $logFile = 'license_orders.txt';
    $logData = json_encode($logEntry) . "\n";
    file_put_contents($logFile, $logData, FILE_APPEND | LOCK_EX);
    
    // Send email to info@ahnenforscher.ch
    $emailSent = sendEmail($vorname, $name, $ort, $email, $bemerkung);
    
    if ($emailSent) {
        echo json_encode([
            'success' => true,
            'message' => 'Vielen Dank für Ihre Lizenzbestellung! Wir werden uns innerhalb von 24 Stunden bei Ihnen melden.',
            'data' => [
                'vorname' => $vorname,
                'name' => $name,
                'ort' => $ort,
                'email' => $email,
                'timestamp' => date('Y-m-d H:i:s')
            ]
        ]);
    } else {
        echo json_encode([
            'success' => true,
            'message' => 'Ihre Bestellung wurde registriert. Wir werden uns bald bei Ihnen melden.',
            'data' => [
                'vorname' => $vorname,
                'name' => $name,
                'ort' => $ort,
                'email' => $email,
                'timestamp' => date('Y-m-d H:i:s')
            ]
        ]);
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.'
    ]);
}
?> 