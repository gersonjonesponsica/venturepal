<?php
    
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
      <div class="container login-content">
      <h1 id="confirm"></h1>
        <h1 class="title">Add Subcategory</h1>

      <form class="add-subcategory-form" id="addSubcategoryForm" method="post">
          <a href="javascript:void(0);" class="openPopup" ><img id="img-icon" class="m-b-10" style="margin-right: 40% !important; margin-left: 40% !important" src="img/default.png" width="100" height="100">   </a>
          
          <input type="text" class="m-b-20" id="sub_name" name="sub_name" placeholder="Subategory name" />
         <input type="text" class="m-b-20" id="icon" name="icon" hidden/>
         
         <select  id="category" name="category" class="form-control custom-select" style="height: 10% !important;">
          <option>Select Category</option>
          <?php foreach ($category as $c):?>
            <option value="<?php echo $c['cat_id'] ?>"> <?php echo $c['cat_name']?></option>
          <?php endforeach; ?>
        </select>
        <input type="submit" class="register-buttton btnL" id="btnLogin" value="Add Subcategory" name="btnLogin">
       
          <span> 
          <div class="via-email">
          <!--   <span>New to VenturePals? <a href="register-investor">Create Account</a> </span> -->
          </div>
        </span>
      </form>
      </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              Choose Icon
            </div>
            <div class="modal-body">

            <div class="container" id="icon_list">
              <div class="row">
                  <!-- <div class="col-sm-4 m-t-10 ">
                    
                  </div> -->
              </div>
              </div>
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
                
            </div>
        </div>
      
    </div>
</div>
<script>
var src ;
   $(document).ready(function(){
      $('.openPopup').on('click',function(){
           var datafields = [];
           bodyDatas = '';
           datafields.push({"name": "action" , "value": "Get Icons"});

           $.ajax({
             type: "POST",
             url: "controller/IconController.php",
             data: datafields,
             success: function(data){
               console.log(data);
               data = JSON.parse(data);
               src = '';
               for(i in data){
                 a = data[i];
                 src = a.icon_location.substring(3,a.icon_location.length) + a.icon_name;
                 bodyDatas += '<div class="m-t-10 " col-sm-4 data-file-index="'+i+'">';
                 bodyDatas += '<a href="javascript:;" onclick="choice(this)" data-file="'+src+'"data-id="'+a.icon_id+'" class="m-r-10 icon-img-list"><img class="icon-img-list" width="100" height="100" src='+src+'></a>';
                 bodyDatas += '</div>';
               }
               
               $('#icon_list .row').html(bodyDatas);
               $('#myModal').modal({show:true});
             }
           });
           //$('.modal-body').load(cat_id,function(){
            //   $('#myModal').modal({show:true});
          // });
      }); 
  });
   function choice(element){
    var icon_id = $(element).attr('data-id');
    var icon_loc = $(element).attr('data-file');
    $('#icon').val(icon_id);
    $('#img-icon').attr('src', icon_loc);
    $('#myModal').modal('hide');
   }
</script>
 <script src="script/add-subcategory3.js"></script>
 <?php
  include 'includes/footer.php';
 ?>
