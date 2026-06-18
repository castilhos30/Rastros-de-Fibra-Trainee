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
        usort($posts, function($a, $b){
            return strtotime($a['data']) <=> strtotime($b['data']);
        });
        
        return view('site/landingpage', [
            'posts' => $posts
        ]);     
    }
}   