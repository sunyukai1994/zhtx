<?php
	header("Content-type:text/html;charset=utf8");
    $id=$_GET['id'];
	$conn=mysqli_connect("localhost","root","root","zhtx");
	mysqli_set_charset($conn,'utf8');
	$sql="select * from admin where id='$id' ";
	$que=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($que);

    // 用户
    $sql1="select * from users";
    $que1=mysqli_query($conn,$sql1);
    while($row1=mysqli_fetch_array($que1)){
        $arr1[]=$row1['id'];
    }
    // echo count($arr1);
    
    // 管理员
    $sql2="select id from admin";
	$que2=mysqli_query($conn,$sql2);
	while($row2=mysqli_fetch_array($que2)){
        $arr2[]=$row2['id'];
    }
    // echo count($row2);

    // 组织
    $sql3="select id from cate";
	$que3=mysqli_query($conn,$sql3);
	while($row3=mysqli_fetch_array($que3)){
        $arr3[]=$row3['id'];
    }
    // echo count($row3);

    // 角色
    $sql4="select id from roles";
	$que4=mysqli_query($conn,$sql4);
	while($row4=mysqli_fetch_array($que4)){
        $arr4[]=$row4['id'];
    }
    // echo count($row4);
?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <script type="text/javascript" src="./js/jquery.min.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <script>
    $(function(){
      	$.ajax({
      		url:"https://www.fastmock.site/mock/be9c1aa961acaec5de881204faa73095/syk/system",
      		contentType: "application/json",
      		data:"",
      		method: 'POST',
      		success:function(res){
      			console.log(res.data);
      			res.data.forEach((value)=>{
      				console.log(value);
      				$("#system").append(`
      					<tr>
      					  <td>${value.name}</td>
      					  <td>${value.con}</td>
      					</tr>
      				`)
      			})

      		}
      	})

          $.ajax({
      		url:"https://www.fastmock.site/mock/be9c1aa961acaec5de881204faa73095/syk/team",
      		contentType: "application/json",
      		data:"",
      		method: 'POST',
      		success:function(res){
      			console.log(res.data);
      			res.data.forEach((value)=>{
      				console.log(value);
      				$("#team").append(`
      					<tr>
      					  <td>${value.name}</td>
      					  <td>${value.con}</td>
      					</tr>
      				`)
      			})

      		}
      	})
      })	
    </script>
    <body>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <blockquote class="layui-elem-quote">欢迎管理员：
                                <span class="x-red"><?php echo $row['username'] ?></span>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">数据统计</div>
                        <div class="layui-card-body ">
                            <ul class="layui-row layui-col-space10 layui-this x-admin-carousel x-admin-backlog">
                                <li class="layui-col-md3 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>平台用户</h3>
                                        <p><cite><?php echo count($arr1) ?></cite></p>
                                    </a>
                                </li>
                               
                                <li class="layui-col-md3 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>管理员数</h3>
                                        <p><cite><?php echo count($arr2) ?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md3 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>组织数量</h3>
                                        <p><cite><?php echo count($arr3) ?></cite></p>
                                    </a>
                                </li>
                                <li class="layui-col-md3 layui-col-xs6">
                                    <a href="javascript:;" class="x-admin-backlog-body">
                                        <h3>角色数量</h3>
                                        <p><cite><?php echo count($arr4) ?></cite></p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>                
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">系统信息</div>
                        <div class="layui-card-body ">
                            <table class="layui-table">
                                <tbody id="system">
                                    <!-- <tr>
                                        <th>前端</th>
                                        <td>jQuery+layUI</td>
                                    </tr>
                                    <tr>
                                        <th>代码编辑器</th>
                                        <td>ACE</td>
                                    </tr>
                                    <tr>
                                        <th>后台</th>
                                        <td>PHP</td>
                                    </tr>
                                    <tr>
                                        <th>数据库</th>
                                        <td>MySQL</td>
                                    </tr>
                                    <tr>
                                        <th>运行环境</th>
                                        <td>phpStudy集成环境：Apache/2.4.39 (Win64)+MySQL5.7.26+Nginx1.15.11 </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">开发团队</div>
                        <div class="layui-card-body ">
                            <table class="layui-table">
                                <tbody id="team">
                                    <!-- <tr>
                                        <th>版权所有</th>
                                        <td>孙玉凯</td>
                                    </tr>
                                    <tr>
                                        <th>开发者</th>
                                        <td>孙玉凯(1228333267@qq.com)</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>