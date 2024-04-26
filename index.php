<?php
    require_once('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 50%;
            position: relative;
            left: 32px;
        }
        label {
            font-weight: bold;
        }
        .data {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="submit.php" method="post">
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname"><br>
        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname"><br>
        <label for="address">Address:</label><br>
        <textarea id="address" name="address"></textarea><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br>
        <input type="submit" value="Submit">
    </form>

    <div class="container">
        <h2 style="text-align: center;">Submitted Data</h2>
        <?php
        // Fetch data from the database
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='data'>";
                echo "<label>Firstname:</label> " . $row["firstname"] . "<br>";
                echo "<label>Lastname:</label> " . $row["lastname"] . "<br>";
                echo "<label>Address:</label> " . $row["address"] . "<br>";
                echo "<label>Email:</label> " . $row["email"] . "<br>";
                echo "<label>Gender:</label> " . $row["gender"] . "<br>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
