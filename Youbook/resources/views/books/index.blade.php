<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .book-item {
            margin-bottom: 20px;
        }

        .book-image {
            max-width: 100%;
            height: 200px; 
            object-fit: cover; 
            border-radius: 8px;
        }

        .card {
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-title {
            color: #000000;
        }

        .card-text {
            color: #6c757d;
        }

        
        .auto-close {
            animation: closeAlert 5s forwards;
        }

        @keyframes closeAlert {
            to {
                opacity: 0;
                height: 0;
                padding: 0;
                margin: 0;
            }
        }
    
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Ma Bibliothèque</a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('books.index') }}">Accueil</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('books.create') }}">Ajouter un livre</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @if(session('success'))
    <div class="alert alert-success auto-close">
        {{ session('success') }}
    </div>
@endif

        <h4 class="mb-4 text-start mb-5">Liste des Livres</h4>

        @if ($books->isEmpty())
            <p class="text-center">Aucun livre n'est disponible pour le moment.</p>
        @else
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-md-4 book-item">
                        <div class="card">
                            @if ($book->image)
                                <img src="{{ asset('storage/' . $book->image) }}" alt="Image du livre"
                                    class="card-img-top book-image">
                            @endif
                            <div class="card-body">
                                <h3 class="card-title">{{ $book->title }}</h3>
                                <p class="card-text text-truncate">{{ $book->description }}</p>
                                <p class="btn btn-success">{{ $book->status }}</p>
                                <div class="d-flex">
                                <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger mx-2"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                               <form action="{{ route('books.edit', $book->id) }}" method="get">
                               @csrf
                               <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-pencil"></i></button>
                                </form>
                            </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
