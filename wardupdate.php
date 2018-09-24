<?php

include 'header.php';

/*if (isset($_SESSION['ID'])){
  echo "<form action='include/logout.inc.php'>
          <button>Log Out</button>
        </form>";
}*/

include 'dbh.php';
$id = $_REQUEST['wardNO'];

$result = "SELECT * FROM ward WHERE wardNO = '$id';";
$test = $conn->query($result);
$row = $test->fetch_assoc();
if (!$result) {
		die("Error: Data not found..");
		}

    $wardNO = $row['wardNO'];
    $wardName = $row['wardName'];
    $NoOfPaitents = $row['NoOfPaitents'];




if(isset($_POST['save'])){


  $wardName_new = $_POST['wardName'];
  $NoOfPaitents_new = $_POST['NoOfPaitents'];

  $sql = "UPDATE ward SET wardName ='$wardName_new', NoOfPaitents ='$NoOfPaitents_new' WHERE wardNO = '$wardNO';";

  if (mysqli_multi_query($conn, $sql)) {
    echo "Details updated";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }


header("Location: ward.php");
}

 ?>


<div class="container-fluid">
  <div class="content ">

    <div class="col-sm-9">
      <div class="well">
        <h3><span class="glyphicon glyphicon-bed" aria-hidden="true"></span> Update Ward</h3>
        </div>
      <form method="POST">
        <div class="form-group">
          <label>Ward Name</label>
          <input type="text" name="wardName" value="<?php echo $wardName; ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label>No of paitent</label>
          <input type="number" name="NoOfPaitents" value="<?php echo $NoOfPaitents; ?>" class="form-control" >
        </div>

        <hr />
        <br />
        <button type="submit" class="btn btn-default" name="save" value="save">Update</button>

      </form>

    </div>


  </div>
</div>

<br />

</body>
</html>
