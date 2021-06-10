<?php
	header("Content-type:text/html;charset=utf8");
	$conn=mysqli_connect("localhost","root","root","zhtx");//mysql_connect — 打开一个到 MySQL 服务器的连接
	mysqli_set_charset($conn,'utf8');//修改数据库连接字符集为 utf8
	$sql="select * from users";//查询表里所有的数据
	$que=mysqli_query($conn,$sql);//执行一条 MySQL 查询
?>
<!DOCTYPE html>
<html class="x-admin-sm">
<head>
  <meta charset="UTF-8">
  <title>用户列表</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
  <link rel="stylesheet" href="./css/font.css">
  <link rel="stylesheet" href="./css/xadmin.css">
  <script src="./lib/layui/layui.js" charset="utf-8"></script>
  <script type="text/javascript" src="./js/xadmin.js"></script>
  <script type="text/javascript" src="./js/jquery.min.js"></script>
</head>
<script type="text/javascript">
	// var arr = [];
	// $(function () {
	// 	$.ajax({
	// 	  url: "https://www.fastmock.site/mock/be9c1aa961acaec5de881204faa73095/syk/api/users",
	// 	  contentType: "application/json",
	// 	  data: "", //请求的附加参数，用json对象
	// 	  method: 'POST',
	// 	  success: function (res) {
	// 		// console.log(res.data);
	// 		layui.use(['laypage', 'layer'], () => {
	// 		  var laypage = layui.laypage,
	// 			  layer = layui.layer;
	// 		  console.log(res.data.length);
	// 		  //自定义首页、尾页、上一页、下一页文本
	// 		  laypage.render({
	// 			elem: 'demo3',
	// 			count: res.data.length,
	// 			first: '首页',
	// 			last: '尾页',
	// 			prev: '<em>←</em>',
	// 			next: '<em>→</em>',
	// 			limit: 15,
	// 			jump: (obj) => {
	// 			  // console.log(obj)
	// 			  document.getElementById('tbody').innerHTML = function () {
	// 					var thisData = res.data.concat().splice(obj.curr * obj.limit - obj.limit, obj.limit);
	// 					layui.each(thisData, function (index, item) {
	// 					  // console.log(item)
	// 						arr.push(`
	// 							<tr>
	// 							  <td>${item.id}</td>
	// 							  <td>${item.username}</td>
	// 							  <td>${item.sex}</td>
	// 							  <td>${item.tel}</td>
	// 							  <td>${item.address}</td>
	// 							  <td class="td-status">
	// 								<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
	// 							  <td class="td-manage">
	// 								<a onclick="member_stop(this,'10001')" href="javascript:;"  title="停用">
	// 								  <i class="layui-icon">&#xe601;</i>
	// 								</a>
	// 								<a title="修改"  onclick="xadmin.open('修改','member-edit.html',600,400)" href="javascript:;">
	// 								  <i class="layui-icon">&#xe642;</i>
	// 								</a>
	// 								<a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
	// 								  <i class="layui-icon">&#xe640;</i>
	// 								</a>
	// 							  </td>
	// 							</tr>
	// 						  `);	
	// 					})
	// 				return arr.join('');
	// 			  }();
	// 			}
	// 		  });
	// 		});
			
	// 	  }
	// 	})
	// })
</script>
<style>
  .zhuangtai{
    padding: 7.5px 10px;
    margin-right:15px;
    color:#fff;
    background:#1e9fff;
    border-radius: 2px;
    cursor: pointer;
  }
  .zhuangtai:hover{
    color:#fff;
  }
  .zhuangtai2{
    background:#f60;
  }
  table tr td{
    text-align: center;
  }
</style>
<body>
  <div class="x-nav">
    <span class="layui-breadcrumb">
      <a href="">首页</a>
      <a href="">用户管理</a>
      <a>
        <cite>用户列表</cite></a>
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
      <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
  </div>
  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-header">
            <button class="layui-btn layui-btn-fluid layui-btn-lg" onclick="xadmin.open('添加用户','./member-add.html',560,400)">
              <i class="layui-icon"></i>添加</button>
          </div>
          <div class="layui-card-body layui-table-body layui-table-main">
            <table class="layui-table layui-form">
              <thead>
                <tr>
                  <th style="text-align: center;">ID</th>
                  <th style="text-align: center;">用户名</th>
                  <th style="text-align: center;">性别</th>
                  <th style="text-align: center;">手机</th>
                  <th style="text-align: center;">地址</th>
                  <th style="text-align: center;">状态</th>
                  <th style="text-align: center;">操作</th>
                </tr>
              </thead>
              <tbody id="tbody">
               <?php while($row=mysqli_fetch_array($que)){ ?> 
                <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['username'] ?></td>
                  <td><?php echo $row['sex'] ?></td>
                  <td><?php echo $row['phone'] ?></td>
                  <td style="width:40%"><?php echo $row['address'] ?></td>
                  <td class="td-status" style="width:5%;">
                    <?php if($row['states']==0){ ?> 
                      <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>
                    <?php }if($row['states']==1){?>
                      <span class="layui-btn layui-btn-normal layui-btn-disabled layui-btn-mini">已停用</span>
                    <?php } ?>
                  </td>
                  <td class="td-manage">
                    <?php if($row['states']==0){ ?> 
                      <a href="member-states.php?id=<?php echo $row['id'] ?> & states=1 " class="zhuangtai zhuangtai2">
                        <i class="layui-icon">&#xe601;</i>
                        停用
                      </a>
                    <?php }if($row['states']==1){?>
                      <a href="member-states.php?id=<?php echo $row['id'] ?> & states=0 " class="zhuangtai">
                        <i class="layui-icon">&#xe62f;</i>
                        启用
                      </a>
                    <?php } ?>
                    <button class="layui-btn layui-btn layui-btn-xs" 
                     onclick="xadmin.open('编辑','member-edit.php?id=<?php echo $row['id'] ?>',600,450)" >
                     <i class="layui-icon">&#xe642;</i>编辑</button>
                    <button class="layui-btn layui-btn-warm layui-btn-xs"  
                    onclick="xadmin.open('修改密码','member-password.php?id=<?php echo $row['id'] ?>',600,450)" >
                    <i class="layui-icon">&#xe642;</i>修改密码</button>
                    <button class="layui-btn-danger layui-btn layui-btn-xs"  
                    onclick="member_del(this,<?php echo $row['id'] ?>)" href="javascript:;" >
                    <i class="layui-icon">&#xe640;</i>删除</button>
                  </td>
                </tr>
               <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="layui-card-body">
            <div class="page">
              <div id="demo3"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  layui.use(['laydate', 'form'], function () {
    var laydate = layui.laydate;
    var form = layui.form;

    // 监听全选
    form.on('checkbox(checkall)', function (data) {

      if (data.elem.checked) {
        $('tbody input').prop('checked', true);
      } else {
        $('tbody input').prop('checked', false);
      }
      form.render('checkbox');
    });

    //执行一个laydate实例
    laydate.render({
      elem: '#start' //指定元素
    });

    //执行一个laydate实例
    laydate.render({
      elem: '#end' //指定元素
    });


  });
  /*用户-停用*/
  // function member_stop(obj, id) {
  //   layer.confirm('切换用户状态', function (index) {
  //     if ($(obj).attr('title') == '停用') {
  //       //发异步把用户状态进行更改
  //       $(obj).attr('title', '启用');
  //       $(obj).find('i').html('&#xe62f;');
  //       $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
  //       layer.msg('已停用!', {
  //         icon: 5,
  //         time: 1000
  //       });
  //     } else {
  //       $(obj).attr('title', '停用');
  //       $(obj).find('i').html('&#xe601;');
  //       $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
  //       layer.msg('已启用!', {
  //         icon: 6,
  //         time: 1000
  //       });
  //     }
  //   });
  // }

  /*用户-删除*/
  function member_del(obj, id) {
    layer.confirm('确认要删除吗？', function (index) {
      //发异步删除数据
      // $(obj).parents("tr").remove();
      // alert(id);
      layer.msg('已删除!', {
        icon: 1,
        time: 1000
      });
      location.href = "member-list-del.php?id="+id;
    });
  }
</script>
</html>