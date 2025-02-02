<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Plan 2025</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #333;
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
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        p {
            margin-bottom: 15px;
            line-height: 1.6;
            color: #555;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        textarea {
            resize: none;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        .navigation {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        button[disabled] {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        .progress-bar-container {
            width: 100%;
            background: #f4f4f9;
            height: 8px;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .progress-bar {
            height: 8px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            width: 0%;
            transition: width 0.4s ease;
        }

        .slide {
            display: none;
        }

        .slide.active {
            display: block;
        }

        .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 8px;
        border-radius: 5px;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        outline: none;
        opacity: 0.9;
        transition: opacity 0.3s;
    }
    .slider:hover {
        opacity: 1;
    }
    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #007bff;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }
    .slider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #007bff;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }
    @keyframes oscillate {
        0% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0); }
    }

    img {
        display: block;
        margin: 0 auto;
        animation: oscillate 2s infinite ease-in-out;
    }
    </style>
</head>
<body>
    
    <div class="container">
        <img src="meditate_.png">
        
        <h3>Your Mental Health Plan Worksheet 2025</h3>
        <div class="progress-bar-container">
            <div class="progress-bar" id="progressBar"></div>
        </div>
        <form id="mentalHealthForm" action="pdf_preview.php" method="POST">
           
            <!-- Section 1 -->
            <div class="slide active">
                <h2>Contact Information</h2>
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email"  >
                <p style="font-size: 0.9rem; color: #555;">(Get a PDF sent to you)</p>
                
                <label for="age">Age:</label>
                <input type="number" name="age" id="age" min="1"  >
            </div>
            <div class="slide ">
                <h2>Section 1: Self-Awareness</h2>
                <label>Rate your mental well-being (1-10):</label>
                <!-- <input type="number" name="mental_state" min="1" max="10"  > -->
                <div style="margin-bottom: 20px;">
                    <input type="range" name="mental_state" min="1" max="10" value="5" class="slider" id="mentalStateSlider">
                    <span id="sliderValue" style="font-weight: bold; margin-left: 10px;">5</span>
                </div>
                <label>Briefly describe how you feel:</label>
                <textarea name="current_feelings"  ></textarea>
                <label>Main stressors:</label>
                <textarea name="stressors"  ></textarea>
                <label>Mood boosters:</label>
                <textarea name="mood_boosters"  ></textarea>
            </div>

            <!-- Section 2 -->
            <div class="slide">
                <h2>Section 2: Mental Health Goals</h2>
                <label>Write 3 specific and realistic goals:</label>
                <textarea name="goals"  ></textarea>
            </div>

            <!-- Section 3 -->
            <div class="slide">
                <h2>Section 3: Daily Practices</h2>
                <p>(Choose activities that are simple and sustainable.)</p>
                <div>
                    <label>
                        <input type="checkbox" name="daily_habit_practice_gratitude" value="Practice gratitude"> Practice gratitude (e.g., write down 3 things I’m grateful for each day).
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="daily_habit_mindfulness" value="Take a mindfulness break"> Take a 10-minute mindfulness or meditation break.
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="daily_habit_limit_social_media" value="Limit social media use"> Limit social media use to 
                        <input type="number" name="social_media_limit" style="width: 60px;" min="1"> minutes per day.
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="daily_habit_sleep" value="Get enough sleep"> Get at least 
                        <input type="number" name="hours_of_sleep" style="width: 60px;" min="1" max="24"> hours of sleep.
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="daily_habit_exercise" value="Move my body"> Move my body (e.g., walking, stretching, or exercise).
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="daily_habit_other" value="Other"> Other: 
                        <input type="text" name="daily_habit_other" style="width: 70%;">
                    </label>
                </div>
            </div>

            <!-- Section 4 -->
            <div class="slide">
                <h2>Section 4: Managing Stress and Triggers</h2>
                <label>If I feel overwhelmed, I will:</label>
                <textarea name="stress_response"  ></textarea>
                <label>To calm down, I will:</label>
                <textarea name="calm_down_plan"  ></textarea>
                <label>Who can I reach out to for support?</label>
                <textarea name="support_contacts"  ></textarea>
            </div>

            <!-- Section 5 -->
            <div class="slide">
                <h2>Section 5: Building My Support System</h2>
                <label>Who are the people I can rely on for emotional support?</label>
                <textarea name="emotional_support" rows="3"  ></textarea>
                <label>Therapist/Coach:</label>
                <input type="text" name="therapist" placeholder="Enter therapist/coach name">
                <label>Support Group:</label>
                <input type="text" name="support_group" placeholder="Enter support group name">
                <label>Other:</label>
                <input type="text" name="other_support" placeholder="Enter other support type">
            </div>

            <!-- Section 6 -->
            <div class="slide">
                <h2>Section 6: Monthly Check-In</h2>
                <label>Did I stick to my daily habits? If not, why?</label>
                <textarea name="checkin_habits"  ></textarea>
                <label>Have I made progress toward my mental health goals?</label>
                <textarea name="checkin_progress"  ></textarea>
                <label>What can I improve or change next month?</label>
                <textarea name="checkin_improve"  ></textarea>
            </div>

            <!-- Section 7 -->
            <div class="slide">
                <h2>Section 7: Affirmations and Encouragement</h2>
                <label>Affirmation 1:</label>
                <input type="text" name="affirmations[]" placeholder="Enter your first affirmation..."  >
                <label>Affirmation 2:</label>
                <input type="text" name="affirmations[]" placeholder="Enter your second affirmation..."  >
                <label>Affirmation 3:</label>
                <input type="text" name="affirmations[]" placeholder="Enter your third affirmation..."  >
            </div>

            <div class="navigation">
                <button type="button" id="prevBtn" disabled>Previous</button>
                <button type="button" id="nextBtn">Next</button>
                <button type="submit" id="submitBtn" style="display:none;">Submit</button>
            </div>
        </form>
    </div>

    <script>
        const slides = document.querySelectorAll('.slide');
        const progressBar = document.getElementById('progressBar');
        let currentSlide = 0;

        document.getElementById('nextBtn').addEventListener('click', () => {
            slides[currentSlide].classList.remove('active');
            currentSlide++;
            slides[currentSlide].classList.add('active');
            updateProgressBar();
            updateButtons();
        });

        document.getElementById('prevBtn').addEventListener('click', () => {
            slides[currentSlide].classList.remove('active');
            currentSlide--;
            slides[currentSlide].classList.add('active');
            updateProgressBar();
            updateButtons();
        });

        function updateProgressBar() {
            const progress = ((currentSlide + 1) / slides.length) * 100;
            progressBar.style.width = progress + '%';
        }

        function updateButtons() {
            document.getElementById('prevBtn').disabled = currentSlide === 0;
            document.getElementById('nextBtn').style.display = currentSlide === slides.length - 1 ? 'none' : 'inline-block';
            document.getElementById('submitBtn').style.display = currentSlide === slides.length - 1 ? 'inline-block' : 'none';
        }

        //document.getElementById('mentalHealthForm').addEventListener('submit', (e) => {
          //  e.preventDefault();
            //alert('Form submitted successfully!');
        //});

        const slider = document.getElementById('mentalStateSlider');
    const sliderValue = document.getElementById('sliderValue');
    slider.addEventListener('input', function () {
        sliderValue.textContent = slider.value;
    });
    </script>
</body>
</html>
