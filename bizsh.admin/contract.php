
<?php

    include 'common/config.php';
    include 'model/AdminDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';

    $admin_db = new AdminDB();
    $admin = $admin_db->getAllAdmin();
?>

 <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
<div class="container ">
    <div class="container p-15" style="margin-top: 50px">
        <textarea cols="80" id="editor1" name="editor1" rows="10" >&lt;p&gt;This is some &lt;strong&gt;sample text&lt;/strong&gt;. You are using &lt;a href="http://ckeditor.com/"&gt;CKEditor&lt;/a&gt;.&lt;/p&gt;
    </textarea>
    </div>
</div>

<script>
        CKEDITOR.replace( 'editor1', {
            // Define the toolbar groups as it is a more accessible solution.
            // toolbarGroups: [
            //     {"name":"basicstyles","groups":["basicstyles"]},
            //     {"name":"links","groups":["links"]},
            //     {"name":"paragraph","groups":["list","blocks"]},
            //     {"name":"document","groups":["mode"]},
            //     {"name":"insert","groups":["insert"]},
            //     {"name":"styles","groups":["styles"]},
            //     {"name":"about","groups":["about"]},
            //     { "name": 'colors' },
            //     // { "name" 'Cut' }
            // ],

            
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        } );
    </script>

 <?php
  include 'includes/footer.php';
 ?>