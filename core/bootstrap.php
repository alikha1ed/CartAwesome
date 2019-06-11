<?php 

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('database', new MySqlRepository(
    Connection::make(App::get('config')['database'])
));
