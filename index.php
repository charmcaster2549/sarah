
<html>
    <head>
        <title>Landing Page</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
   
    
    <div class="container">
        <!-- <div class="left">
            <img src="pic/scc1.jpg" width = "100%" height = "100%" class="picture">
            <img src="pic/scc2.jpg" width = "100%" height = "100%" >
            <img src="pic/scc3.jpg" width = "100%" height = "100%" >
        </div> -->

        <div class="right">
            <img src="pic/logo2.png" class="logo">
            
            <h1 class="scc">Sibonga Community College</h1>
            
            <form method="POST" action="verify.php">

            <div class="textbox">

                <?php if(isset($_GET['error'])){?>
                <p class="error"><?php echo $_GET['error'];?></p>
                <?php } ?>
                    
                <p style="color: #54377a; font-family: Arial; text-align: center;">Login to your accounts</p>
                <div class="username">
                    <span class="user"></span>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="password">
                    <span class="key"></span>
                    <input type="password" name="password" placeholder="Password">
                </div>
                
                <input type="submit" value="Login" id="login">
                <br>
                <p style="text-align: center;">Forgot your password? Contact the admin.</p>
                
            </div>
            
            </form>    
        </div>
    </div>
<script>

    //slideshow
    var images = document.querySelectorAll('.left img');
    var currentImage = 0;

    function showNextImage() {
      images[currentImage].classList.remove('picture');

      currentImage++;
      if (currentImage >= images.length) {
        currentImage = 0;
      }

      images[currentImage].classList.add('picture');
    }

    setInterval(showNextImage, 5000); 
    </script>
    <script>



