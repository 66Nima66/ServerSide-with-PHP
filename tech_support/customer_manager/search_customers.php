<?php include '../view/header.php'; ?>
<head>
    <link rel="stylesheet" type="text/css" href="../main.css" />
</head>

<div id="wrapper">
    <main>
        <h1>Search Customers</h1>
        <br/>
        <form action="." method="post">
            <input type="hidden" name="action" value="run_search" />
            <label>Last Name:</label>
            <input type="text" name="last_name" required/>
            <input type="submit" value="Search" />
        </form>
        <br/>
    </main>
</div>

<?php include '../view/footer.php'; ?>
