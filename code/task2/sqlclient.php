<!DOCTYPE html>
<html>
<head>
    <title>Web-based MySQL Client</title>
</head>
<body style="background-color: #FFFFFF">
    <h2>Web-based MySQL Client</h2>

    <?php

    // Check if form is submitted
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        // Retrieve form data
        $server_name = $_POST['server_name'];
        $mysql_user = $_POST['mysql_user'];
        $mysql_pass = $_POST['mysql_pass'];
        $mysql_database = $_POST['mysql_database'];
        $sql_query = $_POST['sql_query'];

        // Connect to MySQL server
        $conn = mysqli_connect($server_name, $mysql_user, $mysql_pass, $mysql_database);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Execute SQL query
        $result = mysqli_query($conn, $sql_query);

        // Check if query was successful
        if ($result === false) {
            die("Error executing query: " . mysqli_error($conn));
        }
        else{
            echo "<p>Query result:" . $result . "</p>";
            echo "<p>SQL: <br>" . $sql_query . "</p>";
            echo "<p>Status: executed</p>";
        } 

        // Close connection
        mysqli_close($conn);
    }

    ?>
</body>
</html>
