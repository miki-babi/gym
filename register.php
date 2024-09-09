
<?php
// include 'functions.php';
include 'db.php';
include 'functions.php';



$packages=get_packages($pdo,1);




// echo'<pre>';
// print_r($_POST);
// echo'</pre>';
if($_POST){

$name = $_POST['name'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$package = $_POST['packages'];
$rawduration = $_POST['duration'] ;
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

$duration = convertDurationToDays($rawduration);


echo '<pre>';
print_r($name);
echo '</pre>';
register($pdo, $name, $phone, $age, $package, $gym_id, $duration);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <style>
        input{
            display: block;
        }
    </style>
</head>
<body>
<h2><a href="http://localhost/gym/">home</a></h2>
    
<form action="" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone">
    <label for="age">Age</label>
    <input type="number" name="age" id="age">
    <label for="packages">Package</label>
    <select name="packages" id="packages">
         <!-- <option value="0" selected disabled>Select package</option> -->
        <?php foreach( $packages as $pack): ?>
         <option value="<?php echo htmlspecialchars($pack['name']); ?>" ><?php echo htmlspecialchars($pack['name']); ?></option>
        <?php endforeach; ?>
        

    </select>
    <label for="duration">Duration</label>
    <select name="duration" id="duration">
        <option value="0" selected disabled>Select duration</option>
        <option value="monthly">monthly</option>
        <option value="quarterly">quarterly</option>
        <option value="half-yearly">half-yearly</option>
        <option value="yearly">yearly</option>
    </select>
    <input type="text" name="gym_id" value="1" style = "display: none;">
    <input type="submit" value="Submit">
</form>


</body>
</html>



