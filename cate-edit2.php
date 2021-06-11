<?php
	header("content-type:text/html;charset=utf8");
	$id=$_GET["id"];
	$conn=mysqli_connect("localhost","root","123456","zhtx");
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
            <form class="layui-form" action="cate-edit2-upd.php?id=<?php echo $row['id'] ?>" method="post">
                <div class="layui-form-item">
                    <label for="branchs" class="layui-form-label">子组织群组</label>
                    <div class="layui-input-inline">
                        <input type="text" id="branchs" name="branchs" value="<?php echo $row['branchs'] ?>" required="" lay-verify="branchs"
                            autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span style="color: red;"> * </span> 子组织如果有多个请用英文","分割
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
                    branchs: function (value) {
                        if (value.length < 1) {
                            return '子组织最少为1个';
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