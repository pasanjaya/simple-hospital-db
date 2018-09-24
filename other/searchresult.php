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
        <h3><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Search Results</h3>
        <h4><a href="addphysician.php" class="btn btn-default" role="button"><span class='glyphicon glyphicon-level-up' aria-hidden='true'></span> Back</a></h4>
        </div>


        <div class="table-responsive">
          <?php

          if (isset($_POST['srchname'])){

            $searchq = $_POST['srchname'];
            $search = preg_replace("#[^a-z]#i","",$searchq);

            $sql = "SELECT * FROM physician, 	externalphy, consultant WHERE phyID = consultID AND phyID = eConsultID AND (physician.fname LIKE '%$searchq%' or physician.lname LIKE '%$searchq%');";
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
              <th class='text-center'>Certificate No</th>
              </thead>
              </tr>
              <tbody>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
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
                <td class='text-center'>".$row["certificateNO"]."</td>

                </tr>";
              }

              echo "</tbody>";
              echo "</table>";
            }
            else{
              echo "0 results found";
            }

          }
            ?>
            <hr>
          </div>

    </div>


  </div>
</div>

<br /><br />



</body>
</html>
