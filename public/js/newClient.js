/*Archivo js para las funciones de la vista newClient.blade.php*/
$(document).ready(function() {
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
                "model", //ruta de la peticion
                {
                    carBrand_id: carBrand //valores a pasar
                },
                function(response) {
                    $("#model_name").empty();
                    $("#model_name").append('<option value="">Modelo</option>');
                    $.each(response, function(index, value) {
                        $("#model_name").append(
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
        var plateNumber = $(this).val();
        if ($.trim(plateNumber) != "") {
            //no esta vacio
            $.get(
                "vehicle", //ruta de la peticion
                {
                    plateNumber: plateNumber //valores a pasar
                },
                function(response) {
                    if (response.length != 0) {//si hay valores
                        $("#line").hide();
                        $("#id_vehicleExist").val(response[0]['vehicle_id'])
                        lookSelectInput(response, "color_name");
                        lookSelectInput(response, "model_name");
                        lookSelectInput(response, "brand_name");
                        showInfoInList(response);
                    } else {
                        $("#id_vehicleExist").val(0)
                        unlookSelectImput("color_name");
                        unlookSelectImput("model_name");
                        unlookSelectImput("brand_name");
                        $("#line").show();
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
                    response[0]["model_name"] +
                    " " +
                    response[0]["color_name"]
            ).show();
        }
        function lookSelectInput(response, name) {
            $("#" + name)
                .hide()
                .attr("disabled", "true");
        }
        function unlookSelectImput(name) {
            $("#" + name)
                .show()
                .removeAttr("disabled");
        }
    });

    /*funcion para buscar si existe un cliente con numero de dpi existente*/
    $("#dpi").on("change", function() {
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
});
