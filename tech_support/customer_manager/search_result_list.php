<?php include '../view/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <title>Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<div class = "wrapper" >
    <form action = "index.php" method = "post" id = "aligned" onsubmit = "verify()" />
    <input type = "hidden" name = "action" value = "run_search" />

    <label>Last Name:</label>
    <input type = "text" name = "last_name" required />
    <input type = "submit" value = "Search"/>
    <br/>
    </form>

    <h1>Results</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>City</th>
            <th></th>
        </tr>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo htmlspecialchars($customer['firstName']) . " " . htmlspecialchars($customer['lastName']); ?></td>
                <td><?php echo htmlspecialchars($customer['email']); ?></td>
                <td><?php echo htmlspecialchars($customer['city']); ?></td>
                <td><form action="." method="post">
                        <input type="hidden" name="action" value = "select_customer">
                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>">
                        <input type="submit" value="Select">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php include '../view/footer.php'; ?>