
<?php
    // Database connection variables
    $servername = "localhost";
    $username = "id20881428_geotracker";
    $password = "Adm!n@2023";
    $dbname = "id20881428_geotracker";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get form data
    if(isset($_POST['latitude']) || isset($_POST['longitude']) || isset($_POST['name'])){
        $name = $_POST['name'];
        $lat = $_POST['latitude'];
        $lng = $_POST['longitude'];
        $time = $_POST['time'];

        // Insert data into table
        $sql = "INSERT INTO `markers`(`name`, `lat`, `lng`, `date_time`) VALUES ('$name', '$lat', '$lng', '$time')";

        if (mysqli_query($conn, $sql)) {
            // Set success message
         //   $message = "New record created successfully";

            echo "Success!";

            // Redirect back to the form page with the message
        //    header("Location: input_data.php?message=" . urlencode($message));

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        exit();
    }
?>
