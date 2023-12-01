import GetRoot from "../functions/functions";

$(document).ready(function () {
  $("#userRedefine").click(function (e) {
    e.preventDefault();
    var rootUrl = GetRoot();
    window.open(rootUrl + "site/views/pages/userRedefine", "_blank");
  });

  $("#Login").click(function (e) {
    e.preventDefault();
    var rootUrl = GetRoot();
    window.location.href = rootUrl + "site";
  });
  $("#cancel").click(function (e) {
    e.preventDefault();
    var rootUrl = GetRoot();
    window.location.href = rootUrl + "site";
  });
  $("#Suporte").click(function (e) {
    e.preventDefault();
    var rootUrl = GetRoot();
    window.location.href = rootUrl + "site/views/pages/suporte";
  });
  $("#Perfil").click(function (e) {
    e.preventDefault();
    var rootUrl = GetRoot();
    window.location.href = rootUrl + "site/views/pages/perfil";
  });
  $("#Config").click(function (e) {
    e.preventDefault();
    var rootUrl = GetRoot();
    window.location.href = rootUrl + "site/views/pages/config";
  });
  $("#Logout").click(function (e) {
    e.preventDefault();
    var rootUrl = GetRoot();
    window.location.href = rootUrl + "site/views/pages/logout";
  });
});
