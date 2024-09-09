<?php

function register($pdo, $name, $phone, $age, $package, $gym_id, $duration) {
    $sql = "INSERT INTO customers (name, phone, age, package, gym_id, duration) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $phone, $age, $package, $gym_id, $duration]);
}



function create_package($pdo, $name, $description, $duration_in_days, $price, $gym_id)
{
    // Check if the package already exists
    $stmt = $pdo->prepare("SELECT * FROM Packages WHERE name = :name AND gym_id = :gym_id");
    $stmt->execute(['name' => $name, 'gym_id' => $gym_id]);
    $existing_package = $stmt->fetch();

    if ($existing_package) {
        echo "Error: A package with this name already exists for this gym.";
    } else {
        // If the package does not exist, insert the new package
        $stmt = $pdo->prepare("INSERT INTO Packages (name, description, duration_in_days, price, gym_id) VALUES (:name, :description, :duration_in_days, :price, :gym_id)");
        $stmt->execute([
            'name' => $name,
            'description' => $description,
            'duration_in_days' => $duration_in_days,
            'price' => $price,
            'gym_id' => $gym_id
        ]);
        echo "Package created successfully";
    }
}

function get_packages($pdo, $gym_id)
{
    $stmt = $pdo->prepare("SELECT *  FROM Packages WHERE gym_id = :gym_id");
    $stmt->execute(['gym_id' => $gym_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// function get_packages($pdo, $gym_id)
// {
//     $stmt = $pdo->query("SELECT * FROM Packages WHERE gym_id = :gym_id");

//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }



?>
