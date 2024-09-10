
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Requests</title>
    <style>
        body {
            background-image: url('displaybg.jpg'); /* Replace with your image URL */
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
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: rgba(255, 255, 255, 0.8);
        }
        
        table th,
        table td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }
        
        table th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        table tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Medicine Requests</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Medicine</th>
            <th>Quantity</th>
        </tr>
        
        <?php
        // Establish database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bharath_medicine_donation";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($conn) {
            // Fetch records from the "medicine_requests" table
            $query = "SELECT * FROM request";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['Contact'] . "</td>";
                    echo "<td>" . $row['Medicine'] . "</td>";
                    echo "<td>" . $row['Quantity'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }

            mysqli_close($conn); // Close the database connection
        } else {
            echo "Connection failed: " . mysqli_connect_error();
        }
        ?>
    </table>
</body>
</html>
