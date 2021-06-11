<?php
	header("Content-type:text/html;charset=utf8");
    $username=$_POST['username'];
	$sex=$_POST['sex'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$password=$_POST['password'];
	$conn=mysqli_connect("localhost","root","123456","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql2="select username from users";
		$que2=mysqli_query($conn,$sql2);
		$arr[] = array(); 
		while($row=mysqli_fetch_array($que2)){
			$arr[]=$row['username'];
		}
		if(in_array($username,$arr)){
			echo "<script>alert('用户已存在，添加失败');parent.location.reload();</script>";
		}else{
			$sql="insert into users(username,sex,phone,address,password,states) VALUES ('$username','$sex','$phone','$address','$password',0)";
			$que=mysqli_query($conn,$sql);
			if($que){
				echo "<script>alert('添加成功');parent.location.reload();</script>";
			}else{
				die("数据库连接失败");
			}
		}
	}
?>