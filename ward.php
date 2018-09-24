<?php

include 'header.php';

/*if (isset($_SESSION['ID'])){
  echo "<form action='include/logout.inc.php'>
          <button>Log Out</button>
        </form>";
}*/
include 'dbh.php';

if(isset($_POST['submit'])){
  $wardName = $_POST['wardName'];
  $NoOfPaitents = $_POST['NoOfPaitents'];


  $sql = "INSERT INTO ward (wardName, NoOfPaitents)
  VALUES ('$wardName', '$NoOfPaitents');";



  if (mysqli_query($conn, $sql)) {
      echo "New records created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

header("Location:ward.php");
}


?>


<div class="container-fluid">
  <div class="content ">

    <div class="col-sm-9">
      <div class="well">
        <h3><span class="glyphicon glyphicon-bed" aria-hidden="true"></span> Add Wards</h3>
        <h4><form method="GET"><button name="show" type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Ward List</button></form></h4>
      </div>


      <div class="table-responsive" id="viewDiv" style = 'display: block;'>
        <?php
        if (isset($_POST['srchname'])){

          $searchq = $_POST['srchname'];
          $search = preg_replace("#[^a-z]#i","",$searchq);

          $sql = "SELECT * FROM ward WHERE wardName LIKE '%$searchq%';";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              echo "<table class='table table-striped table-custom'>
              <thead>
              <tr>
              <th class='text-center'>#</th>
              <th class='text-center'>Ward Name</th>
              <th class='text-center'>No of Paitent</th>
              <th class='text-center'> </th>
              <th class='text-center'> </th>
              </thead>
              </tr>
              <tbody>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $id = $row["wardNO"];

                echo "<tr>
                <td class='text-center'>".$row["wardNO"]."</td>
                <td class='text-center'>".$row["wardName"]."</td>
                <td class='text-center'>".$row["NoOfPaitents"]."</td>
                <td class='text-center'><a href ='wardupdate.php?wardNO=$id'><span class='glyphicon glyphicon-edit glyphicon-remove' aria-hidden='true'></a></td>
                <td class='text-center'><a href ='include/del.inc.php?wardNO=$id' ><span class='glyphicon glyphicon-remove' aria-hidden='true'></a></td>

                </tr>";
              }

              echo "<button type='submit' class='btn btn-default' onclick='myFunction()'><span class='glyphicon glyphicon-menu-up' aria-hidden='true'></span></button>";
              echo "<div class='col-lg-4 pull-right'>
                      <form method='POST'>
                        <div class='input-group'>
                          <input type='text' name='srchname' class='form-control' placeholder='Search by names'>
                          <span class='input-group-btn'>
                            <button class='btn btn-default' type='submit'><span class='glyphicon glyphicon-search' aria-hidden='true'></button>
                          </span>
                        </div>
                      </form>
                    </div>";
              echo "<hr />";
              echo "</tbody>";
              echo "</table>";
          } else {
              echo "0 results found";
          }
          echo "<hr><hr>";

        }

        elseif(isset($_GET['show'])){
          $sql = "SELECT * FROM ward;";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            echo "<table class='table table-striped table-custom'>
            <thead>
            <tr>
            <th class='text-center'>#</th>
            <th class='text-center'>Ward Name</th>
            <th class='text-center'>No of Paitent</th>
            <th class='text-center'> </th>
            <th class='text-center'> </th>
            </thead>
            </tr>
            <tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $id = $row["wardNO"];

              echo "<tr>
              <td class='text-center'>".$row["wardNO"]."</td>
              <td class='text-center'>".$row["wardName"]."</td>
              <td class='text-center'>".$row["NoOfPaitents"]."</td>
              <td class='text-center'><a href ='wardupdate.php?wardNO=$id'><span class='glyphicon glyphicon-edit glyphicon-remove' aria-hidden='true'></a></td>
              <td class='text-center'><a href ='include/del.inc.php?wardNO=$id' ><span class='glyphicon glyphicon-remove' aria-hidden='true'></a></td>

              </tr>";
            }

            echo "<button type='submit' class='btn btn-default' onclick='myFunction()'><span class='glyphicon glyphicon-menu-up' aria-hidden='true'></span></button>";
            echo "<div class='col-lg-4 pull-right'>
                    <form method='POST'>
                      <div class='input-group'>
                        <input type='text' name='srchname' class='form-control' placeholder='Search by names'>
                        <span class='input-group-btn'>
                          <button class='btn btn-default' type='submit'><span class='glyphicon glyphicon-search' aria-hidden='true'></button>
                        </span>
                      </div>
                    </form>
                  </div>";
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
          <label>Ward Name</label>
          <input type="text" name="wardName" class="form-control"  placeholder="Ward Name">
        </div>
        <div class="form-group">
          <label>No of Paitent</label>
          <input type="number" name="NoOfPaitents" class="form-control"  placeholder="Paitent count">
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
