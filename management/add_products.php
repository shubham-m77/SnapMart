<?php 
require "db.php";
?>
<div class="row">
<h2 class="text-center">Products</h2>
<hr>

<div class="col-3"></div>
<!-- Add Products Form -->
<div class="col-md-6">
    <div class="box rounded shadow p-3 bg-light"><h3>Add Products</h3>
        <form class="add-product-form">
            <hr>
                <label for="category_name fs-3 py-2">Select Category</label>
                 <select name="category_name" id="category_name" class="form-control mb-2 my-1">
                    <option value="none">None</option>
                    <!-- php code -->
    <?php 
    $data=$db->query("SELECT * FROM category");
    while($array=$data->fetch_assoc()){
        echo "<option value='".$array['category_url']."'>".$array['category_name']."</option>";}?>
                </select>
                <label class="py-1">Select Product Img</label>
                <input type="file" class="form-control mb-2" name="product_img" accept="image/*">
                <label class="py-1">Product Name</label>
                <input type="text" class="form-control mb-2" name="product_name">
                <label class="py-1">Product Desciption</label>
                <textarea name="product_description" class="form-control mb-2"></textarea>
                <label class="py-1">Product Qty.</label>
                <input type="number" class="form-control mb-2" name="product_qty">
                <label class="py-1">Product Amount</label>
                <input type="number" class="form-control mb-2" name="product_amt">
                <button class="btn btn-primary btn-md add-prdt-btn">Add Product</button>
        </form></div>
    </div>
    <div class="col-3"></div>
</div>
<!-- Response Box for AJAX Feedback -->
<div id="response-box" class="container mt-3 d-none">
    <div class="alert" role="alert" id="response-message"></div>
<!-- end -->

<!-- css -->
<style>
td i{cursor: pointer;}
.box{height: auto;}
#category_name{cursor:pointer;}
</style>
<script>
// Product Add coding
$(".add-product-form").submit(function(a){
a.preventDefault();
$.ajax({
  type:"POST",
  url:"pages/add_prdt.php",
  data:new FormData(this),
  processData:false,
  contentType:false,
  beforeSend:function(){
    $(".add-prdt-btn").html("Adding...");
    $(".add-prdt-btn").attr("disabled");
  },
  success:function(res){
    if(res.trim() !="Data not Stored"){
      $("#response-box").removeClass("d-none");
      $("#response-message").removeClass().addClass('alert alert-success').text(res);
      setTimeout(function(){
        $("#response-box").addClass("d-none");
        $(".add-prdt-btn").html("Add Product");
        $(".add-prdt-btn").removeAttr("disabled");
        $(".add-product-form").trigger('reset');
        $(".all-products-menu").click()
      },2500);
        
    }
  else{
    alert(res);
  }
  
  }
});
});
</script>