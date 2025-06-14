<?php
// Set expiration date (1 year from now)
$expire_date = strtotime('+1 year');
$current_date = time();

if ($current_date > $expire_date) {
    header("HTTP/1.1 410 Gone");
    echo "<h1>This content has expired</h1>";
    exit;
}

// Get requested PDF from URL
$requested_pdf = basename($_GET['file'] ?? '');
$allowed_files = ['CS0478_solutions.pdf', 'other_solutions.pdf'];

if (in_array($requested_pdf, $allowed_files)) {
    header("Content-Type: application/pdf");
    header("Content-Disposition: inline; filename=$requested_pdf");
    readfile($requested_pdf);
} else {
    header("HTTP/1.1 404 Not Found");
    echo "<h1>File not found</h1>";
}
?>
