<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Package</title>
    <style>
        label {
            display: block;
        }
        input, textarea, select {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2><a href="http://localhost/gym/">home</a></h2>

    <h1>Create Package</h1>
    <p>Welcome to the create package page</p>
    <form action="" method="post">
        <input type="text" value="1" name="gym_id" style="display: none;">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        
        <label for="price">Price</label>
        <input type="text" name="price" id="price">
        
        <label for="duration">Duration</label>
        <select name="duration" id="duration">
            <option value="0" selected disabled>Select duration</option>
            <option value="monthly">Monthly</option>
            <option value="quarterly">Quarterly</option>
            <option value="half-yearly">Half-yearly</option>
            <option value="yearly">Yearly</option>
        </select>
        
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        // Include your database connection and functions
        include '../functions.php';
        include '../db.php';

        $name = $_POST['name'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        $price = $_POST['price'];
        $gym_id = $_POST['gym_id'];

        // Function to convert duration to days
        function convertDurationToDays($duration) {
            switch ($duration) {
                case 'monthly':
                    return 30; // 30 days
                case 'quarterly':
                    return 90; // 3 months * 30 days
                case 'half-yearly':
                    return 180; // 6 months * 30 days
                case 'yearly':
                    return 365; // 1 year
                default:
                    return 0; // Invalid duration
            }
        }

        // Convert duration to days
        $duration_in_days = convertDurationToDays($duration);

        // Save the package to the database
        create_package($pdo, $name, $description, $duration_in_days, $price, $gym_id);

        echo '<p>Package created successfully with duration: ' . $duration_in_days . ' days.</p>';
    }
    ?>
</body>
</html>
