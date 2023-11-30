<?php
require("database.php");

function add_incident($customerID, $product_code, $title, $description) {
    global $db;
    $date = date('Y-m-d');
    $query = "INSERT INTO incidents (customerID, productCode, dateOpened, title, description) 
              VALUES (:customerID, :product_code, :date, :title, :description)";
    $statement = $db->prepare($query);
    $statement->bindParam(':customerID', $customerID, PDO::PARAM_INT);
    $statement->bindParam(':product_code', $product_code, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->execute();
}
?>
