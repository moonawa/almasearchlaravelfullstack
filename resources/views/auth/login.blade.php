<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alma Search</title>
    <link rel="icon" type="image/png" href="{{ asset('admin/img/logoicon.png') }}" sizes="50x50">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
    }
    .h-custom {
    height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
    .h-custom {
    height: 100%;
    }

    }
    .toggle-password {
      cursor: pointer;
      margin-left: 10px;
      color: blue;
      text-decoration: underline;
    }
    </style>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
       
          <img src="{{ asset('admin/img/photo4presentation.jpg') }}" alt="login"  class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form  action="{{ route('login.action') }}" method="POST" class="user">
                    @csrf
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div>
                    @endif
          <div class="d-flex flex-row align-items-center justify-content-center">
            <p class="">Se Connecter </p>
            
          </div>
        
          <div class="divider d-flex align-items-center my-4">
             <p class="text-center fw-bold mx-3 mb-0">Avec</p>
          </div>
          @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
          <!-- Email input -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Email <span style="color:red;">*</span></label>
            <input type="email" name="email"  id="form3Example3" class="form-control form-control-lg"
              placeholder="Adresse email" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Mot de Passe <span style="color:red;">*</span></label>

            <input type="password" name="password" id="new_password" class="form-control form-control-lg"
              placeholder="Mot de passe" />
              <span id="toggle-new-password" class="toggle-password">Afficher le mot de passe</span>

          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" name="remember" />
              <label class="form-check-label" for="form2Example3">
                Se souvenir de moi
              </label>
            </div>
            <a href="{{ route('forget.password.get') }}" class="text-body">Mot de passe oublié?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn  btn-round" style="background-color: #035874; color:white;"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Se connecter</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Vous n'avez pas de compte? <a href="https://alma-search.com/#services"
                class="link-danger">S' inscrire</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
 <!--  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">

    <div class="text-white mb-3 mb-md-0">
      Copyright © 2020. All rights reserved.
    </div>

    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    Right
  </div>   -->
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('toggle-new-password').addEventListener('click', function () {
      var passwordField = document.getElementById('new_password');
      var passwordFieldType = passwordField.getAttribute('type');

      if (passwordFieldType === 'password') {
        passwordField.setAttribute('type', 'text');
        this.textContent = 'Masquer le mot de passe';
      } else {
        passwordField.setAttribute('type', 'password');
        this.textContent = 'Afficher le mot de passe';
      }
    });
  });
    </script>
</body>
</html>