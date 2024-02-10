@include('partials.nav')
<style>
        /* .book-item {
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
        } */

    
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
    
    

    <div class="container mt-5">
        @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif
@if(session('error'))
<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

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
                                <p class="btn btn-secondary">{{ $book->status }}</p>
                                @if (Auth::check() && !auth()->user()->hasRole('bibliothécaire')) 
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
                                 @endif
                                 
                                 <div class="d-flex mt-2">
                                    
                                    @if (auth()->check())
                                        <form action="{{ route('books.reserver', $book->id) }}" method="post" id="reservationForm">
                                          @csrf
                                          <button type="submit" class="btn btn-sm btn-success mx-2">Reserver</i></button>
                                            </form>
                                                @else
                                                 <button type="button" class="btn btn-sm btn-success mx-2" data-bs-toggle="modal" data-bs-target="#authModal">Reserver</button>
                                                    @endif
                                                    

                                                    
                                    <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title text-white" id="authModalLabel">Connexion Requise</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bg-warning">
                                                <h6>Vous devez être connecté pour effectuer une réservation. Veuillez vous connecter ou vous inscrire.</h6>
                                            </div>
                                            <div class="modal-footer bg-secondary">
                                                <a href="{{ route('auth.login') }}" class="btn btn-primary">Se connecter</a>
                                                <a href="{{ route('auth.register') }}" class="btn btn-success">S'inscrire</a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>



                                    @if ($book->status == 'non_disponible' && auth()->check())
                                    @if ($book->reservation && $book->reservation->user_id == auth()->user()->id)
    
                                <form action="{{ route('books.return', $book->id) }}" method="post">
                                  @csrf
                                  @method('put')
                                  <button type="submit" class="btn btn-sm btn-warning">Retourner</button>
                                 </form>
                                    @endif
                                    @endif
                                </div>
                            

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

</body>

</html>
