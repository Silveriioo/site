$(document).ready(function () {
  $("#PerfilUsuario").click(function (e) {
    e.preventDefault();
    $("#MenuUsuario").toggle();
    e.stopPropagation();
  });

  $(document).click(function (e) {
    if (
      !$(e.target).closest("#MenuUsuario").length &&
      !$(e.target).is("#PerfilUsuario")
    ) {
      $("#MenuUsuario").hide();
    }
  });
  $("#BotaoMenu").click(function (e) {
    e.preventDefault();
    $("#MobileMenu").toggle();
    e.stopPropagation();
  });

  $(document).click(function (e) {
    if (
      !$(e.target).closest("#MobileMenu").length &&
      !$(e.target).is("#BotaoMenu")
    ) {
      $("#MobileMenu").hide();
    }
  });
});
