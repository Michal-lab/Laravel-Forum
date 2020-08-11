<?php

namespace App\Http\Controllers;

use App\QuestionKind;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class AdministrationController extends Controller
{
    public function __construct()
    {
        // zabezpeceni
        // mohou sem pouze prihlaseni uzivatele
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('administration.index', [
            'categories' => QuestionKind::all(),
            'users' => User::all(),
            ]);
    }

    public function questionKindCreate()
    {
        return view('administration.questionKindCreate');
    }

    public function questionKindStore(Request $request)
    {
        QuestionKind::create($request->all());
        return redirect('admin');
    }

    public function questionKindDestroy(QuestionKind $questionKind)
    {        
        try
        {
            $questionKind->delete();
        }
        catch (\Exception $exception)
        {
            return redirect()->back()->withErrors(['Při procesu odstraňování tématu došlo k chybě.']);
        }
        return redirect('admin');
    }
}
