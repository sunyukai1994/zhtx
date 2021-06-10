<?php
	header("content-type:text/html;charset=utf8");
	$id=$_GET["id"];
    // $username=$_POST['username'];
	$phone=$_POST['phone'];
	$role=$_POST['role'];
	// $password=$_POST['password'];
	$conn=mysqli_connect("localhost","root","root","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql="update admin set phone='$phone',role='$role' where id='$id'";
		$que=mysqli_query($conn,$sql);
		if($que){
			echo "<script>alert('修改成功');parent.location.reload();</script>";
		}else{
			echo "<script>alert('修改失败，请检查错误');</script>";
		}
	}
?>