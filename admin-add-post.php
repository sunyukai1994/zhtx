<?php
	header("Content-type:text/html;charset=utf8");
    $username=$_POST['username'];
	$phone=$_POST['phone'];
	$role=$_POST['role'];
	$password=$_POST['password'];
	$conn=mysqli_connect("localhost","root","root","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql2="select username from admin";
		$que2=mysqli_query($conn,$sql2);
		$arr[] = array(); 
		while($row=mysqli_fetch_array($que2)){
			$arr[]=$row['username'];
		}
		if(in_array($username,$arr)){
			echo "<script>alert('管理员已存在，添加失败');parent.location.reload();</script>";
		}else{
			$sql="insert into admin(username,phone,role,password,states) VALUES ('$username','$phone','$role','$password',0)";
			$que=mysqli_query($conn,$sql);
			if($que){
				echo "<script>alert('添加成功');parent.location.reload();</script>";
			}else{
				die("数据库连接失败");
			}
		}
	}
?>