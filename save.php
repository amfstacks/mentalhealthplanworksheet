<?php
require_once('tcpdf-main/tcpdf.php'); // Include TCPDF library


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $mentalState = filter_input(INPUT_POST, 'mental_state', FILTER_SANITIZE_NUMBER_INT);
    $currentFeelings = htmlspecialchars($_POST['current_feelings'] ?? '');
    $stressors = htmlspecialchars($_POST['stressors'] ?? '');
    $moodBoosters = htmlspecialchars($_POST['mood_boosters'] ?? '');
    $goals = htmlspecialchars($_POST['goals'] ?? '');
    $dailyHabits = $_POST['daily_habits'] ?? [];
    $socialMediaLimit = htmlspecialchars($_POST['social_media_limit'] ?? '');
    $hoursOfSleep = htmlspecialchars($_POST['hours_of_sleep'] ?? '');
    $stressResponse = htmlspecialchars($_POST['stress_response'] ?? '');
    $calmDownPlan = htmlspecialchars($_POST['calm_down_plan'] ?? '');
    $supportContacts = htmlspecialchars($_POST['support_contacts'] ?? '');
    $affirmations = $_POST['affirmations'] ?? [];

    if (!$email) {
        die('Invalid email address.');
    }

    // Initialize TCPDF
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Mental Health Plan 2025');
    $pdf->SetTitle('Mental Health Plan 2025');
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->AddPage();

    $css = <<<EOD
<style>
    body {
        font-family: 'Arial', sans-serif;
        color: #333;
        background: #ffffff;
    }
    h2 {
        color: #007bff;
        font-size: 18px;
        margin-bottom: 10px;
        border-bottom: 2px solid #007bff;
        padding-bottom: 5px;
    }
    p, label {
        font-size: 14px;
        margin-bottom: 10px;
        line-height: 1.6;
    }
    .section {
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #cccccc;
        border-radius: 5px;
        background-color: #f8f9fa;
    }
    .title {
        text-align: center;
        color: #6a11cb;
        margin-bottom: 20px;
    }
</style>
EOD;

    // Add content to the PDF
    $html = "
        <h1 style='text-align: center; color: #007bff;'>Mental Health Plan 2025</h1>
        <h2>Contact Information</h2>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Age:</strong> $age</p>
        
        <h2>Self-Awareness</h2>
        <p><strong>Mental State:</strong> $mentalState</p>
        <p><strong>Current Feelings:</strong> $currentFeelings</p>
        <p><strong>Stressors:</strong> $stressors</p>
        <p><strong>Mood Boosters:</strong> $moodBoosters</p>
        
        <h2>Mental Health Goals</h2>
        <p>$goals</p>
        
        <h2>Daily Practices</h2>
        <ul>";
    foreach ($dailyHabits as $habit) {
        $html .= "<li>$habit</li>";
    }


    $html = <<<EOD
$css
<div class="title">
    <h1>Mental Health Plan 2025</h1>
    <p>Personalized Plan for: <strong>$email</strong></p>
</div>
<div class="section">
    <h2>Contact Information</h2>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Age:</strong> $age</p>
</div>
<div class="section">
    <h2>Self-Awareness</h2>
    <p><strong>Mental State (1-10):</strong> $mentalState</p>
    <p><strong>Current Feelings:</strong> $currentFeelings</p>
    <p><strong>Main Stressors:</strong> $stressors</p>
    <p><strong>Mood Boosters:</strong> $moodBoosters</p>
</div>
EOD;
    $html .= "</ul>
        <p><strong>Social Media Limit:</strong> $socialMediaLimit minutes</p>
        <p><strong>Hours of Sleep:</strong> $hoursOfSleep hours</p>
        
        <h2>Managing Stress and Triggers</h2>
        <p><strong>Stress Response:</strong> $stressResponse</p>
        <p><strong>Calm Down Plan:</strong> $calmDownPlan</p>
        <p><strong>Support Contacts:</strong> $supportContacts</p>
        
        <h2>Affirmations</h2>
        <p>1. {$affirmations[0]}</p>
        <p>2. {$affirmations[1]}</p>
        <p>3. {$affirmations[2]}</p>
    ";

    $pdf->writeHTML($html, true, false, true, false, '');

    // Output PDF to file
    $fileName = "$email mental_health_plan_2025.pdf";
    $filePath = __DIR__ . '/' . $fileName;
    $pdf->Output($filePath, 'F');

    // Send Email with the PDF
    $to = $email;
    $subject = 'Your Mental Health Plan 2025';
    $message = 'Please find attached your completed Mental Health Plan for 2025.';
    $headers = "From: info@fayabase.com\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"PHP-mixed-".md5(time())."\"\r\n";

    $attachment = chunk_split(base64_encode(file_get_contents($filePath)));

    $emailContent = "
--PHP-mixed-".md5(time())."
Content-Type: text/plain; charset=\"UTF-8\"
Content-Transfer-Encoding: 7bit

$message

--PHP-mixed-".md5(time())."
Content-Type: application/pdf; name=\"$fileName\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment

$attachment

--PHP-mixed-".md5(time())."--";

    if (mail($to, $subject, $emailContent, $headers)) {
        echo 'PDF sent successfully!';
    } else {
        echo 'Failed to send email.';
    }

    // Delete the generated PDF
    // unlink($filePath);
} else {
    echo 'Invalid request method.';
}
