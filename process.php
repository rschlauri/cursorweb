<?php
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

// Get form data
$name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
$subject = isset($_POST['subject']) ? sanitizeInput($_POST['subject']) : '';
$message = isset($_POST['message']) ? sanitizeInput($_POST['message']) : '';

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = 'Name ist erforderlich';
}

if (empty($email)) {
    $errors[] = 'E-Mail ist erforderlich';
} elseif (!isValidEmail($email)) {
    $errors[] = 'Bitte geben Sie eine gültige E-Mail-Adresse ein';
}

if (empty($subject)) {
    $errors[] = 'Betreff ist erforderlich';
}

if (empty($message)) {
    $errors[] = 'Nachricht ist erforderlich';
}

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
    // Create a log entry (in a real application, you might save to database or send email)
    $logEntry = [
        'timestamp' => date('Y-m-d H:i:s'),
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'Unbekannt'
    ];
    
    // Save to a log file (optional)
    $logFile = 'contact_log.txt';
    $logData = json_encode($logEntry) . "\n";
    file_put_contents($logFile, $logData, FILE_APPEND | LOCK_EX);
    
    // In a real application, you would:
    // 1. Save to database
    // 2. Send email notification
    // 3. Send confirmation email to user
    
    // For demo purposes, we'll just return success
    echo json_encode([
        'success' => true,
        'message' => 'Vielen Dank für Ihre Nachricht! Wir werden uns innerhalb von 24 Stunden bei Ihnen melden.',
        'data' => [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'timestamp' => date('Y-m-d H:i:s')
        ]
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.'
    ]);
}
?> 