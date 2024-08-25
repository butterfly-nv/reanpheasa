<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grammar Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* styling.css */

body {
    font-family: Arial, sans-serif;
    padding: 20px;
    background: linear-gradient(135deg, #ccd5e3, #adc5eb);
    font-size: 18px; /* Default font size for body text */
    background-color: #f8f9fa; /* Light background color for better readability */
}

.navbar {
    margin-bottom: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    margin-bottom: 20px;
    font-size: 24px; /* Increased font size for the header */
}

.space {
    margin: 20px 0; /* Adjusted margin for better spacing */
}

.form-group {
    margin-bottom: 20px;
}

.form-check-label {
    font-size: 18px; /* Font size for the form options */
}

.btn-primary {
    font-size: 18px; /* Increased font size for the submit button */
    padding: 10px 20px; /* Added padding for better button appearance */
}

/* Additional styling for better visual separation */
hr {
    margin: 20px 0; /* Adds margin to horizontal rules for spacing */
}

/* Responsive design adjustments */
@media (max-width: 768px) {
    .container {
        padding: 0 15px;
    }
    
    .form-check-label {
        font-size: 16px; /* Smaller font size on smaller screens */
    }

    h1 {
        font-size: 20px; /* Slightly smaller header on smaller screens */
    }
}
 
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Grammar Test</a>
    </nav>
    <div class="container mt-4">
        <h1 style="text-align: center;">Part 1: Grammar Test</h1>
        <p class="space">INSTRUCTIONS: Choose the correct option (only one answer is possible)</p>
        <p style="font-size: 15px;">There are a total of 10 questions. Read carefully before answering. Ensure to answer every question.</p>

        <?php
        session_start();

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Define correct answers and points for each question
            $questions = [
                'q1' => ['answer' => 'What', 'points' => 2],
                'q2' => ['answer' => 'have', 'points' => 2],
                'q3' => ['answer' => 'him', 'points' => 2],
                'q4' => ['answer' => 'Are there', 'points' => 2],
                'q5' => ['answer' => 'there isn\'t', 'points' => 2],
                'q6' => ['answer' => 'Would you like', 'points' => 2],
                'q7' => ['answer' => 'Some', 'points' => 2],
                'q8' => ['answer' => 'Can you wait', 'points' => 2],
                'q9' => ['answer' => 'have no', 'points' => 4],
                'q10' => ['answer' => 'don\'t usually have', 'points' => 5],
            ];

            $score = 0;
            $totalPoints = array_sum(array_column($questions, 'points'));

            // Calculate the score
            foreach ($questions as $question => $details) {
                if (isset($_POST[$question]) && $_POST[$question] == $details['answer']) {
                    $score += $details['points'];
                }
            }

            // Store the score in the session
            $_SESSION['grammarScore'] = $score;

            // Redirect to the listening test (listening.php)
            header("Location: listening.php");
            exit();
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- Question 1 -->
            <div class="form-group">
                <label>1. Good morning, sir. _____ 's your name? <required/label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" value="Which">
                    <label class="form-check-label">Which</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" value="What">
                    <label class="form-check-label">What</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" value="Who">
                    <label class="form-check-label">Who</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" value="Where">
                    <label class="form-check-label">Where</label>
                </div>
            </div>

            <div class="form-group">
                <label>2. My name is John Evans. I _____ an interview with Anna Harris.</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" value="get">
                    <label class="form-check-label">get</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" value="has">
                    <label class="form-check-label">has</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" value="have">
                    <label class="form-check-label">have</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q2" value="do">
                    <label class="form-check-label">do</label>
                </div>
            </div>

            <!-- Add the rest of the questions (3 to 25) similarly -->
           <div class="form-group">
                <label>3. Please, take a seat and I'll call _____.</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" value="he" required>
                    <label class="form-check-label">he</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" value="she">
                    <label class="form-check-label">she</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" value="him">
                    <label class="form-check-label">him</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q3" value="her">
                    <label class="form-check-label">her</label>
                </div>
            </div>

            <div class="form-group">
                <label>4. _____ many candidates for the interview?</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q4" value="Is there" required>
                    <label class="form-check-label">Is there</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q4" value="Are there">
                    <label class="form-check-label">Are there</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q4" value="There is">
                    <label class="form-check-label">There is</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q4" value="There are">
                    <label class="form-check-label">There are</label>
                </div>
            </div>

            <div class="form-group">
                <label>5. No, _____. You're the only one today.</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q5" value="there are" required>
                    <label class="form-check-label">there are</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q5" value="there is">
                    <label class="form-check-label">there is</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q5" value="there aren't">
                    <label class="form-check-label">there aren't</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q5" value="there isn't">
                    <label class="form-check-label">there isn't</label>
                </div>
            </div>

            <div class="form-group">
                <label>6. _____ something to drink?</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q6" value="Would like" required>
                    <label class="form-check-label">Would like</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q6" value="You like">
                    <label class="form-check-label">You like</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q6" value="You would like">
                    <label class="form-check-label">You would like</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q6" value="Would you like">
                    <label class="form-check-label">Would you like</label>
                </div>
            </div>

            <div class="form-group">
                <label>7. _____ water, please. Thank you.</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q7" value="Any" required>
                    <label class="form-check-label">Any</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q7" value="Lot">
                    <label class="form-check-label">Lot</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q7" value="Some">
                    <label class="form-check-label">Some</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q7" value="Few">
                    <label class="form-check-label">Few</label>
                </div>
            </div>

            <div class="form-group">
                <label>8. Excuse me but Mrs. Harris is in a meeting right now. _____ for her?</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q8" value="You wait" required>
                    <label class="form-check-label">You wait</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q8" value="Can wait">
                    <label class="form-check-label">Can wait</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q8" value="You can wait">
                    <label class="form-check-label">You can wait</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q8" value="Can you wait">
                    <label class="form-check-label">Can you wait</label>
                </div>
            </div>

            <div class="form-group">
                <label>9. Sure, I _____ problem.</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q9" value="haven't a" required>
                    <label class="form-check-label">haven't a</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q9" value="don't have">
                    <label class="form-check-label">don't have</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q9" value="have no">
                    <label class="form-check-label">have no</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q9" value="do not have">
                    <label class="form-check-label">do not have</label>
                </div>
            </div>

            <div class="form-group">
                <label>10. Mr. Evans, good morning and sorry for the delay. I _____ meetings so early.</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q10" value="usually not have" required>
                    <label class="form-check-label">usually not have</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q10" value="don't usually have">
                    <label class="form-check-label">don't usually have</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q10" value="haven't usually">
                    <label class="form-check-label">haven't usually</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q10" value="usually have not">
                    <label class="form-check-label">usually have not</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>