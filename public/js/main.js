$('input[type="text"][name!="login"]').not(".lowercase").keyup(function () {
    $(this).val($(this).val().toUpperCase());
  });