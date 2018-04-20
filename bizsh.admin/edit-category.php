<?php
  include 'includes/session.php';
  include 'includes/head.php';
  include 'includes/navdefault.php';
?>

<link rel="stylesheet" href="css/containera4.css">

<div class="container m-t-100 m-b-50">   
    <div id="loadthis"></div>
      <div class="container login-content">
      <h1 id="confirm"></h1>
        <h1 class="title">Update Category</h1>

      <form class="edit-category-form" id="editCategoryForm" method="post">
        <input hidden id="cat_id" name="cat_id" value="<?php echo(isset($_GET['id']) ? $_GET['id'] : "")?>" />
        <input type="text" class="m-b-20" id="cat_name" name="cat_name" placeholder="Category name" />
      
        <input type="submit" class="register-buttton btnL" id="btnLogin" value="Update Category" name="btnLogin">
          <span> 
          <div class="via-email">
          <!--   <span>New to VenturePals? <a href="register-investor">Create Account</a> </span> -->
          </div>
        </span>
      </form>
      </div>
</div>


 <script src="script/edit-category.js"></script>  
<?php
    include 'includes/footer.php';
?>