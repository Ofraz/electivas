jQuery(function () {
    console.log('jquery funciona');
    fetchInter();

    $(document).ready(function () {
        //called when key is pressed in textbox
        $("#user_a").keypress(function (e) {
           //if the letter is not digit then display error and don't type anything
           if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              //display error message
              $("#errmsg").html("Sólo numeros").show()
                     return false;
          }
         });
      });
      
      $(document).ready(function () {
        //called when key is pressed in textbox
        $("#user_e").keypress(function (e) {
           //if the letter is not digit then display error and don't type anything
           if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              //display error message
              $("#errmsg").html("Sólo numeros").show()
                     return false;
          }
         });
      });

//validar nombre nvo
$('#name_a').keyup(function () {
    let search = $('#user_a').val();
    let compare = $('#name_a').val();
    if (search != "" && compare == search || compare == search+" ") {
        template= "<span style='font:bold;color:#ff3636;font-size:75%;'>El nombre no puede ser similar al usuario.</span>";
        $('#name_resulta').html(template);
        $('#save').attr('disabled', true);
    }else{
        $('#name_resulta').html("");
        $('#save').attr('disabled', false);
    }
})

//validar nombre edit
$('#name_e').keyup(function () {
    let search = $('#user_e').val();
    let compare = $('#name_e').val();
    if (search != "" && compare == search || compare == search+" ") {
        template= "<span style='font:bold;color:#ff3636;font-size:75%;'>El nombre no puede ser similar al usuario.</span>";
        $('#name_resulte').html(template);
        $('#save_e').attr('disabled', true);
    }else{
        $('#name_resulte').html("");
        $('#save_e').attr('disabled', false);
    }
})

    //validar apellidos nvo
    $('#last_na').keyup(function () {
        let search = $('#name_a').val();
        let compare = $('#last_na').val();
        if (search != "" && compare == search || compare == search+" ") {
            template= "<span style='font:bold;color:#ff3636;font-size:75%;'>Los apellidos no pueden ser iguales al nombre.</span>";
            $('#last_resulta').html(template);
            $('#save').attr('disabled', true);
        }else{
            $('#last_resulta').html("");
            $('#save').attr('disabled', false);
        }
    })

    //validar apellidos edit
    $('#last_ne').keyup(function () {
        let search = $('#name_e').val();
        let compare = $('#last_ne').val();
        if (search != "" && compare == search) {
            template= "<span style='font:bold;color:#ff3636;font-size:75%;'>Los apellidos no pueden ser iguales al nombre.</span>";
            $('#last_resulte').html(template);
            $('#save_e').attr('disabled', true);
        }else{
            $('#last_resulte').html("");
            $('#save_e').attr('disabled', false);
        }
    })

    //user disponible nvo
    $('#user_a').keyup(function () {
        let search = $('#user_a').val();
        console.log(search);
        if (search != "") {
            $.ajax({
                url: 'validar_inter.php',
                type: 'POST',
                data: {search},
                success: function (response) {
                    console.log(response);
                    if(response == "No disponible."){
                        template= "<span style='font:bold;color:#ff3636;font-size:75%;'>No disponible.</span>";
                        $('#inter_resulta').html(template);
                        $('#save').attr('disabled', true);
                        //document.getElementById("user").required = false;
                    }
                    else if(response == "Disponible."){
                        template= "<span style='font:bold;color:#008000;font-size:75%;'>Disponible.</span>";
                        $('#inter_resulta').html(template);
                        $('#save').attr('disabled', false);
                    }
                }
            })
        }else{$('#user_resulta').html("");
        $('#save').attr('disabled', false);}
    })

    //validar user edit
    $('#user_e').keyup(function () {
        let search = $('#user_e').val();
        value = $('#Id').val();
        console.log(value);
        if (search != "") {
            $.ajax({
                url: 'validar_inter.php',
                type: 'POST',
                data: {search},
                success: function (response) {
                   
                    if( search == value){
                        console.log(search,value);
                        $('#inter_resulte').html("<span style='font:bold;color:#adb5bd;font-size:75%;'>Sin cambios.</span>");
                        $('#save_e').attr('disabled', false);
                    }
                    else if(response == "No disponible."){
                        template= "<span style='font:bold;color:#ff3636;font-size:75%;'>No disponible.</span>";
                        $('#inter_resulte').html(template);
                        $('#save_e').attr('disabled', true);
                        
                    }
                    else if(response == "Disponible."){
                        template= "<span style='font:bold;color:#008000;font-size:75%;'>Disponible.</span>";
                        $('#inter_resulte').html(template);
                        $('#save_e').attr('disabled', false);
                    }
                }
            })
        }else{$('#inter_resulte').html("");
        $('#save_e').attr('disabled', false);}
    })

    //BUSQUEDA
    $('#search').keyup(function () {
        let search = $('#search').val();
        if (search != "") {
            $.ajax({
                url: 'int_search.php',
                type: 'POST',
                data: {search},
                success: function (response) {
                    console.log(response);
                    let busca = JSON.parse(response);
                    let template = '';
                    if (busca == 0) {
                        template += `<tr><td colspan="5"><h5 align="center">**** SIN COINCIDENCIAS ****</h5></td></tr>`;
                        $('#datos').html(template);
                    } else {
                        busca.forEach(busc => {
                            template += `<tr id_inter="${busc.id_inter}">
                                <td>${busc.id_inter}</td>
                                <td>${busc.name_inter}</td>
                                <td>${busc.ap_inter}</td>
                                <td align="center"><button class="edit_a btn btn-outline-warning" data-toggle="modal" data-target="#editar">
                                    <span class="glyphicon glyphicon-pencil" style="warning"></span>
                                </button></td>
                                <td align="center"><button class="delete_a btn btn-outline-danger">
                                    <span class="glyphicon glyphicon-remove" style="danger"></span>
                                </button></td>
                            </tr>`
                        });
                        $('#datos').html(template);
                    }
                }
            })
        } else {
            fetchInter();
        }
    })
    //LISTA TIEMPO REAL
    function fetchInter() {
        $.ajax({
            url: 'int_list.php',
            type: 'GET',
            success: function (response) {
                let busca = JSON.parse(response);
                console.log(response);
                let template = '';
                if (busca == 0) {
                    template += `<tr><td colspan="5"><h5 align="center">**** SIN ACTIVIDADES CREADAS ****</h5></td></tr>`;
                    $('#datos').html(template);
                } else {
                    busca.forEach(busc => {
                        template += `<tr id_inter="${busc.id_inter}">
                            <td>${busc.id_inter}</td>
                            <td>${busc.name_inter}</td>
                            <td>${busc.ap_inter}</td>
                            <td align="center"><button class="edit_a btn btn-outline-warning" data-toggle="modal" data-target="#editar">
                                <span class="glyphicon glyphicon-pencil" style="warning"></span>
                            </button></td>
                            <td align="center"><button class="delete_a btn btn-outline-danger">
                                <span class="glyphicon glyphicon-remove" style="danger"></span>
                            </button></td>
                        </tr>`
                    });
                    $('#datos').html(template);
                }
            }
        })
    }

    //ELIMINAR DATO
    $(document).on('click', '.delete_a', function () {
        if (confirm('¿Deseas eliminar?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('id_inter');
            //console.log(id);
            $.post('int_delete.php', {id}, function (response) {
                //console.log(response);
                alert(response);
                fetchInter();
            })
        }
    })
    //CAPTURAR DATO A EDITAR EN FORMULARIO
    $(document).on('click', '.edit_a', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('id_inter');
        
        console.log(id);
        $.post('int_add.php', {id}, function (response) {
            console.log(response);
            const valor = JSON.parse(response);
            $('#name_e').val(valor.name_inter);
            $('#last_ne').val(valor.ap_inter);
            $('#user_e').val(valor.id_inter);
            $('#Id').val(valor.id_inter);
            //$('#Var').val(valor.id_inter);

        })
    })

    //ACTUALIZAR DATOS FORMULARIO MODIFICADO
    $("#editar_form").submit(function (e) {
        const postData = {
            user: $('#user_e').val(),
            name: $('#name_e').val(),
            last: $('#last_ne').val(),
            id: $('#Id').val()
        };
        $.post('int_add2.php', postData, function (response) {
            //console.log(response);
            alert(response);
            fetchInter();
            $('#editar').modal('hide');
        });
        e.preventDefault();
    })

    //AGREGAR DATOS
    $("#alta_form").submit(function (e) {
        const postData = {
            user: $('#user_a').val(),
            name: $('#name_a').val(),
            last: $('#last_na').val()
        };
        $.post('int_add3.php', postData, function (response) {
            //console.log(response);
            alert(response);
            fetchInter();
            $('#user_a').val('');
            $('#name_a').val('');
            $('#last_na').val('');
            $('#alta').modal('hide');
        });
        e.preventDefault();
    })
})