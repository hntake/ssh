<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index() {
        $words = Word::get();
        $diets = Diet::get();
        $forms = Form::get();
        $news = News::get();


        return response()->view('sitemap', [
            'words' => $words,
            'diets' => $diets,
            'threads' => $threads,
            'newses' => $news,
        ])->header('Content-Type', 'text/xml');
    }
}
