<?php
/**
 * Configuration file for PHP Web Project
 * 
 * This file contains common settings and constants used throughout the project.
 * Modify these values according to your needs.
 */

// Database configuration (for future use)
define('DB_HOST', 'localhost');
define('DB_NAME', 'php_web_project');
define('DB_USER', 'root');
define('DB_PASS', '');

// Application settings
define('APP_NAME', 'PHP Web Project');
define('APP_VERSION', '1.0.0');
define('APP_URL', 'http://localhost:8000'); // Change this to your domain

// Email settings (for future use)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'your-email@gmail.com');
define('SMTP_PASS', 'your-app-password');

// Security settings
define('CSRF_TOKEN_NAME', 'csrf_token');
define('SESSION_TIMEOUT', 3600); // 1 hour

// File upload settings (for future use)
define('UPLOAD_MAX_SIZE', 5242880); // 5MB
define('ALLOWED_FILE_TYPES', ['jpg', 'jpeg', 'png', 'gif', 'pdf']);

// Logging settings
define('LOG_FILE', 'app.log');
define('ERROR_LOG', 'error.log');

// Timezone
date_default_timezone_set('UTC');

// Error reporting (set to 0 in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Session configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Set to 1 if using HTTPS

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Helper functions
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function generateCSRFToken() {
    if (!isset($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}

function validateCSRFToken($token) {
    return isset($_SESSION[CSRF_TOKEN_NAME]) && hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
}

function logMessage($message, $type = 'INFO') {
    $logEntry = date('Y-m-d H:i:s') . " [$type] " . $message . PHP_EOL;
    file_put_contents(LOG_FILE, $logEntry, FILE_APPEND | LOCK_EX);
}

function logError($message) {
    logMessage($message, 'ERROR');
}

// Environment detection
function isDevelopment() {
    return $_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1';
}

function isProduction() {
    return !isDevelopment();
}

// Set appropriate error reporting based on environment
if (isProduction()) {
    error_reporting(0);
    ini_set('display_errors', 0);
}
?> 