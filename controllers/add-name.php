<?php 

Application::get('database')->insert('users', Request::all());

header('Location: /');