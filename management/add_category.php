<?php 
require "db.php";
?>
<div class="row"><h2 class="text-center">Category</h2>
<hr>
    <div class="col-md-7">
    <div class="box rounded shadow p-3">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#Id</th>
      <th scope="col">Category name</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <!-- php code -->
    <?php 
    $data=$db->query("SELECT * FROM category");
    while($array=$data->fetch_assoc()){
        echo "<tr>
        <td>".$array['id']."</td>
        <td>".$array['category_name']."</td>
        <td><i class='fa-duotone fa-regular fa-pen-to-square mx-2 fs-5 edit-icon' id='".$array['id']."'></i></td>
        <td><i class='fa-solid fa-trash mx-3 fs-5 del-icon text-danger' id='".$array['id']."'></i></td>
        </tr>";
    }
    ?>
  </tbody>
</table>
</div></div>
<div class="col-md-5">
    <div class="box rounded shadow p-3 bg-light"><h3>Add Category</h3>
        <form class="cat-form">
            <hr>
            <div class="form-group py-1">
                <label for="category_name fs-3 mb-2">Categories</label>
                <input type="text" name="category_name" id="category_name" placeholder="Enter Category Name" class="form-control my-1">
                </div>
                <button class="btn btn-primary btn-sm">Select</button>
        </form></div>
    </div>
   
</div>

<!-- Modal -->
<div class="modal fade" id="cat-edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="edit-cat-form">
            <div class="edit-form-group">
                <label for="category_name fs-3 mb-2">Category name</label>
                <input type="text" name="edit_cat_name" id="edit_cat_name" placeholder="Enter Category Name" class="edit-input form-control my-1">
                <input type="hidden" id="edit_cat_id" name="edit_cat_id">    
            </div>
                <button class="btn btn-primary btn mt-2 edit_cat_btn">Save changes</button>
        </form>
    </div>
  </div>
   <!-- Response Box for AJAX Feedback -->
 <div id="response-box" class="container mt-3 d-none">
    <div class="alert" role="alert" id="response-message"></div>
</div>
<!-- css -->
<style>
td i{cursor: pointer;}
.box{height: auto;}
</style>
<script>

$(document).ready(function(){
// Category name sending
    $(".cat-form").submit(function(e){
e.preventDefault();
$.ajax({
    type:"POST",
    url:"pages/add_category.php",
    data:new FormData(this),
    processData:false,
    contentType:false,
    beforeSend:function(){
    $(".btn-sm").html("Please wait...");
    $(".btn-sm").attr("disabled");
    },
    success:function(res){
        $(".btn-sm").html("Select");
        $(".btn-sm").removeAttr("disabled");
        $("#response-box").removeClass("d-none");
      $("#response-message").removeClass().addClass('alert alert-success').text(res);
      setTimeout(function(){
        $("#response-box").addClass("d-none");
        $(".category-menu").click();
      },2500);
    }
    
});
});
// category edit
$(".edit-icon").each(function(){
    $(this).click(function(){
        var cat_id=$(this).attr("id");
        $.ajax({
            type:"POST",
            url:"pages/cat_data.php",
            data:{
                cat_id:cat_id
            },
            success:function(res){
                cat_data=JSON.parse(res);
                var myModal = new bootstrap.Modal('#cat-edit-modal');
                myModal.show();
                $(".edit-input").val(cat_data.category_name);
                $("#edit_cat_id").val(cat_data.id);
            }
        });
    });
});
// Category edit submit
$(".edit-cat-form").submit(function(e){
e.preventDefault();
$.ajax({
    type:"POST",
    url:"pages/update_cat.php",
    data:new FormData(this),
    contentType:false,
    processData:false,
    beforeSend:function(){
        $(".edit_cat_btn").html("Updating...");
    },
    success:function(res){
        $("#cat-edit-modal").modal("hide");
        $("#response-box").removeClass("d-none");
      $("#response-message").removeClass().addClass('alert alert-success').text(res);
      setTimeout(function(){
        $("#response-box").addClass("d-none");
        $(".category-menu").click();
      },2500);
    }
});
});
});
</script>

