<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Dev Projects Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome To Game Developing Projects Management System. Created by Kurt Kenji</h1>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="username">Username</label> 
            <input type="text" name="username" required>
        </p>
        <p>
            <label for="firstName">First Name</label> 
            <input type="text" name="firstName" required>
        </p>
        <p>
            <label for="lastName">Last Name</label> 
            <input type="text" name="lastName" required>
        </p>
        <p>
            <label for="dateOfBirth">Date of Birth</label> 
            <input type="date" name="dateOfBirth" required>
        </p>
        <p>
            <label for="specialization">Specialization</label> 
            <input type="text" name="specialization" required>
            <input type="submit" name="insertWebDevBtn">
        </p>
    </form>

    <?php $getAllWebDevs = getAllWebDevs($pdo); ?>
    <?php foreach ($getAllWebDevs as $row) { ?>
    <div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
        <h3>Username: <?php echo htmlspecialchars($row['username']); ?></h3>
        <h3>First Name: <?php echo htmlspecialchars($row['first_name']); ?></h3>
        <h3>Last Name: <?php echo htmlspecialchars($row['last_name']); ?></h3>
        <h3>Date Of Birth: <?php echo htmlspecialchars($row['date_of_birth']); ?></h3>
        <h3>Specialization: <?php echo htmlspecialchars($row['specialization']); ?></h3>
        <h3>Date Added: <?php echo htmlspecialchars($row['date_added']); ?></h3>

        <div class="editAndDelete" style="float: right; margin-right: 20px;">
            <a href="viewprojects.php?web_dev_id=<?php echo $row['web_dev_id']; ?>">View Projects</a>
            <a href="editwebdev.php?web_dev_id=<?php echo $row['web_dev_id']; ?>">Edit</a>
            <a href="deletewebdev.php?web_dev_id=<?php echo $row['web_dev_id']; ?>">Delete</a>
        </div>
    </div> 
    <?php } ?>
</body>
</html>