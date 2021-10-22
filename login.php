<?php session_start();   ?>

<!doctype html>
<html>
  <head>
    <title>Login Page</title>
    <link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
    <script type='text/javascript' src='js/jquery.min.js'></script>
    <style type="text/css">
      body{
         background-color: rgb(240,240,240);
      }
      .formborder{
        margin-top: 100px;
         background:linear-gradient(to top right,purple,#000);
        padding:20px;
        border-radius:15px ;
      }
      .form{
        padding:20px;
  }
  body{
    color:white;
    background-color: #000;
  }
    </style>
  </head>
  <body>
    <div class='container'>
      <div class='row'>
        <div class='col-md-3'></div>
        <div class='col-md-6'>
          <a href='index.php'>Go back Home</a>
          <div class='formborder'>
            <div class="login-form">
    <form action="" method="post">
        <?php 
  include_once "myclass.php";
  if(isset($_POST['submit'])){
    if(empty(trim($_POST['email'])) || empty(trim($_POST['password']))){
      echo "<div style='color:red'>"."Please fill the neccessary input</div>";
    }else{
           $restlogin=new Customers;
           $output=$restlogin->loginCustomer($_POST['email'],$_POST['password']);
           $_SESSION['custpwd']=$_POST['password'];
           

           foreach ($output as $key => $value) {
           if($value=="Invalid email/password"){
            echo "<div style='color:red'>".$value."</div>";
           }else{
           $_SESSION['fname']=$value['custfname'];;
           $_SESSION['lname']=$value['custlname'];;
           $_SESSION['phone']=$value['custtel'];;
           $_SESSION['email']=$value['custemail'];;
           $_SESSION['address']=$value['custaddress'];;
           $_SESSION['custid']=$value['custid'];
           //echo  $_SESSION['fname'];
            header("Location:index.php");

           }
           
           }
         }
      }

    



    ?>
        <h2 class="text-center text-light">Log in</h2>       
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-danger btn-block">Log in</button>
        </div>       
    </form>
    <p class="text-center"><a href="signup.php">Create an Account</a></p>
</div>
  
  </div>
  <div class='col-md-3'></div>
</div>
</div>
</div>

  
       <!--jsvascript files ,jquery, popper,bootstrap-->
       <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>


  </body>
</html>

