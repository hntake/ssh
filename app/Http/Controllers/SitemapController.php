<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Word;
use App\Models\Diet;
use App\Models\Form;


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
            'forms' => $forms,
            'newses' => $news,
        ])->header('Content-Type', 'text/xml');
    }
}
