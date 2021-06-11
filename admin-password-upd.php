<?php
	header("content-type:text/html;charset=utf8");
	$id=$_GET["id"];
	// $oldpass=$_POST['oldpass'];
	$newpass=$_POST['newpass'];
	$conn=mysqli_connect("localhost","root","123456","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql2="select password from admin where id='$id'";
		$que2=mysqli_query($conn,$sql2);
		while($row=mysqli_fetch_array($que2)){
			// var_dump($row['password']);
			$str = $row['password'];
			// var_dump($oldpass);
			$sql="update admin set password='$newpass' where id='$id'";
			$que=mysqli_query($conn,$sql);
			if($que){
				echo "<script>alert('修改成功');parent.location.reload();</script>";
			}else{
				echo "<script>alert('修改失败，请检查错误');</script>";
			}
		}
	}
?>