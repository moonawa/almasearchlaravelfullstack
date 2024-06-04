<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('admin/demo/demo.css') }}" rel="stylesheet">

</head>
<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-7 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Vous êtes à la recherche d'emploi ? S'inscrire</p>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form class="mx-1 mx-md-4" method="POST"   action="{{ route('registercandidat.save') }}"  class="user" enctype="multipart/form-data">
                @csrf

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                    <label for="name"> Nom</label>
                      <input type="text"  class="form-control" name="name" required placeholder="Votre nom" />
                      @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                    <label for="email"> Email</label>
                      <input type="email"  class="form-control" name="email" required placeholder="Votre email" />
                      @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6 pr-1">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                    <label for="genre"> Genre</label>
                      <select name="genre" id="genre" class="form-control" required>
                            <option value="Homme">Homme</option>
                            <option value="Femme"> Femme</option>
                        </select>
                    </div>
                  </div>
                  </div>
                  <div class="col-md-6 pr-1">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                    <label for="birthday"> Date de naissance</label>

                      <input type="date"  class="form-control" name="birthday" required placeholder="Votre date de naissance" />
                    
                    </div>
                    </div>
                  </div>
                  </div>
                  
                  <div class="row">
                  <div class="col-md-6 pr-1">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                    <label for="password">Mot de Passe</label>
                      <input type="password"  class="form-control" name="password" required placeholder="Votre mot de passe"  />
                      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>
                  </div>
                  <div class="col-md-6 pr-1">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                    <label for="telephone"> Téléphone</label>
                      <input type="text" class="form-control" name="telephone" required placeholder="Votre telephone" />
                      @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6 pr-1">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                    <label for="nationnalite"> Nationnalité</label>
                      <input type="text"  class="form-control" name="nationnalite" required placeholder="Votre nationnalite"  />
                      
                    </div>
                  </div>
                  </div>
               
                  <div class="col-md-6 pr-1">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                    <label for="disponibilite"> Disponibilité</label>
                        <select name="disponibilite" id="disponibilite" class="form-control" required>
                            <option value="Immédiate">Immédiate</option>
                            <option value="Négociable">Négociable</option>
                            <option value="Dans un mois">Dans un mois</option>
                            <option value="Dans trois mois">Dans trois mois</option>
                        </select>
                    </div>
                  </div>
                  </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <label for="cv">CV</label>
                      <input type="file"  class="form-control" name="cv" id="cv" required  autocomplete="cv"/>
                    </div>
                  </div>
                 

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-round " style="background-color: #325fa6;">S'inscrire</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-5 d-flex align-items-center order-1 order-lg-2">

              <img src="{{ asset('admin/img/registermoonawa.jpeg') }}" alt="login"  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{ asset('admin/js/core/jquery.min.js') }}"></script>
      <script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
      <script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>
      <script src="{{ asset('admin/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

  <!--  Google Maps Plugin    -->

  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}"></script>
      <script src="{{ asset('admin/js/plugins/bootstrap-notify.js') }}"></script>
      <script src="{{ asset('admin/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript" ></script>
      <script src="{{ asset('admin/demo/demo.js') }}"></script>
 
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>
</html>