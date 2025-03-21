<?php
// Assuming you have a database connection file `db.php`
require_once('dbh.inc.php');
session_start();
// Fetch employee data from the database
$query = "SELECT * FROM emps";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Styling for the Back Link */

    body{
        display:flex;
        justify-content:center;
        align-items:center;
        background-image:url(theone.jpg);
        background-size:cover;
        background-blend-mode:multiply;
        background-color: rgba(69, 69, 172, 0.23);
        color:#000;
        height:100vh;
    }
    .container{
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;

    }
    h2{
        color:white;
    }
    table{
        border:2px solid black;
        border-collapse:collapse;
        background:white;
    }
    th,td{
        border:2px solid black;
        padding:5px;
    }
    th{
        color:blue;
    }
    a{
        height:100%;
        width: 100%;
        background:blue;
        color:#fff;
        text-decoration:none;
        border-radius:5px;
        padding: 4px;
    }
</style>
<body>
    <div class="container">
        <header>
    <?php
     if(isset($_SESSION['status'])){
        echo "<p>".$_SESSION['status']."</p>";
        unset($_SESSION['status']);
     }
    
    ?>
            <h1>Employee Management</h1>
            
                <ul>
                    <li><a href="admin.php">Dashboard</a></li>
                    <li><a href="add_employee.php">Add New Employee</a></li>
                </ul>

        </header>
        
            <h2>Employee List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                   
                        <th>Role</th>
                        <th>Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($employee = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $employee['id']; ?></td>
                            <td><?php echo $employee['first_name']; ?></td>
                            <td><?php echo $employee['last_name']; ?></td>
                            <td><?php echo $employee['job_role']; ?></td>
                            <td><?php echo $employee['salary']; ?></td>
                            <td>
                            <a href="editemp.php?id=<?php echo $employee['id']; ?>">Edit</a> |
                                <a href="deleteemp.php?id=<?php echo $employee['id']; ?>" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
                            </td>
                    <?php endwhile; ?>
                </tbody>
            </table>

    </div>
</body>
</html>
