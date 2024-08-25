<?php
session_start();

// Process the form submission 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $totalScore = 0;
    $correctAnswers = [
        'q1' => 'Improved mental health',
        'q2' => 'They help to mitigate the effect',
        'q3' => 'They contribute to biodiversity by offering habitats',
        'q4' => 'They attract tourists',
        'q5' => 'Unequal access to green spaces',
        'q6' => 'To provide recreational areas and connect with nature',
        'q7' => 'They can improve mental health and reduce stress',
        'q8' => 'To ensure all residents benefit from green spaces',
        'q9' => 'They enhance the ecological balance',
        'q10' => 'None of the above', // Assuming the answer is not present in options
        'q11' => 'Exacerbation of social inequalities',
        'q12' => 'Reduction in urban temperatures',
        'q13' => 'By improving biodiversity and offering habitats',
        'q14' => 'Greater social and economic inequality',
        'q15' => 'They offer aesthetic and recreational benefits'
    ];

    for ($i = 1; $i <= 15; $i++) {
        $questionKey = 'q' . $i;
        if (isset($_POST[$questionKey]) && $_POST[$questionKey] === $correctAnswers[$questionKey]) {
            $points = ($i <= 10) ? 1 : 3;
            $totalScore += $points;
        }
    }

    $_SESSION['readingScore'] = $totalScore; 

    header("Location: writing.php");
    exit();
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading Test - Part 3</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ... (Your existing CSS code) ... */
        body {
            padding: 20px;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2); /* Gradient background */
            font-family: 'Roboto', sans-serif;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: #ffffff; /* White background for content area */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* More pronounced shadow */
        }
        .centered-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 30px;
            animation: fadeIn 1s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .alert {
            margin-bottom: 20px;
            background-color: #d1ecf1;
            color: #0c5460;
            border-color: #bee5eb;
            border-radius: 8px;
            padding: 15px;
            animation: bounceIn 1s ease-out;
        }
        @keyframes bounceIn {
            0% { transform: scale(0); opacity: 0; }
            50% { transform: scale(1.05); opacity: 0.5; }
            100% { transform: scale(1); opacity: 1; }
        }
        .form-check-label {
            margin-left: 10px;
            color: #343a40;
        }
        .form-check-input:checked {
            background-color: #007bff; /* Blue color for checked */
            border-color: #007bff;
        }
        .btn-submit {
            margin-top: 20px;
            background-color: #28a745; /* Green background */
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            color: #ffffff;
            font-size: 1.2em;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #218838; /* Darker green on hover */
            transform: scale(1.05); /* Slightly enlarge button on hover */
        }
        .question-container {
            margin-bottom: 30px;
        }
        .form-group h3 {
            font-size: 1.5em;
            color: #007bff; /* Blue color for questions */
            margin-bottom: 15px;
            animation: slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- ... (Your existing HTML code for the quiz) ... -->
        <form id="testForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="centered-section">
            <h1 class="mb-4">Part 3: Reading Test</h1>
            <div class="alert alert-info">
                <strong>INSTRUCTIONS:</strong>
                <p>Choose the correct option based on the passage provided.</p>
                <p>Each question is worth a specific number of points, adding up to a total of 25 points.</p>
            </div>
        </div>

        <!-- Reading Passage -->
        <section style="font-size: 20px;">
            <h2 class="mb-3 text-center">Passage</h2>
            <p>
                Urban green spaces, such as parks and gardens, play a crucial role in modern cities. They provide residents with areas to relax, exercise, and connect with nature. Studies have shown that access to green spaces can improve mental health, reduce stress, and encourage physical activity. Additionally, these areas help to mitigate the urban heat island effect, where built environments become significantly warmer than their rural surroundings.
            </p>
            <p>
                Green spaces also contribute to the biodiversity of urban areas by offering habitats for various species of plants and animals. This biodiversity can enhance the ecological balance of a city and improve its resilience against environmental changes. Furthermore, well-maintained parks and gardens can boost property values and attract tourists, contributing to the local economy.
            </p>
            <p>
                However, the distribution of green spaces is often unequal, with some neighborhoods having more access than others. This disparity can exacerbate social inequalities, making it important for urban planners to ensure that all residents benefit from these valuable areas. Efforts to create and maintain green spaces in underserved areas can help promote a more equitable urban environment.
            </p>
        </section>

        <!-- Questions Section -->
        <section>
            <h2 class="mb-3 text-center">Questions</h2>

            <!-- Form Element -->
            <form id="testForm">
                <!-- Question 1 -->
                <div class="form-group mb-4">
                    <h3>1. What are some benefits of urban green spaces mentioned in the passage?</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1a" value="Improved mental health">
                        <label class="form-check-label" for="q1a">A. Improved mental health</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1b" value="Increased traffic congestion">
                        <label class="form-check-label" for="q1b">B. Increased traffic congestion</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1c" value="Reduced property values">
                        <label class="form-check-label" for="q1c">C. Reduced property values</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1" id="q1d" value="Higher crime rates">
                        <label class="form-check-label" for="q1d">D. Higher crime rates</label>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="form-group mb-4">
                    <h3>2. How do urban green spaces affect the urban heat island effect?</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2a" value="They make urban areas warmer">
                        <label class="form-check-label" for="q2a">A. They make urban areas warmer</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2b" value="They have no effect on the urban heat island effect">
                        <label class="form-check-label" for="q2b">B. They have no effect on the urban heat island effect</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2c" value="They help to mitigate the effect">
                        <label class="form-check-label" for="q2c">C. They help to mitigate the effect</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2" id="q2d" value="They exacerbate the effect">
                        <label class="form-check-label" for="q2d">D. They exacerbate the effect</label>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="form-group mb-4">
                    <h3>3. What role do green spaces play in biodiversity?</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3a" value="They decrease biodiversity">
                        <label class="form-check-label" for="q3a">A. They decrease biodiversity</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3b" value="They have no impact on biodiversity">
                        <label class="form-check-label" for="q3b">B. They have no impact on biodiversity</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3c" value="They contribute to biodiversity by offering habitats">
                        <label class="form-check-label" for="q3c">C. They contribute to biodiversity by offering habitats</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3" id="q3d" value="They destroy habitats for species">
                        <label class="form-check-label" for="q3d">D. They destroy habitats for species</label>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="form-group mb-4">
                    <h3>4. What is one economic benefit of well-maintained parks and gardens?</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4a" value="They decrease property values">
                        <label class="form-check-label" for="q4a">A. They decrease property values</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4b" value="They attract tourists">
                        <label class="form-check-label" for="q4b">B. They attract tourists</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4c" value="They increase traffic fines">
                        <label class="form-check-label" for="q4c">C. They increase traffic fines</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4" id="q4d" value="They raise construction costs">
                        <label class="form-check-label" for="q4d">D. They raise construction costs</label>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="form-group mb-4">
                    <h3>5. What issue related to green space distribution is highlighted in the passage?</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5a" value="Excessive green space in all neighborhoods">
                        <label class="form-check-label" for="q5a">A. Excessive green space in all neighborhoods</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5b" value="Unequal access to green spaces">
                        <label class="form-check-label" for="q5b">B. Unequal access to green spaces</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5c" value="Overabundance of green spaces">
                        <label class="form-check-label" for="q5c">C. Overabundance of green spaces</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5" id="q5d" value="Total lack of green spaces in urban areas">
                        <label class="form-check-label" for="q5d">D. Total lack of green spaces in urban areas</label>
                    </div>
                </div>
                <!-- Question 6 -->
            <div class="form-group mb-4">
                <h3>6. What is the primary purpose of urban green spaces?</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q6" id="q6a" value="To increase urban density">
                    <label class="form-check-label" for="q6a">A. To increase urban density</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q6" id="q6b" value="To provide recreational areas and connect with nature">
                    <label class="form-check-label" for="q6b">B. To provide recreational areas and connect with nature</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q6" id="q6c" value="To create more industrial zones">
                    <label class="form-check-label" for="q6c">C. To create more industrial zones</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q6" id="q6d" value="To decrease public spaces">
                    <label class="form-check-label" for="q6d">D. To decrease public spaces</label>
                </div>
            </div>

            <!-- Question 7 -->
            <div class="form-group mb-4">
                <h3>7. What impact do green spaces have on mental health?</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q7" id="q7a" value="They can worsen mental health">
                    <label class="form-check-label" for="q7a">A. They can worsen mental health</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q7" id="q7b" value="They can improve mental health and reduce stress">
                    <label class="form-check-label" for="q7b">B. They can improve mental health and reduce stress</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q7" id="q7c" value="They have no effect on mental health">
                    <label class="form-check-label" for="q7c">C. They have no effect on mental health</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q7" id="q7d" value="They can increase stress levels">
                    <label class="form-check-label" for="q7d">D. They can increase stress levels</label>
                </div>
            </div>

            <!-- Question 8 -->
            <div class="form-group mb-4">
                <h3>8. Why is it important for urban planners to focus on green space distribution?</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q8" id="q8a" value="To ensure all residents benefit from green spaces">
                    <label class="form-check-label" for="q8a">A. To ensure all residents benefit from green spaces</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q8" id="q8b" value="To create more industrial areas">
                    <label class="form-check-label" for="q8b">B. To create more industrial areas</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q8" id="q8c" value="To increase traffic congestion">
                    <label class="form-check-label" for="q8c">C. To increase traffic congestion</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q8" id="q8d" value="To reduce public amenities">
                    <label class="form-check-label" for="q8d">D. To reduce public amenities</label>
                </div>
            </div>

            <!-- Question 9 -->
            <div class="form-group mb-4">
                <h3>9. How do urban green spaces contribute to a city’s ecological balance?</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q9" id="q9a" value="They disrupt the ecological balance">
                    <label class="form-check-label" for="q9a">A. They disrupt the ecological balance</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q9" id="q9b" value="They enhance the ecological balance">
                    <label class="form-check-label" for="q9b">B. They enhance the ecological balance</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q9" id="q9c" value="They have no impact on the ecological balance">
                    <label class="form-check-label" for="q9c">C. They have no impact on the ecological balance</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q9" id="q9d" value="They harm the ecological balance">
                    <label class="form-check-label" for="q9d">D. They harm the ecological balance</label>
                </div>
            </div>

            <!-- Question 10 -->
            <div class="form-group mb-4">
                <h3>10. What recommendation does the author make for individuals considering this method?</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q10" id="q10a" value="Conduct a detailed cost-benefit analysis">
                    <label class="form-check-label" for="q10a">A. Conduct a detailed cost-benefit analysis</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q10" id="q10b" value="Seek endorsements from industry leaders">
                    <label class="form-check-label" for="q10b">B. Seek endorsements from industry leaders</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q10" id="q10c" value="Start with a pilot project">
                    <label class="form-check-label" for="q10c">C. Start with a pilot project</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q10" id="q10d" value="Invest in training programs">
                    <label class="form-check-label" for="q10d">D. Invest in training programs</label>
                </div>
            </div>

            <!-- Question 11 -->
            <div class="form-group mb-4">
                <h3>11. What is the main challenge associated with the unequal distribution of green spaces?</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q11" id="q11a" value="Increased traffic congestion">
                    <label class="form-check-label" for="q11a">A. Increased traffic congestion</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q11" id="q11b" value="Exacerbation of social inequalities">
                    <label class="form-check-label" for="q11b">B. Exacerbation of social inequalities</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q11" id="q11c" value="Higher crime rates">
                    <label class="form-check-label" for="q11c">C. Higher crime rates</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q11" id="q11d" value="Decreased property values">
                    <label class="form-check-label" for="q11d">D. Decreased property values</label>
                </div>
            </div>

            <!-- Question 12 -->
            <div class="form-group mb-4">
                <h3>12. What specific aspect of the urban heat island effect do green spaces help mitigate?</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q12" id="q12a" value="Reduction in urban temperatures">
                    <label class="form-check-label" for="q12a">A. Reduction in urban temperatures</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q12" id="q12b" value="Increased traffic noise">
                    <label class="form-check-label" for="q12b">B. Increased traffic noise</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q12" id="q12c" value="Higher energy consumption">
                    <label class="form-check-label" for="q12c">C. Higher energy consumption</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q12" id="q12d" value="Increased air pollution">
                    <label class="form-check-label" for="q12d">D. Increased air pollution</label>
                </div>
            </div>

            <!-- Question 13 -->
            <div class="form-group mb-4">
                <h3>13. How do green spaces enhance a city’s resilience against environmental changes?</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q13" id="q13a" value="By reducing property values">
                    <label class="form-check-label" for="q13a">A. By reducing property values</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q13" id="q13b" value="By improving biodiversity and offering habitats">
                    <label class="form-check-label" for="q13b">B. By improving biodiversity and offering habitats</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q13" id="q13c" value="By increasing urban density">
                    <label class="form-check-label" for="q13c">C. By increasing urban density</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q13" id="q13d" value="By decreasing public amenities">
                    <label class="form-check-label" for="q13d">D. By decreasing public amenities</label>
                </div>
            </div>

            <!-- Question 14 -->
            <div class="form-group mb-4">
                <h3>14. What can be a consequence of not addressing the unequal distribution of green spaces?</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q14" id="q14a" value="Increase in property values in all areas">
                    <label class="form-check-label" for="q14a">A. Increase in property values in all areas</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q14" id="q14b" value="Greater social and economic inequality">
                    <label class="form-check-label" for="q14b">B. Greater social and economic inequality</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q14" id="q14c" value="Decrease in urban biodiversity">
                    <label class="form-check-label" for="q14c">C. Decrease in urban biodiversity</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q14" id="q14d" value="Reduction in traffic congestion">
                    <label class="form-check-label" for="q14d">D. Reduction in traffic congestion</label>
                </div>
            </div>

            <!-- Question 15 -->
            <div class="form-group mb-4">
                <h3>15. Why might well-maintained green spaces attract tourists?</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q15" id="q15a" value="They are less accessible to visitors">
                    <label class="form-check-label" for="q15a">A. They are less accessible to visitors</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q15" id="q15b" value="They offer aesthetic and recreational benefits">
                    <label class="form-check-label" for="q15b">B. They offer aesthetic and recreational benefits</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q15" id="q15c" value="They are located in industrial zones">
                    <label class="form-check-label" for="q15c">C. They are located in industrial zones</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q15" id="q15d" value="They increase urban temperatures">
                    <label class="form-check-label" for="q15d">D. They increase urban temperatures</label>
                </div>
            </div>
            <!-- ... (Your existing questions and options within the form) ... -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-submit">Submit Answers</button>
            </div>
        </form>
        <!-- ... (Rest of your existing HTML code) ... -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>