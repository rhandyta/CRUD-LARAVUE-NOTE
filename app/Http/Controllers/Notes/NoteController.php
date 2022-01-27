<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResouce;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function index()
    {
        $notes = Note::with('subject')->latest()->get();
        return NoteResouce::collection($notes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'description' => 'required'
        ]);
        $note = Note::create([
            'subject_id' => $request->subject,
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'description' => $request->description,
        ]);
        return response()->json([
            'message' => 'Note has been created',
            'note' => $note
        ], 201);
    }
}
