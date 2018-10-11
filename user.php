<?php include('server.php') ?>
<?php  

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
      <p> <a href="edit_yourself.php?submit='1'" style="color: red;">Edit yourself</a> </p>
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
  <table class="content">
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
  
    $no   = 1;
    $total  = 0;
    while ($row = mysqli_fetch_assoc($res))
    {
        if($row['login']==='admin_log'){
            continue;
        }
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
    mysqli_close($db);
  ?>
    </tbody>
</table>
</body>
</html>