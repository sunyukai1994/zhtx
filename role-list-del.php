<?php
	header("content-type:text/html;charset=utf8");
	$conn=mysqli_connect("localhost","root","root","zhtx");
	$id=$_GET["id"];
	if($conn){
		$sql="delete from roles where id='$id' ";//通过指定条件删除表中的行
		$que=mysqli_query($conn,$sql);
		if($que){
			echo "<script>parent.location.reload();</script>";
		}else{
			echo "<script>alert('删除失败');localtion='".$_SERVER['HTTP_REFERER']."';</script>";
			exit;
		}
	}
	die("数据库连接失败".mysqli_connect_errno());
?>