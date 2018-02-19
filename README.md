# 欢迎使用Thinkphp5.1 插件

## 功能

插件会提供使用tp5.1项目所必须的框架级常量、函数、类方法的完成，以及模板标签的完成。

## 前提
大家的环境变量里有php

> PS: 插件里包含着一个tp5.1项目，可以通过composer 调整该框架的版本，用于php.sublime-completions的更新。（安装时会自动生成一次）
> 大家可以通过内置项目的composer来安装一些类库，只要自动加载了，一样可以生成类库的完成的。
> 可能某些同名方法会冲突消失，大家可以修改tp5目录里extend的生成方法。

## 计划

- [x] php文件里的完成
- [ ] 模版标签的完成文件的动态生成
- [ ] 实现tp3插件和5插件的动态加载，判断项目目录里tp版本来自动加载 有思路了。
- [ ] 看能否将vscode那套 language server 集成进来，那样跳转定义也更方便。对于项目来说完成更实时化。

## 反馈

请github上 给我提issue。

在使用中有任何问题，欢迎反馈给我，可以用以下联系方式跟我交流

* 邮件(yangweijiest#gmail.com, 把#换成@)
* QQ: 917647288
* weibo: [@黑白世界4648](http://weibo.com/1342658313)
* 人人: [@杨维杰](http://www.renren.com/247050624)
* wechat: yangweijiester

##注意点
由于新版emmet(原名zencoding)插件禁用了模板中的php自动完成，导致我的完成不生效。想使用者在emmet的user配置中 使用'"use_old_tab_handler": true,' 就可以有原先的功能了。

##关于作者

```javascript
	var code-tech = {
		nickName  : "杨维杰",
		site : "https://yangweijie.github.io/note/"
	}
```