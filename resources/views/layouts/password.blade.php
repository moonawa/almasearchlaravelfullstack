@extends('layouts.apptout')


@section('contents')

<div class="card">
  <div class="card-header">
    <h4 class="card-title">Modifier le Mot de passe</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('cabinets.update') }}" method="POST">
      @csrf
      @method('PUT')

      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Mot de passe actuel</label>
            <input type="password" class="form-control" id="current_password" name="current_password">
            <span id="toggle-current-password" class="toggle-password">Afficher le mot de passe</span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Nouveau mot de passe</label>
            <input type="password" class="form-control" id="new_password" name="password">
            <span id="toggle-new-password" class="toggle-password">Afficher le mot de passe</span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Confirmer le nouveau mot de passe</label>
            <input type="password" class="form-control" id="confirm_password" name="password_confirmation">
            <span id="toggle-confirm-password" class="toggle-password">Afficher le mot de passe</span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="update ml-auto mr-auto">
          <button class="btn btn-round" type="submit" style="background-color: #035874;">Modifier</button>
        </div>
      </div>
    </form>
  </div>
</div>

<style>
  .toggle-password {
    cursor: pointer;
    margin-left: 10px;
    color: blue;
    text-decoration: underline;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('toggle-current-password').addEventListener('click', function () {
      var passwordField = document.getElementById('current_password');
      var passwordFieldType = passwordField.getAttribute('type');

      if (passwordFieldType === 'password') {
        passwordField.setAttribute('type', 'text');
        this.textContent = 'Masquer le mot de passe';
      } else {
        passwordField.setAttribute('type', 'password');
        this.textContent = 'Afficher le mot de passe';
      }
    });

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

    document.getElementById('toggle-confirm-password').addEventListener('click', function () {
      var passwordField = document.getElementById('confirm_password');
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

    @endsection