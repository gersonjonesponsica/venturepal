<?php
    $pg = explode('/', $_SERVER['REQUEST_URI']);
    $pg = end($pg);
?>

    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="background-color: #21b08a"></span>
            </button>
            <a class="navbar-brand logo" href="index">
                <strong><img class="img-responsive" id="nav-logo" src="img/official2.png" width="160" height="40"></strong>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav1">
                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item ">
                        <a class="nav-link nav-item1" href="investor">Join ventures<span class="sr-only">(current)</span></a>
                    </li>
                     <li class="nav-item ">
                        <a class="nav-link nav-item1" href="entrepreneurs">Start venture<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item1" href="about">About Us</a>
                    </li>
                  
                    <li class="nav-item dropdown ">
                        <a class=" nav-link nav-item1" href="business" >Help</a>
                          <div class="dropdown-content ">
                            <ul>
                            <a href="logout">
                            <li class="desc-nav ">Capital</li>
                            </a>
                            <a href="testimonial">
                            <li class="desc-nav">Testimonial</li>
                            </a>
                            <a href="how-it-works">
                            <li class="desc-nav">How it works</li>
                            </a>
                            <a href="logout">
                            <li class="desc-nav">Blog</li>
                            </a>
                            <a href="logout">
                            <li class="desc-nav">FAQs</li>
                            </a>
                          </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item1" href="how-it-works" >How it works</a>
                    </li>   
                          
                </ul>
                   
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn-signup" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Sign up
                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                       <a href="register-investor" class="dropdown-item">as investor</a>
                       <a href="register-entreprenuer" class="dropdown-item">as Entreprenuer</a>
                    </div>
                  </li>   
                    <li class="nav-item">
                        <a class="nav-link" href="login" >Login</a>
                    </li>     
                </ul>
        </div>
    </nav>
    

<!--       -->