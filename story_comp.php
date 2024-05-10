    <!--================ Start Header Menu Area =================-->
    <?php
  include('header2.php');
  include('config.php');
  if(isset($_post['sub'])){
    $con_top=$_POST['con_topic'];
    $con_email=$_POST['con_email'];
    $content=$_POST['con'];
  //    $comp="INSERT INTO `storycomp` (`st_topic`, `st_email`, `st_content`) VALUES ('$con_top', '$con_email', '$content')";
  //    $db_comp=mysqli_query($connection,$comp);
  // if($db_comp){
  //   echo'<script> alert("Your request has been submit")
  //   </script>'; 
  // }
  // else{
  //   echo'<script> alert("Fill it again")
  //   </script>'; 
  // }
  $comp = "SELECT * from `storycomp`";
  $run_comp = mysqli_query($connection, $comp);
  if(mysqli_num_rows($run_comp) > 0){
    echo'<script> alert("You are successfully enroll for our competition")
    </script>';         }else{
      $comp_insert="INSERT INTO `storycomp` (`st_topic`, `st_email`, `st_content`) VALUES ('$con_top', '$con_email', '$content')";
         $db_run=mysqli_query($connection,$comp_insert);
  }
}
  ?>
  <!-- Inline css -->
  <style>
    main{
      margin: 25px 50px 75px 100px;
    }
    .ess{
      margin: 25px 100px;
      color: #000080;
    }
    .es{
      color: #000080;
    }
    .h{
      color:#E49B0F;
    }
    .mem_form{
      margin: 25px 50px 75px 100px;
    }
    .btn{
      margin: 5px ;
      color: #000080;
      font-weight:bold;
      background-color: #E49B0F;
    }
    .btn:hover{
      color:  #E49B0F;
      background-color: #000080;
    }
    .ess_page{
      background-color:
    }
  </style>
    <!--================ End Header Menu Area =================-->
  <br>
  <br>
  <br>
  <br>

    <!--================ start story competition page =================-->
    <div class="ess_page">
    <strong><h1 class="ess">STORY WRITTING COMPETITION</h1></strong>
    
    <main>
    <h3 class="h">Welcome to our story writting competition!</h3>
    <p>submit your essay for a chance to win amazing prizes</p>
    <img style='height:500px; width:800px'  src="./img/story.png"
          class="img-fluid" alt="Sample image">
          <br><br>
    <h3  class="h">Competition Rules</h3>
    <ul>
        <li>essay should be between 1000 and 1500 words</li>
        <li>submision in our given time duration</li>
    </ul>
    <h3  class="h">Prizes</h3>
    <p>1st postion holder will be rewarded by the prize of $1000 </p>
    <p>2nd postion holder will be rewarded by the prize of $500 </p>
    <p>3rd postion holder will be rewarded by the prize of $250 </p>
    <h3  class="h">How to Enter</h3>
    <h2 class="es">ENTERING IS EASY!</h2>
    <p>Create your free Submittable account by clicking the SUBMIT button. If you already<br>
     have a Submittable account, simply log in!</p>
     <p>You can compete in multiple WD competitions with a single login! Check back often<br>
      for an updated list of competitions.</p>
      <p>When you are ready to submit your work to the story Writing Competition<br>
       readers, you'll want to have the following information available:</p>
       <h4 class="es">Your contact information</h4>
       <p>(be careful that the information provided is accurate).<br>
        Contact information is to be provided only on the submission form (not on the<br>
        submission's file upload). Time sensitive information such as credits and contact<br>
        information (for prize distribution) is taken directly from the submission form. Due<br>
        to the nature of deadlines, corrections to this information are not guaranteed.</p>
        <h4 class="es">Your ANNUAL WRITING COMPETITION submission file </h4>
        <p>(see the PREPARING YOUR ENTRY tips for more information).</p>
        <h4 class="es">Your method of payment</h4>
        <p>(see the ENTRY PRICING, SUBMISSION DEADLINES AND<br>
         WINNER NOTIFICATION page for tips for all pricing and deadlines).</p>
</main>


<form action="" method="POST" class="mem_form" onsubmit="alert('you are now enroll! we will send you email whenever the competition .')";>
        <div class="row">
            <div class="col-md-6">
            <div class="mb-3">
                    <input type="text" rows="20" cols="50" class="form-control" name="con_topic" placeholder="Write your story topic" required>
                </div>
                <div class="mb-3">
                <input type="email" class="form-control" name="con_email" placeholder="Write your email"
                 required pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$|^[a-zA-Z0-9._%+-]+@gmail\.[a-z]{2,}$">


                </div>
            
              
            <div class="form-floating">
  <textarea class="form-control" placeholder="Write your essay content" name="con" id="floatingTextarea" required ></textarea>
  <label for="floatingTextarea">Write your story content</label>
</div>
              
            </div>
        </div>
          <br>
          
         <p class="es"><strong>Ready to enter? Click here to get enroll yourself!</strong</p>
        <button type="submit" class="btn" name="submit">Submit</button>
    </form>
  </div>
   <!--================ End story competition page =================-->

      <!--================ Start footer Area =================-->
<?php
  include('footer.php');
  ?>
     <!--================ End footer Area =================-->

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