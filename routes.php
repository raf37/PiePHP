
<?php
Router::connect('/user/add', ['controller' => 'user', 'action' => 'add']);
Router::connect('/register', ['controller' => 'user', 'action' => 'register']); // fait pop le form

//Routes USERControl

Router::connect('/homepage', ['controller' => 'user', 'action' => 'homepage']); // homepage login
Router::connect('/', ['controller' => 'user', 'action' => 'login']); // pop form pour login
Router::connect('/user/show', ['controller' => 'user', 'action' => 'show']); // pop form pour loginread and menu update'
Router::connect('/user/show/update', ['controller' => 'user', 'action' => 'updateView']); // pop form pour loginread and menu update']
Router::connect('/user/show/update/updateON', ['controller' => 'user', 'action' => 'updateON']); // pop form pour login
Router::connect('/user/show/delete', ['controller' => 'user', 'action' => 'delete']); // pop form pour login
Router::connect('/user/deco', ['controller' => 'user', 'action' => 'deco']); // pop form pour login
Router::connect('/error', ['controller' => 'user', 'action' => 'errorRegister']); // homepage login

//Routes ErrorController

Router::connect('/error', ['controller' => 'error', 'action' => 'error']); // pop form pour login

//Routes FilmController

Router::connect('/user/rechercheFilm', ['controller' => 'film', 'action' => 'showType']); // pop form pour login



