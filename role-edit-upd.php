<?php
	header("content-type:text/html;charset=utf8");
	$id=$_GET["id"];
    $username=$_POST['username'];
	$role=$_POST['role'];
	if ($username=='超级管理员') {
		$role="用户管理、组织管理、管理员管理";
	}
	if ($username=='管理员') {
		$role="用户管理、组织管理";
	}
	if ($username=='管理员2') {
		$role="用户管理";
	}
	$describes=$_POST['describes'];
	$conn=mysqli_connect("localhost","root","root","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql2="select username from roles";
		$que2=mysqli_query($conn,$sql2);
		$arr[] = array(); 
		while($row=mysqli_fetch_array($que2)){
			$arr[]=$row['username'];
		}
		if(in_array($username,$arr)){
			echo "<script>alert('角色已存在，修改失败');parent.location.reload();</script>";
		}else{
			$sql="update roles set username='$username',role='$role',describes='$describes' where id='$id'";
			$que=mysqli_query($conn,$sql);
			if($que){
				echo "<script>alert('修改成功');parent.location.reload();</script>";
			}else{
				echo ( '修改失败，请检查错误'.mysqli_connect_errno());
			}
		}
	}
?>