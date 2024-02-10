<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;



class UserController extends Controller
{
    public function reserver(Book $book)
{
    $user = User::find(1); 

    if ($user) {
        $user->reservations()->create(['book_id' => $book->id]);

        return redirect()->route('books.index')->with('success', 'Livre réservé avec succès.');
    }

    return redirect()->route('books.index')->with('error', 'Utilisateur non trouvé.');
}
}
