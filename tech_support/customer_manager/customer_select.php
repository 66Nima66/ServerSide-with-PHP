<?php include '../view/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <title>Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<main>
    <h1>View/Update Customer</h1>
    <br/>
    <form action="." method="post" id="aligned" onsubmit="return verify()">
        <input type="hidden" name="action" value="update_customer" />
        
        <label>First Name:</label>
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($customer['firstName']); ?>" required/>
        <br/>
        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($customer['lastName']); ?>" required/>
        <br/>
        <label>Address:</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($customer['address']); ?>" required/>
        <br/>
        <label>City:</label>
        <input type="text" name="city" value="<?php echo htmlspecialchars($customer['city']); ?>" required/>
        <br/>
        <label>State:</label>
        <input type="text" name="state" value="<?php echo htmlspecialchars($customer['state']); ?>" required/>
        <br/>
        <label>Postal Code:</label>
        <input type="text" name="postal_code" value="<?php echo htmlspecialchars($customer['postalCode']); ?>" required/>
        <br/>
        <label>Country</label>
        <select name="country_code">
            <?php foreach ($countries as $country): ?>
                <?php if ($country['countryCode'] === $customer['countryCode']): ?>
                    <option value="<?php echo $country['countryCode']; ?>" selected>
                        <?php echo $country['countryName']; ?>
                    </option>
                <?php else: ?>
                    <option value="<?php echo $country['countryCode']; ?>">
                        <?php echo $country['countryName']; ?>
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br/>
        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>" required/>
        <br/>
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>" readonly/>
        <br/>
        <label>Password:</label>
        <input type="text" name="password" value="<?php echo htmlspecialchars($customer['password']); ?>" required/>
        <br/>
        <input type="submit" value="Update Customer" />
        <br/>
    </form>
    <br/>
    <p>
        <a href="search_customers.php">Search Customers</a>
    </p>
</main>
<?php include '../view/footer.php'; ?>
