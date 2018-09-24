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
        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Add Physician</h3>
        <h4><form method="GET"><button name="show" type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Physician List</button></form></h4>
      </div>


        <div class="table-responsive" id="viewDiv" style = 'display: block;' >
          <?php
          if (isset($_POST['srchname'])){

            $searchq = $_POST['srchname'];
            $search = preg_replace("#[^a-z]#i","",$searchq);

            $sql = "SELECT * FROM physician, consultant WHERE phyID = consultID AND (physician.fname LIKE '%$searchq%' or physician.lname LIKE '%$searchq%');";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              echo "<table class='table table-striped table-custom'>
              <thead>
              <tr>
              <th class='text-center'>#</th>
              <th class='text-center'>Registration No</th>
              <th class='text-center'>Name</th>
              <th class='text-center'>Gender</th>
              <th class='text-center'>Address</th>
              <th class='text-center'>Contact No</th>
              <th class='text-center'>Field</th>
              <th class='text-center'>Grade</th>
              <th class='text-center'>Specialist</th>
              <th class='text-center'>LeadConsultion</th>
              <th class='text-center'> </th>
              <th class='text-center'> </th>
              </thead>
              </tr>
              <tbody>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $id = $row["phyID"];
                echo "<tr>
                <td class='text-center'>".$row["phyID"]."</td>
                <td class='text-center'>".$row["regNO"]."</td>
                <td class='text-center'>".$row["fname"]." ".$row["lname"]."</td>
                <td class='text-center'>".$row["gender"]."</td>
                <td class='text-center'>".$row["address"]."</td>
                <td class='text-center'>".$row["contactNO"]."</td>
                <td class='text-center'>".$row["field"]."</td>
                <td class='text-center'>".$row["grade"]."</td>
                <td class='text-center'>".$row["specialistFlag"]."</td>
                <td class='text-center'>".$row["leadConsultFlag"]."</td>
                <td class='text-center'><a href ='phyupdate.php?phyID=$id'><span class='glyphicon glyphicon-edit glyphicon-remove' aria-hidden='true'></a></td>
                <td class='text-center'><a href ='include/del.inc.php?phyID=$id' ><span class='glyphicon glyphicon-remove' aria-hidden='true'></a></td>


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
            }
            else{
              echo "0 results found";
            }
            echo "<hr><hr>";

          }

          elseif(isset($_GET['show'])){

            $sql = "SELECT * FROM physician, consultant WHERE phyID = consultID;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table table-striped table-custom'>
                <thead>
                <tr>
                <th class='text-center'>#</th>
                <th class='text-center'>Registration No</th>
                <th class='text-center'>Name</th>
                <th class='text-center'>Gender</th>
                <th class='text-center'>Address</th>
                <th class='text-center'>Contact No</th>
                <th class='text-center'>Field</th>
                <th class='text-center'>Grade</th>
                <th class='text-center'>Specialist</th>
                <th class='text-center'>LeadConsultion</th>
                <th class='text-center'> </th>
                <th class='text-center'> </th>
                </thead>
                </tr>
                <tbody>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  $id = $row["phyID"];
                  echo "<tr>
                  <td class='text-center'>".$row["phyID"]."</td>
                  <td class='text-center'>".$row["regNO"]."</td>
                  <td class='text-center'>".$row["fname"]." ".$row["lname"]."</td>
                  <td class='text-center'>".$row["gender"]."</td>
                  <td class='text-center'>".$row["address"]."</td>
                  <td class='text-center'>".$row["contactNO"]."</td>
                  <td class='text-center'>".$row["field"]."</td>
                  <td class='text-center'>".$row["grade"]."</td>
                  <td class='text-center'>".$row["specialistFlag"]."</td>
                  <td class='text-center'>".$row["leadConsultFlag"]."</td>
                  <td class='text-center'><a href ='phyupdate.php?phyID=$id'><span class='glyphicon glyphicon-edit glyphicon-remove' aria-hidden='true'></a></td>
                  <td class='text-center'><a href ='include/del.inc.php?phyID=$id' ><span class='glyphicon glyphicon-remove' aria-hidden='true'></a></td>

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


            ?>

          </div>




      <form action="include/addphysician.inc.php" method="POST">
        <div class="form-group">
          <label>ID</label>
          <input type="number" name="phyID" class="form-control"  placeholder="ID">
        </div>
        <div class="form-group">
          <label>Regestration Number</label>
          <input type="text" name="regNO" class="form-control"  placeholder="Regestration Number">
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
          <label>Address</label>
          <input type="text" name="address" class="form-control"  placeholder="Address">
        </div>
        <div class="form-group">
          <label>Contact Number</label>
          <input type="number" name="contactNO" class="form-control"  placeholder="Contact Number">
        </div>
        <hr />
        <br />
        <div class="form-group">
          <label>Consultation Type </label>
          <div class="checkbox">
            <label class="checkbox-inline">
              <input type="checkbox"  name="specialistFlag" value="Yes"> Specialist
            </label>
            <label class="checkbox-inline">
              <input type="checkbox"  name="leadConsultFlag" value="Yes"> Lead Consultant
            </label>
          </div>
        </div>
        <div class="form-group">
          <label>Field</label>
          <input type="text" name="field" class="form-control"  placeholder="Field">
        </div>
        <div class="form-group">
          <label>Grade</label>
          <input type="text" name="grade" class="form-control"  placeholder="Grade">
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
