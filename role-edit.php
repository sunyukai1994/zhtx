<?php
	header("content-type:text/html;charset=utf8");
	$id=$_GET["id"];
	$conn=mysqli_connect("localhost","root","123456","zhtx");
	mysqli_set_charset($conn,'utf8');
	if($conn){
		$sql="select * from roles where id='$id'";
		$que=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($que); 
	}
?>
<!DOCTYPE html>
<html class="x-admin-sm">
  <head>
    <meta charset="UTF-8">
    <title>修改角色</title>
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
            <form action="role-edit-upd.php?id=<?php echo $row['id'] ?>" method="post" class="layui-form layui-form-pane">
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        请选择
                    </label>
                    <table  class="layui-table layui-input-block">
                        <tbody>
                            <tr>
                                <td>
                                    <input type="radio" name="username" value="超级管理员" title="超级管理员">
                                </td>
                                <td style="font-size: 14px;">
                                    <span style="margin: 30px 10px;">用户管理</span> 
                                    <span style="margin: 30px 10px;">组织管理</span>
                                    <span style="margin: 30px 10px;">管理员管理</span>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="radio" name="username" value="管理员" title="管理员">
                                </td>
                                <td style="font-size: 14px;">
                                    <span style="margin: 30px 10px;">用户管理</span> 
                                    <span style="margin: 30px 10px;">组织管理</span>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="radio" name="username" value="管理员2" title="管理员2">
                                </td>
                                <td style="font-size: 14px;">
                                    <span style="margin: 30px 10px;">用户管理</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="describes" class="layui-form-label">
                        描述
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" id="describes" name="describes" lay-verify="describes" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid layui-btn-normal" lay-submit="" lay-filter="add">提交</button>
              </div>
            </form>
        </div>
    </div>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
        
          //自定义验证规则
          form.verify({
            describes: function(value){
              if(value.length < 1){
                return '内容不能为空';
              }
            }
          });

        //监听提交
        //   form.on('submit(add)', function(data){
        //     console.log(data);
        //     //发异步，把数据提交给php
        //     layer.alert("增加成功", {icon: 6},function () {
        //         // 获得frame索引
        //         var index = parent.layer.getFrameIndex(window.name);
        //         //关闭当前frame
        //         parent.layer.close(index);
        //     });
        //     return false;
        //   });


        // form.on('checkbox(father)', function(data){

        //     if(data.elem.checked){
        //         $(data.elem).parent().siblings('td').find('input').prop("checked", true);
        //         form.render(); 
        //     }else{
        //        $(data.elem).parent().siblings('td').find('input').prop("checked", false);
        //         form.render();  
        //     }
        // });
          
          
        });
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>
</html>