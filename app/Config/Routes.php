<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('/create', 'Home::create');
$routes->get('/profile/(:num)', 'Home::profile/$1');
$routes->get('/detail-profile/(:num)', 'Home::detail/$1');
$routes->post('/auth/valid_login', 'Auth::valid_login');

$routes->get('/create/album', 'Home::create_album');
$routes->post('/create/album', 'User::createAlbum');
$routes->get('/edit_album/(:num)', 'Home::editAlbum/$1');
$routes->get('/edit/album/(:num)', 'User::editAlbum/$1');
$routes->post('/update/album/(:num)', 'User::updateAlbum/$1');
$routes->get('/album/delete/(:num)', 'User::deleteAlbum/$1');
$routes->post('/album/delete/foto/(:num)', 'User::deleteFotoFromAlbum/$1');
$routes->get('/detail_album/(:num)', 'Home::detailAlbum/$1');
$routes->get('/detail_foto_album/(:num)', 'Home::detailFotoAlbum/$1');


$routes->get('/register', 'Home::register');
$routes->post('/auth/valid_register', 'Auth::valid_register');
$routes->get('/auth/activate/(:any)', 'Auth::activate/$1');
$routes->get('/logout', 'Auth::logout');

$routes->get('/edit-profile/(:num)', 'Home::editProfile/$1');
$routes->post('/update-profile/(:num)', 'User::updateProfile/$1');

$routes->post('/upload', 'User::uploadFoto');
$routes->get('/edit/(:num)', 'User::editFoto/$1');
$routes->post('/update/(:num)', 'User::updateFoto/$1');
$routes->get('/delete_post/(:num)', 'User::deleteFoto/$1');
$routes->get('/detail/(:num)', 'Home::detailFoto/$1');
$routes->post('/comment/save/(:num)', 'User::comment/$1');
$routes->post('/comment-profile/save/(:num)', 'User::comment_detail/$1');
$routes->post('/comment-fotoalbum/save/(:num)', 'User::comment_fotoalbum/$1');
$routes->get('/delete_comment/(:num)', 'User::deleteComment/$1');
$routes->post('/addfotoalbum/(:num)', 'User::addFotoToAlbum/$1');

$routes->get('/like/(:num)', 'User::likeFoto/$1');
$routes->get('/unlike/(:num)', 'User::unlikeFoto/$1');

