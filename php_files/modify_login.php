<?php 
include ("server.php");

?>

<!-- confirm modification -->
<!DOCTYPE html>
<html>
<head> 
<title>confirm</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="../css/main_style.css" >
<link rel="stylesheet" href="../css/modify_login.css" >
<style>
    th{color: red;}

    table { 
    border: 2px solid #f00;
    border-collapse: collapse;
width: 98%;}
 
  th, td {padding : 5px;
     text-align: center;
    border: 1px solid black;
}

    </style>
</head>
<body>
    <div class="main">

        
        <div class="second_div">
                        
      
    <?php
    $userid=$_SESSION['userid'];
    
        echo "NAME : ".$_SESSION['username']."<br>";
            echo "ID : $userid <br>";
			$query = "SELECT * FROM ticket WHERE reserve= $userid";
			$results = mysqli_query($db, $query);
            $rows=mysqli_num_rows($results);
        echo "<form method='post' action='modify_login.php' >";
            if($rows > 0){
        $ticketinfo = array();
            echo "tickets you have : ".$rows."<br>";
        echo "<table>";
        while ($row_ticket = mysqli_fetch_assoc($results))
        $ticketinfo[] = $row_ticket;
        echo "<tr><th>ticket no</th><th>train no</th><th>from</th><th>to</th><th>drpart time</th>
                <th>arrival time</th><th>class</th><th>delete</th></tr>";
        foreach ($ticketinfo as $ticket) {
    echo "<tr><td>{$ticket['ticket_id']}</td>>"
       . "<td>{$ticket['train']}</td>"
       . "<td>{$ticket['st_from']}</td>"
        ."<td>{$ticket['st_to']}</td>"
        ."<td>{$ticket['time1']}</td>"
        ."<td>{$ticket['time2']}</td>"
        ."<td>{$ticket['class']}</td><td><input type='checkbox' name='checkedTecket[]' value='".$ticket['ticket_id']."' /></td></tr>";}

        echo "</table><br><input type='submit' value='delete ckecked only' name='delete' style='margin: 20px' />
                    <br><button name='all' style='margin: 20px' >cancle reservation</button></form>";
                if(isset($_POST['delete'])and !empty($_POST['checkedTecket'])){
            $check=$_POST['checkedTecket'];
                foreach($check as $value){//cancle some tickets
                    $query="UPDATE ticket SET reserve= NULL WHERE ticket_id = $value";
                    mysqli_query($db, $query);}
                    header("Location: modify_login.php");
            }
            
            if(isset($_POST['all']) and empty($_POST['checkedTecket'])){
               $query="UPDATE ticket SET reserve = NULL WHERE reserve = $userid";
                mysqli_query($db, $query);
                header("Location: modify_login.php");
            }
            
        
    }
    else{echo "you have no tickets<br>";}
        
                
                
        
    
?>
            <!-- result-->
                        <input class="exit" type="button" value="Exit" 
                               onclick="location.href = '../home_page.php'">   
        </div>
    </div>   
</body>
</html>