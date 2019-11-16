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
                                <td>${busc.id_act}</td>
                                <td>${busc.name_act}</td>
                                <td>${busc.description}</td>
                                <td>${busc.cupo}</td>
                                <td>${busc.cred_act}</td>
                                <th>${busc.id_inter}</th>
                                <td><button class="edit_a btn btn-outline-warning" data-toggle="modal" data-target="#editar">
                                    <span class="glyphicon glyphicon-pencil" style="warning"></span>
                                </button></td>
                                <td><button class="delete_a btn btn-outline-danger">
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
                        <td>${busc.id_act}</td>
                        <td>${busc.name_act}</td>
                        <td>${busc.description}</td>
                        <td>${busc.cupo}</td>
                        <td>${busc.cred_act}</td>
                        <th>${busc.id_inter}</th>
                        <td><button class="edit_a btn btn-outline-warning" data-toggle="modal" data-target="#editar">
                            <span class="glyphicon glyphicon-pencil" style="warning"></span>
                        </button></td>
                        <td><button class="delete_a btn btn-outline-danger">
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
            $('#cred_e').val(valor.cred_act);
            $('#intere_name').val(valor.id_inter); //investigar el motivo por el cuál no captura de forma correcta a veces
            $('#Id').val(valor.id_act);
        })
    })

    //ACTUALIZAR DATOS FORMULARIO MODIFICADO
    $("#save_e").click(function (e) {
        const postData = {
            name: $('#name_e').val(),
            last: $('#last_ne').val(),
            cupo: $('#cupo').val(),
            cred: $('#cred_e').val(),
            id_inter: $('#intere_name').val(),
            id: $('#Id').val()
        };
        console.log(postData);
        $.post('act_add2.php', postData, function (response) {
            console.log(response);
            alert(response);
            fetchAct();
            $("#intere_name").val('');
            $('#editar').modal('hide');
        });
    })

    //AGREGAR DATOS
    $("#save").click(function (e) {
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
            $('#cred_a').val('');
            $("#intera_name").val('');
            $('#alta').modal('hide');
        });
    })
})