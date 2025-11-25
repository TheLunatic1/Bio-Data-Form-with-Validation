<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Bio Data</title>
    <style>
        body { font-family: Arial; background: #f0f8ff; padding: 40px; }
        .card { max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.2); }
        h2 { color: #007bff; }
        p { font-size: 18px; }
        .label { font-weight: bold; color: #333; }
        a { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Submitted Bio Data</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize inputs
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $dob = htmlspecialchars($_POST['dob']);
            $gender = htmlspecialchars($_POST['gender']);
            $address = htmlspecialchars($_POST['address']);
            $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];

            echo "<p><span class='label'>Full Name:</span> $name</p>";
            echo "<p><span class='label'>Email:</span> $email</p>";
            echo "<p><span class='label'>Phone:</span> " . ($phone ? $phone : "Not provided") . "</p>";
            echo "<p><span class='label'>Date of Birth:</span> $dob</p>";
            echo "<p><span class='label'>Gender:</span> $gender</p>";
            echo "<p><span class='label'>Address:</span> " . ($address ? nl2br($address) : "Not provided") . "</p>";
            echo "<p><span class='label'>Hobbies:</span> ";
            if (!empty($hobbies)) {
                echo implode(", ", $hobbies);
            } else {
                echo "None selected";
            }
            echo "</p>";
        } else {
            echo "<p>No data submitted.</p>";
        }
        ?>

        <br>
        <a href="index.php">← Go Back to Form</a>
    </div>
</body>
</html>