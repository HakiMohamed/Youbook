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

    

    .

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
              <div class="card">
                  <div class="card-header bg-primary text-white text-center">Register</div>
                  <div class="card-body">
                    <form action="{{ route('auth.register') }}" method="post">
                      @csrf
                          <div class="form-group">
                              <label for="username">Username</label>
                              <input type="text" name='name' class="form-control" id="username" >
                          </div>
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name='email' class="form-control" id="email" >
                          </div>
                          <div class="form-group">
                              <label for="password">password</label>
                              <input type="password" name='password' class="form-control" id="password" >
                          </div>
                          <div class="form-group">
                              <label for="confirmPassword">Confirme password</label>
                              <input type="password" class="form-control" id="confirmPassword" >
                          </div>
                          <button type="submit" class="btn btn-primary mt-2">Register</button>
                      </form>
                  </div>
                  
              </div>
              <a href="{{ route('auth.login') }}" class="btn btn-success mt-4">Login</a>
          </div>
      </div>
  </div>


                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

</body>

</html>
