<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bio Data Form</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f4; }
        .container { max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, select, textarea { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { background: #007bff; color: white; cursor: pointer; font-size: 16px; }
        input[type="submit"]:hover { background: #0056b3; }
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bio Data Form</h2>
        <form action="process.php" method="POST" onsubmit="return validateForm()">
            <label>Full Name *</label>
            <input type="text" name="name" id="name" required>
            <span class="error" id="nameError"></span>

            <label>Email *</label>
            <input type="email" name="email" id="email" required>
            <span class="error" id="emailError"></span>

            <label>Phone (10 digits)</label>
            <input type="text" name="phone" id="phone" maxlength="10">

            <label>Date of Birth *</label>
            <input type="date" name="dob" required>

            <label>Gender *</label>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label>Address</label>
            <textarea name="address" rows="3"></textarea>

            <label>Hobbies</label>
            <input type="checkbox" name="hobbies[]" value="Reading"> Reading
            <input type="checkbox" name="hobbies[]" value="Sports"> Sports
            <input type="checkbox" name="hobbies[]" value="Music"> Music
            <input type="checkbox" name="hobbies[]" value="Traveling"> Traveling

            <br><br>
            <input type="submit" name="submit" value="Submit Bio Data">
        </form>
    </div>

    <script>
        function validateForm() {
            let name = document.getElementById("name").value;
            let email = document.getElementById("email").value;
            let phone = document.getElementById("phone").value;

            let nameError = document.getElementById("nameError");
            let emailError = document.getElementById("emailError");

            let valid = true;

            // Name validation
            if (!/^[a-zA-Z ]+$/.test(name)) {
                nameError.innerText = "Name should contain only letters and spaces";
                valid = false;
            } else {
                nameError.innerText = "";
            }

            // Email validation
            if (!/^\S+@\S+\.\S+$/.test(email)) {
                emailError.innerText = "Please enter a valid email";
                valid = false;
            } else {
                emailError.innerText = "";
            }

            // Phone validation
            if (phone !== "" && !/^\d{10}$/.test(phone)) {
                alert("Phone must be exactly 10 digits");
                valid = false;
            }

            return valid;
        }
    </script>
</body>
</html>