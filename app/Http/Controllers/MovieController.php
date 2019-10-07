<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Imdb\TitleSearch;
use Imdb\Title;
use Imdb\Config;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TitleSearch $titleSearch)
    {

        $movies = Movie::latest()->get();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        //dd($id);
        $config = new \Imdb\Config();
        $config->language = 'en-US,en';
        $movie = new \Imdb\Title($id,$config);
        return view('movies.create', compact('movie')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie;
        $movie->user_id = $request->user()->id;
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->movietype = $request->input('movietype');
        // @TODO Görselleri veritabanına çek!!
        $path = $request->input('image');
        $movie->image = $path;
        $movie->save();

        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    { 
      return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }

    public function search(Request $request, TitleSearch $titleSearch)
    {
        $results = $titleSearch->search($request->name);
        //sdd($results[0]);
        return view('movies.search', compact('results'));
    }

}
