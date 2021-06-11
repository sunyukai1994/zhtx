<?php
	header("content-type:text/html;charset=utf8");
	$id=$_GET["id"];
    $branchs=$_POST['branchs'];
	$conn=mysqli_connect("localhost","root","123456","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql="update cate set branchs='$branchs' where id='$id'";
		$que=mysqli_query($conn,$sql);
		if($que){
			echo "<script>alert('修改成功');parent.location.reload();</script>";
		}else{
			echo "<script>alert('修改失败，请检查错误');</script>";
		}
	}
?>