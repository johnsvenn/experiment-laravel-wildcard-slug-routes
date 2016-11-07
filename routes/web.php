<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
Route::get('/', function () {
    return view('home');
});
*/

use App\Slug;

Route::get('/', 'HomeController@index');

Route::resource('blog', 'BlogController');

Route::resource('page', 'PageController');

Route::get('/{route}', function ($route) {
    
    $class = false;
    $action = false;

    $data = Slug::where('slug', $route)->first();

   
    if ($data) {
        
        $app = app();
        
        $controller = $app->make('\App\Http\Controllers\\' . $data->controller . 'Controller');
        
        $action = 'slug';
        
        return $controller->callAction($action, $parameters = array($route));
        
    }

   

    
    throw new NotFoundHttpException;
    
})->where('route', '.*');;

