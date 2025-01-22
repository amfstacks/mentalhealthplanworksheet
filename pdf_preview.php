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
            display: block;
            margin-top: 5px;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 4px;
            background-color: #e7f1ff;
            color: #007bff;
            font-weight: bold;
        }
        .answerShort {
            display: block;
            width: 50px;
            margin-top: 5px;
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
            /* color: #6a11cb; */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">
            <img src="blacklogo.png" style="height: 150px;">
            <h1>Your Mental Health Plan Worksheet 2025</h1>
            <p>Personalized Plan for:</p>
            <span class="answer">example@email.com</span>
        </div>
        <div class="section">
            <h2>Basic Information</h2>
            <p>Email Address:</p>
            <span class="answer">example@email.com</span>
            <p>Age:</p>
            <span class="answer">25</span>
        </div>
        <div class="section">
            <h2>Self-Awareness</h2>
            <p>Mental State (1-10):</p>
            <span class="answer">8</span>
            <p>Current Feelings:</p>
            <span class="answer">Feeling optimistic and motivated</span>
            <p>Main Stressors:</p>
            <span class="answer">Work deadlines, financial pressures</span>
            <p>Mood Boosters:</p>
            <span class="answer">Spending time with friends, listening to music</span>
        </div>
        <div class="section">
            <h2>Mental Health Goals</h2>
            <p>Goals:</p>
            <span class="answer">Exercise regularly, practice mindfulness, reduce screen time</span>
        </div>
        <div class="section">
    <h2>Section 3: Daily Practices</h2>

    <p><strong>Selected Daily Habits:</strong></p>
    <ul>
        <li>Practice gratitude (e.g., write down 3 things I’m grateful for each day)</li>
        <li>Take a 10-minute mindfulness or meditation break</li>
        <li>Limit social media use to <span class="answerShort">30</span> minutes per day</li>
        <li>Get at least <span class="answerShort">7</span> hours of sleep</li>
        <li>Move my body (e.g., walking, stretching, or exercise)</li>
        <li>Other: <span class="answer">Yoga and journaling</span></li>
    </ul>
</div>
        <div class="section">
            <h2>Managing Stress and Triggers</h2>
            <p>Stress Response:</p>
            <span class="answer">Take deep breaths, short walk</span>
            <p>Calm Down Plan:</p>
            <span class="answer">Listen to calming music</span>
            <p>Support Contacts:</p>
            <span class="answer">Friends and therapist</span>
        </div>
        <div class="section">
            <h2>Building My Support System</h2>
            <p><strong>Who are the people I can rely on for emotional support?</strong></p>
            <span class="answer">Family, close friends</span>
            <p><strong>Therapist/Coach:</strong></p>
            <span class="answer">Dr. Smith</span>
            <p><strong>Support Group:</strong></p>
            <span class="answer">Mindful Warriors</span>
            <p><strong>Other:</strong></p>
            <span class="answer">Community leader</span>
        </div>
        <div class="section">
            <h2>Monthly Check-In</h2>
            <p><strong>Did I stick to my daily habits? If not, why?</strong></p>
            <span class="answer">Mostly, but struggled on weekends</span>
            <p><strong>Have I made progress toward my mental health goals?</strong></p>
            <span class="answer">Yes, significant improvement in mindfulness</span>
            <p><strong>What can I improve or change next month?</strong></p>
            <span class="answer">Focus more on regular sleep schedule</span>
        </div>
        <div class="section">
            <h2>Affirmations</h2>
            <p>Affirmations:</p>
            <span class="answer">I am capable. I am resilient. I am worthy of love and care.</span>
        </div>

        <?php if (!$is_pdf_generation): ?>
        <form action="convert_and_mail.php" method="POST">
            <button type="submit" name="generate_pdf" value="1">Convert to PDF and Mail</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>
