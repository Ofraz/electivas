jQuery(function () {
    console.log('jquery funciona');
    fetchAct();

    //BUSQUEDA
    $('#search').keyup(function () {
        let search = $('#search').val();
        if (search != "") {
            $.ajax({
                url: 'actividades_search.php',
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
                                <td>${busc.cred_act}</td>
                                <th>${busc.id_inter}</th>
                                <td><button class="delete_a btn btn-outline-danger" data-toggle="modal" data-target="#editar">
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
                if (busca == 0) {
                    template += `<tr><td colspan="8"><h5 align="center">**** SIN ACTIVIDADES INSCRITAS ****</h5></td></tr>`;
                    $('#datos').html(template);
                } else {
                    busca.forEach(busc => {
                        template += `<tr id_act="${busc.id_act}">
                            <td>${busc.name_act}</td>
                            <td>${busc.description}</td>
                            <td>${busc.cred_act}</td>
                            <th>${busc.id_inter}</th>
                            <td><button class="delete_a btn btn-outline-danger" data-toggle="modal" data-target="#editar">
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
            let id = $(element).attr('id_act');
            //console.log(id);
            $.post('delete_actividad.php', {
                id
            }, function (response) {
                //console.log(response);
                alert(response);
                fetchAct();
            })
        }
    })
})