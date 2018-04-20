<?php
    
    include 'includes/session.php';
    include 'common/config.php';
    include 'model/CategoryDB.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';

    $category_db = new CategoryDB();
    $category = $category_db->getAllCategory();

    if (isset($_GET['id']) && (!empty($_GET['id']))) {
        $acc_id = $_GET['id'];
    }
?>

<link rel="stylesheet" href="css/containera4.css">

<div class="container m-t-100 m-b-50">   
    <div id="loadthis"></div>
      <div class="container content-80">
      <h1 id="confirm"></h1>

        <h1 class="title center-text">Add Entrepreur</h1>
        <form class="photo-form" id="photoForm" name="photoForm" method="post">
          <a href="javascript:void(0);" id="photoLayout" ><img id="img-icon" class="m-b-10 m-l-40p m-r-40p border-r-50" src="img/default.png" width="150" height="150"> </a>
          <input type='file' name="photos" id="photos" value="Upload File" accept="image/*" hidden>
        </form>
      <form class="add-entrep-form" id="addEntrepForm" name="addEntrepForm" method="post">
          <div class="container" id="addEntrepContainer">
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Last name
                  </div>
                  <div class="col-lg-9">
                     <input type="text" hidden id="acc_id" name="acc_id" value='<?php echo $acc_id ?>' /> 
                     <input type="text"  id="entrep_id" name="acc_id" /> 
                     <input type="text"  class="inputText" id="lname" name="lname" placeholder="Last name" /> 
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    First name
                  </div>
                  <div class="col-lg-9">
                     <input type="text"  class="inputText" id="fname" name="fname" placeholder="First name" /> 
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Middle name
                  </div>
                  <div class="col-lg-9">
                     <input type="text"  class="inputText" id="mname" name="mname" placeholder="Middle name" /> 
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Short Description
                  </div>
                  <div class="col-lg-9">
                    <textarea class="form-control counted" name="desc" id="desc" placeholder="Short Description" rows="5" style="margin-bottom:10px; height: 100px"></textarea>
                  </div>
                </div>
                
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Street
                  </div>
                  <div class="col-lg-9">
                     <input type="text"  class="inputText" id="street" name="street" placeholder="Street" />
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Barangay
                  </div>
                  <div class="col-lg-9">
                     <input type="text"  class="inputText" id="barangay" name="barangay" placeholder="Barangay" />
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-4">
                      Province
                      </div>
                      <div class="col-lg-8">
                        <select  id="province" name="province" onchange="changeCity(this)" class="form-control custom-select" style="height: 25px !important">
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
                        <select  id="city" class="form-control custom-select" name="city" disabled style="height: 25px !important">
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
                    <input type="email"  class="inputText" id="email" name="email" placeholder="Email" />
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Facebook Account
                  </div>
                  <div class="col-lg-9">
                    <input type="text"  class="inputText" id="fb" name="fb" placeholder="Facebook Account" />
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Mobile no
                  </div>
                  <div class="col-lg-9">
                    <input type="text"  class="inputText" id="mobile" name="mobile" placeholder="Mobile no" />
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Telephone no
                  </div>
                  <div class="col-lg-9">
                    <input type="text"  class="inputText" id="telephone" name="telephone" placeholder="Telephone no" />
                  </div>
                </div>
                <button type="submit" class="btn btn-default" id="btnQuestion" name="btnQuestion">Save Entreprenuer</button>
              </div>
      </form>
      </div>
</div>
 <script src="script/add-entrep6.js"></script>
 <?php
  include 'includes/footer.php';
 ?>
