<?php $errors=$data['errors'] ?>
<html lang="en">
<head>
<title>CityLab</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo BASEURL.'/public/assets/img/favicon.png'?>"/>
    <!-- Local Styles -->
    <link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/login.css'?>"/>
    
</head>


<body>

    <div class="main">
        <div class="imag">
            <img style="height:500px;" src="<?php echo BASEURL.'/public/assets/img/login.svg'?>" alt="">
        </div>
        <div class="container">
            <div class="box">
                <h2>Sign in</h2>
                <p>Login to your Account</p>
                <form action="<?php echo BASEURL.'/login/submit';?>" method="post">
                
                        <div class="alert">
                            <?php echo "<strong>".$errors["username"]."</strong><br/>";?>
                            <?php echo "<strong>".$errors["password"]."</strong>";?>
                        </div>
        
                    
                    <div class="inputBox">
                        <input type="text" id="username" placeholder="Username" name="username">
                        <label for="username">Username</label>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="exampleInputPassword1" placeholder="Password" name="password">
                        <label for="exampleInputPassword1">Password</label>
                    </div>
                    <input type="submit" name="login" value="Sign In">
                
                </form>

            </div>

            <div class="sign">
                <center>Don't have an account? <a href="<?php echo BASEURL.'/signup' ?>"><b>Sign Up</b></a></center>
                <br>
                <center><a href=""><b>Forgot password?</b></a></center>
            </div>
        </div>
    

    </div>
    
</body>

</html>