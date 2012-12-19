<!DOCTYPE HTML>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
		<title>ThinkPHP 手册</title>
		<link rel="stylesheet" href="{%ROOT}/public/css/book.css">
		<link rel="stylesheet" href="{%ROOT}/public/css/prettify.css">
		<script type="text/javascript" src="{%ROOT}/public/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="{%ROOT}/public/js/prettify.js"></script>
		<script type="text/javascript">
			$(function(){	
				//表格隔行变色
				$('table').TableColor();
				
				//代码高亮
				prettyPrint();
				
			});

			//表格隔行变色插件
			(function($){
				$.fn.TableColor = function(){
					return $(this).each(function(){
						if(this.nodeName.toLowerCase() != 'table') return;
						var self = $(this);
						self.find('tr').each(function(index) {
							var _this = $(this);
							if(index % 2 == 0){
								_this.addClass('add');
							} else {
								_this.addClass('even');	
							}
							_this.hover(
								function(){_this.addClass('hover')},
								function(){_this.removeClass('hover')}
							);
						});	
					});
				}	
			})(jQuery)
		</script>
	</head>
	<body>
		<div class="book-content">
			{%s}
		</div>
	</body>
</html>