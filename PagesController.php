<?php 

class PagesController 
{
    public function home() 
    {
        $users = Application::get('database')->selectAll('users');

        return view('index', ['users' => $users]);
    }

    public function about() 
    {
        return view('about');
    }

    public function contact() 
    {
        return view('contact');
    }
}