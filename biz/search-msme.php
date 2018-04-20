<?php
  include 'includes/header-user.php';
    include 'includes/head.php';
    
    // include 'includes/topnav.php';
?>
<style>
.highlight{
  background-color: #ffff59;
}
</style>
<!-- <link href="css/searchnavb2.css" rel="stylesheet"> -->


<div class="container m-t-60">

  <div class="row p-15" >
    <div class="col-10">
      <div class="container">
        <form class="navbar-form" role="search">
          <div class="m-t-30">
            <div class="container-1">
              <span class="icon"><i class="ion-search ion-size-30"></i></span>
              <input type="text" id="search" class="inputText searchInput p-l-45 b-r-3" placeholder="Keyword" />
            </div>
          </div>
        </form>
      </div>
      <div class="container m-t-20">
        <div class="inner">
          <a class="m-r-5">
            <span class="checkboxText m-r-10 m-t-10">My matches</span>
            <label class="switch2" for="myMatches" >
              <input type="checkbox" checked id="myMatches" onchange="checkStatus(this)"/>
              <div class="vslider-small round"></div>
            </label>
          </a>
        </div>
        <div class="inner">
          <a class="m-r-5">
            <span class="checkboxText m-r-10 m-t-10">Featured</span>
            <label class="switch2" for="featured" >
              <input type="checkbox" id="featured" onchange="checkStatus(this)"/>
              <div class="vslider-small round"></div>
            </label>
          </a>
        </div>
        <div class="inner">
          <a class="m-r-5">
            <span class="checkboxText m-r-10 m-t-10">Partly Funded</span>
            <label class="switch2" for="partFunded"  >
              <input type="checkbox" id="partFunded" onchange="checkStatus(this)" />
              <div class="vslider-small round"></div>
            </label>
          </a>
        </div>
        <div class="inner">
          <a class="m-r-5">
            <span class="checkboxText m-r-10 m-t-10">Bookmark</span>
            <label class="switch2" for="bookmark"  >
              <input type="checkbox" id="bookmark" onchange="checkStatus(this)"/>
              <div class="vslider-small round"></div>
            </label>
          </a>
        </div>

        <div class="inner">
          <a class="m-r-5" href="javascript: showMoreModal()">
            <span class="checkboxText m-r-10 m-t-10">More filter ..</span>
          </a>
        </div>

      </div>
      <div class="container m-t-30">
      <div class="row m-t-10 p-b-15">
        <div class="col-sm-3">
          <div>Investment Range</div>
        </div>
        <div class="col-sm-9">
          <div id="slider"></div>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-2 m-t-30">
      <a href="javascript:;" class="btn btn-default" id="btnSearchS" style="width: 100%; margin-bottom: 10px !important">Search</a>
      <div class="container m-t-30">
          <a href="" class="find-more pull-right">clear</a>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
<div class="row"  style="background-color:#E8F7F3; height: 85px">
    <div class="col-md-2 ">
      <select style="height: 25px; background-color: white; width: 70%"  id="sort" class="form-control custom-select m-t-20">
        <option value="1">Percent Raised</option>
        <option value="2">Popularity</option>
      </select>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6">
    <h5 class="m-t-30 ion-size-40" id="searchCount"></h5>
  </div> 

  <div class="col-md-2 ">
      <select style="height: 25px; background-color: white; width: 60%"  id="page" class="form-control custom-select m-t-20">
        <option value="2">Per page</option>
        <option value="1">10 Pages</option>
        <option value="2">20 Pages</option>
        <option value="3">30 Pages</option>
      </select>
  </div>

   <div class="col-md-2 ">
      <select style="height: 25px; background-color: white; width: 60%" id="sorting" class="form-control custom-select m-t-20">
        <option value="0">Descending</option>
        <option value="1">Ascending</option>
      </select>
    </div>
</div>
</div>

<div id="div_search" class="container-fluid m-r-50 m-l-50 m-t-20">
  
  <div class="row" id="searchMsme">  
  <!-- popular msme datas here    -->
  </div>
  <!-- <h1>gerson</h1> -->
  
</div>
<!-- <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn font-white" onclick="closeNav()">X</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div> -->
<div class="modal fade" id="moreMod" role="dialog">
    <div class="modal-dialog modal-md">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="text-center">More Filter</h4>
            </div>
            <div class="modal-body m-b-10" >
              <div class="container m-t-10 m-b-10">
                <div class="inner">
                  <a class="m-r-5">
                    <span class="checkboxText m-r-10 m-t-10">Interest/Like</span>
                    <label class="switch2" for="interest"  >
                      <input type="checkbox" id="interest" onchange="checkStatus(this)"/>
                      <div class="vslider-small round"></div>
                    </label>
                  </a>
                </div>
                <div class="inner">
                  <a class="m-r-5">
                    <span class="checkboxText m-r-10 m-t-10">Category</span>
                    <label class="switch2" for="category" >
                      <input type="checkbox" id="category" onchange="checkStatus(this)"/>
                      <div class="vslider-small round"></div>
                    </label>
                  </a>
                </div>
                <div class="inner">
                  <a class="m-r-5">
                    <span class="checkboxText m-r-10 m-t-10">Latest</span>
                    <label class="switch2" for="latest"  >
                      <input type="checkbox" id="latest" onchange="checkStatus(this)"/>
                      <div class="vslider-small round"></div>
                    </label>
                  </a>
                </div>
                <div class="inner">
                  <a class="m-r-5" href="javascript: showCustomFilter()">
                    <span class="checkboxText m-r-10 m-t-10">Custom filter</span>
                  </a>
                </div>
              </div>
              <div class="container"  id="custom_filter" style="display: none" >
                <div class="row bg-color-F7FAFA b-r-5 p-t-10" >
                    <div class="col-lg-2 m-t-10">
                      Province
                    </div>
                    <div class="col-lg-4">
                      <select  id="province" name="province" onchange="changeProvince(this)" class="form-control custom-select" style="height: 25px !important; width: 70%">
                      </select>
                    </div>
                    <div class="col-lg-1 m-t-10">
                      City
                    </div>
                    <div class="col-lg-4">
                      <select  id="city" name="city" class="form-control custom-select" disabled style="height: 25px !important; width: 70%">
                      </select>
                    </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button"  class="btn btn-default pull-right" id="btnMoreFilter">Save </button> 
              <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div>
        </div>
      
    </div>
</div>
<script src="js/highlight.js"></script>
<script>
  
</script>
<script type="text/javascript" src="script/search-msmea.js"></script>
   
<?php
    include 'includes/footer.php';
?>

<script src="js/investment-range4.js"></script>