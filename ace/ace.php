<?php
	header("Content-type:text/html;charset=utf8");
    $id=$_GET['id'];
	$conn=mysqli_connect("localhost","root","123456","zhtx");//mysql_connect — 打开一个到 MySQL 服务器的连接
	mysqli_set_charset($conn,'utf8');//修改数据库连接字符集为 utf8
	$sql="select * from users where id='$id' ";//查询表里所有的数据
	$que=mysqli_query($conn,$sql);//执行一条 MySQL 查询
	$row=mysqli_fetch_array($que);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>ACE实现代码编辑器</title>
	<script src="js/src/ace.js"></script>
	<script src="js/src/ext-language_tools.js"></script>
	<script src="../js/jquery.min.js"></script>
	<script src="../lib/layui/layui.js"></script>
	<link rel="stylesheet" href="../lib/layui/css/layui.css">
</head>
<style>
	header{
		width: 100%;
		height: 70px;
		background-color: #393d40;
		margin-bottom: 10px;
	}
	header div:nth-child(1){
		float: left;
		width: 10%;
		height: 60px;
		margin-top: 5px;
		text-align: center;
		/* background-color: red; */
	}
	header div:nth-child(1) img{
		width: auto;
		height: 60px;
	}
	header div:nth-child(2){
		float: left;
		width: 80%;
		height: 60px;
		margin-top: 5px;
		/* background-color: #ade; */
	}
	header div:nth-child(3){
		float: right;
		width: 10%;
		height: 60px;
		margin-top: 5px;
		text-align: center;
		/* background-color: red; */
	}
	header div:nth-child(3) button{
		width: 60%;
		/* height: 60px; */
		margin-top: 10px;
	}
</style>
<body>
	<header>
		<div>
			<img src="../images/ace.png" alt="ACE">
		</div>
		<div></div>
		<div>
			<ul class="layui-nav" lay-bar="disabled">
				<li class="layui-nav-item" lay-unselect="">
				  <a href="javascript:;"><?php echo $row['username'] ?></a>
				  <dl class="layui-nav-child">
					<dd><a href="./users.php?id=<?php echo $row['id'] ?>">个人信息</a></dd>
					<hr>
					<dd style="text-align: center;"><a href="./index.html">退出</a></dd>
				  </dl>
				</li>
			</ul>
		</div>
	</header>
	<ace-playground></ace-playground>
	<script>
		let dom = require("ace/lib/dom");
		class AcePlayground extends HTMLElement {
			constructor() {
				super();
				let shadow = this.attachShadow({mode: "open"});
				let dom = require("ace/lib/dom");
				dom.buildDom(["div", {id: "host"},
					["div", {id: "html"}],
					["div", {id: "css"}], 
					["iframe", {id: "preview"}],
					["style", `
						#host {
							border: solid 1px #ddd;
							display: grid;
							font-size:16px;
							grid-template-areas: "html preview" "css preview" ;
						}
						#html {
							grid-area: html;
							height: 500px;
							font-size:16px;
						}
						#css {
							grid-area: css;
							height: 400px;
							font-size:16px;
						}
						#preview {
							grid-area: preview;
							width: 100%;
							height: 100%;
							border: none;
							font-size:16px;
							background:#ededed;
						}
					`]
				], shadow);
				
				let htmlEditor = ace.edit(shadow.querySelector("#html"), {
					theme: "ace/theme/solarized_light",
					mode: "ace/mode/html",
					value: `<div id='con'>\n\thello world !\n</div>\n<script>\n\twindow.onload=function(){\n\t\tvar a = 222;\n\t\tvar con = document.getElementById("con");\n\t\tcon.innerHTML = a;\n\t}\n<\/script>`,
					autoScrollEditorIntoView: true,
					// 启用代码提示
					enableBasicAutocompletion: true,
					enableSnippets: true,
					enableLiveAutocompletion: true,
					showPrintMargin: false   //去除编辑器里的竖线
				});
				let cssEditor = ace.edit(shadow.querySelector("#css"), {
					theme: "ace/theme/solarized_dark",
					mode: "ace/mode/css",
					value: "#con{\n\t width: 200px;\n\t height: 100px;\n\t color:red;\n\t border:1px solid red;\n\t line-height: 100px;\n\t text-align: center; \n}",
					autoScrollEditorIntoView: true,
					// 启用代码提示
					enableBasicAutocompletion: true,
					enableSnippets: true,
					enableLiveAutocompletion: true,
					showPrintMargin: false   //去除编辑器里的竖线

				});
				let preview = shadow.querySelector("#preview");
				
				this.htmlEditor = htmlEditor;        
				this.cssEditor = cssEditor;
				this.preview = preview;
				
				htmlEditor.renderer.attachToShadowRoot();
				
				this.updatePreview = this.updatePreview.bind(this);
				htmlEditor.on("input", this.updatePreview);
				cssEditor.on("input", this.updatePreview);
				this.updatePreview();
			}
			updatePreview() {
				let code = this.htmlEditor.getValue() + "<style>" + this.cssEditor.getValue() + "</style>";
				this.preview.src = "data:text/html," + encodeURIComponent(code)
			}
		}
		customElements.define('ace-playground', AcePlayground);
	</script>
	<script>
		layui.use('element', function(){
		  var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块
		  
		  //监听导航点击
		  element.on('nav(demo)', function(elem){
			//console.log(elem)
			layer.msg(elem.text());
		  });
		});
	</script>
</body>
</html>