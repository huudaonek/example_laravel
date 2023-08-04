<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'authorid' => 'required|integer',
            'title' => 'required|string|max:255',
            'ISBN' => 'required|string|max:255',
            'pub_year' => 'required|integer',
            'available' => 'required|boolean',
        ]);

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Book created successfully!');
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'authorid' => 'required|integer',
            'title' => 'required|string|max:255',
            'ISBN' => 'required|string|max:255',
            'pub_year' => 'required|integer',
            'available' => 'required|boolean',
        ]);

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
public function search(Request $request)
{
    $searchTerm = $request->input('q');

    $books = Book::where('title', 'LIKE', '%' . $searchTerm . '%')->get();

    return view('books.search', compact('books'));
}
}
