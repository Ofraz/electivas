jQuery(function () {
    console.log('jquery funciona');
    fetchInter();

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
        //console.log(id);
        $.post('int_add.php', {id}, function (response) {
            //console.log(response);
            const valor = JSON.parse(response);
            $('#name_e').val(valor.name_inter);
            $('#last_ne').val(valor.ap_inter);
            $('#user_e').val(valor.id_inter);
            $('#Id').val(valor.id_inter);
        })
    })

    //ACTUALIZAR DATOS FORMULARIO MODIFICADO
    $("#save_e").click(function (e) {
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
    })

    //AGREGAR DATOS
    $("#save").click(function (e) {
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
    })
})