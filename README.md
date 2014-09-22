Lazy-lawyer
===========

Lazy-lawyer是一个律师个人网站程序，包含了前端页面和简单的后台管理系统。程序使用LazyPHP框架开发，页面采用Bootstrap响应式布局。示例页面包含了杨昕月律师的一些个人信息，已经征得她本人的同意。

## 使用说明 ##

1.下载源码解压后上传到网站目录

2.新建数据库所使用已有数据库，执行"lazy_site.sql"将数据表导入到数据库

3.在"yxy_master"表中插入一条用户数据用于后台登陆，password需要MD5加密

4.按照自己的配置修改"config/"目录下的"db.config.php"和
"app.config.php"配置文件

5.进入后台添加自己的内容，后台地址为"YouSiteUrl/index.php?c=backedit"

## 其他说明 ##

1.后台未含有操作首页除“文档下载”之外的内容的功能，如需更改，直接操作”view/layout/web/main/default/index.tpl.html”文件，同样地，”联系方式”页面同样直接操作”view/layout/web/main/default/contacts.tpl.html”文件

2.css采用改写后的Bootstrap.css，如需更改样式，可自己重写css样式，也可在Bootstrap.css基础上编写css，样式文件目录是”static/css/”

3.后台登陆密码只是简单的MD5加密，使用者可以自行加强

4.网站的部分页面截图查看地址：http://www.xuhaixiao.com/lazy-lawyer/

5.如需了解LazyPHP框架，可查看 https://github.com/easychen/LazyPHP

6.确保“static/upload”文件夹有写权限

## 新增功能 ##

1.后台增加“更换风格”选项，提供十多种开源样式供选择（2014-8-10）

