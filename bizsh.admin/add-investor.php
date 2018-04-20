<?php
    
    include 'includes/session.php';
    include 'common/config.php';
    include 'model/CategoryDB.php';
    // include 'model/IconDB.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';

    $category_db = new CategoryDB();
    $category = $category_db->getAllCategory();

    // $icon_db = new IconDB();
    // $icon = $icon_db->getAllIcons();
?>

<link rel="stylesheet" href="css/containera4.css">

<div class="container m-t-100 m-b-50">   
    <div id="loadthis"></div>
      <div class="container content-80">
      <h1 id="confirm"></h1>
        <h1 class="title center-text">Add Entrepreur</h1>

      <form class="add-subcategory-form" id="addSubcategoryForm" method="post">
          <a href="javascript:void(0);" class="openPopup" ><img id="img-icon" class="m-b-10" style="margin-right: 37% !important; margin-left: 40% !important" src="img/default.png" width="150" height="150">   </a>
          <div class="container">
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Last name
                  </div>
                  <div class="col-lg-9">
                    <form>
                     <input type="text"  class="inputText" id="search_location" name="search_location" placeholder="Last name" /> 
                    </form>
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    First name
                  </div>
                  <div class="col-lg-9">
                    <form>
                     <input type="text"  class="inputText" id="search_location" name="search_location" placeholder="First name" /> 
                    </form>
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Middle name
                  </div>
                  <div class="col-lg-9">
                    <form>
                     <input type="text"  class="inputText" id="search_location" name="search_location" placeholder="Middle name" /> 
                    </form>
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Short Description
                  </div>
                  <div class="col-lg-9">
                    <textarea class="form-control counted" name="message" placeholder="Short Description" rows="5" style="margin-bottom:10px; height: 100px"></textarea>
                  </div>
                </div>
                
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Street
                  </div>
                  <div class="col-lg-9">
                     <input type="password"  class="inputText" id="rpassword" name="rpassword" placeholder="Street" />
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Barangay
                  </div>
                  <div class="col-lg-9">
                     <input type="password"  class="inputText" id="rpassword" name="rpassword" placeholder="Barangay" />
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-4">
                      Province
                      </div>
                      <div class="col-lg-8">
                        <select  id="categories" class="form-control custom-select" style="height: 25px !important">
                            <option value="0">Select Province</option>
                            <option value="1">Micro Enterprise</option>
                            <option value="2">Small Enterprise</option>
                            <option value="3">Meduim Enterprise</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="row">
                      <div class="col-lg-4">
                      City
                      </div>
                      <div class="col-lg-8">
                        <select  id="user_time_zone" class="form-control custom-select" style="height: 25px !important">
                          <option value="0">Select City</option>
                          <option value="1">Micro Enterprise</option>
                          <option value="2">Small Enterprise</option>
                          <option value="3">Meduim Enterprise</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Email
                  </div>
                  <div class="col-lg-9">
                    <input type="email"  class="inputText" id="rpassword" name="rpassword" placeholder="Email" />
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Facebook Account
                  </div>
                  <div class="col-lg-9">
                    <input type="email"  class="inputText" id="rpassword" name="rpassword" placeholder="Facebook Account" />
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Mobile no
                  </div>
                  <div class="col-lg-9">
                    <input type="email"  class="inputText" id="rpassword" name="rpassword" placeholder="Mobile no" />
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Telephone no
                  </div>
                  <div class="col-lg-9">
                    <input type="email"  class="inputText" id="rpassword" name="rpassword" placeholder="Telephone no" />
                  </div>
                </div>
              </div>
      </form>
      </div>
</div>
 <script src="script/add-subcategory3.js"></script>
 <?php
  include 'includes/footer.php';
 ?>
