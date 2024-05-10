<?php
session_start();
include('header.php');
include("config.php");




if(isset($_SESSION['userid'])){
	$userid=$_SESSION['userid'];
	$total=$_SESSION['total'];
	$_SESSION['total'] = 0; // Setting a default value for total

	// echo $userid;
?>

<style>
    /* Adjust input size */
    .input {
        width: 80%; /* Change the width as needed */
        padding: 10px; /* Add padding for better readability */
        margin-bottom: 20px; /* Add margin to separate inputs */
    }

    /* Adjust textarea size */
    .order-notes textarea {
        width: 80%; /* Change the width as needed */
        height: 150px; /* Change the height as needed */
        padding: 100px; /* Add padding for better readability */
        margin-bottom: 20px; /* Add margin to separate inputs */
    }
</style> 
<!DOCTYPE html>
<html lang="en">

	<?php
	
	if(isset($_POST['place']) && $_SERVER['REQUEST_METHOD']=="POST"){
		// $userid=$_SESSION['userid'];
		$username= mysqli_real_escape_string($connection, $_POST['username']);
		$email= mysqli_real_escape_string($connection, $_POST['email']);
		$address= mysqli_real_escape_string($connection, $_POST['address']);
		$city= mysqli_real_escape_string($connection, $_POST['city']);
		$country= mysqli_real_escape_string($connection, $_POST['country']);
		$zipcode= mysqli_real_escape_string($connection, $_POST['zipcode']);
		$phone= mysqli_real_escape_string($connection, $_POST['phone']);
		$cardholder= mysqli_real_escape_string($connection, $_POST['carholder']);
		$cardno= mysqli_real_escape_string($connection, $_POST['cardno']);
		$cvc= mysqli_real_escape_string($connection, $_POST['cvc']);
		$expiry= mysqli_real_escape_string($connection, $_POST['expiry']);
		// $date= mysqli_real_escape_string($connection, $_POST['date']);


	$checkoutlist=" INSERT INTO `orderlist`( `username`, `userid`, `email`, `address`, `city`, `country`, `zipcode`, `phone`,`total`) VALUES ('$username', '$userid','$email','$address','$city','$country','$zipcode','$phone','$total');";
	$res=mysqli_query($connection,$checkoutlist) or die("failed");


	if($res){
// $getinsertedorder=mysqli_insert_id($connection);
	$order_id=mysqli_insert_id($connection);
		$payment="INSERT INTO `billing`( `cardholder`, `cardno`, `expiry`, `cvc`, `userid`, `order_id`,`total_amount`) VALUES ('$cardholder','$cardno','$expiry','$cvc','$userid','$order_id','$total');";
			$billing=mysqli_query($connection,$payment) or die("failed");
if($billing){
	$payment_id=mysqli_insert_id($connection);
	$_SESSION['order_id']=$order_id;
	$_SESSION['payment_id']=$payment_id;
	echo "<script>alert('Payment Success.!..!.')
	window.location.href='pdf.php';
    </script>;";

}else{
	echo "<script>alert('Something went wrong.!')  </script>;";
}}else{
	echo "<script>alert('Something went wrong.!.')  </script>;";
}
	}
	
	
	?>
	<body>
		

	

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<!-- <ul class="breadcrumb-tree">
							<li><a href="">Home</a></li>
							<li class="active">Checkout</li>
						</ul> -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
						<form action="" method="post">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							
							<div class="form-group">
								<input class="input" type="text" name="username" required placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" required placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" required placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" required placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" required placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zipcode" placeholder="ZIP Code"
								min="4" max="20"  required>
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="phone"  placeholder="Telephone"
								maxlength="16" required>
							</div>

							<div class="section-title">
								<h3 class="title">Billing Details</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="carholder" required placeholder="carholder" required>
							</div>
							
							<div class="form-group">
								<input class="input" type="number" name="cardno" required placeholder="cardno" minlength="16" maxlength="16" required>
							</div>
							<div class="form-group">
								<input class="input" type="date" name="expiry" required placeholder="expiry"  required>
							</div>
							<div class="form-group">
								<input class="input" type="number" name="cvc" required placeholder="cvc"  required>
							</div>
							
							<div class=" order-details">
							<a><input type="submit" name="place" class="primary-btn order-submit" value="Place Order"></a>		
						</div>			
							</form>
							
							<!-- <div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										Create Account?
									</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
										<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
								</div>
							</div> -->
						</div>
						<?php
 }else{

 echo("<script>window.location.href=signup.php</script>"); 
}

?>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<!-- <div class="shiping-details">
							<div class="section-title">
								<h3 class="title">Shiping address</h3>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									Ship to a diffrent address?
								</label>
								<div class="caption">
									<form action="" method="post">
									<div class="form-group">
										<input class="input" type="text" name="first-name" placeholder="First Name">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="last-name" placeholder="Last Name">
									</div>
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Address">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="city" placeholder="City">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="country" placeholder="Country">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
									</div>
									<div class="form-group">
										<input class="input" type="tel" name="tel" placeholder="Telephone">
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-danger" name="place">Place Order</button>
									</div>
									</form>
								</div>
							</div>
						</div> -->
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<?php
								
								$userid=$_SESSION['userid'];
$getbookItems = "SELECT * FROM `cart` AS c INNER JOIN `add-books` AS b ON c.book_id = b.book_id WHERE c.user_id = $userid ORDER BY c.cart_id DESC";
$getbookItems_run = mysqli_query($connection, $getbookItems) or die("Failed to fetch cart items");

    if(mysqli_num_rows($getbookItems_run) > 0){
        ?>
        <tbody>
        <?php
        $i=1;
		$subtotal=$_SESSION['total'];
       
        while($bookItem=mysqli_fetch_assoc($getbookItems_run)){
        $id=$bookItem['book_id'];
       
        ?>
								
								
								<div class="order-col">
									<div><?=$bookItem['book_title']?></div>
                                    <div>$<?=$bookItem['category']?></div>
                                    <div>$<?=$bookItem['book_discription']?></div>
									<div>$<?=$bookItem['author']?></div>
									<div>$<?=$bookItem['book_img']?></div>
                                    <div>$<?=$bookItem['book_price']?></div>
									<div>$<?=$bookItem['book_status']?></div>
								</div>
								<?php
								
		}}else{
			?>
								
								
			<div class="order-col">
				<div>Nothing to show</div>
				
			</div>
			<?php
		}

								
								?>
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">$<?=$total?></strong></div>
							</div>
						</div>
						
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<!-- <a href="#" name="placeorder" class="primary-btn order-submit">Place order</a> -->
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		
        <?php
  include('footer.php');
  ?>
    <!--================ End footer Area  =================-->

    