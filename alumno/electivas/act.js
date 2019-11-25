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
                                <td>${busc.cupo}</td>
                                <td>${busc.cred_act}</td>
                                <th>${busc.id_inter}</th>
                                <td><button class="agregar_a btn btn-outline-info" data-toggle="modal" data-target="#editar">
                                    <span class="glyphicon glyphicon-plus" style="info"></span>
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
                    template += `<tr><td colspan="8"><h5 align="center">**** SIN ACTIVIDADES DISPONIBLES ****</h5></td></tr>`;
                    $('#datos').html(template);
                } else {
                busca.forEach(busc => {
                    template += `<tr id_act="${busc.id_act}">
                        <td>${busc.name_act}</td>
                        <td>${busc.description}</td>
                        <td>${busc.cupo}</td>
                        <td>${busc.cred_act}</td>
                        <th>${busc.id_inter}</th>
                        <td><button class="agregar_a btn btn-outline-info" data-toggle="modal" data-target="#editar">
                            <span class="glyphicon glyphicon-plus" style="info"></span>
                        </button></td>
                    </tr>`
                });
                $('#datos').html(template);
            }
            }
        })
    }

    //Inscribir actividad
    $(document).on('click', '.agregar_a', function () {
        if (confirm('¿Deseas inscribirte a esta actividad?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('id_act');
            //console.log(id);
            $.post('add_act.php', {
                id
            }, function (response) {
                //console.log(response);
                alert(response);
                fetchAct();
            })
        }
    })
})