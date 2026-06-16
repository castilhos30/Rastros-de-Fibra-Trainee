<?php

namespace App\Controllers;
use App\Controllers\ListaPostsController;
use App\Controllers\UserController;
use App\Controllers\PaginaPostsController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

$router->get('pagina-de-posts', 'PaginaPostsController@index');

$router->get('pagina-individual', 'PaginaIndividualController@index');
$router->post('pagina-individual/novo-comentario', 'PaginaIndividualController@store');
$router->post('pagina-individual/onlike', 'PaginaIndividualController@onlike');
$router->post('pagina-individual/ondislike', 'PaginaIndividualController@ondislike');

$router->get('lista-de-usuarios', 'UserController@index');
$router->post('lista-de-usuarios/criar', 'UserController@store');
$router->post('lista-de-usuarios/editar', 'UserController@edit');
$router->post('lista-de-usuarios/deletar', 'UserController@delete');

$router->get('lista-de-posts', 'ListaPostsController@index');
$router->post('lista-de-posts/create', 'ListaPostsController@store');
$router->post('lista-de-posts/delete', 'ListaPostsController@delete');
$router->post('lista-de-posts/edit', 'ListaPostsController@edit');

$router->get('', 'LoginController@exibirLogin');
$router->get('login', 'LoginController@exibirLogin');

$router->post('login', 'LoginController@efetuaLogin');
$router->post('logout', 'LoginController@Logout');

$router->get('cadastro', 'LoginController@exibirCadastro');
$router->post('cadastro', 'LoginController@efetuaCadastro');