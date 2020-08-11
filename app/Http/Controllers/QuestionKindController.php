<?php

namespace App\Http\Controllers;

use App\QuestionKind;
use Illuminate\Http\Request;

class QuestionKindController extends Controller
{    
    public function __construct()
    {
        // zabezpeceni
        // mohou sem pouze prihlaseni uzivatele
        $this->middleware('auth');
    }
            
    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionKind  $questionKind
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionKind $questionKind)
    {
        return view('questionKind.show', [
            'questionKind' => $questionKind,
            'questions' => $questionKind->questions,
            ]);
    }    
}
