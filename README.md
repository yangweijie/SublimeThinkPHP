##Thinkphp是什么?
Sublime中的一个THinkphp框架的工具包，主要包括thinkphp snippet、访问框架在线api、以及一些编程辅助功能。目前重构的插件去除了手册相关功能，同时支持Sublime text2和3版本。

##Thinkphp有哪些功能？

*  访问官网框架在线api
*  辅助删除编辑器中打开目录所有文件的bom头(后期补上，移植到3的时候报错解决不了，等我想办法解决)
*  通过sublime-completions提供代码完成功能
*  ctrl点击或者选中函数名后右键显示函数说明文档（英文）
手册目录
![ThinkPHP manual](http://www.thinkphp.cn/Uploads/editor/2013-07-14/51e25dad0bc2b.jpg)
改进后的菜单少了一层，更快捷
Snippet提示
![sublime-completions](http://www.thinkphp.cn/Uploads/editor/2013-07-14/51e25e9621c58.png)

![视频: 用Sublime text2的Thinkphp插件 像zencoding)一样快速开发TP](http://v.youku.com/v_show/id_XNTA1NjE2MTM2.html)
查看函数说明文档
已经重新写了一个PhpNinJaManual 插件，请移步插件首页查看 <https://github.com/yangweijie/SublimePHPNinJaManual>
mysql编辑器内简单查询
![效果图](http://www.thinkphp.cn/Uploads/speech/2013-08-04/51fe0a85ecca9.png "效果图")
1.在tools->ThinkPHP->ThinkPHP choose database来添加数据库和选择当前数据库
![选择数据库](http://ww2.sinaimg.cn/mw1024/50075709jw1e61cpzgtwpj20e304tmxg.jpg "选择数据库")

添加数据库选择"add database",后如下图：
![添加数据库](http://ww2.sinaimg.cn/mw1024/50075709jw1e61cpzwnbqj20j10hv0ul.jpg)

注意database里 0 的那个键不要删除，剪切板里会有要添加的模板，自己要么先删除只剩0，保存后。下次选添加进来，粘贴会有1的模板，自己替换下即可。以后会扩展支持sqlserver。

现在查看数据表字段注释和数据库查询统一用配置里的去访问数据库，因此有个“change database”菜单和“database queryer”菜单，查询表字段支持tp的命名方式，比如原表名think_user，在配置文件里配了前缀后我们在php文件里写D('User') 这样User选中后右键直接show_cloums就行了，为了方便大家记忆去除从输入框填写的步骤，简化为一个操作
效果如下:

![效果图](http://www.thinkphp.cn/Uploads/editor/2012-12-10/50c56b7fd4e97.png)

最后还支持了命令行访问网页cli模式方便大家调试action中操作，不需要开浏览器。
选择菜单中的ThinkPHP-CLI 弹出的文件中 输入你想访问的url 记住打开的项目更目录要有入口文件，并且php在path环境变量中有设置。
保存就可显示结果:

![效果图](http://www.thinkphp.cn/Uploads/editor/2013-07-14/51e2689cce54a.png)

这样方便大家调试数据而不必切换浏览器，或者调试接口的时候用


##有问题反馈
在使用中有任何问题，欢迎反馈给我，可以用以下联系方式跟我交流

* 邮件(yangweijiest#gmail.com, 把#换成@)
* QQ: 917647288
* weibo: [@黑白世界4648](http://weibo.com/1342658313)
* 人人: [@杨维杰](http://www.renren.com/247050624)

##注意点
由于新版emmet(原名zencoding)插件禁用了模板中的php自动完成，导致我的完成不生效。想使用者在emmet的user配置中 使用'"use_old_tab_handler": true,' 就可以有原先的功能了。
##关于作者

```javascript
	var code-tech = {
		nickName  : "杨维杰",
		site : "http://code-tech.diandian.com"
	}
```