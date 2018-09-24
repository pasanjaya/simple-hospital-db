<?php
session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Hospital DB</title>
  <link rel="stylesheet" type="text/less" href="style.less" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script>
</head>
<body>


<?php
if (isset($_SESSION['loginType'])){
  /* echo $_SESSION['ID'];
  echo "<form action='include/logout.inc.php'>
          <button>Log Out</button>
        </form>";*/
  if ($_SESSION['loginType'] == 'admin'){
    header("Location: admin.php");
  }else if($_SESSION['loginType'] == 'doctor'){
    header("Location: doctor.php");
  }
  else if($_SESSION['loginType'] == 'public'){
    header("Location: public.php");
  }


}else{
  echo "<div class='log-form'>
          <h2>Login to HospitalDB</h2>
          <form action='include/login.inc.php' method='POST'>
            <input type='text' title='username' name='usrid' placeholder='Username' />
            <input type='password' title='username' name='pwd' placeholder='Password' />
            <button type='submit' class='btn'>Login</button>
          </form>
        </div><!--end log form -->";
}

 ?>
<br /> <br />



<!--<form action='include/login.inc.php' method='POST'>
      <input type='text' name='usrid' placeholder='Username' /><br/> <br />
      <input type='password' name='pwd' placeholder='Password' /><br /> <br />
      <button type='submit'>Log in</button>
    </form>-->


</body>
</html>
