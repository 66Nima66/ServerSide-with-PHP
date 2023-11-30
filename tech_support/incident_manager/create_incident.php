<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="path_to_your_css_file.css">
</head>
<body>
    <?php include('../view/header.php'); ?>

    <div id='main' class="main">
        <h3>Create Incident</h3>
        <form action='.' method='post' class="form">
            <div id='aligned' class="aligned">
                <label>Customer:</label>
                <p><?php echo $customer['firstName']. ' ' . $customer['lastName']; ?></p>
                <br />
                <label>Product:</label>
                <select name='productCode'>
                    <?php foreach($registered_products as $product) : ?>
                        <option value='<?php echo $product['productCode']; ?>'>
                            <?php echo $product['productCode']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br />
                <label>Title:</label>
                <input type='text' name='title' />
                <br />
                <label>Description:</label>
                <input type='text' name='description'  />
                <br />
                <input type='hidden' name='customerID' value='<?php echo $customer['customerID'];?>' />
                <input type='hidden' name='action' value='create_incident' />
                <input type='submit' value='Create Incident' />
            </div>
        </form>
    </div>

    <?php include('../view/footer.php'); ?>

</body>
</html>
