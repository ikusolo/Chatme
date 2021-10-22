<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
        <head>
          <meta charset="utf-8">
          <meta='viewport' content='width=device-width,initial-scale=1, shrink-to-fit=no'>
          <link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
           <link rel='stylesheet' type='text/css' href='fontawesome/css/all.css'>
           <script type='text/javascript' src='js/jquery.min.js'></script>
           <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <title>js recap</title>
            <style type="text/css">
            .myimg{
              background-image:url('images/uns.jpg');
              background-size:cover;
              height:700px;
              }
              .mynav:hover{
              color:rgb(135,44,67);
              }
              .mynav{
              color:white;
              }
              .sticky-top{
                position:sticky;
                top:0;
                 background:linear-gradient(to top right,purple,#000,red);
              }
              #wel{
                color:white;
                font-family: algerian ;
                font-size: 40px;
                margin-top: 150px;
              }
              #subwel{
                color:white;
                font-family:salvalyn ;
                font-size: 25px;

              }
              body{
                color:#fff;
                background-color: #000;
              }
            </style>
        </head>
        <body>
          <div class="container-fluid">
            <?php include_once "navbar.php";  ?>
            <div class="col-md-12 myimg">
              <div>
                <div class="row ">
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                <div id="wel">
                  <?php
                   if(!isset($_SESSION['fname'])){
                echo "HELLO WELCOME TO CHATME";
              }else{
                echo "CHAT WITH FRIENDS AND FAMILY";
              }
               ?>
                 </div>
                <div  id="subwel">
                  <?php
                  if(!isset($_SESSION['fname'])){
                echo "SignUp/login To start chatting";
              }
                ?>
                </div>
              </div>
              <div class="col-md-3"></div>
              </div>
              </div>
            </div>
           <?php include_once "footer.php"; ?>
             </div>
          </div>
            
          <script type='text/javascript' language='javascript'>
            

          </script>
       <!--jsvascript files ,jquery, popper,bootstrap-->
       <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>
        </body>
</html>