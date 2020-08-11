<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{   
    public function __construct()
    {
        // zabezpeceni
        // mohou sem pouze prihlaseni uzivatele
        $this->middleware('auth');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // zalozime odpoved do DB z dat requestu
        $answer = new Answer();
        $answer->question_id = $request->input('question_id');
        $answer->author_id = auth()->user()->id;
        $answer->answer = $request->input('answer');
        $answer->save();
        // najdeme question
        $question = Question::find($request->input('question_id'));
        // presmerujeme na otazku                
        return redirect()->route('question.show', ['question' => $question]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $question = $answer->question;
        try
        {
            $answer->delete();
        }
        catch (\Exception $exception)
        {
            return redirect()->back()->withErrors(['Při procesu odstraňování odpovědi došlo k chybě.']);
        }
        return redirect()->route('question.show', ['question' => $question]);
    }
}
