<?php


namespace App;

use HuanL\Core\Components\RouteComponents as Components;
use HuanL\Core\Facade\Route;

/**
 * 自定义的路由组件,可以在config中配置绑定抽象类型
 * 将核心提供的RouteComponents替换成这个自义定的RouteComponent
 * Class RouteComponents
 * @package App
 */
class RouteComponents extends \HuanL\Core\Components\RouteComponents {

    public function init() {
        parent::init(); // TODO: Change the autogenerated stub
        $this->webRoute();
    }

    public function cacheRoute() {
        //缓存的路由,可以吧需要缓存的路由写在这里
        Route::get('/admin/{action}', 'homeController')->setNamespace('App\Controller\Admin');
        Route::get('/{controller}/{action}')->setNamespace('App\Controller');
    }

    public function webRoute() {
        Route::group('web', function () {
            require_once $this->app['path.route'] . '/web.php';
        });
    }

}