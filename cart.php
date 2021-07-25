<?php
include('header.php');
?>



<h1 class="text-center text-info">Order Details</h1>
    <table border="2" align="center" class="" width="50%" height="">
        <thead>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </thead>
        <tbody>


           <?php
                
                $total = 0;

                if(!empty($_SESSION['cart'])){
                    $total = 0;
                    // print_r($_SESSION['cart']);
                    foreach($_SESSION["cart"] as  $key=>$value){

               
 
           ?>
           
            <td><?php  echo $value['item_name']; ?></td>
            <td><?php  echo $value['item_quantity']; ?></td>
            <td><?php  echo $value['price']; ?></td>
            <td><?php echo number_format($value['item_quantity']*$value['price'],2);  ?></td>
        
          
            <td><a href="remove.php?data=<?php echo $key; ?>&item_name=
            <?php echo $value['item_name'];
             ?>">Remove</a></td>

            
        </tbody>
        
            <?php
$total = $total + ($value["item_quantity"] * $value['price']);
}


}
?>

    </table>
    <div class="container bg-info card w-25 my-4 text-center">
<?php


echo  "Total ".$total;

?>

</div>

<?php if(isset($_SESSION['cart'][0])){  ?>
<form method="post" action="purchase.php">
<div class="container card col-lg-3 my-4 text-center p-4">
<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
  <div class="card-body">
    <h5 class="card-title text-dark">Order Now</h5>
   <input type="radio" name="Payment_Method_COD" required="" value="COD">Cash On Delivery <br>
   <input type="radio" name="Payment_Method_COD" value="Esewa" required="" disabled="">E-sewa
  </div>
</div>

<div class="row mb-3">
  <div class="col-sm-10">
    <input type="text" class="form-control form-control-sm" name="Name" id="colFormLabelSm" placeholder="Enter your name">
  </div>
</div>
<div class="row mb-3">
  <div class="col-sm-10">
    <input type="" name="phone_number" class="form-control" id="colFormLabel" placeholder="Phone Number">
  </div>
</div>
<div class="row">
  <div class="col-sm-10">
    <input type="text" class="form-control form-control-lg" name="Address" id="colFormLabelLg" placeholder="Address">
  </div>-
</div>
<button class="mt-2" type="submit" name="purchase">Continue Shopping</button>

</form>
<?php } ?>

<?php

include('footer.inc.php');

?>