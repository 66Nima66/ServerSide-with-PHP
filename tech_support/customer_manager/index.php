<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../model/database.php');
require('../model/customer_db.php');
require('../model/countries_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'search_customers';
    }
}

if ($action == 'search_customers') {
    include('../customer_manager/search_customers.php');
} else if ($action == 'run_search') {
    $last_name = filter_input(INPUT_POST, 'last_name');
    $customers = search_customers($last_name);
    include('../customer_manager/search_result_list.php');
} else if ($action == 'select_customer') {
    $email = filter_input(INPUT_POST, 'email');
    $customer = select_customer($email);
    $countries = get_countries(); // Fetch all countries
    include('../customer_manager/customer_select.php');
} else if ($action == 'update_customer') {
    // get all fields from the form and store in variables
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $postal_code = filter_input(INPUT_POST, 'postal_code');
    $country_code = filter_input(INPUT_POST, 'country_code');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    // validate fields make sure they are not empty
    if ($first_name == NULL || $last_name == NULL || $address == NULL || $city == NULL || $state == NULL || $postal_code == NULL || $country_code == NULL || $phone == NULL || $email == NULL || $password == NULL) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        // call update_customer function
        update_customer($first_name, $last_name, $address, $city, $state, $postal_code, $country_code, $phone, $email, $password);
        // redirect to search_customers.php
        include('../customer_manager/update_success.php');
    }
}
?>
