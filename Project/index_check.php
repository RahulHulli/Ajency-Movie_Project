<?PHP
if(isset($_POST['username']) && isset($_POST['password'])){

	$NAME = $_POST['username'];
	$PASSWORD = $_POST['password'];

	$con = mysqli_connect("localhost","root","","music_data");

	$data = mysqli_query($con,"SELECT * FROM login WHERE id = '".$NAME."' AND password = '".$PASSWORD."'");

	$row_cnt = mysqli_num_rows($data);

	if($row_cnt==1)
	{
		header('location:update.html');
	}
	else
	{
		ECHO "FAIL";
	}
}
?>