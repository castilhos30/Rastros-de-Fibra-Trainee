<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LandingPageController
{

    public function index()
    {
        $database = App::get('database');
        $posts = $database->selectAll('posts');

        usort($posts, function ($a, $b) {
            return strtotime($b->data) <=> strtotime($a->data);
        });

        $postsCarrossel = array_slice($posts, 0, 4);
        $usuarios = $database->selectAll('usuarios');

        return view('site/landingpage', [
            'posts' => $postsCarrossel,
            'usuarios' => $usuarios,
        ]);
    }
}