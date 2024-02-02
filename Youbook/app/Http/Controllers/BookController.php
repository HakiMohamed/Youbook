<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5048' 
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
            $validatedData['image'] = $imagePath;
        }

        Book::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Livre ajouté avec succès.');
    }

    public function destroy(Book $book)
{
    $book->delete();

    return redirect()->route('books.index')->with('success', 'Livre supprimé avec succès.');
}

public function edit(Book $book)
{
    return view('books.edit', compact('book'));
}


public function update(Request $request, Book $book)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        'status' => 'nullable|string'
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('books', 'public');
        $validatedData['image'] = $imagePath;
    }

    $book->update($validatedData);

    return redirect()->route('books.edit', $book->id)->with('success', 'Livre mis à jour avec succès.');
}

}
