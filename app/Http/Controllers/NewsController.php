<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\User;
use App\Team;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('user')->paginate(10);
        return view('news.index',compact('news'));
    }

    public function sideBar($id)
    {
        $news = Team::find($id)->news()->paginate(10);
        return view('news.index',compact('news'));
    }

    public function show($id)
    {
        $user = auth()->user(); 
        $new = News::with('teams')->findOrFail($id);
       // dd($new);
        //dd($new->teams);
        return view('news.show',compact('new'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('news.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' =>'required',
            'teams' => 'required|array'
        ]);

        $new = News::create(
            array_merge(
                $request->all(),
                ['user_id'=> auth()->user()->id]
            )
        );

        $new->teams()->attach(request('teams'));

        return redirect(route('news-index'));
    }

}
