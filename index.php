<?php

include('header.php');


$con = mysqli_connect('localhost','root','','onlineshop');

if(isset($_POST['add'])){   
    if(isset($_SESSION['cart'])){
    $my_items = array_column($_SESSION['cart'],'item_name');
     if(in_array($_POST['name'],$my_items)){
      echo "<script>"."alert('item already added')"."</script>";
  }
  else{
    $count = count($_SESSION['cart']);
    echo $_POST['name'];
    $item_array = array(
      'item_name' => $_POST['name'],
      'price' => $_POST['price'],
      'item_quantity' => $_POST['quantity']
    );
    $_SESSION['cart'][$count] = $item_array;
    echo "<script>"."alert('item added')"."</script>";

      
  }

        }
    else{
        $info = array(
            'item_name' => $_POST['name'],
            'price' => $_POST['price'],
            'item_quantity' => $_POST['quantity']
        );
        $_SESSION['cart'][0] = $info;
        print_r($_SESSION['cart']);
    echo "<script>"."alert('item added')"."</script>";

    }
}

?>



    <div class="row container d-flex m-auto w-auto">


        <?php

$getItemsQuery = "SELECT * FROM items";
$q = mysqli_query($con,$getItemsQuery);
while($data = mysqli_fetch_assoc($q)){
   
?>

        <div class="card col-lg-4 col-md-3 col-sm-12 m-4 shadow-lg" style="">
            <img src="items/<?php echo $data['image'] ?>" class="card-img-top img-responsive m-auto p-4" alt="..."
                style="width:18rem;height:18rem;">
            <div class="card-body">
                <h5 class="card-title text-center text-primary"><?php echo $data['name'] ?></h5>
                <h5 align="center">Price <?php echo $data['price'] ?></h5>
                <form action="" method="post">
                    <input type="number" max="2" class="w-50" min="1" name="quantity" placeholder="How many order" required="">
                    <input type="submit" name="add" value="Add to cart">
                    <input type="hidden" name="name" value="<?php echo $data['name'] ?>">
                    <input type="hidden" name="price" value="<?php echo $data['price'] ?>">
                    <!-- <input type="hidden" name="id" value="<?php echo $data['id'] ?>"> -->
                </form>
            </div>
        </div>

        <?php
}
?>
    </div>




</div>

<script src="js/bootstrap.min.js"></script>

</html>


<?php

include('footer.inc.php');

?>