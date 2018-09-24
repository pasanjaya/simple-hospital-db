<?php

include 'header.php';
include 'dbh.php';

/*if (isset($_SESSION['ID'])){
  echo "<form action='include/logout.inc.php'>
          <button>Log Out</button>
        </form>";
}*/

if(isset($_POST['submit'])){
  $pID = $_POST['pID'];
  $Q = "SELECT pID FROM confirmedpaitent WHERE pID = '$pID';";
  $result = $conn->query($Q);

  if ($result->num_rows > 0) {
    echo "The paitent is already in a ward.";

  }
  else{
    $pID = $_POST['pID'];
    $consultID = $_POST['consultID'];
    $addmissionNO = $_POST['addmissionNO'];
    $admitDate = $_POST['admitDate'];
    $relationName = $_POST['relationName'];
    $relationcontactNO = $_POST['relationcontactNO'];
    $dischargeDate = $_POST['dischargeDate'];
    $reason = $_POST['reason'];
    $wardNO = $_POST['wardNO'];


    $sql = "INSERT INTO addmission (addmissionNO, admitDate, relationName, relationcontactNO, dischargeDate, reason, wardNO)
    VALUES ('$addmissionNO', '$admitDate', '$relationName', '$relationcontactNO', '$dischargeDate', '$reason','$wardNO');";
    $sql .= "INSERT INTO confirmedpaitent (confirmedBY, pID, addmissionNO)
    VALUES ('$consultID', '$pID', '$addmissionNO');";

    if (mysqli_multi_query($conn, $sql)) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    header("Location: addaddmission.php");
  }

}


?>


<div class="container-fluid">
  <div class="content ">

    <div class="col-sm-9">
      <div class="well">
        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Paitent Addmission</h3>
        <h4><form method="GET"><button name="show" type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Admitted List</button></form></h4>
      </div>


      <div class="table-responsive" id="viewDiv" style = 'display: block;'>
        <?php
        if (isset($_POST['srchname'])){

          $searchq = $_POST['srchname'];
          $search = preg_replace("#[^a-z]#i","",$searchq);

          $sql = "SELECT * FROM admittedlist WHERE fname LIKE '%$searchq%' OR lname LIKE '%$searchq%';";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            echo "<table class='table table-striped table-custom'>
            <thead>
            <tr>
            <th class='text-center'>#</th>
            <th class='text-center'>Confirmed By</th>
            <th class='text-center'>Paitent Name</th>
            <th class='text-center'>Ward Name</th>
            <th class='text-center'>Admit Date</th>
            <th class='text-center'>Relation Name</th>
            <th class='text-center'>Relation contact NO</th>
            <th class='text-center'>Discharge Date</th>
            <th class='text-center'>Reason</th>
            <th class='text-center'> </th>
            <th class='text-center'> </th>
            </thead>
            </tr>
            <tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $id = $row["addmissionNO"];

              $cnfID = $row["confirmedBY"];
              $q = "SELECT * from physician WHERE phyID = '$cnfID';";
              $result1 = $conn->query($q);
              $cfmname = "";
              while($rowq = mysqli_fetch_array($result1)) {
                $cfmname .= "Dr. $rowq[2] $rowq[3]";
              }

              $ward = $row["wardNO"];
              $q2 = "SELECT * FROM ward WHERE wardNO = '$ward';";
              $result2 = $conn->query($q2);
              $wardname = "";
              while($rowq = mysqli_fetch_array($result2)) {
                $wardname .= "$rowq[1]";
              }


              echo "<tr>
              <td class='text-center'>".$row["addmissionNO"]."</td>
              <td class='text-center'>".$cfmname."</td>
              <td class='text-center'>".$row["fname"]." ".$row["lname"]."</td>
              <td class='text-center'>".$wardname."</td>
              <td class='text-center'>".$row["admitDate"]."</td>
              <td class='text-center'>".$row["relationName"]."</td>
              <td class='text-center'>".$row["relationcontactNO"]."</td>
              <td class='text-center'>".$row["dischargeDate"]."</td>
              <td class='text-center'>".$row["reason"]."</td>
              <td class='text-center'><a href ='admitupdate.php?addmissionNO=$id'><span class='glyphicon glyphicon-edit glyphicon-remove' aria-hidden='true'></a></td>
              <td class='text-center'><a href ='include/del.inc.php?addmissionNO=$id' ><span class='glyphicon glyphicon-remove' aria-hidden='true'></a></td>

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
          $sql = "SELECT * FROM admittedlist;";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            echo "<table class='table table-striped table-custom'>
            <thead>
            <tr>
            <th class='text-center'>#</th>
            <th class='text-center'>Confirmed By</th>
            <th class='text-center'>Paitent Name</th>
            <th class='text-center'>Ward Name</th>
            <th class='text-center'>Admit Date</th>
            <th class='text-center'>Relation Name</th>
            <th class='text-center'>Relation contact NO</th>
            <th class='text-center'>Discharge Date</th>
            <th class='text-center'>Reason</th>
            <th class='text-center'> </th>
            <th class='text-center'> </th>
            </thead>
            </tr>
            <tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $id = $row["addmissionNO"];

              $cnfID = $row["confirmedBY"];
              $q = "SELECT * from physician WHERE phyID = '$cnfID';";
              $result1 = $conn->query($q);
              $cfmname = "";
              while($rowq = mysqli_fetch_array($result1)) {
                $cfmname .= "Dr. $rowq[2] $rowq[3]";
              }

              $ward = $row["wardNO"];
              $q2 = "SELECT * FROM ward WHERE wardNO = '$ward';";
              $result2 = $conn->query($q2);
              $wardname = "";
              while($rowq = mysqli_fetch_array($result2)) {
                $wardname .= "$rowq[1]";
              }


              echo "<tr>
              <td class='text-center'>".$row["addmissionNO"]."</td>
              <td class='text-center'>".$cfmname."</td>
              <td class='text-center'>".$row["fname"]." ".$row["lname"]."</td>
              <td class='text-center'>".$wardname."</td>
              <td class='text-center'>".$row["admitDate"]."</td>
              <td class='text-center'>".$row["relationName"]."</td>
              <td class='text-center'>".$row["relationcontactNO"]."</td>
              <td class='text-center'>".$row["dischargeDate"]."</td>
              <td class='text-center'>".$row["reason"]."</td>
              <td class='text-center'><a href ='admitupdate.php?addmissionNO=$id'><span class='glyphicon glyphicon-edit glyphicon-remove' aria-hidden='true'></a></td>
              <td class='text-center'><a href ='include/del.inc.php?addmissionNO=$id' ><span class='glyphicon glyphicon-remove' aria-hidden='true'></a></td>

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
          <?php
          $optionq = "SELECT * FROM paitent;";
          $resultq = $conn->query($optionq);
          ?>

          <label>Paitent ID</label>
          <select name="pID" class="form-control">
            <?php while($rowq = mysqli_fetch_array($resultq)):; ?>
              <option value="<?php echo $rowq[0] ?>"><?php echo $rowq[0].": ".$rowq[2]." ".$rowq[3]; ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <?php
          $optionq = "SELECT * FROM physician, consultant WHERE physician.phyID = consultant.consultID ;";
          $resultq = $conn->query($optionq);
          ?>

          <label>Confirmed By</label>
          <select name="consultID" class="form-control">
            <?php while($rowq = mysqli_fetch_array($resultq)):; ?>
              <option value="<?php echo $rowq[0] ?>"><?php echo "Dr. ".$rowq[2]." ".$rowq[3]; ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <hr /><br />
        <div class="form-group">
          <label>Admission Number</label>
          <input type="number" name="addmissionNO" class="form-control"  placeholder="Admission No">
        </div>
        <div class="form-group">
          <label>Addmission Date</label>
          <input type="date" name="admitDate" class="form-control"  placeholder="Addmission date">
        </div>
        <div class="form-group">
          <label>Relation Name</label>
          <input type="text" name="relationName" class="form-control"  placeholder="Relation Name">
        </div>
        <div class="form-group">
          <label>Relation Contact NO</label>
          <input type="number" name="relationcontactNO" class="form-control"  placeholder="Contact No">
        </div>
        <div class="form-group">
          <label>Discharge Date</label>
          <input type="date" name="dischargeDate" class="form-control"  placeholder="Discharge date">
        </div>
        <div class="form-group">
          <label>Reason </label>
            <div class="radio">
              <label class="radio-inline">
                <input type="radio" name="reason" value="Cure">Cure</label>
              <label class="radio-inline">
                <input type="radio" name="reason" value="Transferred">Transferred</label>
            </div>
        </div>
        <div class="form-group">
          <?php
          $optionq = "SELECT * FROM ward;";
          $resultq = $conn->query($optionq);
          ?>

          <label>Ward NO</label>
          <select name="wardNO" class="form-control" >
            <?php while($rowq = mysqli_fetch_array($resultq)):; ?>
              <option value="<?php echo $rowq[0] ?>"><?php echo $rowq[1]; ?></option>
            <?php endwhile; ?>
          </select>
        </div>

        <hr />

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
