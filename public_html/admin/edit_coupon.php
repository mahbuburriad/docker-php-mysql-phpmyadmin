<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

    <?php

if(isset($_GET['edit_coupon'])){

$edit_id = $_GET['edit_coupon'];

$edit_coupon = "select * from coupons where coupon_id='$edit_id'";

$run_edit = mysqli_query($con,$edit_coupon);

$row_edit = mysqli_fetch_array($run_edit);

$c_id = $row_edit['coupon_id'];

$c_title = $row_edit['coupon_title'];

$c_price = $row_edit['coupon_price'];

$c_code = $row_edit['coupon_code'];

$c_limit = $row_edit['coupon_limit'];

$c_used = $row_edit['coupon_used'];

$p_id = $row_edit['product_id'];

$get_products = "select * from products where product_id='$p_id'";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_array($run_products);

$product_id = $row_products['product_id'];

$product_title = $row_products['product_title'];


}


?>

        <div class="row">

            <div class="col-lg-12">

                <ol class="breadcrumb">
                    <li class="active">

                        <i class="fa fa-dashboard"> </i> Dashboard / Edit Coupon

                    </li>

                </ol>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-heading">

                        <h3 class="panel-title">

                            <i class="fa fa-money fa-fw"> </i> Edit Coupon

                        </h3>

                    </div>

                    <div class="panel-body">

                        <form class="form-horizontal" method="post" action="">

                            <div class="form-group">

                                <label class="col-md-3 control-label"> Coupon Title </label>

                                <div class="col-md-6">

                                    <input type="text" name="coupon_title" class="form-control" value="<?php echo $c_title; ?>">

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-md-3 control-label"> Coupon Price </label>

                                <div class="col-md-6">

                                    <input type="text" name="coupon_price" class="form-control" value="<?php echo $c_price; ?>">

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-md-3 control-label"> Coupon Code </label>

                                <div class="col-md-6">

                                    <input type="text" name="coupon_code" class="form-control" value="<?php echo $c_code; ?> ">

                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Coupon Limit </label>

                                <div class="col-md-6">

                                    <input type="number" name="coupon_limit" value="<?php echo $c_limit; ?>" class="form-control">

                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Select Coupon For Product </label>

                                <div class="col-md-6">

                                    <select name="product_id" class="form-control">

<option value="<?php echo $product_id; ?>"> <?php echo $product_title; ?> </option>


<?php

$get_p = "select * from products where status='product'";
$run_p = mysqli_query($con,$get_p);
while($row_p = mysqli_fetch_array($run_p)){
$p_id = $row_p['product_id'];
$p_title = $row_p['product_title'];
$p_price = $row_p['product_price'];
echo "<option value='$p_id'> $p_title - $p_price Taka</option>";
}

?>



</select>

                                </div>

                            </div>
                            <div class="form-group">

                                <label class="col-md-3 control-label"> </label>

                                <div class="col-md-6">

                                    <input type="submit" name="update" class=" btn btn-primary form-control" value=" Update Coupon ">

                                </div>

                            </div>

                        </form>
                    </div>

                </div>

            </div>

        </div>
        <?php

if(isset($_POST['update'])){
$coupon_title = $_POST['coupon_title'];
$coupon_price = $_POST['coupon_price'];
$coupon_code = $_POST['coupon_code'];
$coupon_limit = $_POST['coupon_limit'];
$product_id = $_POST['product_id'];
$update_coupon = "update coupons set product_id='$product_id',coupon_title='$coupon_title',coupon_price='$coupon_price',coupon_code='$coupon_code',coupon_limit='$coupon_limit',coupon_used='$c_used' where coupon_id='$c_id'";
$run_coupon = mysqli_query($con,$update_coupon);

if($run_coupon){
echo "<script>alert('One Coupon Has Been Updated')</script>";
echo "<script>window.open('index.php?view_coupons','_self')</script>";

}


}

?>

            <?php } ?>
