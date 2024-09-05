


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
    
<form action="members/register.php" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone">
    <label for="age">Age</label>
    <input type="number" name="age" id="age">
    <label for="packages">Package</label>
    <select name="packages" id="package">
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
