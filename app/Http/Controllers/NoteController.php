<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::latest()->get();
        
        $days = Note::whereBetween('created_at', ['2015-08-27 07:19:20', now()])
        ->latest()
        ->get()
        ->groupBy(function ($val) {
        return Carbon::parse($val->created_at)->format('d M Y');
    });


        return view('notes.index', compact('notes','days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(array(
            'title' => 'required|string|min:3',
            'content' => 'required|string'
        ));

        $note = new Note;
        $note->user_id = $request->user()->id;
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->save();

        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {

        $previous = Note::where('id', '<', $note->id)->max('id');
        $next = Note::where('id', '>', $note->id)->min('id');

        return view('notes.show', compact('note','previous','next'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $request->validate(array(
            'title' => 'required|string',
            'content' => 'required|string'
        ));

        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->save();

        return redirect()->route('notes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }

}
