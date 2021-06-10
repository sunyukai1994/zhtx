<?php
	header("content-type:text/html;charset=utf8");
	$id=$_GET["id"];
	$conn=mysqli_connect("localhost","root","root","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql="select * from cate where id='$id'";
		$que=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($que); 
	}
?>
<!DOCTYPE html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>组织管理-公司修改</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
</head>

<body>
    <div class="layui-fluid">
        <div class="layui-row">
            <form class="layui-form" action="cate-edit-upd.php?id=<?php echo $row['id'] ?>" method="post">
                <div class="layui-form-item">
                    <label for="formsname" class="layui-form-label">组织名</label>
                    <div class="layui-input-inline">
                        <input type="text" id="formsname" name="formsname" value="<?php echo $row['formsname'] ?>" required="" lay-verify="formsname"
                            autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span style="color: red;"> * </span> 组织名不能为空
                    </div>
                </div>
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
                    formsname: function (value) {
                        if (value.length < 1) {
                            return '组织名不能为空';
                        }
                    }
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