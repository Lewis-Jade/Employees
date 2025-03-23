<?php
 session_start();
require_once('dbh.inc.php');
$sql = "SELECT id FROM emps"; 
$result = $conn->query($sql);

$employee_ids = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $employee_ids[] = $row['id'];
    }
} else {
    echo "No employee data found.";
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request</title>
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    *{
        padding:0;
        margin:0;
        font-family: "Poppins", sans-serif;

    }
        body {
            font-family: Arial, sans-serif;
            background-color: :rgb(139, 140, 141); /* Light blue background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
         p{
            color: #003366
         }
        h2 {
            color: #003366; /* Dark blue */
            margin-bottom: 20px;
        }

        form {
            background-color:rgb(182, 171, 171); /* White background for the form */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            box-sizing: border-box;
        }

        label {
            font-size: 16px;
            color: #003366; /* Dark blue for text */
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"],
        select,
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px 0;
            border: 2px solid #0066cc; /* Blue border */
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        select:focus,
        input[type="date"]:focus {
            border-color: #005bb5; /* Darker blue on focus */
            outline: none;
        }

        input[type="submit"] {
            background-color: #0066cc; /* Blue background for submit */
            color: white;
            font-size: 16px;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #005bb5; /* Darker blue on hover */
        }
        a{
    position:absolute;
    top:80px;
    left:20px;
    text-decoration:none;
    color:blue;
}
    </style>
</head>
<body>
    <div>
        <h2>Request Leave</h2>
        <form action="submit_leave.php" method="POST">
        <select name="leave_type" id="">
                <option>Leave Type</option>

                <?php
                
                $leave_type = ['Sick','Vacation','Personal'];



                foreach($leave_type as $option){
                      echo '<option>'.$option.'</option>';

                }
                
                
                
                ?>
                

             </select>
        <label for="employee_id">Employee ID:</label>
            <select name="employee_id" required>
                <option value="">Select Employee ID</option>
                <?php
                // Generate dropdown options for Employee ID
                foreach ($employee_ids as $employee_id) {
                    echo "<option value=\"$employee_id\">$employee_id</option>";
                }
                ?><br><br>

             
            
            
            <br><br>

            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" required><br><br>

            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" required><br><br>

            <input type="submit" value="Apply">

            <?php
            
            if(isset(  $_SESSION['message'])){

                echo '<p>'.  $_SESSION['message'].'</p>';
                unset(  $_SESSION['message']);
            }
            
            
            ?>
        </form>
    </div>
    <a href="dashboard.php">back</a>
    
</body>
</html>

