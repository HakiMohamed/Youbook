@php
    $active = 'active';
@endphp

@include('partials.nav')

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
   

    <div class="container containe col-lg-6 ">
        
        <h1 class="mb-4"><i class="fa-solid fa-plus"></i>  <i class="fa-solid fa-book"></i></h1>

        

        <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titre :</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image :</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter le livre</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
