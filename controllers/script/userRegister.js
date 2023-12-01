import GetRoot from "./../functions/functions";

$(document).ready(function () {
  $("#userRegister").submit(function (e) {
    e.preventDefault();

    let data = {
      nome: $("#nome").val(),
      tag: $("#tag").val(),
      email: $("#email").val(),
      senha: $("#password").val(),
    };

    if (
      data.nome === "" ||
      data.tag === "" ||
      data.email === "" ||
      data.senha === ""
    ) {
      $("#formInvalido").show();
      return;
    }

    $.ajax({
      type: "POST",
      url: GetRoot() + "site/models/utils/UserRegister",
      data: data,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          $("#formSucesso").show();
        } else {
          var errorMessageSelector = "#" + response.message;
          $(errorMessageSelector).show();
        }
      },
      error: function (error, status, xhr) {
        console.log("Erro: ", error);
        console.log("Status: ", status);
        console.log("XHR: ", xhr);

        if (xhr.status === 404) {
          $("#404").show();
        } else if (xhr.status === 500) {
          $("#500").show();
        } else {
          alert("Erro desconhecido: " + xhr.statusText);
        }
      },
    });
  });
});
