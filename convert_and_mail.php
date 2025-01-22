<?php

// Enable error reporting
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


require_once 'dompdf/autoload.inc.php'; // Include Dompdf library
use Dompdf\Dompdf;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $is_pdf_generation = true;
    ob_start();
    include 'pdf_preview.php'; // Capture HTML from the preview
    $html = ob_get_clean();

    // Initialize Dompdf
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Save the PDF locally
    $pdfOutput = $dompdf->output();
    $filePath = 'mental_health_plan.pdf';
    file_put_contents($filePath, $pdfOutput);

    // Send email with PDF attachment
    $to = 'example@email.com'; // Replace with user's email
    $subject = 'Your Mental Health Plan 2025';
    $message = 'Find your personalized mental health plan attached.';
    $headers = "From: info@fayabase.com\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"PHP-mixed-".md5(time())."\"\r\n";

    $attachment = chunk_split(base64_encode($pdfOutput));

    $emailContent = "
--PHP-mixed-".md5(time())."
Content-Type: text/plain; charset=\"UTF-8\"
Content-Transfer-Encoding: 7bit

$message

--PHP-mixed-".md5(time())."
Content-Type: application/pdf; name=\"mental_health_plan.pdf\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment

$attachment

--PHP-mixed-".md5(time())."--";

    if (mail($to, $subject, $emailContent, $headers)) {
        echo 'PDF generated and emailed successfully!';
    } else {
        echo 'Failed to send email.';
    }
}
?>
