<?php include '../view/header.php'; ?>

<main>
    <h1>Technician List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Password</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($technicians as $tech) : ?>
            <tr>
                <td><?php echo htmlspecialchars($tech['firstName'] . ' ' . $tech['lastName']); ?></td>
                <td><?php echo htmlspecialchars($tech['email']); ?></td>
                <td><?php echo htmlspecialchars($tech['phone']); ?></td>
                <td><?php echo htmlspecialchars($tech['password']); ?></td>

                <td>
                    <form action='index.php' method='post'>
                        <input type='hidden' name='action' value='delete_technician'>
                        <input type='hidden' name='techID' value='<?php echo $tech['techID']; ?>'>
                        <input type='submit' value='Delete'>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?action=show_add_form">Add Technician</a></p>
</main>

<?php include '../view/footer.php'; ?>
