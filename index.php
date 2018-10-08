<?php 
  session_start(); 

  if (!isset($_SESSION['login'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['login']);
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="header">
  <h2>Home Page</h2>
</div>
<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['login'])) : ?>

      <p>Welcome <strong>
        <?php
           echo $_SESSION['login'];
        ?>
        </strong></p>
      <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

<?php
$con = mysqli_connect("127.0.0.1", "root", "", "testing");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 $sql = 'SELECT * FROM person';
 $res = mysqli_query($con, $sql);
?>

  <table class="header">
    <caption class="title">All users</caption>
    <thead>
      <tr>
        <th>Number</th>
        <th>login</th>
        <th>fname</th>
        <th>lname</th>
        <th>role</th>
      </tr>
    </thead>
    <tbody>
    <?php
  if($_SESSION['login'] == "admin_log"){
    $no   = 1;
    $total  = 0;
    while ($row = mysqli_fetch_assoc($res))
    {
      echo 
      '<tr>
        <td>'.$no.'</td>
        <td>'.$row['login'].'</td>
        <td>'.$row['fname'].'</td>
        <td>'.$row['lname'].'</td>
        <td>'.$row['role'].'</td>
      </tr>';
      $no++;
    }
  }else{
    $no   = 1;
    $login = $_SESSION['login'];
    $sql = "SELECT * FROM person WHERE login='$login'";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) == 1) {
      while ($row = mysqli_fetch_assoc($res))
      {
        echo 
        '<tr>
          <td>'.$no.'</td>
          <td>'.$row['login'].'</td>
          <td>'.$row['fname'].'</td>
          <td>'.$row['lname'].'</td>
          <td>'.$row['role'].'</td>
        </tr>';
        $no++;
      }
    }
  }?>
    </tbody>
</table>
    
</body>
</html>