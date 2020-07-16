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

	$title=$_POST['title'];
    $eng_name=$_POST['eng_name'];
    $mm_name=$_POST['mm_name'];
	$gender=$_POST['gender'];
	$syllabus=$_POST['syllabus'];
	$studyplace=$_POST['studyin'];
	$school=$_POST['school'];
	$level=$_POST['level'];
	$major=$_POST['major'];
	$mark=$_POST['marks'];
	$birthday=$_POST['birthdate'];
	$nationality=$_POST['nationality'];
	$citizenship=$_POST['citizen'];
	$religion=$_POST['religion'];
	$bloodgroup=$_POST['bloodtype'];
	$citizenid=$_POST['citizenid'];
	$passportid=$_POST['passport'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$facebook=$_POST['facebook'];

	$select="SELECT id FROM address where email='$email' and mobile='$mobile' and facebook='$facebook' ";
	$sr=mysqli_query($conn,$select);
	$checkrows=mysqli_num_rows($sr);
	

	if($checkrows>1) {
		echo "Applicant Already in Exists<br/>";
	}else{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
	$row=$sr->fetch_assoc();
	$addressid=$row['id'];
	
		
		$sql="INSERT INTO applicant(title,ename,mmname,gender,syllabus,studyplace,school,level,major,mark,birthday,nationality,citizenship,religion,bloodgroup,citizenid,passportid,addressid) 
		VALUES('$title','$eng_name','$mm_name','$gender','$syllabus','$studyplace','$school','$level','$major','$mark','$birthday','$nationality','$citizenship','$religion','$bloodgroup','$citizenid','$passportid','$addressid') ";
		$result=mysqli_query($conn,$sql);

		if($result){
			echo "Insert successfully<br/>";
		}
		else{
			echo "Error: " . $sql . "
			" . mysqli_error($conn);;
		}
		
	}
	mysqli_close($conn);

}
?>