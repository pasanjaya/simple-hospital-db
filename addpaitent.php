<?php

include 'header.php';
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
        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Add Paitents</h3>
        <h4><form method="GET"><button name="show" type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Paitent List</button></form></h4>
      </div>


        <div class="table-responsive" id="viewDiv" style = 'display: block;'>
          <?php
          if (isset($_POST['srchname'])){

            $searchq = $_POST['srchname'];
            $search = preg_replace("#[^a-z]#i","",$searchq);

            $sql = "SELECT * FROM paitent WHERE fname LIKE '%$searchq%' or lname LIKE '%$searchq%';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table table-striped table-custom'>
                <thead>
                <tr>
                <th class='text-center'>#</th>
                <th class='text-center'>NIC</th>
                <th class='text-center'>Name</th>
                <th class='text-center'>Gender</th>
                <th class='text-center'>Date of Birth</th>
                <th class='text-center'>Address</th>
                <th class='text-center'>Contact No</th>
                <th class='text-center'>Ref. By</th>
                <th class='text-center'> </th>
                <th class='text-center'> </th>
                </thead>
                </tr>
                <tbody>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  $id = $row["pID"];

                  $phyid = $row["refID"];
                  $nameq = "SELECT * from physician WHERE phyID = '$phyid';";
                  $result1 = $conn->query($nameq);
                  $refname = "";
                  while($rowq = mysqli_fetch_array($result1)) {
                    $refname = $refname."Dr. $rowq[2] $rowq[3]";
                  }

                  echo "<tr>
                  <td class='text-center'>".$row["pID"]."</td>
                  <td class='text-center'>".$row["nic"]."</td>
                  <td class='text-center'>".$row["fname"]." ".$row["lname"]."</td>
                  <td class='text-center'>".$row["gender"]."</td>
                  <td class='text-center'>".$row["dob"]."</td>
                  <td class='text-center'>".$row["address"]."</td>
                  <td class='text-center'>".$row["contactNO"]."</td>
                  <td class='text-center'>".$refname."</td>
                  <td class='text-center'><a href ='paitentupdate.php?pID=$id'><span class='glyphicon glyphicon-edit glyphicon-remove' aria-hidden='true'></a></td>
                  <td class='text-center'><a href ='include/del.inc.php?pID=$id' ><span class='glyphicon glyphicon-remove' aria-hidden='true'></a></td>

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
            $sql = "SELECT * FROM paitent;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              echo "<table class='table table-striped table-custom'>
              <thead>
              <tr>
              <th class='text-center'>#</th>
              <th class='text-center'>NIC</th>
              <th class='text-center'>Name</th>
              <th class='text-center'>Gender</th>
              <th class='text-center'>Date of Birth</th>
              <th class='text-center'>Address</th>
              <th class='text-center'>Contact No</th>
              <th class='text-center'>Ref. By</th>
              <th class='text-center'> </th>
              <th class='text-center'> </th>
              </thead>
              </tr>
              <tbody>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $id = $row["pID"];

                $phyid = $row["refID"];
                $nameq = "SELECT * from physician WHERE phyID = '$phyid';";
                $result1 = $conn->query($nameq);
                $refname = "";
                while($rowq = mysqli_fetch_array($result1)) {
                  $refname = $refname."Dr. $rowq[2] $rowq[3]";
                }

                echo "<tr>
                <td class='text-center'>".$row["pID"]."</td>
                <td class='text-center'>".$row["nic"]."</td>
                <td class='text-center'>".$row["fname"]." ".$row["lname"]."</td>
                <td class='text-center'>".$row["gender"]."</td>
                <td class='text-center'>".$row["dob"]."</td>
                <td class='text-center'>".$row["address"]."</td>
                <td class='text-center'>".$row["contactNO"]."</td>
                <td class='text-center'>".$refname."</td>
                <td class='text-center'><a href ='paitentupdate.php?pID=$id'><span class='glyphicon glyphicon-edit glyphicon-remove' aria-hidden='true'></a></td>
                <td class='text-center'><a href ='include/del.inc.php?pID=$id' ><span class='glyphicon glyphicon-remove' aria-hidden='true'></a></td>

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




      <form action="include/addpaitent.inc.php" method="POST">
        <div class="form-group">
          <label>ID</label>
          <input type="number" name="pID" class="form-control"  placeholder="ID">
        </div>
        <div class="form-group">
          <label>NIC</label>
          <input type="text" name="nic" class="form-control"  placeholder="NIC Number">
        </div>
        <div class="form-group">
          <label>First Name</label>
          <input type="text" name="fname" class="form-control"  placeholder="First Name">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="lname" class="form-control"  placeholder="Last Name">
        </div>
        <div class="form-group">
          <label>Gender </label>
            <div class="radio">
              <label class="radio-inline">
                <input type="radio" name="gender" value="Male" checked>Male</label>
              <label class="radio-inline">
                <input type="radio" name="gender" value="Female">Female</label>
            </div>
        </div>
        <div class="form-group">
          <label>Date of Birth</label>
          <input type="date" name="dob" class="form-control" >
        </div>
        <div class="form-group">
          <label>Address</label>
          <input type="text" name="address" class="form-control"  placeholder="Address">
        </div>
        <div class="form-group">
          <label>Contact Number</label>
          <input type="number" name="contactNO" class="form-control"  placeholder="Contact Number">
        </div>

        <div class="form-group">
          <?php
          $optionq = "SELECT * FROM physician;";
          $resultq = $conn->query($optionq);
          ?>

          <label>Ref. By</label>
          <select name="refID" class="form-control">
            <?php while($rowq = mysqli_fetch_array($resultq)):; ?>
              <option value="<?php echo $rowq[0] ?>"><?php echo "Dr. ".$rowq[2]." ".$rowq[3]; ?></option>
            <?php endwhile; ?>
          </select>
        </div>

        <hr />
        <br />
        <button type="submit" class="btn btn-default">Submit</button>

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
