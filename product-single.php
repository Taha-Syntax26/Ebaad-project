<?php
session_start();
  include('header.php');

  include('config.php');  
 ?>
<!-- inline css -->
<style>
.books #title{
 margin-top:15px;
 padding:10px;
}
</style>

 <!--================ Start Products fatch through database =================-->
 <section class="about_area section_gap">
   <div class="container">
     <div>
      <a href="books.php" class="btn btn-warning my-3"><i class="fa-solid fa-backward-step px-1"></i>Back</a>
     </div>
        <?php
        if(isset($_GET['id'])){
          $pro_id = $_GET['id']; 
          
        }else{
          $pro_id = '1'; 
        }
        
          $fetch="SELECT * from `add-books` where `book_id` = '$pro_id'";
          $query=mysqli_query($connection,$fetch);
          if(mysqli_num_rows($query)>0){
            $row=mysqli_fetch_assoc($query)
        ?>

        <div id="pro_container" class="row h_blog_item">
          <div id="alert"></div>
          <div class="col-lg-6">
            <div class="h_blog_img">
              <img class="img-fluid" id="img" src="<?php echo 'adminpanel/books-images/' . $row['book_img'] ?>" alt="" />
            </div>
          </div>
          <div class="col-lg-6 books mt-5">
            <div class="h_blog_text">
              <div class="h_blog_text_inner left right">
                <input  id="bookid" value="<?php echo $row['book_id']?>" type="hidden"> 
                <input  id="userid" value="<?php echo $_SESSION['userid']?>" type="hidden"> 
                <h4 id="title" >Title:  <?php echo $row['book_title']?></h4>
                <h5 id="author">Author:  <?php echo $row['author']?></h5>
               <h5 id="des">Description:  <?php echo $row['book_discription']?></h5>
               <h5 id="price">Price:  <?php echo $row['book_price']?></h5>
               <div class="form-group">
                 <input type="number" class="form-control form-control-user" id="qty"
                     placeholder="Quantity" name="quan" required>
                 </div>
                 <input id="format" value="cd format" type="radio" name="format">
                 <label for="Cd Format"> CD Format</label>
                 <input id="format" value="cd format" type="radio" name="format">
                <label for="Pdf Format"> PDF Format</label>
                <input id="format" value="Pdf format" type="radio" name="format">
                <label for="Hard Copy"> Hard Copy </label>
                 
                              
                <a name="add" >
                  <button id="addtocart" class="primary-btn">
                    Add to cart
                    <i class="fa-solid fa-cart-shopping"></i>
                  </button>
                  
              
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
  
    
      ?>
    </section>
    <!--================ End products fetch =================-->

    <!--add to cart program for books -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script>
    
  $(document).ready(function(){
    let cartbtn = $('#addtocart');
    let bookid = $('#bookid').val();
    let userid = $('#userid').val();
    let title = $('#title').text();
    let author = $('#author').text();
    let des = $('#des').text();
    let price = $('#price').text();
    let qty = $('#qty');
    let alertdiv = $('#alert');
    // let format = $('#format:checked').val();
    
    cartbtn.on('click', function(){
      let format = $('input[name="format"]:checked').val();
      $.ajax({
        url: 'cartfile.php',
        type: 'POST',
        data: {
          bookid: bookid,
          userid: userid,
          title: title,
          author: author,
          des: des,
          price: price,
          qty: qty.val(),
          format: format
        },
        success: function(data){
          // console.log(data)
          // alert(data);
          alertdiv.html(data)
        }
      });
    });
  });
</script>
<!-- end add to cart -->





    




<!-- start footer area -->
<?php
  include('footer.php');
  ?>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/owl-carousel-thumb.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <!--gmaps Js-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="js/gmaps.min.js"></script>
  <script src="js/theme.js"></script>
  