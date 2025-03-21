<?php
session_start();

// Check if the user is logged in
require_once('dbh.inc.php');

// Example: Fetching available training sessions from the database


// SQL query to fetch training sessions (assuming you have a table named 'training_sessions')
$sql = "SELECT * FROM training_sessions ORDER BY date ASC";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training</title>
</head>
<style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  *{
    padding:0;
    margin:0;
    font-family: "Poppins", sans-serif;

  }
        /* General Body Styling */
body {
 
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction:column;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
section{
    height:100%;
    width:100%;
     background-image:url(35976.jpg);
     background-size:cover;
     background-blend-mode:multiply;
     background-color: rgba(17, 172, 233, 0.16);
    display: flex;
    flex-direction:column;
    justify-content: center;
    align-items: center;
}
h2{
    position:absolute;
    top:10px;
    left:20px;
    color:#ffffff;
}
p{
    position:absolute;
    top:50px;
    left:20px;
    color:#ffffff;
}
h2,p{
    background:#000;
    border-radius:9px;
}
a{
    position:absolute;
    top:80px;
    left:20px;
    text-decoration:none;
    color:blue;
}
</style>
<body>
    

    <section>
    <div class="content">
        <h2>Training Sessions</h2>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Session Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['session_name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['duration']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No training sessions available at the moment.</p>
        <?php endif; ?>

    </div>
    </section>

    <a href="dashboard.php">back</a>

</body>
</html>