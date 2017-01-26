<?php

$route[] = ['/', 'HomeController@index'];
$route[] = ['/home', 'HomeController@index'];
$route[] = ['/login', 'LoginController@index'];
$route[] = ['/login/deslogar', 'LoginController@logout'];
$route[] = ['/cadastrar', 'CadastroController@index'];
$route[] = ['/posts', 'PostsController@index'];
$route[] = ['/posts/show/{id}', 'PostsController@show'];


return $route;