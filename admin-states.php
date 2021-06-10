<?php
	header("content-type:text/html;charset=utf8");
	$id=$_GET["id"];
    $states=$_GET['states'];
	$conn=mysqli_connect("localhost","root","root","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql="update admin set states='$states' where id='$id'";
		$que=mysqli_query($conn,$sql);
		if($que){
            if ($states==0) {
                echo "<script>alert('已启用');parent.location.reload();</script>";
            }
            if ($states==1) {
                echo "<script>alert('已停用');parent.location.reload();</script>";
            }
		}else{
			echo "<script>alert('停用失败');</script>";
		}
	}
?>