<?php
	header("Content-type:text/html;charset=utf8");
    $formsname=$_POST['formsname'];
    $branchs=$_POST['branchs'];
	$conn=mysqli_connect("localhost","root","123456","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql2="select formsname from cate";
		$que2=mysqli_query($conn,$sql2);
		$arr[] = array(); 
		while($row=mysqli_fetch_array($que2)){
			$arr[]=$row['formsname'];
		}
		if(in_array($formsname,$arr)){
			echo "<script>alert('组织已存在，添加失败');parent.location.reload();</script>";
		}else{
			$sql="insert into cate(formsname,branchs) VALUES ('$formsname','$branchs')";
			$que=mysqli_query($conn,$sql);
			if($que){
				echo "<script>alert('添加成功');parent.location.reload();</script>";
			}else{
				die("数据库连接失败");
			}
		}
	}
?>