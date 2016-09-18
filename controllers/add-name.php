<?php 

$app->database->insert('users', Request::all());

header('Location: /');