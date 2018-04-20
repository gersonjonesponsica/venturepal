<?php 
    $pg = explode('/', $_SERVER['REQUEST_URI']);
    $pg = end($pg);
?>
<style>
        .navbar {
            background-color: white;
        }
        .navbar.navbar-dark .navbar-nav .nav-item a {
            color: #484848;
            transition: .35s;
        }
        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }



        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #000;
            }
            .navbar.navbar-dark .navbar-nav .nav-item a {
                color: #fff;
                transition: .35s;
            }
        }

</style>
    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
         <a class="navbar-brand logo" href="index">
            <strong><img class="img-responsive" id="nav-logo" src="img/official2.png" width="170" height="40"></strong>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav1">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="register-msme">Register MSME</a>
                </li>
      <!--           <li class="nav-item dropdown sliderDropdown">
                    <a class="nav-link" dropdown-toggle " href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Manage
                    </a>
                    <div class="dropdown-content">
                        <div class="desc"> <a href="term-and-condition">Terms and Condition</a></div>
                        <div class="desc"> <a href="contract">Contract Letter</a></div>
                        <div class="desc"> <a href="document-list">Documents</a></div>
                        <div class="desc"> <a href="icon-list">Icons</a></div>
                        <div class="desc"> <a href="question-list">Question</a></div>
                        <div class="desc"> <a href="category-list">Category</a></div>
                        <div class="desc"> <a href="subcategory-list">Sub-category</a></div>
                    </div>
                </li> -->
             <!--    <li class="nav-item " id="noti_Container">
                    <a class="nav-link badge1" data-badge="2" href="inbox">Inbox</a> 
                </li> -->
                <li class="nav-item " id="noti_Container">
                    <a class="nav-link active" href="application">Application</a> 
                </li>
                <li class="nav-item " id="noti_Container">
                    <a class="nav-link active" href="extension-list">Extension</a> 
                </li>
                    <li class="nav-item dropdown sliderDropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Manage
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"  style="overflow-y: scroll; height: 300px !important">
                             <a href="term-and-condition" class="dropdown-item" style="text-align: left !important; background-color: #F1F1F1">Manage Account </a>
                             <a href="loginlog-list" class="dropdown-item <?php if ($pg == 'loginlog-list') echo 'selected' ?>">Login Log List</a>
                            <a href="entrep-list" class="dropdown-item <?php if ($pg == 'entrep-list') echo 'selected' ?>">Entreprenuer</a>
                            <a href="investor-list" class="dropdown-item <?php if ($pg == 'investor-list') echo 'selected' ?>">Investor</a>
                            <a href="msme-list" class="dropdown-item <?php if ($pg == 'msme-list') echo 'selected' ?>">Msme</a>
                            <a href="admin-list" class="dropdown-item <?php if ($pg == 'admin-list') echo 'selected' ?>">Admin</a>
                            <a href="account-list" class="dropdown-item <?php if ($pg == 'account-list') echo 'selected' ?>">Accounts</a>
                            <a href="term-and-condition" class="dropdown-item" style="text-align: left !important; background-color: #EEEEEE">Manage Content </a>
                            <a href="term-and-condition" class="dropdown-item <?php if ($pg == 'term-and-condition') echo 'selected' ?>" >Terms and Condition</a>
                            <a href="contract" class="dropdown-item <?php if ($pg == 'contract') echo 'selected' ?>" >Contract Letter</a>
                            <a href="document-list" class="dropdown-item <?php if ($pg == 'document-list') echo 'selected' ?>">Documents</a>
                            <a href="icon-list" class="dropdown-item <?php if ($pg == 'icon-list') echo 'selected' ?>">Icons</a>
                            <a href="question-list" class="dropdown-item <?php if ($pg == 'question-list') echo 'selected' ?>">Question</a>
                            <a href="category-list" class="dropdown-item <?php if ($pg == 'category-list') echo 'selected' ?>">Category</a>
                            <a href="subcategory-list " class="dropdown-item <?php if ($pg == 'subcategory-list') echo 'selected' ?>">Sub-category</a>

                            <a href="program-list" class="dropdown-item <?php if ($pg == 'program-list') echo 'selected' ?>">Program</a>
  
                            <a href="testimonial-list" class="dropdown-item <?php if ($pg == 'testimonial-list') echo 'selected' ?>">Testimonial</a>
                        </div>
                      </li> 

            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item dropdown sliderDropdown">
                    <a class="nav-link btn-a" dropdown-toggle " href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Hi, <?php if(isset($_SESSION['username'])) echo $_SESSION['username']?>
                    </a>
                    <div class="dropdown-content">
                        <div class="desc"> <a href="logout">Edit profile</a></div>
                        <div class="desc"> <a href="">Changwe password </a></div>
                        <div class="desc"> <a href="logout">Logout</a></div>

                    </div>
                </li>
            </ul>
        </div> 
    </nav>

    <script>
    $(document).ready(function () {

        $('#noti_Button').click(function () {

            // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
            $('#notifications').fadeToggle('fast', 'linear', function () {
                if ($('#notifications').is(':hidden')) {
                    // $('#noti_Button').css('background-color', '#2E467C');
                }
                else $('#noti_Button').css('background-color', '#FFF');        // CHANGE BACKGROUND COLOR OF THE BUTTON.
            });

            $('#noti_Counter').fadeOut('slow');                 // HIDE THE COUNTER.

            return false;
        });

        // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
        $(document).click(function () {
            $('#notifications').hide();

            // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
            if ($('#noti_Counter').is(':hidden')) {
                // CHANGE BACKGROUND COLOR OF THE BUTTON.
                // $('#noti_Button').css('background-color', '#2E467C');
            }
        });

        // $('#notifications').click(function () {
        //     return false;      
        // });
    });
</script>

