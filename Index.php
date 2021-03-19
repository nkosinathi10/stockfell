<?php 
   include 'includes/head.php';
?>
    <!--Navbar-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#">M.A Investment</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li ><a href="index.php">Home</a></li>
              <li ><a href="#about">About Us</a></li>
              
            <ul class="nav navbar-nav navbar-right">
              <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <!--About Section-->

    <section class="sections" id="home">
         <div class="home-bg" >
             <img class="bg-image" src="img/background.jpg" style="width: 100%;">
             <div class="headings">
               <h1>Matla Arona</h1>
               <h2>Investments</h2>
             </div>
         </div>
    </section>
    <section class="section" id="about">
       <h1 class="heading">About Us</h1>
       <p>Matla Arona is an Investment scheme, established to give finacial freedom to participants. Matla arona membership, 
         can be accessed by registering to our site and depositing an amount of R100 at our fnb bank account in order for your account,
         to be activated and you will have to recruit 5 other members then move to stage 1. Your decedants also need
         to recruit 5 members each. It is also accepted if one wants to help his/her decedants with recruiting.
       </p>
       <div class="steps_container">
              <div class="row">
			  <div class="col-md-12">
                <div class="col-md-4">
                  <div class="jumbotron">
                    <h1>Step 1</h1>
                    <p>
                       Register and join with only R100.
                    </p>
                  </div>
                  
                </div>
                <div class="col-md-4">
                  <div class="jumbotron">
                    <h1>Step 2</h1>
                    <p>
                      Recruite 5 five people, then you will move to
                      next stage.
                   </p>
                  </div>
                  
                </div>
                <div class="col-md-4">
                  <div class="jumbotron">
                    <h1>Step 3</h1>
                  <p>
                    encourage your decedants to recruite more people.
                 </p>
                  </div>
                  
                </div>
				<footer style="text-align:center;">
       <h1 class="footerH" >Contact Us</h1>
       <p><span class="glyphicon glyphicon-phone"></span>: 087 510 0370</p>
       <p><span class="glyphicon glyphicon-send" ></span>: 068 336 2763</p>
       </footer>
              </div>
       </div>
	   </div>
    </section>
   
</body>
<br>

  
</html>