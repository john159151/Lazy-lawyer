Lazy-lawyer
===========

Lazy-lawyer是使用LazyPHP开发的律师个人网站程序，采用Bootstrap响应式布局，包含了简单的后台管理系统。示例页面包含了杨昕月律师的一些个人信息，已经征得她本人的同意。

## 安装说明 ##

1.下载源码解压后上传到网站目录

2.新建数据库所使用已有数据库，执行"lazy_site.sql"将数据表导入到数据库

3.在"yxy_master"表中插入一条用户数据用于后台登陆，password需要MD5加密

4.按照自己的配置修改"config/"目录下的"db.config.php"和
"app.config.php"配置文件

5.进入后台添加自己的内容，后台地址为"YouSiteUrl/index.php?c=backedit"

## 说明 ##

1.后台未含有操作首页除"文档下载"之外的内容的功能，如需更改，直接操作"view/layout/web/main/default/index.tpl.html"文件，同样地，"联系方式"页面同样直接操作"view/layout/web/main/default/contacts.tpl.html"文件
