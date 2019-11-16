jQuery(function () {
    console.log('jquery funciona');
    fetchAct();
    fetchAlu();

    //BUSQUEDA ACTIVIDADES
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
                                <td>${busc.cred_act}</td>
                                <td><button class="alu_list btn btn-outline-success" data-toggle="modal" data-target="#editar">
                                    <span class="glyphicon glyphicon-new-window" style="success"></span>
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
                        <td>${busc.cred_act}</td>
                        <td><button class="alu_list btn btn-outline-success" data-toggle="modal" data-target="#editar">
                            <span class="glyphicon glyphicon-new-window" style="success"></span>
                        </button></td>
                    </tr>`
                });
                $('#datos').html(template);
            }
        })
    }

   //BUSQUEDA EN MODAL
    $('#search2').keyup(function () {
        let search = $('#search').val();
        if (search != "") {
            $.ajax({
                url: 'search_alu.php',
                type: 'POST',
                data: {search},
                success: function (response) {
                    console.log(response);
                    let busca = JSON.parse(response);
                    let template = '';
                    if (busca == 0) {
                        template += `<tr><td colspan="4"><h5 align="center">**** SIN COINCIDENCIAS ****</h5></td></tr>`;
                        $('#datos').html(template);
                    } else {
                        busca.forEach(busc => {
                            template += `<tr id_act="${busc.id_act}">
                                <td>${busc.boleta}</td>
                                <td>${busc.name}</td>
                                <td>${busc.ap}</td>
                                <td>${busc.cred_act}</td>
                                <td><button class="edit_a btn btn-outline-success" data-toggle="modal" data-target="#editar">
                                    <span class="glyphicon glyphicon-onew-window" style="success"></span>
                                </button></td>
                            </tr>`
                        });
                        $('#dato').html(template);
                    }
                }
            })
        } else {
            fetchAlu();
        }
    })

    //MOSTRAR LISTA ALUMNOS REGSITRADOS
   function fetchAlu(){ $(document).on('click', '.alu_list', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('id_act');
        console.log(id);
        $.post('alumno-list.php', {id}, function (response) {
            //console.log(response);
            let busca = JSON.parse(response);
                console.log(response);
                let template = '';
                    if (busca == 0) {
                        template += `<tr><td colspan="4"><h5 align="center">**** SIN ALUMNOS INSCRITOS ****</h5></td></tr>`;
                        $('#dato').html(template);
                    } else {
                        busca.forEach(busc => {
                            template += `<tr id_act="${busc.id_bol_act}">
                                <td>${busc.boleta}</td>
                                <td>${busc.name_a}</td>
                                <td>${busc.ap_a}</td>
                                <td><button class="edit_a btn btn-outline-success" data-toggle="modal" data-target="#editar">
                                    <span class="glyphicon glyphicon-new-window" style="success"></span>
                                </button></td>
                            </tr>`
                        });
                        $('#dato').html(template);
                    }
        })
    })}
})