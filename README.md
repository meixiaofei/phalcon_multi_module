# phalcon_multi_module
这是在自己研究学习phalcon过程中,初步总结出来的一个多模块版本。由于没有在正式项目中用过此框架,所以有考虑不到的地方,多多指正,共同进步。
### 目录结构

~~~
- web根目录
--app                                  应用目录
|    |--common                         公用目录
|    |    |--controllers   
|    |    |     |--TopController.php   多模块公用"顶级"控制器
|    |    |--models
|    |    |     |--...                 公用模型
|    |    |--library                   ...
|    |    |--plugins
|    |    |--services
|    |    |--....
|    |
|    |--config                         公用配置目录
|    |    |--config.php                公用配置文件
|    |    |--loader.php                自动加载
|    |    |--routes.php                路由
|    |    |--services.php              各种服务注入
|    |    |--service_cli.php           命令行服务注入
|    |    |--services_web.php          web服务注入,主要是路由分发,控制器调遣
|    |--modules                        多模块分组目录
|    |     |--home                     "前台"目录
|    |     |   |--config               当前模块配置目录
|    |     |   |--controllers          当前模块控制器目录
|    |     |   |--models               当前模块模型目录
|    |     |   |--views                当前模块模板目录
|    |     |--admin                    "后台"目录
|    |     |--cli                      "cli"目录
|    |--bootstrp_cli.php
|    |--function.php
|    |
--cache                                缓存目录
     |--volt                           模板缓存目录
     |--logs                           日志目录
|    |
--public
|    |--index.php                      项目入口文件
|    |
- .htrouter.php                        php内置服务器入口文件
- index.html                           当apache没有正确rewrite时提示(建议直接绑定到public目录下,不知道绑定到当前目录好处是啥)
- run                                  cli入口文件
-.htaccess                             apache rewrite

~~~
### 多模块原理
```php
1.app/config/service_web.php中路由绑定模块及默认路由分发
    $di->setShared('router', function () {
        $router = new Router();
    
        $router->setDefaultModule('home');
    
        return $router;
    });
    $di->setShared('dispatcher', function() {
        $dispatcher = new Dispatcher();
        $dispatcher->setDefaultNamespace('App\Home\Controllers');
        return $dispatcher;
    });
2.app/config/config.php文件中classPath的配置,在loader中先注册命名空间
    'classPath' => [
        'App\Common\Controllers'    => APP_PATH. '/common/controllers',
        'App\Common\Plugins'        => APP_PATH. '/common/plugins',
        'App\Common\Library'        => APP_PATH. '/common/library',
        'App\Common\Services'       => APP_PATH. '/common/services',

        'App\Home'  => APP_PATH. '/modules/home',
        'App\Admin' => APP_PATH. '/modules/admin',
    ],
3.获取app/config/config.php文件中多模块的配置
    'modules' => [
        'home'  => ['className' => 'App\Home\Module'],
        'admin' => ['className' => 'App\Admin\Module'],
    ],
4.public/index.php中注册多模块
    $application->registerModules($config->modules->toArray());
5.app/config/routes.php模块与路由绑定
6.最终处理完就输出了
```