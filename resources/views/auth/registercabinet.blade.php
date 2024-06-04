<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        <div class="card text-black" style="border-radius: 10px;">
          <div class="card-body p-md-3">
            <div class="row justify-content-center">

            <div class="col-md-10 col-lg-6 col-xl-5 mt-4 align-items-center order-2 order-lg-1">
              <p class="text-center h3 fw-bold " style="color: #325fa6;">Vous êtes un Cabinet? Inscrivez Vous</p>

              <img src="{{ asset('admin/img/registermoonawa.jpeg') }}" alt="login"  class="img-fluid" alt="Sample image">

             

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 order-1 order-lg-2">


                <form class="mx-1 mx-md-4 pt-4" method="POST"   action="{{ route('registercabinet.save') }}"  class="user" enctype="multipart/form-data">
                @csrf
                <p class="text-left h6 fw-bold  ">Information sur le cabinet</p>

                <div class="row ">
                  <div class="col-md-6  pr-1">
                
                    <div class="form-outline">
                      <label for="">Nom du Cabinet<span style="color:red;">*</span></label>
                      <input type="text"  class="form-control" required name="nomcabinet" placeholder="Nom du cabinet " />
                     
                    </div>
           
                  </div>
                  <div class="col-md-6 px-1 mb-2">
               
                    <div class="form-outline ">
                    <label for=""> Secteur d' activité <span style="color:red;">*</span></label>
                      <input type="text"  required class="form-control" name="secteuractivitecabinet" placeholder="Secteur d'activité" />
              
                    </div>
            
           
                  </div>
                  <div class="d-flex flex-row align-items-center mb-2">
                      <div class="form-outline flex-fill mb-2">
                        <label for="">Description <span style="color:red;">*</span></label>
                        <textarea name="descabinet" id=""  class="form-control" required cols="30" rows="5"></textarea>
                      </div>
                    </div>
                  <div class="row">
                  <div class="col-md-6  pr-1">
                      <div class="form-outline ">
                        <label for="rccabinet">Régistre de Commerce <span style="color:red;">*</span></label>
                        <input type="file" required class="form-control" name="rccabinet" id="rccabinet" />
                      </div>
                    </div>
                    <div class="col-md-6  px-1">
                    <div class="form-outline  ">
                    <label for="nineacabinet">NINEA <span style="color:red;">*</span> </label>
                    <input type="file"  required class="form-control" name="nineacabinet"  id="nineacabinet" />
                 
                  </div>
                    </div>
                    </div>
                   
                  </div><br>
                  <p class="text-left h6 fw-bold  ">Information sur l'interlocuteur</p>

                   

                 


                  <div class="row">
                  <div class="col-md-6  pr-1">
                      <div class="form-outline flex-fill mb-2">
                        <label for="">Nom <span style="color:red;">*</span></label>
                        <input type="text" required class="form-control" name="name" placeholder="Votre Nom" />
                      </div>
                    </div>
                    <div class="col-md-6  px-1">
                    <div class="form-outline flex-fill mb-2">
                    <label for="">Email  <span style="color:red;">*</span></label>
                     
                    <input type="email" required  class="form-control" name="email" placeholder="Votre Email" />

                  </div>
                    </div>
                    </div>
                    <div class="row">
                  <div class="col-md-6  pr-1">
                      <div class="form-outline flex-fill mb-2">
                        <label for="">Téléphone <span style="color:red;">*</span></label>
                        <input type="text" required class="form-control" name="telephone" placeholder="Votre Téléphone" />
                      </div>
                    </div>
                    <div class="col-md-6  px-1">
                    <div class="form-outline flex-fill mb-2">
                    <label for="">Fonction <span style="color:red;">*</span> </label>
                    <input type="text" required  class="form-control" name="fonctioncbt" placeholder="Votre Fonction" />

                 
                  </div>
                    </div>
                    </div>
                   
                 
                  

                  <div class="d-flex justify-content-center mx-4  mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-round " style="background-color: #325fa6;">S'inscrire</button>
                    <p class="small fw-bold mt-4 pt-1 ">Vous avez déja un compte? <a href="{{ route('login') }}"
                class="link-danger">Se connecter</a></p>
                  </div>

                </form>

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