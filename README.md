##Thinkphp是什么?
Sublime中的一个THinkphp框架的工具包，主要包括访问在线手册，生成本地手册页面，搜索官网手册和thinkphp snippet

##Thinkphp有哪些功能？

*  在编辑器中获取最新手册列表，然后选择后打开本采集的离线手册页面
*  在编辑器中输入关键词或选中词后右键搜索
*  生成全部ThinkPHP官网手册的页面
*  访问官网框架在线api
*  辅助删除编辑器中打开目录所有文件的bom头
*  通过sublime-completions提供代码完成功能
*  ctrl点击或者选中函数名后右键显示函数说明文档（英文） 
手册目录
![ThinkPHP manual](http://ww2.sinaimg.cn/large/50075709tw1dytu1g1xa1j.jpg)
改进后的菜单更集中
![ThinkPHP manual menu](http://ww4.sinaimg.cn/large/50075709tw1dyzlv2uk6oj.jpg)
![ThinkPHP api manual](http://ww3.sinaimg.cn/large/50075709tw1dyzlvmdds7j.jpg)
删除bom头
![ThinkPHP 打开目录的删除bom头命令结果](http://ww4.sinaimg.cn/large/50075709tw1dyzlvbi4daj.jpg)
Snippet提示
![sublime-completions](http://bbs.thinkphp.cn/data/attachment/forum/201207/27/0942179zll1qlqs9dsn3tt.png)

![视频: 用Sublime text2的Thinkphp插件 像zencoding)一样快速开发TP](http://v.youku.com/v_show/id_XNTA1NjE2MTM2.html)
查看函数说明文档
![查看函数说明文档](http://ww3.sinaimg.cn/mw1024/50075709jw1e5r7cp53hcj20n60brq57.jpg "查看函数说明文档")
mysql编辑器内简单查询
![效果图](http://ww2.sinaimg.cn/mw1024/50075709jw1e61cpyt7esj20vc0nbq7p.jpg "效果图")
1.在tools->ThinkPHP->ThinkPHP choose database来添加数据库和选择当前数据库
![选择数据库](http://ww2.sinaimg.cn/mw1024/50075709jw1e61cpzgtwpj20e304tmxg.jpg "选择数据库")

添加数据库选择"add database",后如下图：
![添加数据库](http://ww2.sinaimg.cn/mw1024/50075709jw1e61cpzwnbqj20j10hv0ul.jpg)

注意database里 0 的那个键不要删除，剪切板里会有要添加的模板，自己要么先删除只剩0，保存后。下次选添加进来，粘贴会有1的模板，自己替换下即可。以后会扩展支持sqlserver。

2.替换出来的查询页面里的"here is the sql to be queryed" 为要查询的sql,保存后就切换tab后就能显示结果了。这是bug。因为查询结果是用php写文件的。

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