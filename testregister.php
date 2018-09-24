<?php

include 'header.php';

/*if (isset($_SESSION['ID'])){
  echo "<form action='include/logout.inc.php'>
          <button>Log Out</button>
        </form>";
}*/
include 'dbh.php';

if(isset($_POST['submit'])){
  $pID = $_POST['pID'];
  $testID = $_POST['testID'];
  $result = $_POST['result'];


  $sql = "INSERT INTO testregister (pID, testID, result)
  VALUES ('$pID', '$testID', '$result');";



  if (mysqli_query($conn, $sql)) {
      echo "New records created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  header("Location:testregister.php");
}


?>


<div class="container-fluid">
  <div class="content ">

    <div class="col-sm-9">
      <div class="well">
        <h3><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Test Register</h3>
        <h4><form method="GET"><button name="show" type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Registered List</button></form></h4>
      </div>


      <div class="table-responsive" id="viewDiv" style = 'display: block;'>
        <?php

        if(isset($_GET['show'])){
          $sql = "SELECT * FROM testregister;";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            echo "<table class='table table-striped table-custom'>
            <thead>
            <tr>
            <th class='text-center'>Paitent Name</th>
            <th class='text-center'>Test Name</th>
            <th class='text-center'>Result</th>
            <th class='text-center'> </th>
            </thead>
            </tr>
            <tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $id = $row["pID"];

              $paID = $row["pID"];
              $q = "SELECT * FROM paitent WHERE pID = '$paID';";
              $result1 = $conn->query($q);
              $pname = "";
              while($rowq = mysqli_fetch_array($result1)) {
                $pname .= "$rowq[2] $rowq[3]";
              }
              $testid = $row["testID"];
              $q2 = "SELECT * FROM test WHERE testID = '$testid';";
              $result2 = $conn->query($q2);
              $tname = "";
              while($rowq = mysqli_fetch_array($result2)) {
                $tname .= "$rowq[1]";
              }

              echo "<tr>
              <td class='text-center'>".$pname."</td>
              <td class='text-center'>".$tname."</td>
              <td class='text-center'>".$row["result"]."</td>
              <td class='text-center'><a href ='include/del.inc.php?pID=$paID&amp;testID=$testid' ><span class='glyphicon glyphicon-remove' aria-hidden='true'></a></td>

              </tr>";
            }

            echo "<button type='submit' class='btn btn-default' onclick='myFunction()'><span class='glyphicon glyphicon-menu-up' aria-hidden='true'></span></button>";
            echo "<hr />";
            echo "</tbody>";
            echo "</table>";
          }else{
            echo "0 results";
          }
          echo "<hr><hr>";
        }

        ?>

        </div>





      <form method="POST">
        <div class="form-group">
          <?php
          $optionq = "SELECT * FROM paitent;";
          $resultq = $conn->query($optionq);
          ?>

          <label>Paitent Name</label>
          <select name="pID" class="form-control">
            <?php while($rowq = mysqli_fetch_array($resultq)):; ?>
              <option value="<?php echo $rowq[0] ?>"><?php echo $rowq[0].": ".$rowq[2]." ".$rowq[3]; ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <?php
          $optionq = "SELECT * FROM test;";
          $resultq = $conn->query($optionq);
          ?>

          <label>Test Name</label>
          <select name="testID" class="form-control">
            <?php while($rowq = mysqli_fetch_array($resultq)):; ?>
              <option value="<?php echo $rowq[0] ?>"><?php echo $rowq[1]; ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <label>Result</label>
          <textarea name="result" class="form-control" rows="3" placeholder="Results of the Test (Required)" ></textarea>
        </div>

        <button name="submit" type="submit" class="btn btn-default">Submit</button>

      </form>

    </div>


  </div>
</div>

<br /><br />

<script>
function myFunction() {
    var x = document.getElementById('viewDiv');
    if (x.style.display == 'block') {
        x.style.display = 'none';
    } else {
        x.style.display = 'block';
    }
}
</script>

</body>
</html>
