<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Word;
use Illuminate\Http\Request;


class Study extends Component
{
    public $word ='';


    public function translate($id)
    {
        $this->words = $this->words->filter(function($value, $key) use($id){
            return $value['id'] != $id;
        });
        $word = Word::find($id);
    }
    public function render()
    {
        return view('livewire.study',[
            'words'=>Word::where('id', $this->id)->get(),
        ]);
    }

}
