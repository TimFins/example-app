<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = request()->query('title');

        return Inertia::render('Book/Index', [
            'books' => Book::when(request()->has('title'), fn ($query) => $query->where('title', 'ilike', '%'.$title.'%'))->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Book/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'isbn' => ['required', 'string', 'unique:books,isbn'],
            'author' => ['required', 'string'],
        ]);

        //dd($validated);

        Book::create($validated);

        return to_route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
