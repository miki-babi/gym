<?php
// Include your database connection file
include 'db.php';

// Fetch all members from the database
$sql = "SELECT id, name, phone, age, package, created_at, duration FROM customers";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Members</title>
</head>
<body>
    <h1>Manage Members</h1>
    <h2><a href="http://localhost/gym/">Home</a></h2>

    <p>Welcome to the manage members page</p>
    <p><a href="http://localhost/gym/register.php">Register New Member</a></p>

    <table style="border: 1;" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Package</th>
                <!-- <th>Created At</th> -->
                <th>Days Left</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member): 
                // Calculate expiration date
                $created_at = new DateTime($member['created_at']);
                $duration_days = (int)$member['duration'];
                $expiration_date = clone $created_at;
                $expiration_date->modify("+{$duration_days} days");

                // Calculate days left
                $today = new DateTime();
                $interval = $today->diff($expiration_date);
                $days_left = $interval->format('%r%a'); // The '%r' is to show negative days if expired


                // Determine if the membership has expired
                $status = ($days_left <= 0) ? 'Expired' : "{$days_left} days left";
            ?>
            <tr>
                <td><?php echo htmlspecialchars($member['id']); ?></td>
                <td><?php echo htmlspecialchars($member['name']); ?></td>
                <td><?php echo htmlspecialchars($member['phone']); ?></td>
                <td><?php echo htmlspecialchars($member['age']); ?></td>
                <td><?php echo htmlspecialchars($member['package']); ?></td>

                <td><?php echo $status; ?></td>
                <td><a href="renewal.php?id=<?php echo $member['id']; ?>">Renewal</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
