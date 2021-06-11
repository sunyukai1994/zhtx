<?php
	header("Content-type:text/html;charset=utf8");
	$conn=mysqli_connect("localhost","root","123456","zhtx");//mysql_connect — 打开一个到 MySQL 服务器的连接
	mysqli_set_charset($conn,'utf8');//修改数据库连接字符集为 utf8
	$sql="select * from cate";//查询表里所有的数据
	$que=mysqli_query($conn,$sql);//执行一条 MySQL 查询
?>
<!DOCTYPE html>
<html class="x-admin-sm">  
    <head>
        <meta charset="UTF-8">
        <title>组织管理-多级组织</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script type="text/javascript" src="./js/jquery.min.js"></script>
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a href="">组织管理</a>
                <a><cite>多级组织</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
          <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
              <div class="layui-card">
                <div class="layui-card-header">
                    <button class="layui-btn layui-btn-fluid layui-btn-lg" onclick="xadmin.open('添加组织','./cate-add.html',600,250)">
                    <i class="layui-icon"></i>添加</button>
                </div>  

                <div class="layui-card-body ">
                    <table class="layui-table layui-form">
                      <thead>
                        <tr>
                          <th>组织名</th>
                          <!-- <th width="80">状态</th> -->
                          <th width="250">操作</th>
                      </thead>
                      <tbody class="x-cate">
                      <?php while($row=mysqli_fetch_array($que)){ ?> 
                        <tr cate-id='1' fid='0'>
                          <td>
                            <i class="layui-icon x-show" status='true'>&#xe623;</i> <?php echo $row['formsname'] ?>
                          </td>
                          <!-- <td>
                            <input type="checkbox" name="switch"  lay-text="开启|停用"  checked="" lay-skin="switch">
                          </td> -->
                          <td class="td-manage">
                            <button class="layui-btn layui-btn layui-btn-xs"  onclick="xadmin.open('编辑','cate-edit.php?id=<?php echo $row['id'] ?>',500,190)" ><i class="layui-icon">&#xe642;</i>编辑</button>
                            <button class="layui-btn layui-btn-warm layui-btn-xs"  onclick="xadmin.open('编辑','cate-edit2.php?id=<?php echo $row['id'] ?>',560,190)" ><i class="layui-icon">&#xe642;</i>编辑子组织</button>
                            <button class="layui-btn-danger layui-btn layui-btn-xs"  onclick="member_del(this,<?php echo $row['id'] ?>)" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button>
                          </td>
                        </tr>
                        <?php $arr=explode(",",$row['branchs']); for($i=0;$i<count($arr);$i++){ ?> 
                        <tr cate-id='2' fid='1' >
                          <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            ├   <?php echo $arr[$i]; ?>
                          </td>
                          <!-- <td>
                            <input type="checkbox" name="switch"  lay-text="开启|停用"  checked="" lay-skin="switch">
                          </td> -->
                          <td class="td-manage">
                            <!-- <button class="layui-btn layui-btn layui-btn-xs"  onclick="xadmin.open('编辑','cate-edit.html',500,400)" ><i class="layui-icon">&#xe642;</i>编辑</button> -->
                            <!-- <button class="layui-btn-danger layui-btn layui-btn-xs"  onclick="member_del(this,'要删除的id')" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button> -->
                          </td>
                        </tr>
                        <?php } ?>
                      <?php } ?>
                      </tbody>
                    </table>
                </div>
                <div class="layui-card-body ">
                    <div class="page">
                    <!-- <div id="demo3"></div> -->
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<script>
		layui.use(['laypage', 'layer'], function(){
		  var laypage = layui.laypage
		  ,layer = layui.layer;
		  
		  //自定义首页、尾页、上一页、下一页文本
		  laypage.render({
		    elem: 'demo3'
		    ,count: 30
		    ,first: '首页'
		    ,last: '尾页'
		    ,prev: '<em>←</em>'
		    ,next: '<em>→</em>'
		  });  
		});
		</script>
        <script>
          layui.use(['form'], function(){
            form = layui.form;
            
          });
           /*用户-删除*/
           function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发异步删除数据
                // $(obj).parents("tr").remove();
                // alert(id);
                layer.msg('已删除!',{
                    icon:1,
                    time:1000
                });
                location.href = "cate-list-del.php?id="+id;

            });
        }
          // 分类展开收起的分类的逻辑
          $(function(){
            $("tbody.x-cate tr[fid!='0']").hide();
            // 栏目多级显示效果
            
            $('.x-show').eq(0).click(function () {
              if($(this).attr('status')=='true'){
                  $(this).html('&#xe625;'); 
                  $(this).attr('status','false');
                  cateId = $(this).parents('tr').attr('cate-id');
                  $("tbody tr[fid="+cateId+"]:lt(3)").show();

              }else{
                  cateIds = [];
                  $(this).html('&#xe623;');
                  $(this).attr('status','true');
                  cateId = $(this).parents('tr').attr('cate-id');
                  getCateId(cateId);
                  for (var i in cateIds) {
                      $("tbody tr[cate-id="+cateIds[i]+"]:lt(3)").hide().find('.x-show').html('&#xe623;').attr('status','true');
                  }
              }
            })
            $('.x-show').eq(1).click(function () {
              if($(this).attr('status')=='true'){
                  $(this).html('&#xe625;'); 
                  $(this).attr('status','false');
                  cateId = $(this).parents('tr').attr('cate-id');
                  $("tbody tr[fid="+cateId+"]:gt(2)").show();

              }else{
                  cateIds = [];
                  $(this).html('&#xe623;');
                  $(this).attr('status','true');
                  cateId = $(this).parents('tr').attr('cate-id');
                  getCateId(cateId);
                  for (var i in cateIds) {
                      $("tbody tr[cate-id="+cateIds[i]+"]:gt(2)").hide().find('.x-show').html('&#xe623;').attr('status','true');
                  }
              }
            })
            
          })

          var cateIds = [];
          function getCateId(cateId) {
              $("tbody tr[fid="+cateId+"]").each(function(index, el) {
                  id = $(el).attr('cate-id');
                  cateIds.push(id);
                  getCateId(id);
              });
          }
   
        </script>
    </body>
</html>
