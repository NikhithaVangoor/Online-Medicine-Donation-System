<!DOCTYPE html>
<html>
<head>
    <title>Donated Medicine</title>
    <style>
        body {
            background-image: url('donatedbg.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent background for readability */
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Donation Data</h1>

    <?php
    // Step 1: Establish a database connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "bharath_medicine_donation";

    $connection = mysqli_connect($host, $username, $password, $database);

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Step 2: Retrieve the data
    $query = "SELECT * FROM donateform";
    $result = mysqli_query($connection, $query);

    // Step 3: Fetch the data
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Step 4: Display the data in a table
    if (!empty($data)) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Tablet Name</th>";
        echo "<th>Manufactured Date</th>";
        echo "<th>Expiry Date</th>";
        echo "<th>Quantity</th>";
        echo "<th>Brand Name</th>";
        // ... continue with other column headers
        echo "</tr>";

        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . $row['tablet-name'] . "</td>";
            echo "<td>" . formatDateString($row['manufactured-date']) . "</td>";
            echo "<td>" . $row['expiry-date'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['brand-name'] . "</td>";
            // ... continue with other columns
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No data found.";
    }

    // Function to format the date string (assuming 'manufactured-date' contains a date)
    function formatDateString($dateString) {
        $date = date_create($dateString);
        return date_format($date, 'Y-m-d');
    }
    ?>

</body>
</html>
