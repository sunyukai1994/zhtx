<?php
	header("Content-type:text/html;charset=utf8");
    $id=$_GET['id'];
	$conn=mysqli_connect("localhost","root","123456","zhtx");//mysql_connect — 打开一个到 MySQL 服务器的连接
	mysqli_set_charset($conn,'utf8');//修改数据库连接字符集为 utf8
	$sql="select * from admin where id='$id' ";//查询表里所有的数据
	$que=mysqli_query($conn,$sql);//执行一条 MySQL 查询
	$row=mysqli_fetch_array($que);
?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>个人信息</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
		<script>
			layui.use('layer', function(){ 
				var $ = layui.$ //由于layer弹层依赖jQuery，所以可以直接得到
				,layer = layui.layer;
			});
		</script>
    </head>
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">
                  <div class="layui-form-item">
                      <label for="username" class="layui-form-label">
                          登录名
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="username" required="" lay-verify="required"
                          autocomplete="off" class="layui-input" readonly value="<?php echo $row['username'] ?>">
                      </div>
                  </div>
                  <div class="layui-form-item">
                      <label for="phone" class="layui-form-label">
                          手机
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="phone" name="phone" required="" lay-verify="phone"
                          autocomplete="off" class="layui-input" readonly  value="<?php echo $row['phone'] ?>">
                      </div>
                  </div>
                  <!-- <div class="layui-form-item">
                      <label class="layui-form-label">角色</label>
                      <div class="layui-input-block">
                        <?php if ($row['role']=="超级管理员") {?>
                            <input type="checkbox" checked disabled id="checkbox1" name="like1[write]" lay-skin="primary" title="超级管理员" onclick="return false;">
                        <?php } ?>
                        <?php if ($row['role']=="管理员") {?>
                            <input type="checkbox" checked disabled id="checkbox2" name="like1[read]" lay-skin="primary" title="管理员" onclick="return false;">
                        <?php } ?>
                      </div>
                  </div> -->
                  <div class="layui-form-item">
                      <label for="L_pass" class="layui-form-label">
                          密码
                      </label>
                      <div class="layui-input-inline">
                          <input type="password" id="L_pass" name="pass" required="" lay-verify="pass"
                          autocomplete="off" class="layui-input" readonly  value="<?php echo $row['password'] ?>">
                      </div>
                  </div>
              </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;
            });</script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>
