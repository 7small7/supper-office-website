# 什么是supper-office-websit

supper-office-websit是一个基于[Laravel6.x框架](https://laravel.com/)搭建的一个开源官网系统。

# 功能清单

- [x] 权限管理：基于RBAC模型搭建权限系统。
- [x] 用户管理：用户是系统操作者，该功能主要完成系统用户配置。
- [x] 站点菜单管理：实现用户端的站点菜单功能。
- [x] 站点轮播图管理：实现灵活配置站点各个板块的轮播图。
- [x] 文章管理：实现多级文章分类、以及灵活的文章信息管理。
- [ ] 用户体系：实现用户一键授权、用户中心功能。
- [ ] 微信小程序：实现多模板灵活配置、快速搭建一套微信小程序官网。
- [ ] 微信公众号：公众号引流。
- [ ] 自动化机器人：实现整个平台生态的自动化消息处理。

# 预览地址

[预览地址](https://www.qqdeveloper.com/)，暂时只开放用户端的预览，由于很多的功能还未录入数据，用户端当前还不能看到。可以联系我，单独开账号。

# 部署方案

以Nginx为例，具体的可以参考[Laravel官网文档](https://laravel.com/docs/6.x/deployment)的部署章节操作。

```php
server
{
    listen 80;
    server_name www.xxx.com ;
    index index.html index.htm index.php;
    root  /path/supper-office-website/public;

    error_page   404   /404.html;

    # nginx rewrite rule
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ .*\.(gif|jpg|jpeg|png|bmp|swf)$
    {
        expires      30d;
    }

    location ~ .*\.(js|css)?$
    {
        expires      12h;
    }

    location ~ /.well-known {
        allow all;
    }

    location ~ /\.
    {
        deny all;
    }

    access_log  /home/wwwlogs/www.xxxx.com.access.log;
    error_log  /home/wwwlogs/www.xxx.com.error.log;
}
```
