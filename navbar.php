<nav class=" sticky-top navbar navbar-expand-lg navbar-light ftco_navbar ftco-navbar-dark " id="ftco-navbar" >
                  <div class="container-fluid">
                    <span id="nickname"><a href="index.php" class="nav-link mynav">CHATME</a></span>
                    <a class="navbar-brand" href="index.html"></a>
                    <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation" style="color:#fff">
                      <span class="fa fa-menu"></span> Menu
                    </button>

                    <div class="collapse navbar-collapse" id="ftco-nav">
                      <ul class="navbar-nav nav ml-auto">
                        <li class="nav-item"><a href="index.php" class="nav-link"><span class="mynav">Home</span></a></li>
                        <li class="nav-item"><a href="#about" class="nav-link"><span class="mynav">About</span></a></li>
                        <li class="nav-item"><a href="login.php" class="nav-link"><span class="mynav">Login</span></a></li>
                        <li class="nav-item"><a href="signup.php" class="nav-link"><span class="mynav">SignUp</span></a></li>
                        <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink3" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true">
            
             <?php 
                                    if(isset($_SESSION['custid'])){
                                    include_once "myclass.php";
                                   $objcustomer = new Customers;
                                    $customers=$objcustomer->getMyCustomer($_SESSION['custid']);
                                    //var_dump($customers);
                                     foreach ($customers as $key => $value) {
                                        if(isset($value['custfname'])){
                                         echo "<span class='text-light'>".strtoupper($value['custfname'])." ".strtoupper($value['custlname'])."</span>";
                                          }
                                      }
                                  }
                                           ?>
          </a>
          
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Dashboard</a>
              <a class="dropdown-item"  href="logout.php">Logout</a>
          
        </div>
                                    
      </li>
       <?php 
                                    if(isset($_SESSION['custid'])){ ?>
      <li class="nav-item"><a href="chat.php" class="nav-link"><span class="mynav">Chats</span></a></li>
    <?php  } ?>

                      </ul>
                    </div>
                  </div>
                </nav>