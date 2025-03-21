 
            <button  id="btn">View Profile</button>
          
 
            
          <button id="edit">Edit Profile</button>

        <div class="view" id="view-prof">
            <div class="view-profile">
   
            
            <h3  id="quit">❌</h3>

            <h4>Employee profile</h4>

              <?php
              
              $sql = "SELECT  firstname,lastname,gender FROM users WHERE userid = '$userid' ";

              $result = $conn->query($sql);

              if($result){


                  $row = $result->fetch_assoc();
                  echo '<p  class="info">  <strong>firstname </strong>  '.$row['firstname'].'</p>';
                  echo 'br';
                  echo '<p  class="info"><strong>lastname</strong>     '.$row['lastname'].'</p>';
                  echo 'br';
                  echo '<p  class="info"> <strong>Gender</strong>    '.$row['gender'].'</p>';
              
        
              }
              
              
              ?>