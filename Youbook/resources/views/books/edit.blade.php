<!-- resources/views/books/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un nouveau livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-image: url('https://as1.ftcdn.net/v2/jpg/02/20/29/32/1000_F_220293246_Ps6O4kTZ20IQCDwPGZqKLxdS8nRta5Dq.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }
        .containe {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 19px rgba(0, 9, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
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
                        <a class="nav-link" href="{{ route('books.index') }}">Accueil</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="{{ route('books.create') }}">Ajouter un livre</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

   
    <div class="container col-lg-6 col-sm-8 mt-4">
        

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
<div class="bg-white p-5 " style="border-radius: 8px;">
    <h3>Editer livre</h3>
        <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="title" class="form-label">Titre :</label>
                <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            <label for="title" class="form-label">Status :</label>
            <select class="form-select"  name="status"aria-label="Default select example">
                <option  hidden disabled selected>Edtit status</option>
                <option value="Disponible">Disponible</option>
                <option value="non_disponible">Reserved</option>
              </select>


            

            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" class="form-control">{{ $book->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image :</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour le livre</button>
        </form>
    </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
