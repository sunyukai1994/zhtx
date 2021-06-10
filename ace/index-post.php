<?php
	header("Content-type:text/html;charset=utf8");
    $username=$_POST['username'];
	$password=$_POST['password'];
	$conn=mysqli_connect("localhost","root","root","zhtx");
	mysqli_set_charset($conn,'utf8');
	$sql="select * from users where username='$username' and password='$password' ";
	$que=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($que);
    // echo "<pre>";
    // print_r($row['id']);
    // print_r($row['username']);
    // print_r($row['password']);
    // var_dump($row['states']);
    // 判断是否启用停用
    if ($row['states'] == 0) {
        $id = $row['id'];
        echo "<script>location.href='ace.php?id=$id';</script>";
    }else{
        echo "<script>alert('抱歉账号已停用');location.href='index.html';</script>";
    }
	
?>