<?php
require "db.php";?>

<div class="row"><h2 class="text-center">All Products </h2><hr>
<div class="col-md-12">
  <!-- Response Box for AJAX Feedback -->
<div id="response-box" class="container mt-3 d-none">
    <div class="alert" role="alert" id="response-message"></div>
    <!-- All Products menu -->
</div>
    <div class="box rounded shadow p-3">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#Id</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Qty.</th>
      <th scope="col">Product Price</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <!-- php code -->
    <?php 
    $product_data=$db->query("SELECT * FROM products");
    while($prd_array=$product_data->fetch_assoc()){
        echo "<tr>
        <td>".$prd_array['id']."</td>
        <td><img src='product_images/".$prd_array['product_img']."' width='15%' class='rounded shadow-sm'></td>
        <td>".$prd_array['product_name']."</td>
        <td>".$prd_array['product_quantity']."</td>
        <td>".$prd_array['product_amount']."</td>
        <td><i class='fa-duotone fa-regular fa-pen-to-square mx-2 fs-5 prd-edit-icon' id='".$prd_array['id']."'></i></td>
        <td><i class='fa-solid fa-trash mx-3 fs-5 prd-del-icon text-danger' id='".$prd_array['id']."'></i></td>
        </tr>";
    }
    ?>
  </tbody>
</table>
</div></div></div>

<!-- Modal -->
<div class="modal fade" id="prd-edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="edit-prd-form">
            <div class="edit-form-group">
            <label for="edit_prd_category" class="my-1">Product Category</label>
            <select name="edit_prd_category" id="edit_prd_category" class="form-control mb-2">
                    <option value="none">None</option>
    <?php 
    $data=$db->query("SELECT * FROM category");
    while($array=$data->fetch_assoc()){
        echo "<option value='".$array['category_url']."'>".$array['category_name']."</option>";}?>
                </select>
            <label for="edit_prd_image" class="my-1">Product Image</label>
            <input type="file" name="edit_prd_image" id="edit_prd_image" class="form-control mb-2" accept="image/*">
            <!-- <td>".$array['category']."</td> -->
                <label for="edit_prd_name" class="my-1">Product name</label>
                <input type="text" name="edit_prd_name" id="edit_prd_name" placeholder="Enter new product name" class="form-control mb-2">

                <label for="edit_prd_des" class="my-1">Product Description</label>
                <textarea name="edit_prd_des" id="edit_prd_des" class="form-control mb-2"></textarea>
                
                <label for="edit_prd_qty" class="my-1">Product Qty</label>
                <input type="number" name="edit_prd_qty" id="edit_prd_qty" placeholder="Enter new quantity" class="form-control mb-2">

                <label for="edit_prd_amt" class="my-1">Product Price</label>
                <input type="number" name="edit_prd_amt" id="edit_prd_amt" placeholder="Enter new product price" class="form-control mb-2">
                <input type="hidden" id="edit_prd_id" name="edit_prd_id"> 
                <input type="hidden" id="old_prd_pic" name="old_prd_pic">    
            </div>
                <button class="btn btn-primary btn mt-2 edit_prd_btn">Save changes</button>
        </form>
    </div>
  </div>
</div>

<!-- css -->
<style>
td i{cursor: pointer;}
.box{height: auto;}
#category_name{cursor:pointer;}
</style>

<script>
  // Product  edit btn
$(".prd-edit-icon").each(function(){
    $(this).click(function(){
        var product_id=$(this).attr("id");
        $.ajax({
            type:"POST",
            url:"pages/product_data.php",
            data:{
                product_id:product_id
            },
            success:function(res){
                product_data=JSON.parse(res);
                var myModal = new bootstrap.Modal('#prd-edit-modal');
                myModal.show();
                $("#edit_prd_category").val(product_data.category);
                $("#edit_prd_name").val(product_data.product_name);
                $("#edit_prd_des").val(product_data.product_description);
                $("#edit_prd_qty").val(product_data.product_quantity);
                $("#edit_prd_amt").val(product_data.product_amount);
                $("#edit_prd_id").val(product_data.id);
                $("#old_prd_pic").val(product_data.product_img);
            }
        });
    });
    // Product edit btn submit
$(".edit-prd-form").submit(function(event){
event.preventDefault();
$.ajax({
    type:"POST",
    url:"pages/update_product.php",
    data:new FormData(this),
    contentType:false,
    processData:false,
    beforeSend:function(){
        $(".edit_prd_btn").html("Updating...");
    },
    success:function(res){
      $("#prd-edit-modal").modal("hide");
      $("#response-box").removeClass("d-none");
      $("#response-message").removeClass().addClass('alert alert-success').text(res);
      setTimeout(function(){
        $("#response-box").addClass("d-none");
        $(".all-products-menu").click();
      },2500);
    }
});
});
});
</script>