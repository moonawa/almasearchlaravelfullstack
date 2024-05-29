
document.getElementById('myForm').addEventListener('submit', function(event) {
    var form = event.target;
    var submitButton = document.getElementById('submitButton');
    
    if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        form.classList.add('was-validated');
    } else {
        // Désactiver le bouton et afficher un indicateur de chargement
        submitButton.disabled = true;
        submitButton.classList.add('btn-loading');

        // Permettre au formulaire de se soumettre normalement
    }
});

document.addEventListener('DOMContentLoaded', function() {
  $('#exampleModal').on('hidden.bs.modal', function (e) {
        if ($('#exampleModal .is-invalid').length > 0) {
            e.preventDefault();
            e.stopPropagation();
        }
    });
    $('.status-checkbox').change(function () {
        $(this).closest('form').submit();
    });
});
