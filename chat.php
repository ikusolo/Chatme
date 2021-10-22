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
            <title>Chat</title>
            <style type="text/css">
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
              #msg{
                height:900px;
                overflow-y: scroll;
              }
              #member{
                 height:900px;
                overflow-y: scroll;
              }
            </style>
          </head>
          <body>
            <?php  
            include_once "myclass.php";
            if(isset($_POST['send'])){
              $obj=new Customers;
              $myoutput=$obj->insertMessage($_POST['message'],$_SESSION['custid']);
            }

             ?>
            <div class="container-fluid">
              <?php include_once "navbar.php"; ?>
              <div class="row">
                <div class="col-md-12">
<div class="card rare-wind-gradient chat-room">
  <div class="card-body">

    <!-- Grid row -->
    <div class="row px-lg-2 px-2">

      <!-- Grid column -->
      <div class="col-md-6 col-xl-4  px-0" id="member">

        <h6 class="font-weight-bold mb-3 text-center text-lg-left">Member</h6>
     <?php
      include_once "myclass.php";

        $myname=new Customers;
        $output=$myname->getCustomers();

        //var_dump($output);
         foreach ($output as $key => $value) {
          ?>
        <div class="white z-depth-1 px-2 pt-3 pb-0 members-panel-1 scrollbar-light-blue">
          <ul class="list-unstyled friend-list">
            <li class="active grey lighten-3 p-2">
              <a href="#" class="d-flex justify-content-between">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                <div class="text-small">
                  <strong>
                   
                 
                 
                    <?php  echo($value['custfname']." ".$value['custlname']); ?>
                 
         
                   </strong>
                  <p class="last-message text-muted"></p>
                </div>
                <div class="chat-footer">
                  <p class="text-smaller text-muted mb-0"></p>
                  <span class="badge badge-danger float-right"></span>
                </div>
              </a>
            </li>
           </ul>
        </div>
      <?php }  ?>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

        <div class="chat-message chat" id="msg" >

          <ul class="list-unstyled chat-1 scrollbar-light-blue">
             <?php
                      include_once "myclass.php";
                      $obj=new Customers;
                      $result=$obj->getMessage();

                      foreach ($result as $key => $value) { ?>
            <li class="d-flex justify-content-between mb-4">
              <div class="chat-body  white p-3 z-depth-1">
                <div class="header">
                  <strong class="primary-font"><?php echo $value["custfname"]." ".$value["custlname"] ?></strong>
                  <small class="pull-right text-muted"><i class="far fa-clock"></i><?php echo date("g:i A")?></small>
                </div>
                <hr class="w-100">
                <p class="mb-0">
                 <?php echo $value['msg_cont']; ?>
                </p>
              </div>
              <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
            </li>
          <?php } ?>
           
          </ul>
          <form method="POST" action="">
          <div class="white">
            <div class="form-group basic-textarea">
              <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" name="message" rows="3" placeholder="Type your message here..."></textarea>
            </div>
          </div>
          <button type="submit" name="send" id="send" class="btn btn-outline-pink btn-rounded btn-sm waves-effect waves-dark float-right">Send</button>
           </form>
        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
</div>
</div>

</div>
<?php include_once "footer.php"; ?>
 <script type='text/javascript' language='javascript'>
  $.(document).ready(function(){
    var chat = $(".chat");
    chat.scrollTop(chat.height());

  })
  // when a new message comes in...

      </script> 
               
       <!--jsvascript files ,jquery, popper,bootstrap-->
       <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>
</body>
</html>