<?php
	header("Content-type:text/html;charset=utf8");
    $id=$_GET['id'];
	$conn=mysqli_connect("localhost","root","123456","zhtx");//mysql_connect — 打开一个到 MySQL 服务器的连接
	mysqli_set_charset($conn,'utf8');//修改数据库连接字符集为 utf8
	$sql="select * from admin where id='$id' ";//查询表里所有的数据
	$que=mysqli_query($conn,$sql);//执行一条 MySQL 查询
	$row=mysqli_fetch_array($que);
?>
<!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>孙玉凯</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
		<link rel="shortcut icon" href="./images/logo.ico" type="image/x-icon" /> 
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
		<link id="original" rel="stylesheet" href="./css/theme10.css">
        <!-- <link rel="stylesheet" href="./css/theme5.css"> -->
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="index">
        <div class="container">
            <div class="logo">
                <a href="./index.php">权限管理系统</a></div>
            <div class="left_open">
                <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
            </div>
            <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;" id="username"><?php echo $row['username'] ?></a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a onclick="xadmin.add_tab('个人信息','my-news.php?id=<?php echo $id ?>')">个人信息</a></dd>
                        <dd>
                            <a href="./login.html">退出</a></dd>
                    </dl>
                </li>
				<li class="layui-nav-item">
				    <a href="javascript:;">换肤</a>
				    <dl class="layui-nav-child">
				        <dd id="theme1"><a>高级黑</a></dd>
				        <dd id="theme2"><a>渐变色</a></dd>
						<dd id="theme3"><a>鲜艳红</a></dd>
				    </dl>
				</li>
                <li class="layui-nav-item to-index">
                    <a href="./ace/index.html">前台登录页面</a>
				</li>
            </ul>
        </div>
        <div class="left-nav">
            <div id="side-nav">
                <ul id="nav">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="用户管理">&#xe6b8;</i>
                            <cite>用户管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                            <ul class="sub-menu">
                                <li>
                                    <a onclick="xadmin.add_tab('用户列表','member-list.php')">
                                        <i class="iconfont">&#xe6a7;</i>
                                        <cite>用户列表</cite>
                                    </a>
                                </li>
                            </ul>
                    </li>
                    <li id="zzgl">
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="组织管理">&#xe723;</i>
                            <cite>组织管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('多级组织','cate-list.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>多级组织</cite>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="gly">
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="管理员管理">&#xe726;</i>
                            <cite>管理员管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('管理员列表','admin-list.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>管理员列表</cite>
                                </a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('角色管理','role-list.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>角色管理</cite>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-content">
            <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                <ul class="layui-tab-title">
                    <li class="home">
                        <i class="layui-icon">&#xe68e;</i>我的桌面</li></ul>
                <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                    <dl>
                        <dd data-type="this">关闭当前</dd>
                        <dd data-type="other">关闭其它</dd>
                        <dd data-type="all">关闭全部</dd></dl>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src='./welcome.php?id=<?php echo $id ?>' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                    </div>
                </div>
                <div id="tab_show"></div>
            </div>
        </div>
        <div class="page-content-bg"></div>
        <style id="theme_style"></style>
        <script>
            // 是否开启刷新记忆tab功能
            // var is_remember = false;
        	layui.use('layer', function(){ 
        		var $ = layui.$ //由于layer弹层依赖jQuery，所以可以直接得到
        		,layer = layui.layer;
        		//取值
        		// let user = layui.data('user');
        		// console.log(user.data);
        		// $("#username").text(user.data.username);
                // if (user.data.username != "syk") {
                //     $("#gly").hide();
                // }
                // if (user.data.username != "syk" && user.data.username != "admin") {
                //     $("#zzgl").hide();
                //     $("#gly").hide();
                // }
            // 权限管理
            var gly = "<?php echo$row['role']?>";
            if (gly== "管理员") {
                $("#gly").hide();
            }
            if (gly == "管理员2") {
                $("#zzgl").hide();
                $("#gly").hide();
            }
        	// 换肤
        	$("#theme1").click(()=>{
        		let cssFileUrl='./css/theme10.css';
        		if (cssFileUrl) {
        			$("<link>")
        				.attr({
        					rel: "stylesheet",
        					type: "text/css",
        					href: cssFileUrl
        				})
        				.appendTo("head");
        		}
        	})
        	$("#theme2").click(()=>{
        		let cssFileUrl='./css/theme9.css';
        		if (cssFileUrl) {
        			$("<link>")
        				.attr({
        					rel: "stylesheet",
        					type: "text/css",
        					href: cssFileUrl
        				})
        				.appendTo("head");
        		}
        	})
        	$("#theme3").click(()=>{
        		let cssFileUrl='./css/theme12.css';
        		if (cssFileUrl) {
        			$("<link>")
        				.attr({
        					rel: "stylesheet",
        					type: "text/css",
        					href: cssFileUrl
        				})
        				.appendTo("head");
        		}
        	})
        	});
        </script>
    </body>
</html>