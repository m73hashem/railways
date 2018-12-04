<!-- confirm modification -->
<!DOCTYPE html>
<html>
<head> 
<title>confirm</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="../css/main_style.css" >
<link rel="stylesheet" href="../css/modify_login.css" >

</head>
<body>
    <?php
$id=$_POST["id"];
$pass=$_POST["pw"];

    $name="Admin";
    $class="A";
    $date="20/11/2018";
    $ticket=2;
$log=true;
function auth($id , $pass){
if($id == "admin" and $pass =="admin"){
     $log=true;
}
else{ $log=false;}
return $log;
}

?>
    <div class="main">

        
        <div class="second_div">
       
            <?php
                        
                        $auth=auth($id, $pass);
                        if($auth == true)
                        {
                            echo "<label>Reservation ID : $id </label>";
                            echo "<label>Name : $name </label>";
                            echo "<label>Travel Date : $date </label>";
                            echo "<label>Class : $class </label>";
                            echo "<label>No.Tickets : $ticket </label>";
                            echo "<hr>";
                            echo "<p>are you sure to cancel reservation <input class='yes' type='button' value='Yes, Sure'></p>";}
                        else{echo "<h3>error in id or modification number</h3>";}
                        ?>
            
         
                        <!-- result-->
                        <input class="exit" type="button" value="Exit" 
                               onclick="location.href = 'modify.php'">   
        </div>
    </div>   
</body>
</html>