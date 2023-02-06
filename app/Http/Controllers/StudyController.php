<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\Later;
use Illuminate\Support\Facades\Auth;



class StudyController extends Controller
{

    public function index_livewire(Request $request, $id)
    {
        $word = Word::where('id', $id)->first();
        return view('livewire', [
            'id' => $id,
            'word' => $word,
        ]);
    }
    /*later登録*/
    public function later(Request $request,$id)
    {
            $word= Word::where('id','=',$id)->first();
            $later =new Later();
            $later->later_test = $word->id;
            $later->later_test_type=$word->type;
            $later->later_test_textbook=$word->textbook;
            $later->later_test_name=$word->test_name;
            $later->created_user= Auth::user()->id;

            $later->save();

            return back();
        }

    /*later削除*/
    public function delete_later(Request $request,$id)
    {
        $later = Later::where('later_test', $request->id)->delete();
        return redirect('home');
    }
}
