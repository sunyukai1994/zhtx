<?php
	header("content-type:text/html;charset=utf8");
	$id=$_GET["id"];
	$conn=mysqli_connect("localhost","root","123456","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql="select * from admin where id='$id'";
		$que=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($que); 
	}
?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>管理员列表-修改密码</title>
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
    </head>
    
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form" action="admin-password-upd.php?id=<?php echo $row['id'] ?>" method="post">
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">管理员名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="username" disabled="" value="<?php echo $row['username'] ?>" class="layui-input" disabled></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_oldpass" class="layui-form-label">
                            旧密码</label>
                        <div class="layui-input-inline">
                            <input type="password" id="L_oldpass" name="oldpass" required="" lay-verify="oldpass" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_pass" class="layui-form-label">
                            新密码</label>
                        <div class="layui-input-inline">
                            <input type="password" id="L_pass" name="newpass" required="" lay-verify="newpass" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">
                            <span style="color: red;"> * </span> 6到16个字符
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                            确认密码</label>
                        <div class="layui-input-inline">
                            <input type="password" id="L_repass" name="repass" required="" lay-verify="repass" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn layui-btn-fluid layui-btn-normal" style="width: 190px;" lay-filter="save" lay-submit="">提交</button>
                    </div>
                </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;
                //自定义验证规则
                form.verify({
                    oldpass:function(value){
                        if (value != <?php echo $row['password']?>) {
                            return '抱歉旧密码不对';
                        }
                    },
                    newpass: [/(.+){6,12}$/, '密码必须6到12位'],
                    repass: function (value) {
                        if ($('#L_pass').val() != $('#L_repass').val()) {
                            return '两次密码不一致';
                        }
                    }
                });
                //监听提交
                // form.on('submit(save)',
                // function(data) {
                //     console.log(data);
                //     //发异步，把数据提交给php
                //     layer.alert("修改成功", {
                //         icon: 6
                //     },
                //     function() {
                //         // 获得frame索引
                //         var index = parent.layer.getFrameIndex(window.name);
                //         //关闭当前frame
                //         parent.layer.close(index);
                //     });
                //     return false;
                // });

            });</script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>