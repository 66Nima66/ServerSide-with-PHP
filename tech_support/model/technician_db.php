<?php
function get_technician($techID) {
    global $db;
    $query = 'SELECT * FROM technicians
              WHERE techID = :techID';
    $statement = $db->prepare($query);
    $statement->bindValue(':techID', $techID);
    $statement->execute();
    $technician = $statement->fetch();
    $statement->closeCursor();
    return $technician;
}

function get_technicians() {
    global $db;
    $query = 'SELECT * FROM technicians
              ORDER BY techID';
    $statement = $db->prepare($query);
    $statement->execute();
    $technicians = $statement->fetchAll();
    $statement->closeCursor();
    return $technicians;
}


function add_technician($first_name, $last_name, $email, $phone, $password) {
    global $db;
    $query = 'INSERT INTO technicians
                 (firstName, lastName, email, phone, password)
              VALUES
                 (:first_name, :last_name, :email, :phone, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}


function delete_technician($techID) {
    global $db;
    $query = 'DELETE FROM technicians
              WHERE techID = :techID';
    $statement = $db->prepare($query);
    $statement->bindValue(':techID', $techID);
    $statement->execute();
    $statement->closeCursor();
}

function update_technician($techID, $first_name, $last_name, $email, $phone, $password) {
   global $db;
   $query = 'UPDATE technicians
             SET firstName = :first_name,
                 lastName = :last_name,
                 email = :email,
                 phone = :phone,
                 password = :password
             WHERE techID = :techID';
   $statement = $db->prepare($query);
   $statement->bindValue(':tecshID', $techID);
   $statement->bindValue(':first_name', $first_name);
   $statement->bindValue(':last_name', $last_name);
   $statement->bindValue(':email', $email);
   $statement->bindValue(':phone', $phone);
   $statement->bindValue(':password', $password);
   $statement->execute();
   $statement->closeCursor();
}


?>
