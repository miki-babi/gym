<?php 

include '../db.php';
include '../functions.php';
echo'<pre>';
print_r($_POST);
echo'</pre>';

$name = $_POST['name'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$package = $_POST['packages'];
$gym_id = $_POST['gym_id'];

register($pdo, $name, $phone, $age, $package, $gym_id);

?>
