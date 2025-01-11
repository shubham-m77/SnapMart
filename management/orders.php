<?php 
require "db.php";
?>
<h2 class="text-center">Orders</h2>
<hr>
<!-- Select Orders -->
 <div class="row">
    <div class="col-md-12">
        <div class="box p-3">
            <form class="d-flex align-items-center order-form">
                <h5>Show by Order Status:</h5>
                <select name="order_status" class="form-control w-25 mx-3">
                    <option value="">All</option>
                    <option value="pending">Pending</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="delivered">Delivered</option>
                </select>
                <input type="date" name="order_date" class="form-control form-control-sm  mx-2 w-25">
                <button class="btn btn-sm btn-primary" type="submit">Search Order</button>
            </form>
        </div>
    </div>
 </div>
 <!-- Table -->
<div class="row">
<div class="col-md-12">
    <div class="box rounded shadow p-3">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Product Img</th>
      <th scope="col">Product Name</th>
      <th scope="col"> Qty.</th>
      <th scope="col">Price</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Mobile No.</th>
      <th scope="col">Address</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Order Status</th>
    </tr>
  </thead>
  <tbody>
    <!-- php code -->
    <?php 
    $data=$db->query("SELECT * FROM received_order");
    while($array=$data->fetch_assoc()){
        echo "<tr>
        <td>".$array['id']."</td>
        <td><img src='product_images/".$array['prd_img']."' width='100px'></td>
        <td>".$array['prd_name']."</td>
        <td>".$array['prd_qty']."</td>
        <td>".$array['prd_amount']."</td>
        <td>".$array['c_name']."</td>
        <td>".$array['c_mobile']."</td>
        <td>".$array['c_address'].", ".$array['c_city']." ".$array['c_state'].", ".$array['c_pincode']." ".$array['c_del_instructions']."</td>
        <td>".$array['payment_status']."</td>
        <td>".$array['order_status']."</td>
        </tr>";
    }
    ?>
  </tbody>
</table>
</div>
</div>
<style>
    table{font-family:montserrat;}
    th{font-size: 16px;}
    td{font-size:14px;}

</style>

<script>
    $(document).ready(function(){
        $(".order-form").submit(function(event){
            event.preventDefault();
            $.ajax({
                type:"POST",
                url:"pages/check_order.php",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(res){
                    $("tbody").empty();
                    var data=JSON.parse(res);
                    var i;
                    var pay_status="";
                    for(i=0;i<data.length;i++){
                        // payment status check
                            if (data[i].payment_status == "Pending") {
                        pay_status = "<div class='d-flex align-items-center flex-column justify-content-center me-4'><i class='fas fa-exclamation-circle fs-2 text-warning'></i><button class='mt-1 btn btn-sm btn-primary update' oid='"+data[i].id+"' btn_type='payment_status'><i class='fa-solid fa-pen-to-square fs-6'></i></button></div>";
                    } else if (data[i].payment_status == "Completed") {
                        pay_status = "<div class='d-flex align-items-center flex-column justify-content-center me-4'><i class='fas fa-check-circle fs-2 text-success'></i></div>";}
                    
                    
                            if (data[i].order_status == "pending") {
                        o_status = "<div class='d-flex align-items-center flex-column justify-content-center me-4'><i class='fas fa-exclamation-circle fs-2 text-warning'></i><button class='mt-1 btn btn-sm btn-primary update' oid='"+data[i].id+"' btn_type='order_status'><i class='fa-solid fa-pen-to-square fs-6'></i></button></div>";
                    } else if (data[i].order_status == "Delivered") {
                        o_status = "<div class='d-flex align-items-center flex-column justify-content-center me-4'><i class='fas fa-check-circle fs-2 text-success'></i></div>";}
                      
                        var row = "<tr>" +
                                  "<td>" + data[i].id + "</td>" +
                                  "<td><img src='product_images/" + data[i].prd_img + "' width='100px'></td>" +
                                  "<td>" + data[i].prd_name + "</td>" +
                                  "<td>" + data[i].prd_qty + "</td>" +
                                  "<td>" + data[i].prd_amount + "</td>" +
                                  "<td>" + data[i].c_name + "</td>" +
                                  "<td>" + data[i].c_mobile + "</td>" +
                                  "<td>" + data[i].c_address + ", " + data[i].c_city + " " + data[i].c_state + ", " + data[i].c_pincode + " " + data[i].c_del_instructions + "</td>" +
                                  "<td class='text-center'>" +pay_status+"</td>" +
                                  "<td>" + o_status + "</td>" +
                                  "</tr>";
                        $("tbody").append(row);}
                        // Use event delegation to bind the click event for dynamically added buttons
                $(".update").each(function(){
                    $(this).click(function(){
                        var parent=this.parentElement;
                        var oid = $(this).attr("oid");
                    var type = $(this).attr("btn_type");
                    $.ajax({
                        type:"POST",
                        url:"pages/update_order.php",
                        data:{
                            oid:oid,
                            btn_type:type
                        },
                        success:function(response){
                            alert(response);
                            $(parent).html("<div class='d-flex align-items-center flex-column justify-content-center me-4'><i class='fas fa-check-circle fs-2 text-success'></i></div>");
                            
                        }
                    })
                    });
                   
                });
                }

            });
        });

    });
</script>
<div class='d-flex align-item-center'>