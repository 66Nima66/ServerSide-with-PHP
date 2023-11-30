<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../model/database.php');
require('../model/customer_db.php');
require('../model/registrations_db.php');
require('../model/incident_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'get_customer';
}

if ($action == 'get_customer') {
    include('get_customer.php');
} else if ($action == 'verify_email') {
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    if($email) {
        $customer = search_by_email($email);
        if ($customer) {
            $registered_products = get_registered_products($customer['customerID']);
            include("create_incident.php");
        } else {
            // handle the case when customer is not found
            // You can redirect the user back to the form or display an error message
            echo "Customer not found with this email.";
        }
    } else {
        // handle the case when the email is not provided
        // You can redirect the user back to the form or display an error message
        echo "Email is required.";
    }
} else if ($action == 'create_incident') {
    $customerID = $_POST['customerID'];
    $product_code = isset($_POST['productCode']) ? $_POST['productCode'] : null;
    $title = $_POST['title'];
    $description = $_POST['description'];
    add_incident($customerID, $product_code, $title, $description);
    include("incident_confirmation.php");
}
?>
