<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;


class StudyController extends Controller
{
    public function index(Request $request, $id)
    {
        $word = Word::where('id', $request->id)->first();
        return view('study', [
            'id' => $id,
            'word' => $word,
        ]);
    }
    public function one( $id)
    {
        $word = Word::where('id', $id)->value('ja1');
        $word_str=json_encode($word,JSON_UNESCAPED_UNICODE);
        return response()->json([
            $word_str
        ]);
    }
    public function two( $id)
    {
        $word = Word::where('id', $id)->value('ja2');
        $word_str=json_encode($word,JSON_UNESCAPED_UNICODE);
        return response()->json([
            $word_str
        ]);
    }
    public function three( $id)
    {
        $word = Word::where('id', $id)->value('ja3');
        $word_str=json_encode($word,JSON_UNESCAPED_UNICODE);
        return response()->json([
            $word_str
        ]);
    }
    public function four( $id)
    {
        $word = Word::where('id', $id)->value('ja4');
        $word_str=json_encode($word,JSON_UNESCAPED_UNICODE);
        return response()->json([
            $word_str
        ]);
    }
    public function five( $id)
    {
        $word = Word::where('id', $id)->value('ja5');
        $word_str=json_encode($word,JSON_UNESCAPED_UNICODE);
        return response()->json([
            $word_str
        ]);
    }
    public function six( $id)
    {
        $word = Word::where('id', $id)->value('ja6');
        $word_str=json_encode($word,JSON_UNESCAPED_UNICODE);
        return response()->json([
            $word_str
        ]);
    }
    public function seven( $id)
    {
        $word = Word::where('id', $id)->value('ja7');
        $word_str=json_encode($word,JSON_UNESCAPED_UNICODE);
        return response()->json([
            $word_str
        ]);
    }
    public function eight( $id)
    {
        $word = Word::where('id', $id)->value('ja8');
        $word_str=json_encode($word,JSON_UNESCAPED_UNICODE);
        return response()->json([
            $word_str
        ]);
    }
    public function nine( $id)
    {
        $word = Word::where('id', $id)->value('ja9');
        $word_str=json_encode($word,JSON_UNESCAPED_UNICODE);
        return response()->json([
            $word_str
        ]);
    }
    public function ten( $id)
    {
        $word = Word::where('id', $id)->value('ja10');
        $word_str=json_encode($word,JSON_UNESCAPED_UNICODE);
        return response()->json([
            $word_str
        ]);
    }

}
