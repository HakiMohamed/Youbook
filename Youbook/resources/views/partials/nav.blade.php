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

        /* .card {
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        } */

        .card-title {
            color: #000000;
        }

        .card-text {
            color: #6c757d;
        }

        
        /* .auto-close {
            animation: closeAlert 5s forwards;
        }

        @keyframes closeAlert {
            to {
                opacity: 0;
                height: 0;
                padding: 0;
                margin: 0;
            }
        } */
    
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Ma Bibliothèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('books.index') }}">Accueil</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('books.create') }}">Ajouter un livre</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <div class="dropdown">
                            <button class="btn text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li class="nav-item ">
                                    @if (Auth::check())
                                    <form class="nav-link" action="{{ route('auth.logout') }}" method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-danger mx-3" type="submit">Déconnexion</button>
                                    </form>
                                    @else
                                    
                                        <a class="mx-5 mt-1 btn btn-success" href="{{ route('auth.login') }}">Connexion</a>
                                    
                                </li>
                                <li>
                                    <a class="mx-5 mt-1 btn btn-primary" href="{{ route('auth.register') }}">Inscription</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>