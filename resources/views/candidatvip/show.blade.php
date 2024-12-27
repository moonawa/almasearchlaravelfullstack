@extends('layouts.appcandidatvip')


@section('contents')
<div class="row">
  <div class="col-md-4">
    <div class="card card-user">
      <div class="image">
        <img src="{{ asset('admin/img/bg5.jpg') }}" alt="...">
      </div>
      <div class="card-body">
        <div class="author">
          @if (!Auth::user()->avatar)
          <img class="avatar border-gray" src=" {{ asset('admin/img/default-avatar.png') }}" alt="...">

          @else ( Auth::user()->avatar)
          <img class="avatar border-gray" src=" /avatars/{{ Auth::user()->avatar }}">
          @endif

          <form action="{{ route('candidatvip.shows') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
            @endif
            <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" required autocomplete="avatar">


            <button type="submit" class="btn  btn-round" style="background-color: #035874;">
              {{ __('Télécharger la  Photo') }}
            </button>
          </form>

          <p class="description">
            @ {{ $can->user->name }}
          </p>
          <p>
            {{ $can->genre }}
          </p>
          <p>
            {{ $can->nationnalite }}
          </p>
          <p>
            Tel: {{ $can->user->telephone }}
          </p>
        </div>

      </div>
      <div class="card-footer">
        <hr>
        @if($can->cv)
        <div class="button-container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-6">
              <h5>CV<br> <a href="/uploads/{{ $can->cv }}"><i class="fa fa-eye" style="color: #7ac9e8"></i></a></h5>
            </div>
           

          </div>
        </div>
        @endif
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Fichiers</h4>
      </div>

      <div class="card-body">

        <form action="{{ route('candidatvip.cvs') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
         
          <label for="cv"> CV(max 2mo)</label>
          <input id="cv" type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" autocomplete="cv">

          <label for="motivation">Fichier (max 2mo)</label>
          <input id="motivation" type="file" class="form-control @error('motivation') is-invalid @enderror" name="motivation" autocomplete="motivation">

          <button type="submit" class="btn btn-round" style="background-color: #035874;">
            {{ __('Télécharger') }}
          </button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title"> Profil</h5>
      </div>
      <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('candidatvip.update', $can->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-5 pr-1">
              <div class="form-group">
                <label>Nom </label>
                <input type="text" class="form-control" disabled="" placeholder="Nom" value="{{ $can->user->last_name }}">
              </div>
            </div>
            <div class="col-md-5 pl-1">
              <div class="form-group">
                <label for="exampleInputEmail1">Prénom </label>
                <input type="email" class="form-control" disabled="" name="email" value="{{ $can->user->first_name }}">
              </div>
            </div>
            <div class="col-md-2 px-1">
              <div class="form-group">
                <label>Age</label>
                @php
                $birthday = $can->birthday;
                $age = $birthday ? \Carbon\Carbon::parse($birthday)->age : null;
                @endphp
                <input type="text" class="form-control" placeholder="Age" disabled="" value="{{ $age }}ans">
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Email  </label>
                <input type="email" class="form-control" name="email" placeholder="email" value="{{ $can->user->email }}">
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Fonction  </label>
                <input type="text" class="form-control" placeholder="Fonction " name="fonction" value="{{ $can->fonction }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Permis de Conduire </label>
                <input type="text" class="form-control" name="permisconduire" placeholder="A1, B" value="{{ $can->permisconduire }}">
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Handicap  </label>
                <input type="text" class="form-control" placeholder="Handicap " name="handicap" value="{{ $can->handicap }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Adresse</label>
                <input type="text" class="form-control" placeholder=" residence" name="residence" value="{{ $can->residence }}">
              </div>
            </div>
          </div>
          <div class="row">
          
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Disponibilité</label>
                <select name="disponibilite" class="form-control">
                  <option value="{{ $can->disponibilite }}">{{ $can->disponibilite }}</option>
                  <option value="Immédiate">Immédiate</option>
                  <option value="Négociable">Négociable</option>
                  <option value="Dans un mois">Dans un mois</option>
                  <option value="Dans trois mois">Dans trois mois</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Situation Matrimonaile </label>
                <select name="situationmatrimonaile" class="form-control">
                  <option value="{{ $can->situationmatrimonaile }}">{{ $can->situationmatrimonaile }}</option>
                  <option value="Célibataire">Célibataire</option>
                  <option value="Marié(e)">Marié(e)</option>
                  <option value="Divorcé(e)">Divorcé(e)</option>
                </select>  
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Pays de Résidence</label>
                <select name="country" id="country" class="form-control" name="lieudemobilite">
                <option value="{{ $can->lieudemobilite }}">{{ $can->lieudemobilite }}</option>
                <option value="Afghanistan">Afghanistan</option>
    <option value="Afrique du Sud">Afrique du Sud</option>
    <option value="Albanie">Albanie</option>
    <option value="Algérie">Algérie</option>
    <option value="Allemagne">Allemagne</option>
    <option value="Andorre">Andorre</option>
    <option value="Angola">Angola</option>
    <option value="Antigua-et-Barbuda">Antigua-et-Barbuda</option>
    <option value="Arabie Saoudite">Arabie Saoudite</option>
    <option value="Argentine">Argentine</option>
    <option value="Arménie">Arménie</option>
    <option value="Australie">Australie</option>
    <option value="Autriche">Autriche</option>
    <option value="Azerbaïdjan">Azerbaïdjan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahreïn">Bahreïn</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbade">Barbade</option>
    <option value="Belgique">Belgique</option>
    <option value="Belize">Belize</option>
    <option value="Bénin">Bénin</option>
    <option value="Bhoutan">Bhoutan</option>
    <option value="Biélorussie">Biélorussie</option>
    <option value="Birmanie">Birmanie</option>
    <option value="Bolivie">Bolivie</option>
    <option value="Bosnie-Herzégovine">Bosnie-Herzégovine</option>
    <option value="Botswana">Botswana</option>
    <option value="Brésil">Brésil</option>
    <option value="Brunei">Brunei</option>
    <option value="Bulgarie">Bulgarie</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodge">Cambodge</option>
    <option value="Cameroun">Cameroun</option>
    <option value="Canada">Canada</option>
    <option value="Cap-Vert">Cap-Vert</option>
    <option value="Chili">Chili</option>
    <option value="Chine">Chine</option>
    <option value="Chypre">Chypre</option>
    <option value="Colombie">Colombie</option>
    <option value="Comores">Comores</option>
    <option value="Congo-Brazzaville">Congo-Brazzaville</option>
    <option value="Congo-Kinshasa">Congo-Kinshasa</option>
    <option value="Corée du Nord">Corée du Nord</option>
    <option value="Corée du Sud">Corée du Sud</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
    <option value="Croatie">Croatie</option>
    <option value="Cuba">Cuba</option>
    <option value="Danemark">Danemark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominique">Dominique</option>
    <option value="Égypte">Égypte</option>
    <option value="Émirats arabes unis">Émirats arabes unis</option>
    <option value="Équateur">Équateur</option>
    <option value="Érythrée">Érythrée</option>
    <option value="Espagne">Espagne</option>
    <option value="Estonie">Estonie</option>
    <option value="Eswatini">Eswatini</option>
    <option value="États-Unis">États-Unis</option>
    <option value="Éthiopie">Éthiopie</option>
    <option value="Fidji">Fidji</option>
    <option value="Finlande">Finlande</option>
    <option value="France">France</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambie">Gambie</option>
    <option value="Géorgie">Géorgie</option>
    <option value="Ghana">Ghana</option>
    <option value="Grèce">Grèce</option>
    <option value="Grenade">Grenade</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guinée">Guinée</option>
    <option value="Guinée équatoriale">Guinée équatoriale</option>
    <option value="Guinée-Bissau">Guinée-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haïti">Haïti</option>
    <option value="Honduras">Honduras</option>
    <option value="Hongrie">Hongrie</option>
    <option value="Îles Cook">Îles Cook</option>
    <option value="Îles Marshall">Îles Marshall</option>
    <option value="Îles Salomon">Îles Salomon</option>
    <option value="Inde">Inde</option>
    <option value="Indonésie">Indonésie</option>
    <option value="Irak">Irak</option>
    <option value="Iran">Iran</option>
    <option value="Irlande">Irlande</option>
    <option value="Islande">Islande</option>
    <option value="Israël">Israël</option>
    <option value="Italie">Italie</option>
    <option value="Jamaïque">Jamaïque</option>
    <option value="Japon">Japon</option>
    <option value="Jordanie">Jordanie</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kirghizistan">Kirghizistan</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Koweït">Koweït</option>
    <option value="Laos">Laos</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Lettonie">Lettonie</option>
    <option value="Liban">Liban</option>
    <option value="Libéria">Libéria</option>
    <option value="Libye">Libye</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lituanie">Lituanie</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macao">Macao</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malaisie">Malaisie</option>
    <option value="Malawi">Malawi</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malte">Malte</option>
    <option value="Maroc">Maroc</option>
    <option value="Maurice">Maurice</option>
    <option value="Mauritanie">Mauritanie</option>
    <option value="Mexique">Mexique</option>
    <option value="Micronésie">Micronésie</option>
    <option value="Moldavie">Moldavie</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolie">Mongolie</option>
    <option value="Monténégro">Monténégro</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Namibie">Namibie</option>
    <option value="Nauru">Nauru</option>
    <option value="Népal">Népal</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Norvège">Norvège</option>
    <option value="Nouvelle-Zélande">Nouvelle-Zélande</option>
    <option value="Oman">Oman</option>
    <option value="Ouganda">Ouganda</option>
    <option value="Ouzbékistan">Ouzbékistan</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palaos">Palaos</option>
    <option value="Palestine">Palestine</option>
    <option value="Panama">Panama</option>
    <option value="Papouasie-Nouvelle-Guinée">Papouasie-Nouvelle-Guinée</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Pays-Bas">Pays-Bas</option>
    <option value="Pérou">Pérou</option>
    <option value="Philippines">Philippines</option>
    <option value="Pologne">Pologne</option>
    <option value="Portugal">Portugal</option>
    <option value="Qatar">Qatar</option>
    <option value="Roumanie">Roumanie</option>
    <option value="Royaume-Uni">Royaume-Uni</option>
    <option value="Russie">Russie</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint-Kitts-et-Nevis">Saint-Kitts-et-Nevis</option>
    <option value="Saint-Vincent-et-les-Grenadines">Saint-Vincent-et-les-Grenadines</option>
    <option value="Sainte-Lucie">Sainte-Lucie</option>
    <option value="Saint-Marin">Saint-Marin</option>
    <option value="Salvador">Salvador</option>
    <option value="Samoa">Samoa</option>
    <option value="São Tomé-et-Principe">São Tomé-et-Principe</option>
    <option value="Sénégal">Sénégal</option>
    <option value="Serbie">Serbie</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra Leone">Sierra Leone</option>
    <option value="Singapour">Singapour</option>
    <option value="Slovaquie">Slovaquie</option>
    <option value="Slovénie">Slovénie</option>
    <option value="Somalie">Somalie</option>
    <option value="Soudan">Soudan</option>
    <option value="Soudan du Sud">Soudan du Sud</option>
    <option value="Sri Lanka">Sri Lanka</option>
    <option value="Suède">Suède</option>
    <option value="Suisse">Suisse</option>
    <option value="Suriname">Suriname</option>
    <option value="Syrie">Syrie</option>
    <option value="Tadjikistan">Tadjikistan</option>
    <option value="Tanzanie">Tanzanie</option>
    <option value="Tchad">Tchad</option>
    <option value="Thaïlande">Thaïlande</option>
    <option value="Timor-Leste">Timor-Leste</option>
    <option value="Togo">Togo</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinité-et-Tobago">Trinité-et-Tobago</option>
    <option value="Tunisie">Tunisie</option>
    <option value="Turkménistan">Turkménistan</option>
    <option value="Turquie">Turquie</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Ukraine">Ukraine</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Viêt Nam">Viêt Nam</option>
    <option value="Yémen">Yémen</option>
    <option value="Zambie">Zambie</option>
    <option value="Zimbabwe">Zimbabwe</option>
</select>

              </div>
            </div>
            <div class="col-md-6 px-1">
              <div class="form-group">
                <label>Secteur D'activité</label>
                <select name="secteuractivitecandidat" class="form-control" placeholder="Informatique">
                  <option value="{{ $can->secteuractivitecandidat }}">{{ $can->secteuractivitecandidat }}</option>
                  <option value="Agriculture, Sylviculture et Pêche">Agriculture, Sylviculture et Pêche</option>
                  <option value="Industries Extractives">Industries Extractives</option>
                  <option value="Industrie Manufacturière">Industrie Manufacturière</option>
                  <option value="Production et Distribution d'Énergie">Production et Distribution d'Énergie</option>
                  <option value="Construction">Construction</option>
                  <option value="Commerce">Commerce</option>
                  <option value="Transports et Logistique">Transports et Logistique</option>
                  <option value="Informatique et Communication">Informatique et Communication</option>
                  <option value="Activités Financières et d'Assurance">Activités Financières et d'Assurance</option>
                  <option value="Services Professionnels, Scientifiques et Techniques">Services Professionnels, Scientifiques et Techniques</option>
                  <option value="Administration Publique">Administration Publique</option>
                  <option value="Éducation">Éducation</option>
                  <option value="Santé et Action Sociale">Santé et Action Sociale</option>
                  <option value="Arts, Spectacles et Activités Récréatives">Arts, Spectacles et Activités Récréatives</option>
                  <option value="Hébergement et Restauration">Hébergement et Restauration</option>
                </select>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Tranche Salariale</label>
                <select name="tranchesalariale" class="form-control">
                  <option value="{{ $can->tranchesalariale }}">{{ $can->tranchesalariale }}</option>
                  <option value="Moins de 100 milles">Moins de 100 milles</option>
                  <option value="[100.000 - 250.000]">[100.000 - 250.000]</option>
                  <option value="[250.000 - 500.000]">[250.000 - 500.000]</option>
                  <option value="[500.000 - 750.000]">[500.000 - 750.000]</option>
                  <option value="[750.000 - 1.000.000]">[750.000 - 1.000.000]</option>
                  <option value="[1.000.000 - 1.500.000]">[1.000.000 - 1.500.000]</option>
                  <option value="[1.500.000 - 2.000.000]">[1.500.000 - 2.000.000]</option>
                  <option value="[2.000.000 - 2.500.000]">[2.000.000 - 2.500.000]</option>
                  <option value="[2.500.000 - 3.000.000]">[2.500.000 - 3.000.000]</option>
                  <option value="Plus de 3 Millions">Plus de 3 Millions</option>
                </select>
                            </div>
            </div>
            <div class="col-md-6 px-1">
              <div class="form-group">
                <label>Tranche d' Année D'expérience</label>
                <select name="trancheanneeexpeience" class="form-control">
                  <option value="{{ $can->trancheanneeexpeience }}">{{ $can->trancheanneeexpeience }}</option>
                  <option value="[0 - 3ans]">[0 - 3ans]</option>
                  <option value="[3ans - 5ans]">[3ans - 5ans]</option>
                  <option value="[5ans - 10ans]">[5ans - 10ans]</option>
                  <option value="Plus de 10ans">Plus de 10ans</option>
                  <option value="Plus de 20ans">Plus de 20ans</option>
                </select>   
                       </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Accroche </label>
                <textarea name="accroche" placeholder="Oh so, your weak rhyme You doubt I'll bother, reading into it" class="form-control textarea">{{ $can->accroche }}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="update ml-auto mr-auto">
              <button class="btn  btn-round" type="submit" style="background-color: #035874;">Modifier </button>
            </div>
          </div>
        </form>



      </div>

    </div>
   
  </div>

</div>
@endsection