
    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">
        
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index">
                <strong><img id="nav-logo" src="img/logo-white.png" width="150" height="50"></strong>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index" >Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="business" >Browse Business</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="apply" >Start Business</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">About Us</a>
                    </li>
                </ul>
<!--                 <form class="form-inline waves-effect waves-light">
                    <input class="form-control" type="text" placeholder="Search">
                </form> -->
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item ">
                        <a class="nav-link btn-a" href="">Build</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link btn-b" href="">Buy</a>
                    </li>
                    <li class=" dropdown img-circle">
                        <?php
                            if(isset($_SESSION['islogin'])){
                                $src = 'img/unknow.jpg';
                             }
                            
                        ?>
                        <img src="<?php 
                        echo $src;
                        ?>" alt="Trolltunga Norway" width="100" height="50" class="img-circle">
                          <div class="dropdown-content">

                            <a href=""><img id="img-circle-2" src="<?php echo $src ;?>" alt="Trolltunga Norway" width="200" height="150" title="Edit Profile"></a>
                            <div class="desc center-text"><?php
                            if(isset($_SESSION['useremail'])){
                                echo $_SESSION['useremail'];
                            }else if (isset($_SESSION['userData'])) {                      
                                echo $_SESSION['gmail'];
                              }

                            ?></div>

                            <div class="desc"> <a href="logout">Logout</a></div>
                            <div class="desc"> <a href="">Notifications</a></div>
                            <div class="desc"> <a href="">Accounts</a></div>
                          </div>
                            
                    </li>                  
                </ul>

            

        </div>
    </nav>
