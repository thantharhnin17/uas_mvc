<?php 
// include_once 'db.php';

$server="localhost";
$username="root";
$password="";
$dbname="admission";

//Create connection
$conn=mysqli_connect($server,$username,$password,"$dbname");
//Check connection
if(!$conn){
	die("Connection failed:".mysql_connect_error());
}
if ($_SERVER['REQUEST_METHOD']=='POST') {
	// if(isset($_POST['submit'])){
//insert applicant's data
	$address=$_POST['address'];
	$street=$_POST['street'];
	$township=$_POST['township'];
	$city=$_POST['city'];
	$zipcode=$_POST['zipcode'];
	$telephone=$_POST['telephone'];
	$mobile=$_POST['mobile'];
	$facebook=$_POST['facebook'];
	$email=$_POST['email'];

	$check=mysqli_query($conn,"select * from address where email='$email' and mobile='$mobile' and facebook='$facebook'");
    $checkrows=mysqli_num_rows($check);
	
	
	if($checkrows>0) {
		echo "applicant exists<br/>";
	 } else {

		$sql="INSERT INTO address(addressno,street,township,city,zipcode,telephone,mobile,facebook,email) VALUES('$address','$street','$township','$city','$zipcode','$telephone','$mobile','$facebook','$email') ";
		$result=mysqli_query($conn,$sql);

		if($result){
    	
			echo "Insert successfully<br/>";
		}
		else{
			echo "Error: " . $sql . "
			" . mysqli_error($conn);;
		}
	}

	//insert father's data
	//$address=$_POST['address'];
	
	$fstatus=$_POST['fstatus'];
	
	if($fstatus=="fliving"){

		$fstreet=$_POST['fstreet'];
	$ftownship=$_POST['ftownship'];
	$fcity=$_POST['fcity'];
	$fzipcode=$_POST['fzipcode'];
	$ftelephone=$_POST['ftelephone'];
	$fmobile=$_POST['fmobile'];

	$check=mysqli_query($conn,"select * from address where mobile='$fmobile'");
    $checkrows=mysqli_num_rows($check);
	
	
	if($checkrows>0) {
		echo "father exists<br/>";
	 } else {

		$sql="INSERT INTO address(street,township,city,zipcode,telephone,mobile) VALUES('$fstreet','$ftownship','$fcity','$fzipcode','$ftelephone','$fmobile') ";
		$result=mysqli_query($conn,$sql);

		if($result){
    	
			echo "Insert successfully<br/>";
		}
		else{
			echo "Error: " . $sql . "
			" . mysqli_error($conn);;
		}
	}
	}else{
		echo " father's address isn't insert<br/> ";
	}

	//insert mother's data
	$mstatus=$_POST['mstatus'];
	
	if($mstatus=="mliving"){

	$mstreet=$_POST['mstreet'];
	$mtownship=$_POST['mtownship'];
	$mcity=$_POST['mcity'];
	$mzipcode=$_POST['mzipcode'];
	$mtelephone=$_POST['mtelephone'];
	$mmobile=$_POST['mmobile'];
	//$facebook=$_POST['facebook'];
	//$email=$_POST['email'];

	$check=mysqli_query($conn,"select * from address where mobile='$mmobile'");
    $checkrows=mysqli_num_rows($check);
	
	
	if($checkrows>0) {
		echo "mother exists <br/>";
	 } else {

		$sql="INSERT INTO address(street,township,city,zipcode,telephone,mobile) VALUES('$mstreet','$mtownship','$mcity','$mzipcode','$mtelephone','$mmobile') ";
		$result=mysqli_query($conn,$sql);

		if($result){
    	
			echo "Insert successfully <br/>";
		}
		else{
			echo "Error: " . $sql . "
			" . mysqli_error($conn);;
		}
	}
	}else{
		echo " mother's address isn't insert<br/> ";
	}

	//insert guardian's data
	if(isset($_POST['gstatus']))
	{
    
    if($_POST['gstatus']=="other")
    {
	
		$guastatus=$_POST['guastatus'];
	
	if($guastatus=="gliving"){

	$gstreet=$_POST['gstreet'];
	$gtownship=$_POST['gtownship'];
	$gcity=$_POST['gcity'];
	$gzipcode=$_POST['gzipcode'];
	$gtelephone=$_POST['gtelephone'];
	$gmobile=$_POST['gmobile'];
	//$facebook=$_POST['facebook'];
	//$email=$_POST['email'];

	$check=mysqli_query($conn,"select * from address where mobile='$gmobile'");
    $checkrows=mysqli_num_rows($check);
	
	
	if($checkrows>0) {
		echo "guardian exists<br/>";
	 } else {

		$sql="INSERT INTO address(street,township,city,zipcode,telephone,mobile) VALUES('$gstreet','$gtownship','$gcity','$gzipcode','$gtelephone','$gmobile') ";
		$result=mysqli_query($conn,$sql);

		if($result){
    	
			echo "Insert successfully<br/>";
		}
		else{
			echo "Error: " . $sql . "
			" . mysqli_error($conn);;
		}
	}
	}else{
		echo " guardian's address isn't insert<br/> ";
	}
	}
	}
		mysqli_close($conn);
}


?>