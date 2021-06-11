<?php
	header("Content-type:text/html;charset=utf8");
    $username=$_POST['username'];
	$password=$_POST['password'];
	$conn=mysqli_connect("localhost","root","123456","zhtx");
	mysqli_set_charset($conn,'utf8');
	$sql="select * from admin where username='$username' and password='$password' ";
	$que=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($que);
    // echo "<pre>";
    // print_r($row['id']);
    // print_r($row['username']);
    // echo $password;
    // print_r($row);
    // echo $row['password'];
    // echo "</pre>";

    // var_dump($row['states']);
    // 判断管理员是否启用停用
    $sql2="select username from admin";
    $que2=mysqli_query($conn,$sql2);
    $arr2[] = array(); 
    while($row2=mysqli_fetch_array($que2)){
        $arr2[]=$row2['username'];
    }
    $sql3="select password from admin where username='$username'";
    $que3=mysqli_query($conn,$sql3);
    $arr3[] = array();
    while($row3=mysqli_fetch_array($que3)){
        $arr3[]=$row3['password'];
    }
    if(in_array($username,$arr2)){
        if(in_array($password,$arr3)){
            if ($row['states'] == 0) {
                $id = $row['id'];
                echo "<script>location.href='index.php?id=$id';</script>";
            }else{
                echo "<script>alert('抱歉账号已停用');location.href='login.html';</script>";
            }
        }else{
            echo "<script>alert('密码错误');location.href='login.html';</script>";
        }
    }else{
        echo "<script>alert('用户名错误');location.href='login.html';</script>";
    }
    
        
    
    
	
?>