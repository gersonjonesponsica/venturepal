<?php
  include 'includes/session.php';
  include 'includes/head.php';
  include 'includes/navdefault.php';
?>
<style>
    #user{
        position: relative; 
    }

    #user a {
      position: absolute;
      right: 10px;
      top: 5px;
      -webkit-appearance: none;
      -moz-appearance: none;
      border: none;
      background: white;
      border-radius: 3px;
      padding: 5px;
      transition: all .2s;
    }

</style>
<div id="main-content" style="margin-top: 100px">
  <div class="wrapper">
    <div id="loadthis"></div>
    <div class="container-content">
    <h1 id="confirm"></h1>
    <h1>Add Admin</h1>

      <form class="add-admin-form" id="addAdminForm" method="post">
      <div id="user">
        <input type="text" class="inputText" id="username" name="username" placeholder="Username" />
        <a href="" hidden id="edit-username">Edit</a>
      </div>

      <div id="basic" hidden>
        <input type="text" class="inputText" id="fname" name="fname" placeholder="Given name" />
        <input type="text" class="inputText" id="lname" name="lname" placeholder="Family name" />
        <input type="email" class="inputText" id="email" name="email" placeholder="Email" />
        <input type="password" class="inputText" id="password" name="password" placeholder="Password" />
        <input type="password" class="inputText" id="repassword" name="repassword" placeholder="Repeat Password" />
        <button type="submit" class="btn btn-success"> Add Admin</button> 
        <a href="admin-list" class="btn btn-warning">Cancel</a>
      </div>
      </br>

      </form>
    </div>
  </div>
</div>
<script src="script/add-admin.js">

</script>

<?php
    include 'includes/footer.php';
?>




