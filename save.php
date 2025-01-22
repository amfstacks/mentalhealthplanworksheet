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
             margin: 0;
            padding: 20px;
        }
        .container {
            width: 90%;
            max-width: 700px;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        h2 {
            color: #007bff;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        p, label {
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 1.6;
        }
        .section {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f9fa;
        }
        .answer {
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 4px;
            background-color: #e7f1ff;
            color: #007bff;
            font-weight: bold;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
            color: #6a11cb;
        }
    </style>
    EOD;

    // HTML content for the PDF
    $html = <<<EOD
    $css
    <div class="container">
        <div class="title">
            <h1>Your Mental Health Plan 2025</h1>
            <p>Personalized Plan for: <span class="answer">$email</span></p>
        </div>
        <div class="section">
            <h2>Contact Information</h2>
            <p><strong>Email:</strong> <span class="answer">$email</span></p>
            <p><strong>Age:</strong> <span class="answer">$age</span></p>
        </div>
        <div class="section">
            <h2>Self-Awareness</h2>
            <p><strong>Mental State (1-10):</strong> <span class="answer">$mentalState</span></p>
            <p><strong>Current Feelings:</strong> <span class="answer">$currentFeelings</span></p>
            <p><strong>Main Stressors:</strong> <span class="answer">$stressors</span></p>
            <p><strong>Mood Boosters:</strong> <span class="answer">$moodBoosters</span></p>
        </div>
        <div class="section">
            <h2>Mental Health Goals</h2>
            <p><span class="answer">$goals</span></p>
        </div>
        <div class="section">
            <h2>Daily Practices</h2>
            <p><strong>Habits:</strong> <span class="answer">$dailyHabits</span></p>
            <p><strong>Social Media Limit:</strong> <span class="answer">$socialMediaLimit minutes</span></p>
            <p><strong>Sleep Hours:</strong> <span class="answer">$hoursOfSleep</span></p>
        </div>
        <div class="section">
            <h2>Managing Stress and Triggers</h2>
            <p><strong>Stress Response:</strong> <span class="answer">$stressResponse</span></p>
            <p><strong>Calm Down Plan:</strong> <span class="answer">$calmDownPlan</span></p>
            <p><strong>Support Contacts:</strong> <span class="answer">$supportContacts</span></p>
        </div>
        <div class="section">
            <h2>Affirmations</h2>
            <p><span class="answer">$affirmations</span></p>
        </div>
    </div>
    EOD;

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
