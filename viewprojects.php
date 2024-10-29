<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Projects</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php">Return to home</a>
    <?php 
        // Check if web_dev_id is set
        if (isset($_GET['web_dev_id'])) {
            $web_dev_id = $_GET['web_dev_id'];
            $getAllInfoByWebDevID = getAllInfoByWebDevID($pdo ,$web_dev_id); 
        } else {
            die("Error: Web Developer ID not provided.");
        }
    ?>
    <h1>Username: <?php echo htmlspecialchars($getAllInfoByWebDevID['username']); ?></h1>
    <h1>Add New Project</h1>
    <form action="core/handleForms.php?web_dev_id=<?php echo $web_dev_id; ?>" method="POST">
        <p>
            <label for="projectName">Project Name</label> 
            <input type="text" name="projectName" required>
        </p>
        <p>
            <label for="technologiesUsed">Technologies Used</label> 
            <input type="text" name="technologiesUsed" required>
            <input type="submit" name="insertNewProjectBtn">
        </p>
    </form>

    <table style="width:100%; margin-top: 50px;">
      <tr>
        <th>Project ID</th>
        <th>Project Name</th>
        <th>Technologies Used</th>
        <th>Project Owner</th>
        <th>Date Added</th>
        <th>Action</th>
      </tr>
      <?php $getProjectsByWebDev = getProjectsByWebDev($pdo, $web_dev_id); ?>
      <?php foreach ($getProjectsByWebDev as $row) { ?>
      <tr>
        <td><?php echo htmlspecialchars($row['project_id']); ?></td>      
        <td><?php echo htmlspecialchars($row['project_name']); ?></td>      
        <td><?php echo htmlspecialchars($row['technologies_used']); ?></td>      
        <td><?php echo htmlspecialchars($row['project_owner']); ?></td> <!-- Assuming you want to display the web_dev_id here -->
        <td><?php echo htmlspecialchars($row['date_added']); ?></td>
        <td>
            <a href="editproject.php?project_id=<?php echo $row['project_id']; ?>&web_dev_id=<?php echo $web_dev_id; ?>">Edit</a>
            <a href="deleteproject.php?project_id=<?php echo $row['project_id']; ?>&web_dev_id=<?php echo $web_dev_id; ?>">Delete</a>
        </td>      
      </tr>
    <?php } ?>
    </table>
</body>
</html>