<?php
	header("Content-type:text/html;charset=utf8");
    $username=$_POST['username'];
	if ($username=='超级管理员') {
		$role='用户管理、组织管理、管理员管理';
	}
	if ($username=='管理员') {
		$role='用户管理、组织管理';
	}
	if ($username=='管理员2') {
		$role='用户管理';
	}
	$describes=$_POST['describes'];
	// echo "<script>alert('$username'+'$role'+'$describes');</script>";
	$conn=mysqli_connect("localhost","root","123456","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql2="select username from roles";
		$que2=mysqli_query($conn,$sql2);
		$arr[] = array(); //接收结果的数组
		while($row=mysqli_fetch_array($que2)){
			$arr[]=$row['username'];
		}
		// var_dump($arr);
		// echo in_array($username,$arr);
		if(in_array($username,$arr)){
			echo "<script>alert('角色已存在，添加失败');parent.location.reload();</script>";
		}else{
			$sql="insert into roles(username,role,describes,states) VALUES ('$username','$role','$describes',0)";
			$que=mysqli_query($conn,$sql);
			if($que){
				echo "<script>alert('添加成功');parent.location.reload();</script>";
			}else{
				die("数据库连接失败". mysqli_connect_error());
			}
		}		
	}
?>