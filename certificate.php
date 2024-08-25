<?php
session_start();

// Retrieve data from session
$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Name';
$course = isset($_SESSION['course']) ? $_SESSION['course'] : 'Course';
$proficiencyLevel = isset($_SESSION['proficiencyLevel']) ? $_SESSION['proficiencyLevel'] : 'Proficiency Level';
$totalScore = isset($_SESSION['totalScore']) ? $_SESSION['totalScore'] : 'Score';

// Fixed path to organization's signature
$signaturePath = 'image/signs.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Generator</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #0e074b;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 10px 20px 50px rgba(11, 6, 110, 0.607);
            text-align: center;
            width: 80%;
            max-width: 1000px;
        }

        .container h1 {
            padding-bottom: 20px;
            margin-bottom: 50px;
            box-shadow: 2px 4px 5px;
        }

        .container h1:hover {
            color: #5e51d1;
        }

        .certificate {
            position: relative;
            border: 2px solid #000;
            padding: 40px;
            border-radius: 8px;
            background: #fff;
            text-align: center;
        }

        .certificate-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .certificate-header img {
            width: 100px;
        }

        .certificate-header h2 {
            flex: 1;
            text-align: center;
            font-size: 24px;
            color: #333;
        }

        .certificate-body {
            position: relative;
            z-index: 1;
            padding: 20px 0;
        }

        .certificate-body p, .certificate-body h1, .certificate-body h3, .certificate-body h2 {
            text-align: center;
            color: #333;
        }

        .certificate-body h1 {
            font-size: 32px;
            margin: 10px 0;
            color: #0056b3;
        }

        .certificate-body h3, .certificate-body h2 {
            font-size: 20px;
            margin: 5px 0;
        }

        .background-image {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 80%;
            height: auto;
            opacity: 0.1;
            z-index: 0;
            transform: translate(-50%, -50%);
            filter: blur(8px);
        }

        #signature {
            display: block;
            margin: 20px auto;
            width: 200px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #0f0781;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #6ca0d7;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Certificate Generator</h1>

        <div id="certificate" class="certificate">
            <div class="certificate-header">
                <img src="image/logo.png" alt="Logo">
                <h2>Certificate of Completion</h2>
                <img src="image/logo.png" alt="Logo" style="visibility:hidden;">
            </div>
            <img src="image/logo.png" alt="Blurred Background Logo" class="background-image">
            <div class="certificate-body">
                <p>This is to certify that</p>
                <h1><?php echo htmlspecialchars($name); ?></h1>
                <p>has successfully completed the course</p>
                <h3><?php echo htmlspecialchars($course); ?></h3>
                <p>with a proficiency level of</p>
                <h3><?php echo htmlspecialchars($proficiencyLevel); ?></h3>
                <p>and a total score of</p>
                <h2><?php echo htmlspecialchars($totalScore); ?></h2>
                <p>Date: <span><?php echo date('Y-m-d'); ?></span></p>
                <img id="signature" src="<?php echo htmlspecialchars($signaturePath); ?>" alt="Organization Signature">
            </div>
        </div>

        <div class="button-container">
            <button id="downloadImageButton">Download as Image</button>
            <button id="downloadPDFButton">Download as PDF</button>
            <button id="backToHomePage" onclick="window.location.href='home.php';">Back to page</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const certificate = document.getElementById('certificate');

            document.getElementById('downloadImageButton').addEventListener('click', function() {
                html2canvas(certificate).then(canvas => {
                    const link = document.createElement('a');
                    link.href = canvas.toDataURL('image/png');
                    link.download = 'certificate.png';
                    link.click();
                });
            });

            document.getElementById('downloadPDFButton').addEventListener('click', function() {
                const { jsPDF } = window.jspdf;
                html2canvas(certificate).then(canvas => {
                    const imgData = canvas.toDataURL('image/png');
                    const pdf = new jsPDF();
                    pdf.addImage(imgData, 'PNG', 10, 10, 180, 160); // Adjust dimensions as needed
                    pdf.save('certificate.pdf');
                });
            });
        });
    </script>
</body>
</html>
