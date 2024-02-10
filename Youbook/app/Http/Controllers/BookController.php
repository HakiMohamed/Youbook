<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Reservation;


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


public function reserver(Request $request, $id)
{
    $book = Book::findOrFail($id);
    $user_id = auth()->id(); 
    
    Reservation::create([
        'user_id' => $user_id,
        'book_id' => $book->id,
        'status' => true, 
    ]);

    $book->update(['status' => 'non_disponible']);

    return redirect()->route('books.index')->with('success', 'Livre réservé avec succès.');
}



public function return(Request $request, $id)
{
    $book = Book::findOrFail($id);
    $reservation = Reservation::where('book_id', $id)->where('status', true)->first();

    if (!$reservation || $reservation->user_id != auth()->id()) {
        return redirect()->route('books.index')->with('error', 'Cette réservation ne correspond pas à l\'utilisateur connecté.');
    }

    $reservation->update(['status' => false]); 
    $book->update(['status' => 'disponible']);

    return redirect()->route('books.index')->with('success', 'Livre retourné avec succès.');
}
    
}
