<?php

function register($pdo, $name, $phone, $age, $package, $gym_id){
    $stmt = $pdo->prepare("INSERT INTO Customers (name, phone, age, package, gym_id) VALUES (:name, :phone, :age, :package, :gym_id)");
    $stmt->execute(['name' => $name, 'phone' => $phone, 'age' => $age, 'package' => $package, 'gym_id' => $gym_id]);
    echo "Member registered successfully";
}


function create_package($pdo, $name, $description, $duration_in_days, $price, $gym_id)
{
    $stmt = $pdo->prepare("INSERT INTO Packages (name, description, duration_in_days, price, gym_id) VALUES (:name, :description, :duration_in_days, :price, :gym_id)");
    $stmt->execute(['name' => $name, 'description' => $description, 'duration_in_days' => $duration_in_days, 'price' => $price, 'gym_id' => $gym_id]);
    echo "Package created successfully";
}


?>
