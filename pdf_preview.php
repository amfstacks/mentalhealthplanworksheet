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
            min-height: 10px;

        }
        .answerShort {
            display: contents;
            width: 50px;
            margin-top: 5px;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 4px;
            background-color: #e7f1ff;
            color: #007bff;
            font-weight: bold;
            min-height: 10px;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
            /* color: #6a11cb; */
        }
    </style>
</head>
<body>
<?php
    // Capture form data
    $email = htmlspecialchars($_POST['email'] ?? 'N/A');
    $age = htmlspecialchars($_POST['age'] ?? 'N/A');
    $mentalState = htmlspecialchars($_POST['mental_state'] ?? 'N/A');
    $currentFeelings = htmlspecialchars($_POST['current_feelings'] ?? 'N/A');
    $stressors = htmlspecialchars($_POST['stressors'] ?? 'N/A');
    $moodBoosters = htmlspecialchars($_POST['mood_boosters'] ?? 'N/A');
    $goals = (nl2br($_POST['goals'] ?? 'N/A'));
    $dailyHabits = $_POST['daily_habits'] ?? [];
    $socialMediaLimit = htmlspecialchars($_POST['social_media_limit'] ?? 'N/A');
    $hoursOfSleep = htmlspecialchars($_POST['hours_of_sleep'] ?? 'N/A');
    $stressResponse = htmlspecialchars($_POST['stress_response'] ?? 'N/A');
    $calmDownPlan = htmlspecialchars($_POST['calm_down_plan'] ?? 'N/A');
    $supportContacts = htmlspecialchars($_POST['support_contacts'] ?? 'N/A');
    $emotionalSupport = htmlspecialchars($_POST['emotional_support'] ?? 'N/A');
    $therapist = htmlspecialchars($_POST['therapist'] ?? 'N/A');
    $supportGroup = htmlspecialchars($_POST['support_group'] ?? 'N/A');
    $otherSupport = htmlspecialchars($_POST['other_support'] ?? 'N/A');
    $checkinHabits = htmlspecialchars($_POST['checkin_habits'] ?? 'N/A');
    $checkinProgress = htmlspecialchars($_POST['checkin_progress'] ?? 'N/A');
    $checkinImprove = htmlspecialchars($_POST['checkin_improve'] ?? 'N/A');
    $affirmations = $_POST['affirmations'] ?? [];

    $dailyPractices = [
        'Practice gratitude' => isset($_POST['daily_habit_practice_gratitude']),
        'Take a mindfulness break' => isset($_POST['daily_habit_mindfulness']),
        'Limit social media use' => isset($_POST['daily_habit_limit_social_media']) ? $_POST['social_media_limit'] : '',
        'Get enough sleep' => isset($_POST['daily_habit_sleep']) ? $_POST['hours_of_sleep'] : '',
        'Move my body' => isset($_POST['daily_habit_exercise']),
        'Other' => isset($_POST['daily_habit_other']) ? htmlspecialchars($_POST['daily_habits_other']) : '',
    ];
    ?>
    <div class="container">
        <div class="title">
            <img src="blacklogo.png" style="height: 150px;">
            <h1>Your Mental Health Plan Worksheet 2025</h1>
            <p>Personalized Plan for:</p>
            <span class="answer"><?= $email ?></span>
        </div>
        <div class="section">
            <h2>Basic Information</h2>
            <p>Email Address:</p>
            <span class="answer"><?= $email ?></span>
            <p>Age:</p>
            <span class="answer"><?= $age ?></span>
        </div>
        <div class="section">
            <h2>Self-Awareness</h2>
            <p>Mental State (1-10):</p>
            <span class="answer"><?= $mentalState ?></span>
            <p>Current Feelings:</p>
            <span class="answer"><?= $currentFeelings ?></span>
            <p>Main Stressors:</p>
            <span class="answer"><?= $stressors ?></span>
            <p>Mood Boosters:</p>
            <span class="answer"><?= $moodBoosters ?></span>
        </div>
        <div class="section">
            <h2>Mental Health Goals</h2>
            <p>Goals:</p>
            <span class="answer"><?= $goals ?></span>
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
    <h2>Section 3: Daily Practices</h2>
    <ul>
        <li><input type="checkbox" disabled <?= $dailyPractices['Practice gratitude'] ? 'checked' : '' ?>> Practice gratitude</li>
        <li><input type="checkbox" disabled <?= $dailyPractices['Take a mindfulness break'] ? 'checked' : '' ?>> Take a mindfulness break</li>
        <li>
            <input type="checkbox" disabled <?= $dailyPractices['Limit social media use'] ? 'checked' : '' ?>> Limit social media use: 
            <span class="answer"><?= htmlspecialchars($dailyPractices['Limit social media use']) ?> minutes</span>
        </li>
        <li>
            <input type="checkbox" disabled <?= $dailyPractices['Get enough sleep'] ? 'checked' : '' ?>> Get enough sleep: 
            <span class="answer"><?= htmlspecialchars($dailyPractices['Get enough sleep']) ?> hours</span>
        </li>
        <li><input type="checkbox" disabled <?= $dailyPractices['Move my body'] ? 'checked' : '' ?>> Move my body</li>
        <li>
            <input type="checkbox" disabled <?= $dailyPractices['Other'] ? 'checked' : '' ?>> Other: 
            <span class="answer"><?= htmlspecialchars($dailyPractices['Other']) ?></span>
        </li>
    </ul>
</div>
        <div class="section">
            <h2>Managing Stress and Triggers</h2>
            <p>Stress Response:</p>
            <span class="answer"><?= $stressResponse ?></span>
            <p>Calm Down Plan:</p>
            <span class="answer"><?= $calmDownPlan ?></span>
            <p>Support Contacts:</p>
            <span class="answer"><?= $supportContacts ?></span>
        </div>
        <div class="section">
            <h2>Building My Support System</h2>
            <p><strong>Who are the people I can rely on for emotional support?</strong></p>
            <span class="answer"><?= $emotionalSupport ?></span>
            <p><strong>Therapist/Coach:</strong></p>
            <span class="answer"><?= $therapist ?></span>
            <p><strong>Support Group:</strong></p>
            <span class="answer"><?= $supportGroup ?></span>
            <p><strong>Other:</strong></p>
            <span class="answer"><?= $otherSupport ?></span>
        </div>
        <div class="section">
            <h2>Monthly Check-In</h2>
            <p><strong>Did I stick to my daily habits? If not, why?</strong></p>
            <span class="answer"><?= $checkinHabits ?></span>
            <p><strong>Have I made progress toward my mental health goals?</strong></p>
            <span class="answer"><?= $checkinProgress ?></span>
            <p><strong>What can I improve or change next month?</strong></p>
            <span class="answer"><?= $checkinImprove ?></span>
        </div>
        <div class="section">
            <h2>Affirmations</h2>
            <p>Affirmations:</p>
            <?php foreach ($affirmations as $index => $affirmation): ?>
                <p>Affirmation <?= $index + 1 ?>: <span class="answer"><?= htmlspecialchars($affirmation) ?></span></p>
            <?php endforeach; ?>
        </div>

        <?php if (!$is_pdf_generation): ?>
        <form action="convert_and_mail.php" method="POST">
            <button type="submit" name="generate_pdf" value="1">Convert to PDF and Mail</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>
