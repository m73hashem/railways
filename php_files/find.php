<?php 
include('server.php');


  ?>
<!DOCTYPE html>
<html>
    <head>
        <title>find</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/main_style.css" >
        <link rel="stylesheet" href="../css/find.css" >
    </head>
    
    <body>
        <div class="main">
            <div class="nav">
                <span><h3> Egyption Railways </h3>
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
        <!-- end nav -->
            <div class="asd">
                <form  action="show_result.php" method="POST" >
                    <span class="l">From 
                        <select name="from">
                            <option value="" required> </option>
                            <option value="Aswan" >Aswan </option>
                            <option value="Luxor" >Luxor </option>
                            <option value="Qena" >Qena </option>
                            <option value="Sohag" >Sohag </option>
                            <option value="Asyut" >Asyut </option>
                            <option value="Menia" >Menia </option>
                            <option value="Beni Sowaif" >Beni Sowaif </option>
                            <option value="Cairo" >Cairo </option>
                            <option value="Giza" >Giza </option>
                            <option value="Alexanderia" >Alexanderia </option>
                        </select>
                    </span>
                    
                    <span class="l">To 
                        <select name="to">
                            <option value="" required> </option>
                            <option value="Aswan" >Aswan </option>
                            <option value="Luxor" >Luxor </option>
                            <option value="Qena" >Qena </option>
                            <option value="Sohag" >Sohag </option>
                            <option value="Asyut" >Asyut </option>
                            <option value="Menia" >Menia </option>
                            <option value="Beni Sowaif" >Beni Sowaif </option>
                            <option value="Cairo" >Cairo </option>
                            <option value="Giza" >Giza </option>
                            <option value="Alexanderia" >Alexanderia </option>
                        </select>
                    </span>
                    
                    <span class="l tr">Travel<br>date<input type="date" id="theDate" name="date"></span>
                    <span class="l">Class
                        <select name="class">
                            <option value="All" selected>All Classes</option>
                            <option value="Class A">Class A</option>
                            <option value="Class B">Class B</option>
                            <option value="VIP">VIP</option>
                            <option value="Express">Express</option>
                        </select>
                    </span>
                    <input class="sh" type="submit" value="show" name="show"><br>
                    <input class="res" type="reset">
                </form>
            </div>
        
        </div>
        <script> //to show current date 
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear(); 
            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;
            var today = year + "-" + month + "-" + day;
            document.getElementById("theDate").value = today;
        </script>
    
    </body>
</html>