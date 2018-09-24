<?php

include 'header2.php';
include 'dbh.php';

/*if (isset($_SESSION['ID'])){
  echo "<form action='include/logout.inc.php'>
          <button>Log Out</button>
        </form>";
}*/
?>


<div class="container-fluid">
  <div class="content ">

    <div class="col-sm-9">
      <div class="well">
        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Paitent Details</h3>
        <h4><form method="GET"><button name="show" type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Test Registered Paitents</button></form></h4>
      </div>


        <div class="table-responsive">
          <?php

          if (isset($_POST['srchname'])){

            $searchq = $_POST['srchname'];
            $search = preg_replace("#[^a-z]#i","",$searchq);

            $sql = "SELECT fname, lname, admitDate, wardName, dischargeDate, reason, TIMESTAMPDIFF(YEAR,dob,CURDATE()) AS age FROM paitentdetails WHERE fname LIKE '%$searchq%' or lname LIKE '%$searchq%';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              echo "<table class='table table-striped'>
              <thead>
              <tr>
              <th class='text-center'>#</th>
              <th class='text-center'>Paitent Name</th>
              <th class='text-center'>Age</th>
              <th class='text-center'>Admitted Date</th>
              <th class='text-center'>Ward Name</th>
              <th class='text-center'>Discharge Date</th>
              <th class='text-center'>Reason</th>

              </thead>
              </tr>
              <tbody>";
              // output data of each row
              $x = 0;
              while($row = $result->fetch_assoc()) {
                $x += 1;

                echo "<tr>
                <td class='text-center'>".$x."</td>
                <td class='text-center'>".$row["fname"]." ".$row["lname"]."</td>
                <td class='text-center'>".$row["age"]."</td>
                <td class='text-center'>".$row["admitDate"]."</td>
                <td class='text-center'>".$row["wardName"]."</td>
                <td class='text-center'>".$row["dischargeDate"]."</td>
                <td class='text-center'>".$row["reason"]."</td>

                </tr>";
              }

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
            }
            else{
              echo "0 results found";
            }
            echo "<hr>";
          }
          else{
            $sql = "SELECT fname, lname, admitDate, wardName, dischargeDate, reason, TIMESTAMPDIFF(YEAR,dob,CURDATE()) AS age FROM paitentdetails;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                  echo "<table class='table table-striped'>
                  <thead>
                  <tr>
                  <th class='text-center'>#</th>
                  <th class='text-center'>Paitent Name</th>
                  <th class='text-center'>Age</th>
                  <th class='text-center'>Admitted Date</th>
                  <th class='text-center'>Ward Name</th>
                  <th class='text-center'>Discharge Date</th>
                  <th class='text-center'>Reason</th>

                  </thead>
                  </tr>
                  <tbody>";
                  // output data of each row
                  $x = 0;
                  while($row = $result->fetch_assoc()) {
                    $x += 1;

                    echo "<tr>
                    <td class='text-center'>".$x."</td>
                    <td class='text-center'>".$row["fname"]." ".$row["lname"]."</td>
                    <td class='text-center'>".$row["age"]."</td>
                    <td class='text-center'>".$row["admitDate"]."</td>
                    <td class='text-center'>".$row["wardName"]."</td>
                    <td class='text-center'>".$row["dischargeDate"]."</td>
                    <td class='text-center'>".$row["reason"]."</td>

                    </tr>";
                  }

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
              }
              else{
                echo "0 results found";
              }
              echo "<hr /><br /><br />";
            }
            if(isset($_GET['show'])){
              $sql = "SELECT * FROM testregister;";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                echo "<table class='table table-striped'>
                <thead>
                <tr>
                <th class='text-center'>#</th>
                <th class='text-center'>Paitent Name</th>
                <th class='text-center'>Test Name</th>
                <th class='text-center'>Result</th>

                </thead>
                </tr>
                <tbody>";
                // output data of each row
                $x = 0;
                while($row = $result->fetch_assoc()) {
                  $x += 1;

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
                  <td class='text-center'>".$x."</td>
                  <td class='text-center'>".$pname."</td>
                  <td class='text-center'>".$tname."</td>
                  <td class='text-center'>".$row["result"]."</td>

                  </tr>";
                }

                echo "<hr />";
                echo "</tbody>";
                echo "</table>";
              }else{
                echo "0 results";
              }
              echo "<hr>";
            }

            ?>

        </div>
    </div>
  </div>
</div>

<br />

</body>
</html>
