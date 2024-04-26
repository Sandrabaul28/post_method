<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
    <style>
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
    <div class="container">
        <h2 style="text-align: center;">Submitted Data</h2>
        <?php
        // Include connection.php to establish connection
        require_once('connection.php');

        // Fetch data from the database
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='data'>";
                echo "<label>Firstname:</label> " . $row["firstname"] . "<br>";
                echo "<label>Lastname:</label> " . $row["lastname"] . "<br>";
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
