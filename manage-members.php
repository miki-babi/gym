<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage-members</title>
</head>
<body>
    <h1>Manage Members</h1>
    <h2><a href="http://localhost/gym/">home</a></h2>

    <p>Welcome to the manage members page</p>
    <p><a href="http://localhost/gym/register.php">Register</a></p>
    <table>
        <thead>
            <tr>
            <th>id</th>
            <th>name</th>
            <th>phone</th>
            <th>age</th>
            <th>package</th>
            <th>renewal</th>
            <th>action</th></tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John</td>
                <td>1234567890</td>
                <td>25</td>
                <td>monthly</td>
                <td>2022-01-01</td>
                <td><a href="renewal.php">renewal</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jane</td>
                <td>0987654321</td>
                <td>30</td>
                <td>quarterly</td>
                <td>2022-01-01</td>
                <td><a href="renewal.php">renewal</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Bob</td>
                <td>9876543210</td>
                <td>35</td>
                <td>half-yearly</td>
                <td>2022-01-01</td>
                <td><a href="renewal.php">renewal</a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>