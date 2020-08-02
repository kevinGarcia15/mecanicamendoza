/*Archivo js para las funciones de la vista newClient.blade.php*/
/*Funcoin para establecer valores en inputs con relzacion al nombre del cliente*/
function setValuesClientInput(id_cliente) {
  var screen = $('#loading-screen');
  configureLoadingScreen(screen);
  if ($.trim(id_cliente) != "") {
      $.get(
          "clientexistWhitName", //ruta de la peticion
          {
              cliente_id: id_cliente //valores a pasar
          },
          function(response) {
            console.log(response)
            $("#FilterName").empty();
            $("#id_clientExist").val(response['client_id'])
            $('#first_name').val(response['first_name'])
            $('#last_name').val(response['last_name']).attr("disabled", "true")
            $('#address').val(response['address']).attr("disabled", "true")
            $('#phone').val(response['phone']).attr("disabled", "true")
          }
      );
  } else {
      $("#FilterName").empty();
  }
}

$(document).ready(function() {
  // var screen = $('#loading-screen');
  // configureLoadingScreen(screen);

    $("#addRow").click(function() {
        $("#rowWorks").append(
            $("<div>")
                .attr("id", "works")
                .addClass("row")
                .append(
                    $("<div>")
                        .addClass("col-9 col-sm-10 col-lg-10 mx-auto")
                        .append(
                            $("<input>")
                                .attr("type", "text")
                                .addClass("form-control my-2")
                                .attr("placeholder", "Código")
                                .attr("name", "description[]")
                                .attr("value", "")
                                .attr("required", "true")
                                .attr("placeholder", "Trabajo...")
                        )
                )
                .append(
                    $("<div>")
                        .addClass("col-3 col-sm-2 col-lg-2")
                        .append(
                            $("<button>")
                                .addClass("btn btn-danger btn-delete my-2")
                                .append(
                                    $("<span>")
                                        .addClass("material-icons")
                                        .text("delete")
                                )
                        )
                )
            //------------fin del selector
        );
        $(".btn-delete").click(function(e) {
            e.preventDefault();
            var row = $(this).parents(".row");
            row.remove();
        });
    });
    /*Funcion para hacer una peticion ajax al servidor para el select dinamico*/
    $("#brand_name").on("change", function() {
        var carBrand = $(this).val();
        if ($.trim(carBrand) != "") {
            //no esta vacio
            $.get(
                "line", //ruta de la peticion
                {
                    carBrand_id: carBrand //valores a pasar
                },
                function(response) {
                    $("#line_name").empty();
                    $("#line_name").append('<option value="">Linea</option>');
                    $.each(response, function(index, value) {
                        $("#line_name").append(
                            '<option value="' +
                                index +
                                '">' +
                                value +
                                "</option>"
                        );
                    });
                }
            );
        }
    });

    /*funcion para buscar si existe un vheiculo con ese numero de placa*/
    $("#plateNumber").on("change", function() {
      var screen = $('#loading-screen');
      configureLoadingScreen(screen);
        var plateNumber = $(this).val();
        if ($.trim(plateNumber) != "") {
            //no esta vacio
            $.get(
                "vehicle", //ruta de la peticion
                {
                    plateNumber: plateNumber //valores a pasar
                },
                function(response) {
                    if (response.length != 0) {//si hay valores existe vehiculo
                        $("#model").attr("disabled", "true").hide();
                        $("#id_vehicleExist").val(response[0]['vehicle_id'])
                        lookSelectInput(response, "color_name");
                        lookSelectInput(response, "line_name");
                        lookSelectInput(response, "brand_name");
                        showInfoInList(response);
                    } else {
                        $("#id_vehicleExist").val(0)
                        unlookSelectImput("color_name");
                        unlookSelectImput("line_name");
                        unlookSelectImput("brand_name");
                        $("#model").removeAttr("disabled").show();
                        $("#vehicleInfo").hide();
                    }
                }
            );
        }

        function showInfoInList(response) {
            $("#vehicleInfo").text("");
            $("#vehicleInfo").text(
                response[0]["brand_name"] +
                    " " +
                    response[0]["line_name"] +
                    " " +
                    response[0]["color_name"]
            ).show().addClass('alert alert-success');
        }
        function lookSelectInput(response, name) {
            $("#" + name)
                .hide()
                .attr("disabled", "true");
            $("."+name).hide()
        }
        function unlookSelectImput(name) {
            $("#" + name)
                .show()
                .removeAttr("disabled");
            $("."+name).show()
        }
    });

    /*funcion para buscar si existe un cliente con numero de dpi existente*/
    $("#dpi").on("change", function() {
      var screen = $('#loading-screen');
      configureLoadingScreen(screen);
        var dpi = $(this).val();
        if ($.trim(dpi) != "") {
            //no esta vacio
            $.get(
                "clientexist", //ruta de la peticion
                {
                    dpi: dpi //valores a pasar
                },

                function(response) {
                    if (response.length != 0) {//si hay valores
                      $("#id_clientExist").val(response[0]['client_id'])
                      $('#first_name').val(response[0]['first_name']).attr("disabled", "true")
                      $('#last_name').val(response[0]['last_name']).attr("disabled", "true")
                      $('#address').val(response[0]['address']).attr("disabled", "true")
                      $('#phone').val(response[0]['phone']).attr("disabled", "true")
                    } else {
                      $("#id_clientExist").val(0)
                      $('#first_name').val("").removeAttr("disabled")
                      $('#last_name').val("").removeAttr("disabled")
                      $('#address').val("").removeAttr("disabled")
                      $('#phone').val("").removeAttr("disabled")
                    }
                }
            );
        }
    });

    /*Funcion para busqueda de cliente mediante el nombre-------------------------*/
    $("#first_name").keyup(function() {
        var args = $(this).val();
        if ($.trim(args) != "") {
            $.get(
                "clientexistWhitName", //ruta de la peticion
                {
                    name: args //valores a pasar
                },
                function(response) {
                  $("#FilterName").empty();
                  if (response != '0') {
                    $.each(response, function(index, value) {
                      $("#FilterName").append(
                        "<a href='#' onclick='setValuesClientInput(" +
                        index +
                        ")'>" +
                        value +
                        "</a><br>"
                      );
                    });
                  }else {
                    $("#FilterName").text('No hay coincidencias');
                  }
                }
            );
        } else {
            $("#FilterName").empty();
        }

    });
});
/*Funcion para mostrar la carga de peticion en bd-----------------------------*/
function configureLoadingScreen(screen) {
    $(document)
        .ajaxStart(function() {
            screen.fadeIn();
        })
        .ajaxStop(function() {
            screen.fadeOut();
        });
}
