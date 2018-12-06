<?php
$con = mysqli_connect('localhost', 'root', 'roottoor');
$sql = "CREATE DATABASE IF NOT EXISTS railways";
if ($con->query($sql) === TRUE) {
    echo "<br>Database created successfully";
} else {
    echo "<br>Error creating database: " . $con->error;
}
//use DB
$con->query("use railways");

$query = "CREATE TABLE IF NOT EXISTS users(
  user_id int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL)";
if ($con->query($query) === TRUE) {
    echo "<br>users table created successfully";
} 
else {
    echo "<br>Error creating users table: " . $con->error;
}

$q="INSERT INTO users(user_id,username,email,password) values(1,'user1','user14@user.com',md5('user1')),
                                                             (2,'user2','user3@user.com',md5('user2'))";
$q="INSERT INTO users(user_id,username,email,password) values(1,'user1','user1@user1.com',md5('user1')),
                                                             (2,'user2','user2@user2.com',md5('user2'))";
if ($con->query($q) === TRUE) {
    echo "<br>values inserted into users successfully";
} else {
    echo "<br>Error insertin into users table: " . $con->error;
}

$query = "CREATE TABLE IF NOT EXISTS ticket(
  ticket_id int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  train varchar(20) NOT NULL,
  st_from varchar(20) NOT NULL,
  st_to varchar(20) NOT NULL,
  time1 varchar(20) NOT NULL,
  time2 varchar(20) NOT NULL,
  class varchar(20) NOT NULL,
  reserve int(10))";
if ($con->query($query) === TRUE) {
    echo "<br>tickets table created successfully";
} else {
    echo "<br>Error creating tickets table: " . $con->error;
}

$query="INSERT INTO ticket(train,st_from,st_to,time1,time2,class) VALUES
('train1','Cairo','Asyut','12:00 am','04:00 am','Express'),
('train2','Cairo','Asyut','12:00 am','04:00 am','Class A'),
('train3','Cairo','Asyut','12:00 am','04:00 am','Class B'),
('train4','Cairo','Asyut','12:00 am','04:00 am','VIP'),
('train5','Asyut','Cairo','12:00 am','04:00 am','Express'),
('train6','Asyut','Cairo','12:00 am','04:00 am','Class A'),
('train7','Asyut','Cairo','12:00 am','04:00 am','Class B'),
('train8','Asyut','Cairo','12:00 am','04:00 am','VIP'),
('train1','Cairo','Asyut','10:00 am','01:00 pm','Express'),
('train2','Cairo','Asyut','10:00 am','01:00 pm','Class A'),
('train3','Cairo','Asyut','10:00 am','01:00 pm','Class B'),
('train4','Cairo','Asyut','10:00 am','01:00 pm','VIP'),
('train5','Asyut','Cairo','10:00 am','01:00 pm','Express'),
('train6','Asyut','Cairo','10:00 am','01:00 pm','Class A'),
('train7','Asyut','Cairo','10:00 am','01:00 pm','Class B'),
('train8','Asyut','Cairo','10:00 am','01:00 pm','VIP')";
if ($con->query($query) === TRUE) {
    echo "<br>values inserted in ticket table successfully";
} else {
    echo "<br>Error insert values in tickets table: " . $con->error;
}

mysqli_close($con);
?>