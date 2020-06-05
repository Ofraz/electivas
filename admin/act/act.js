jQuery(function () {
    console.log('jquery funciona');
    fetchAct();

    //BUSQUEDA
    $('#search').keyup(function () {
        let search = $('#search').val();
        if (search != "") {
            $.ajax({
                url: 'search_act.php',
                type: 'POST',
                data: {search},
                success: function (response) {
                    console.log(response);
                    let busca = JSON.parse(response);
                    let template = '';
                    if (busca == 0) {
                        template += `<tr><td colspan="8"><h5 align="center">**** SIN COINCIDENCIAS ****</h5></td></tr>`;
                        $('#datos').html(template);
                    } else {
                        busca.forEach(busc => {
                            template += `<tr id_act="${busc.id_act}">
                                <td>${busc.name_act}</td>
                                <td>${busc.description}</td>
                                <td>${busc.cupo}</td>
                                <td>${busc.disp}</td>
                                <td>${busc.cred_act}</td>
                                <td>${busc.id_inter}</td>
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
            fetchAct();
        }
    })
    //LISTA TIEMPO REAL
    function fetchAct() {
        $.ajax({
            url: 'actividades-list.php',
            type: 'GET',
            success: function (response) {
                let busca = JSON.parse(response);
                console.log(response);
                let template = '';
                busca.forEach(busc => {
                    template += `<tr id_act="${busc.id_act}">
                        <td>${busc.name_act}</td>
                        <td>${busc.description}</td>
                        <td>${busc.cupo}</td>
                        <td>${busc.disp}</td>
                        <td>${busc.cred_act}</td>
                        <td>${busc.id_inter}</td>
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
        })
    }

    //ELIMINAR DATO
    $(document).on('click', '.delete_a', function () {
        if (confirm('¿Deseas eliminar?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('id_act');
            //console.log(id);
            $.post('delete_act.php', {
                id
            }, function (response) {
                //console.log(response);
                alert(response);
                fetchAct();
            })
        }
    })
    //CAPTURAR DATO A EDITAR EN FORMULARIO
    $(document).on('click', '.edit_a', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('id_act');
        //console.log(id);
        $.post('act_add.php', {id}, function (response) {
            console.log(response);
            const valor = JSON.parse(response);
            $('#name_e').val(valor.name_act);
            $('#last_ne').val(valor.description);
            $('#cupo').val(valor.cupo);
            $('#disp').val(valor.disp);
            $('#cred_e').val(valor.cred_act);
            $('#intere_name').val(valor.id_inter);
            $('#Id').val(valor.id_act);
            $('#Id_name').val(valor.name_act);
            $('#cup').val(valor.cupo);
        })
    })

    //ACTUALIZAR DATOS FORMULARIO MODIFICADO
    $("#editar_form").submit(function (e) {
        const postData = {
            name: $('#name_e').val(),
            last: $('#last_ne').val(),
            cupo: $('#cupo').val(),
            cred: $('#cred_e').val(),
            id_inter: $('#intere_name').val(),
            id: $('#Id').val(),
            back: $('#cup').val(),
            disp: $('#disp').val()
        };
        console.log(postData);
        $.post('act_add2.php', postData, function (response) {
            console.log(response);
            alert(response);
            fetchAct();
            $("#intere_name").val('');
            $('#editar').modal('hide');
        });
        e.preventDefault();
    })

    //AGREGAR DATOS
    $("#alta_form").submit(function (e) {
        const postData = {
            name: $('#name_a').val(),
            last: $('#last_na').val(),
            cupo: $('#cupo_a').val(),
            cred: $('#cred_a').val(),
            id_inter: $('#intera_name').val()
        };console.log(postData);
        $.post('act_add3.php', postData, function (response) {
            console.log(response);
            alert(response);
            fetchAct();
            $('#name_a').val('');
            $('#last_na').val('');
            $('#cupo_a').val('');
            $('#disp').val('');
            $('#cred_a').val('');
            $("#intera_name").val('');
            $('#alta').modal('hide');
        });
        e.preventDefault();
    })

    //user disponible nvo
    $('#name_a').keyup(function () {
        let search = $('#name_a').val();
        console.log(search);
        if (search != "") {
            $.ajax({
                url: 'validar_act.php',
                type: 'POST',
                data: {search},
                success: function (response) {
                    console.log(response);
                    if(response == "No disponible."){
                        template= "<span style='font:bold;color:#ff3636;font-size:75%;'>No disponible.</span>";
                        $('#activ_resulta').html(template);
                        $('#save').attr('disabled', true);
                        $('#name_a').css({'border':'#ff3636'});
                        //document.getElementById("user").required = false;
                    }
                    else if(response == "Disponible."){
                        template= "<span style='font:bold;color:#008000;font-size:75%;'>Disponible.</span>";
                        $('#activ_resulta').html(template);
                        $('#save').attr('disabled', false);
                        $('#name_a').css({'border':'#008000'});
                    }
                }
            })
        }else{$('#activ_resulta').html("");
        $('#name_a').css({'border':'#e5e5e5'});
        $('#save').attr('disabled', false);}
    })

    //validar user edit
    $('#name_e').keyup(function () {
        let search = $('#name_e').val();
        value = $('#Id_name').val();
        console.log(value);
        if (search != "") {
            $.ajax({
                url: 'validar_act.php',
                type: 'POST',
                data: {search},
                success: function (response) {
                   
                    if( search == value){
                        console.log(search,value);
                        $('#activ_resulte').html("<span style='font:bold;color:#adb5bd;font-size:75%;'>Sin cambios.</span>");
                        $('#save_e').attr('disabled', false);
                    }
                    else if(response == "No disponible."){
                        template= "<span style='font:bold;color:#ff3636;font-size:75%;'>No disponible.</span>";
                        $('#activ_resulte').html(template);
                        $('#save_e').attr('disabled', true);
                        
                    }
                    else if(response == "Disponible."){
                        template= "<span style='font:bold;color:#008000;font-size:75%;'>Disponible.</span>";
                        $('#activ_resulte').html(template);
                        $('#save_e').attr('disabled', false);
                    }
                }
            })
        }else{$('#activ_resulte').html("");
        $('#save_e').attr('disabled', false);}
    })
})