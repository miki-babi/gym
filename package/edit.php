<?php
echo'<pre>';
print_r($_POST);
echo'</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input{
            display: block;
        }
    </style>
</head>
<body>
    <h2><a href="http://localhost/gym/">home</a></h2>
    <h1>Edit Package</h1>

    <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone">
        <label for="age">Age</label>
        <input type="number" name="age" id="age">
        <label for="package">Package</label>
        <input type="text" name="package" id="package">
        <input type="submit" value="Submit">
    </form>
</body>
</html>