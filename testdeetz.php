<?php

include 'header3.php';
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
        <h3><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Test Details</h3>
      </div>


        <div class="table-responsive">
          <?php

          if (isset($_POST['srchname'])){

            $searchq = $_POST['srchname'];
            $search = preg_replace("#[^a-z]#i","",$searchq);

            $sql = "SELECT * FROM test WHERE testname LIKE '%$searchq%';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              echo "<table class='table table-striped'>
              <thead>
              <tr>
              <th class='text-center'>#</th>
              <th class='text-center'>Test Name</th>
              <th class='text-center'>Description</th>
              </thead>
              </tr>
              <tbody>";
              // output data of each row
              $x = 0;
              while($row = $result->fetch_assoc()) {
                $x += 1;

                echo "<tr>
                <td class='text-center'>".$x."</td>
                <td class='text-center'>".$row["testName"]."</td>
                <td class='text-center'>".$row["description"]."</td>
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
            $sql = "SELECT * FROM test;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              echo "<table class='table table-striped'>
              <thead>
              <tr>
              <th class='text-center'>#</th>
              <th class='text-center'>Test Name</th>
              <th class='text-center'>Description</th>
              </thead>
              </tr>
              <tbody>";
              // output data of each row
              $x = 0;
              while($row = $result->fetch_assoc()) {
                $x += 1;

                echo "<tr>
                <td class='text-center'>".$x."</td>
                <td class='text-center'>".$row["testName"]."</td>
                <td class='text-center'>".$row["description"]."</td>
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
