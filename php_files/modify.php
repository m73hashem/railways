<?php 
include('server.php');
?>
<!DOCTYPE html>
<html>
<head> 
<title>modify</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="../css/main_style.css" >
<link rel="stylesheet" href="../css/modify.css" >

</head>
<body>
    <?php
    
    ?>
    <div class="main">
        <div class="nav"><span>
            <h3> Egyption Railways </h3>
            <ul>
                <li><a href="../home_page.php">Mian Page</a></li>
                <li><a href="find.php">Find Reservation</a></li>
                <li><a href="modify.php">Modification</a></li>
                <li><?php 
                        if (isset($_SESSION['log']) and $_SESSION['log'] === true)
                        {echo "<b style='font-size:24px'>".$_SESSION['username']."</b>";}
                        else {echo " <a href='#logg'>LOG IN</a>";
                             echo "<a href='#'>Sign UP</a>";}
                        ?> 
                        <?php  if (isset($_SESSION['username'])) : ?>
                        <a href="server.php?logout='1'" style="color: red; background: #fff;
                                                  padding-left:10px;">logout</a>
                        <?php endif ?>
                    </li>
            </ul>
            </span>
        </div>
        <!-- end of nav bar -->
                <div class="cancel">
            <h2 align="center">Modify Reservation</h2><br>
            <form method="post" action="modify.php"   >
                <span class="l">email <br><input id="f_in" type="email" placeholder="email" name="email"></span>
                <span class="l">password <br><input id="s_in" type="password" placeholder="password" name="pw"></span>
                <input class="next" type="submit" value="Next" name="modify" />
                    </form>
        
                   
        </div>
        
    </div> <!--end div main-->
    
    
</body>
</html>

//<?php
     //if (isset($_POST['modify'])) {
/*		
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['pw']);
	if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
     if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
                $_SESSION['log'] = true;
                $query = "SELECT * FROM ticket WHERE reserve='".$results['user_id']."'";
			$res = mysqli_query($db, $query);
                $rows=mysqli_num_rows($res);
                if($rows > 0){
        $ticketinfo = array();
            echo "tickets you reserved = ".$rows;
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
        ."<td>{$ticket['class']}</td><td><input type='checkbox' name='asd' value='".$ticket['ticket_id']."' /></td></tr>";
}

        echo "</table><input type='submit' name='reserve' style='margin: 20px' /></form>";
        
    }
    else{ echo"<h2> No Data...!</h2>";}
            }else {
				array_push($errors, "Wrong username/password combination");
			}
	 }}
         
    
    ?>*/