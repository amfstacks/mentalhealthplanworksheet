<?php
$is_pdf_generation = isset($_POST['generate_pdf']); // Flag to check if PDF is being generated
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Preview - Mental Health Plan 2025</title>
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
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Your Mental Health Plan 2025</h1>
            <p>Personalized Plan for: <span class="ansawer"><b>example@email.com</b></span></p>
        </div>
        <div class="section">
            <h2>Contact Information</h2>
            <p><strong>Email:</strong> <span class="answer">example@email.com</span></p>
            <p><strong>Age:</strong> <span class="answer">25</span></p>
        </div>
        <div class="section">
            <h2>Self-Awareness</h2>
            <p><strong>Mental State (1-10):</strong> <span class="answer">8</span></p>
            <p><strong>Current Feelings:</strong> <span class="answer">Feeling optimistic and motivated</span></p>
            <p><strong>Main Stressors:</strong> <span class="answer">Work deadlines, financial pressures</span></p>
            <p><strong>Mood Boosters:</strong> <span class="answer">Spending time with friends, listening to music</span></p>
        </div>
        <div class="section">
            <h2>Mental Health Goals</h2>
            <p><span class="answer">Exercise regularly, practice mindfulness, reduce screen time</span></p>
        </div>
        <div class="section">
            <h2>Daily Practices</h2>
            <p><strong>Habits:</strong> <span class="answer">Gratitude journaling, 10-minute meditation</span></p>
            <p><strong>Social Media Limit:</strong> <span class="answer">30 minutes</span></p>
            <p><strong>Sleep Hours:</strong> <span class="answer">7 hours</span></p>
        </div>
        <div class="section">
            <h2>Managing Stress and Triggers</h2>
            <p><strong>Stress Response:</strong> <span class="answer">Take deep breaths, short walk</span></p>
            <p><strong>Calm Down Plan:</strong> <span class="answer">Listen to calming music</span></p>
            <p><strong>Support Contacts:</strong> <span class="answer">Friends and therapist</span></p>
        </div>
        <div class="section">
            <h2>Affirmations</h2>
            <p><span class="answer">I am capable. I am resilient. I am worthy of love and care.</span></p>
        </div>

        <?php if (!$is_pdf_generation): ?>
        <form action="convert_and_mail.php" method="POST">
                <button type="submit" name="generate_pdf" value="1" >Convert to PDF and Mail</button>
            </form>
            <?php endif; ?>
    </div>
</body>
</html>
