<?php 
include('php_files/server.php');


  ?>
<!DOCTYPE html>
<html>
    <head>
        <title>home page</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/main_style.css">
        <link rel="stylesheet" href="css/homepage.css" >

        
    </head>
    <body>
        <div class="main">
            <div class="nav"><span>
                <h3> Egyption Railways </h3>
                <ul>
                    <li><a href="home_page.php">Mian Page</a></li>
                    <li><a href="php_files/find.php"css/find.css""book.html"">Find Reservation</a></li>
                    
                    <li class="lastli" >
                        <?php 
                        if (isset($_SESSION['log']) and $_SESSION['log'] === true)
                        {
                            echo "<a href='php_files/modify_login.php'>Modification & Details</a>";
                            echo "<b style='font-size:24px'>".$_SESSION['username']."</b>";}
                        else {echo " <a href='#' onclick='sign()' >LogIn /Sign UP</a>";}
                        ?> 
                        <?php  if (isset($_SESSION['username'])) : ?>
                        <a href="php_files/server.php?logout='1'" style="color: red; background: #fff;
                                                  padding-left:10px;">logout</a>
                        <?php endif ?>
                    </li>
                </ul>
            </span>
            </div>
            <div class="logfrom_nav">
            
            </div>
            <div class="second" >
                <div class="log " id="zxc" >
                    
                    <div class="login"  id="loginmain" >
                        <h2>login / create account</h2>
                        <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                            
                            <input class="lin" id="logg" type="text" placeholder="user name" name="username"><br>
                            <input class="lin" type="password" placeholder="password" name="password"><br>
                            <input type="submit" value="login" name="login_user">
                        </form>
                        
                        <a href="#" style="color: #00f;" ><b>forget password</b></a>
                        <hr>
                        <button onclick="hideLog()">create account</button>
                    </div>
                 
                    
                    <div class="signup" id="signupmain" >
                        <h2> create account</h2>
                        <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                            
                                <input  type="text" placeholder="user name" name="username1"><br>
                                <input type="email" placeholder="e-mail" name="email"><br>
                                <input type="password" placeholder="password" name="password1"><br>
                                <input type="password" placeholder="confirm password" name="password2"><br>
                                <input type="submit" value="sign up" name="reg_user" />
                        </form>
                    </div>
                
                </div>
                
                <div class="media" id="media" ><h2>website media</h2>
                <?php include("php_files/errors.php") ?></div>                
                <div class="news"> <h2>News</h2></div>
                <div class="use"><h2>How To Use:</h2></div>
            </div>
          
        <?php include("php_files/pop_up.php"); ?>
          
        </div>
        
    </body>
</html>