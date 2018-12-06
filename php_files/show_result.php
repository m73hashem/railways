<?php 
include ("server.php");

?>

<!--show results after submit find form-->
<!DOCTYPE html>
<html>
<head> 
<title>result</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="../css/main_style.css" >
<link rel="stylesheet" href="../css/find.css" >
<style>

    th{color: red;}

    table { 
    border: 2px solid #f00;
    border-collapse: collapse;
width: 100%;}
 
  th, td {padding : 5px;
     text-align: center;
    border: 1px solid black;
}

    .result{
        overflow-y: scroll;
    position: absolute;
    top:100px;
    left: 20%;
    padding: 10px;
    height: 550px; /*height of form container*/
    width:60%;
    background-color: rgba(244, 255, 255, 0.81);}
    .back{
        position: absolute;
        top: 30px;
        right: 20px;
        height: 30px;
        width: 80px;
    background-color: crimson;}

</style>
</head>
<body>
     
    <div class="main">
        <?php include("pop_up.php"); ?>
        <div class="nav">
                <span><h3> Egyption Railways </h3>
                    <ul>
                        <li><a href="../home_page.php">Mian Page</a></li>
                        <li><a href="find.php">Find Reservation</a></li>
                        
                        <li class="lastli" >
                        <?php 
                        if (isset($_SESSION['log']) and $_SESSION['log'] === true)
                        {
                            echo "<a href='modify_login.php'>Modification & Details</a>";
                            echo "<b style='font-size:24px'>".$_SESSION['username']."</b>";}
                        else {echo " <a href='#' onclick='sign()' >LogIn /Sign UP</a>";}
                        ?> 
                        <?php  if (isset($_SESSION['username'])) : ?>
                        <a href="server.php?logout='1'" style="color: red; background: #fff;
                                                  padding-left:10px;">logout</a>
                        <?php endif ?>
                    </li>
                    </ul>
                </span>
            </div><!--end nav-->
        
        <div class="result">
<h2>
    
 <h3>result:</h3>
    <button class="back"  onclick="location.href = 'find.php' ">Back </button>
<?php 
    //find reservation
if (isset($_POST['show'])) {
		// receive all input values from the form
		$from = mysqli_real_escape_string($db, $_POST['from']);
		$to = mysqli_real_escape_string($db, $_POST['to']);
		$class = mysqli_real_escape_string($db, $_POST['class']);
    
		// form validation: ensure that the form is correctly filled
		if (empty($from)) { array_push($errors, "select city from"); }
		if (empty($to)) { array_push($errors, "select city to"); }
		if (empty($class)) { array_push($errors, "select class"); }

		if ($from == $to and !empty($from) and !empty($to)) {
			array_push($errors, "you choosed the same city");}
    if (count($errors) == 0){
        if($class=='All'){
            $query = "SELECT * FROM ticket WHERE st_from='$from' AND st_to='$to'
                       AND reserve IS NULL";}
        else{
			$query = "SELECT * FROM ticket WHERE st_from='$from' AND st_to='$to'
                        AND class='$class' AND reserve IS NULL";}
			$results = mysqli_query($db, $query);
        $rows=mysqli_num_rows($results);
        if($rows > 0){
        $ticketinfo = array();
            echo "tickets available = ".$rows;
        echo "<form method='post' action='show_result.php' ><table>";
        while ($row_ticket = mysqli_fetch_assoc($results))
    $ticketinfo[] = $row_ticket;
        echo "<tr><th>ticket no</th><th>train no</th><th>from</th><th>to</th><th>drpart time</th>
                <th>arrival time</th><th>class</th><th>reserve</th></tr>";
        foreach ($ticketinfo as $ticket) {
    echo "<tr><td>{$ticket['ticket_id']}</td>>"
       . "<td>{$ticket['train']}</td>"
       . "<td>{$ticket['st_from']}</td>"
        ."<td>{$ticket['st_to']}</td>"
        ."<td>{$ticket['time1']}</td>"
        ."<td>{$ticket['time2']}</td>"
        ."<td>{$ticket['class']}</td><td><input type='checkbox' name='checkedTecket[]' value='".$ticket['ticket_id']."' /></td></tr>";}

        echo "</table><input type='submit' name='reserve' style='margin: 20px' /></form>";
        
    }
        //////put code bellow here//
    else{ echo"<h2> No Data...!</h2>";}
    }
    else{include("errors.php");}
    }
    
    ?>

            
        <?php
    

        //get checked values
        if(isset($_POST['reserve'])and !empty($_POST['checkedTecket'])){
            $check=$_POST['checkedTecket'];
            
            if(isset($_SESSION['log']) and $_SESSION['log']== true){
                $userId=$_SESSION['userid'];
                foreach($check as $value){//get reservation
                    $query="UPDATE ticket SET reserve= $userId WHERE ticket_id = $value";
                    mysqli_query($db, $query);}
                echo "you reserverd tickets no: ";
                foreach($check as $value){
                    echo  $value." ,";}
                echo "<br>an email with details sent for you.<br>";
            }
            else{
                echo "<h1>login/sign up first</h1>";
            //reserve;
            }
        }
    else{echo "no choice";}
                
        ?>
    </h2>        
    
        </div>
        
    </div>   
</body>
</html>