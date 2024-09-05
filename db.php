

<?php

$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "gymdb"; // Your database name

// Create connection
try{
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


//  // SQL to create tables
// $sql = "
// CREATE TABLE IF NOT EXISTS Gyms (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     address VARCHAR(255),
//     phone_number VARCHAR(50),
//     total_lockers INT NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );

// CREATE TABLE IF NOT EXISTS Customers (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     gym_id INT NOT NULL,
//     name VARCHAR(255) NOT NULL,
//     phone VARCHAR(50),

//        age INT,
//        package VARCHAR(255),

//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     FOREIGN KEY (gym_id) REFERENCES Gyms(id) ON DELETE CASCADE
// );

// CREATE TABLE IF NOT EXISTS Packages (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     gym_id INT NOT NULL,
//     name VARCHAR(255) NOT NULL,
//     description TEXT,
//     price DECIMAL(10, 2) NOT NULL,
//     duration_in_days INT NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     FOREIGN KEY (gym_id) REFERENCES Gyms(id) ON DELETE CASCADE
// );

// CREATE TABLE IF NOT EXISTS UserPackages (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     gym_id INT NOT NULL,
//     customer_id INT NOT NULL,
//     package_id INT NOT NULL,
//     purchase_date DATE NOT NULL,
//     start_date DATE NOT NULL,
//     end_date DATE NOT NULL,
//     is_active BOOLEAN DEFAULT TRUE,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     FOREIGN KEY (gym_id) REFERENCES Gyms(id) ON DELETE CASCADE,
//     FOREIGN KEY (customer_id) REFERENCES Customers(id) ON DELETE CASCADE,
//     FOREIGN KEY (package_id) REFERENCES Packages(id) ON DELETE CASCADE
// );

// CREATE TABLE IF NOT EXISTS Renewals (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     user_package_id INT NOT NULL,
//     previous_end_date DATE NOT NULL,
//     new_end_date DATE NOT NULL,
//     renewal_date DATE NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     FOREIGN KEY (user_package_id) REFERENCES UserPackages(id) ON DELETE CASCADE
// );

// CREATE TABLE IF NOT EXISTS Lockers (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     gym_id INT NOT NULL,
//     locker_number VARCHAR(50) NOT NULL,
//     is_occupied BOOLEAN DEFAULT FALSE,
//     assigned_to INT,
//     assigned_date DATE,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     FOREIGN KEY (gym_id) REFERENCES Gyms(id) ON DELETE CASCADE,
//     FOREIGN KEY (assigned_to) REFERENCES Customers(id) ON DELETE SET NULL
// );

// CREATE TABLE IF NOT EXISTS Sales (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     gym_id INT NOT NULL,
//     customer_id INT NOT NULL,
//     package_id INT NOT NULL,
//     sale_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     amount DECIMAL(10, 2) NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     FOREIGN KEY (gym_id) REFERENCES Gyms(id) ON DELETE CASCADE,
//     FOREIGN KEY (customer_id) REFERENCES Customers(id) ON DELETE CASCADE,
//     FOREIGN KEY (package_id) REFERENCES Packages(id) ON DELETE CASCADE
// );
// ";

// // Execute SQL
// if ($conn->multi_query($sql) === TRUE) {
//     echo "Tables created successfully";
// } else {
//     echo "Error creating tables: " . $conn->error;
// }

// Close connection
// $conn->close();




?>
