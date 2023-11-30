<?php
require('../model/database_oo.php');
require('../model/technician_db_oo.php');
require('../model/technician.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_technicians';
    }
}

if ($action == 'list_technicians') {
    $technicians = TechnicianDB::get_technicians();
    include('technician_list.php');
} else if ($action == 'delete_technician') {
    $techID = filter_input(INPUT_POST, 'techID', FILTER_VALIDATE_INT);
    if ($techID == NULL || $techID == FALSE) {
        $error = "Missing or incorrect technician id.";
        include('../errors/error.php');
    } else {
        TechnicianDB::delete_technician($techID);
        header("Location: .");
    }
} else if ($action == 'show_add_form') {
    include('technician_add.php');
} else if ($action == 'add_technician') {
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $password = filter_input(INPUT_POST, 'password');

    if ($first_name == NULL || $last_name == NULL || $email == NULL || $phone == NULL || $password == NULL) {
        $error = "Invalid technician data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        TechnicianDB::add_technician($first_name, $last_name, $email, $phone, $password);
        header("Location: .");
    }
}
?>
