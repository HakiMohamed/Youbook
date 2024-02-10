@include('partials.nav')
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

    .cardt:hover {
        transform: scale(1.05);
    }

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

    

    <div class="container mt-5">
        
      <div class="row justify-content-center">
        
          <div class="col-md-6">
            @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif
              <div class="card">
                  <div class="card-header bg-primary text-white text-center">login</div>
                  
<form method="POST" action="{{ route('auth.login') }}" class="m-4 p-4 ">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>


                  
              </div>
              <a href="{{ route('auth.register') }}" class="btn btn-success mt-5">S'inscrire</a>

          </div>
      </div>
  </div>
</div>

                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

</body>

</html>
