<?php
    $no = $_GET['name'];
    $con = mysqli_connect("localhost","root","","movie_data");
    $q = mysqli_query($con,"SELECT * FROM movies WHERE name = '$no'");
    WHILE($ROW = mysqli_fetch_array($q)){
        $img = base64_encode($ROW[13]);;
	   ECHO "No:".$ROW[0]."<br>Movie:".$ROW[1]."<br>Producer:".$ROW[2]."<br>Director:".$ROW[3]."<br>Music_Director:".$ROW[4]."<br>Descript:".$ROW[5]."<br>Long:".$ROW[6]."<br>Size:".$ROW[7]."<br>Stars:".$ROW[8]."<br>Likes:".$ROW[9]."<br>Views:".$ROW[10]."<br>Genre:".$ROW[11]."<br>Language:".$ROW[12]."<br>Poster:".'<img src="data:image/jpeg;base64,'.base64_encode( $ROW[13] ).'"/>';
    }
    ECHO '<a href="index.php">Back</a>';
?>