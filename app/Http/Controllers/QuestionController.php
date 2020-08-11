<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use App\User;
use App\QuestionKind;
use App\Http\Requests\Question\StoreRequest;
use App\Http\Requests\Question\UpdateRequest;

class QuestionController extends Controller
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
        return view('question.create', [
            'categories' => QuestionKind::all(), 
            'backUrl' => url(''), 
            ]);
    }

    public function createFromCategory($category_id)    
    {        
        if (!QuestionKind::where('id', '=', $category_id)->exists()) throw new Exception('Neexistující kategorie');
        return view('question.create', [
            'categories' => [QuestionKind::find($category_id)],
            'backUrl' => route('questionKind.show', ['questionKind' => $category_id]),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request) 
    {
        $question = Question::create($request->all());   
        return redirect()->route('question.show', ['question' => $question]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question) 
    {
        return view('question.show', [
            'question' => $question,
            'author' => $question->author,
            'answers' => $question->answers->sortByDesc('created_at'), // třídí opovědi podle nejnovějších po nejstarší 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     *///technologie která vytváří objekty hledá a doplňuje  
    public function edit(Question $question) // zobrazí formulář pro úpravu
    {
        return view('question.edit', ['question' => $question]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Question $question) 
    {
        $question->update($request->all()); 
        return redirect()->route('question.show', ['question' => $question]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)  
    {
        try
        {
            $answers = $question->answers;
            foreach ($answers as $answer)
            {
                $answer->delete();
            }
            $question->delete();
        }
        catch (\Exception $exception)
        {
            return redirect()->back()->withErrors(['Při procesu odstraňování dotazu došlo k chybě.']);
        }
        return redirect()->action('HomeController');
    }
}
