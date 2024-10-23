<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Activity</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome to Designers/Clothing Artist Management System.</h1>

    <!-- Form for adding a new designer -->
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="firstName">First Name: </label>
            <input type="text" name="firstName" required>
        </p>
        <p>
            <label for="lastName">Last Name: </label>
            <input type="text" name="lastName" required>
        </p>
        <p>
            <label for="d_address">Address: </label>
            <input type="text" name="d_address" required>
        </p>
        <p>
            <label for="age">Age: </label>
            <input type="number" name="age" min="1" required>
        </p>
        <p>
            <label for="specialization">Choose a designer specialization:</label>
            <select id="specialization" name="specialization">
                <option value="Streetwear Designer">Streetwear Designer</option>
                <option value="Sustainable Fashion Designer">Sustainable Fashion Designer</option>
                <option value="Luxury Fashion Designer">Luxury Fashion Designer</option>
                <option value="Athleisure Designer">Athleisure Designer</option>
                <option value="Denimwear Designer">Denimwear Designer</option>
            </select>
        </p>
        <p>
            <label for="e_address">Email Address: </label>
            <input type="text" name="e_address" required>
        </p>
        <p><input type="submit" name="insertDesignerBtn" value="Add Designer"></p>
    </form>

    <!-- Displaying designer information in a table -->
    <?php $getAllDesigners = getAllDesigners($pdo); ?>
    <table class="designer-table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Age</th>
                <th>Specialization</th>
                <th>Email Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($getAllDesigners as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['firstName']); ?></td>
                    <td><?php echo htmlspecialchars($row['lastName']); ?></td>
                    <td><?php echo htmlspecialchars($row['d_address']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                    <td><?php echo htmlspecialchars($row['specialization']); ?></td>
                    <td><?php echo htmlspecialchars($row['e_address']); ?></td>
                    <td>
                    <div>
                        <a href="viewdesigns.php?designerID=<?php echo $row['designerID']; ?>">View Designs</a>
                    </div>
                    <div>
                        <a href="editdesigners.php?designerID=<?php echo $row['designerID']; ?>">Edit Designer</a>
                    </div>
                    <div>
                        <a href="deletedesigners.php?designerID=<?php echo $row['designerID']; ?>">Delete Designer</a>
                    </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>