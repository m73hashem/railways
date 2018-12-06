
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8" />
            
        <style>
            .loggfrom_nav{visibility: hidden;
                position: fixed;
            top: 1%;
            left: 1%;
            height: 98%;
            width: 98%;
            z-index: 1;
            background-color: rgba(18, 17, 17, 0.83);}
            .loggfrom_nav #close{
                position: absolute;
            top: 30px;
            right: 30px;}
            .loggfrom_nav .login{
                position: absolute;
                top: 10%;
                left: 20%;
                height: 80%;
                width: 25%;
                background-color: #d8d8d8;
            }
            .loggfrom_nav .signup{
                position: absolute;
                top: 10%;
                right: 20%;
                height: 80%;
                width: 25%;
                background-color: #d8d8d8;
            }
            .loggfrom_nav form{height: 50%;
                margin-left: 20px;
            }
            .loggfrom_nav form input{
                margin-top: 5px;
                height: 30px;
                width: 90%;
                padding-left: 5px;
                
            }
        </style>
        <script>
            
            function sign(){
                document.getElementById("logging").style.visibility="visible";
            }
        var sessionvalue= '<?php if(isset($_SESSION['log']))
                           echo 'yes';
                           else echo 'no'; ?>' ;
            
            
        </script>
    </head>
    <body>
        
        
        <div class="loggfrom_nav" id="logging" style="font-size: 1.2em;">
            <div class="login"  id="login" >
                        <h2>LogIn</h2>
                        <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                            
                            <input class="lin" id="logg" type="text" placeholder="user name" name="username"><br>
                            <input class="lin" type="password" placeholder="password" name="password"><br><br>
                            <input type="submit" value="login" name="login_user" ><br><br>
                            <a href="#" style="color: #00f;" ><b>forget password</b></a>
                        </form>
                        <hr>
<?php include("errors.php"); ?>
                    </div>
                 
                    
                    <div class="signup" id="signup" >
                        <h2> create account</h2>
                        <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                            
                                <input  type="text" placeholder="user name" name="username1"><br>
                                <input type="email" placeholder="e-mail" name="email"><br>
                                <input type="number" placeholder="credit card no" name="visa"><br>
                                <input type="password" placeholder="password" name="password1"><br>
                                <input type="password" placeholder="confirm password" name="password2"><br>
                                <input type="submit" value="sign up" name="reg_user" />
                        </form>
                        <hr>
                        
                    </div>
                
            <button id="close" onclick="closelog()">close</button>
        </div>
        
        
      
        <script type="text/javascript" >
            function hideLog(){
                document.getElementById("loginmain").style.visibility= "hidden";
                document.getElementById("signupmain").style.visibility= "visible";
            }
            
            if(sessionvalue=='yes'){
            document.getElementById("login").style.visibility="hidden";
            document.getElementById("loginmain").style.visibility="hidden";}
        ///logging
            function closelog(){
                document.getElementById("logging").style.visibility="hidden";
            }
            
        </script>
    
    </body>
</html>