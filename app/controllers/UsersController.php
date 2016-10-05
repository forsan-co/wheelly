<?php

namespace Wheel\Controllers;

use Wheel\Core\Application;

class UsersController 
{
    public function index() 
    {
        $users = Application::get('database')->selectAll('users');

        return view('users', ['users' => $users]);
    }

    public function store() 
    {
        Application::get('database')->insert('users', Request::all());

        return redirect('users');
    }
}