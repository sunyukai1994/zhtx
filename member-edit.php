<?php
	header("content-type:text/html;charset=utf8");
	$id=$_GET["id"];
	$conn=mysqli_connect("localhost","root","root","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql="select * from users where id='$id'";
		$que=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($que); 
	}
?>
<!DOCTYPE html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>用户列表-修改</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
</head>

<body>
    <div class="layui-fluid">
        <div class="layui-row">
            <form class="layui-form" action="member-edit-upd.php?id=<?php echo $row['id'] ?>" method="post" >
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        用户名</label>
                    <div class="layui-input-inline">
                        <input type="text" id="username" name="username" required="" lay-verify="username"
                            autocomplete="off" class="layui-input" value="<?php echo $row['username'] ?>">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span style="color: red;"> * </span>用户名不能为空
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="sex" class="layui-form-label">
                        性别</label>
                    <div class="layui-input-inline">
                    <?php if ($row['sex']=="男") {?>
                        <input type="radio" id="sex1" name="sex" value="男" title="男" checked="">
                        <input type="radio" id="sex2" name="sex" value="女" title="女">
                    <?php } ?>
                    <?php if ($row['sex']=="女") {?>
                        <input type="radio" id="sex1" name="sex" value="男" title="男">
                        <input type="radio" id="sex2" name="sex" value="女" title="女" checked="">
                    <?php } ?>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="phone" class="layui-form-label">
                        手机</label>
                    <div class="layui-input-inline">
                        <input type="text" id="phone" name="phone" required="" lay-verify="phone" autocomplete="off"
                            class="layui-input" minlength="11" maxlength="11" value="<?php echo $row['phone'] ?>">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span style="color: red;"> * </span>请输入长度为11位标准手机号
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="address" class="layui-form-label">
                        地址</label>
                    <div class="layui-input-inline">
                        <input type="text" id="address" name="address" required="" lay-verify="address" autocomplete="off"
                            class="layui-input" minlength="2" value="<?php echo $row['address'] ?>">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span style="color: red;"> * </span>地址不能为空
                    </div>
                </div>
                <!-- <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        密码</label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_pass" name="password" required="" lay-verify="pass" autocomplete="off"
                            class="layui-input" value="">
                    </div>
                    <div class="layui-form-mid layui-word-aux">6到16个字符</div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        确认密码</label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_repass" name="repass" required="" lay-verify="repass"
                            autocomplete="off" class="layui-input">
                    </div>
                </div> -->
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label"></label>
                    <button class="layui-btn layui-btn-fluid layui-btn-normal" style="width: 190px;" lay-filter="add" lay-submit="">提交</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        layui.use(['form', 'layer'],
            function () {
                $ = layui.jquery;
                var form = layui.form,
                    layer = layui.layer;

                //自定义验证规则
                form.verify({
                    username: function (value) {
                        if (value.length < 1) {
                            return '用户名至少1个字符';
                        }
                    },
                    address:function(value){
                        if(value.length < 1){
                            return '地址不能为空';
                        }
                    }
                    // pass: [/(.+){6,12}$/, '密码必须6到12位'],
                    // repass: function (value) {
                    //     if ($('#L_pass').val() != $('#L_repass').val()) {
                    //         return '两次密码不一致';
                    //     }
                    // }
                });


            });
    </script>
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</body>

</html>