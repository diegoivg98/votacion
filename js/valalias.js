$(document).ready(function() {
    $('#alias').on('input', function() {
      var alias = $(this).val();
      var regex = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{5,}$/;
  
      if (regex.test(alias)) {
        $(this).removeClass('is-invalid');
        $(this).addClass('is-valid');
      } else {
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
      }
    });
  });
  