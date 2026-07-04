<?php

   session_start();

   include_once "./config/dbconnect.php";
   
   if ( !isset($_SESSION['qruser_id'])) {
      header("location: login");
     
   }
   


?>

       

 <!-- nav -->

 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #0068B5;">

    

    <a class="navbar-brand ml-5" href="./index.php">

        <img src="../../assets/images/AVogo.png" width="100%" height="80" alt="Swiss Collection">

    </a>

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

    

    <div class="user-cart">  

        <?php           

        if(isset($_SESSION['qruser_id'])){

          ?>

          <a href="" style="text-decoration:none;">

            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"><?php echo $_SESSION['qruser_name']; ?><br/>            <p><?php echo $_SESSION['qrrolename']; ?></p>
</i>
         </a>

         <a href="logout.php" style="text-decoration:none;">

                    <i class="fa fa-sign-out mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>

                    </a>

          <?php

        } else {

            ?>

            <a href="" style="text-decoration:none;">

                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>

            </a>



            <?php

        } ?>

    </div>  

</nav>

