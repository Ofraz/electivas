jQuery(function () {
    console.log('jquery funciona');
    fetchAct();
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
                                <td>${busc.disp}</td>
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
                if (busca == 0) {
                    template += `<tr><td colspan="8"><h5 align="center">**** SIN ACTIVIDADES ASIGNADAS ****</h5></td></tr>`;
                    $('#datos').html(template);
                } else {
                    busca.forEach(busc => {
                        template += `<tr id_act="${busc.id_act}">
                            <td>${busc.name_act}</td>
                            <td>${busc.description}</td>
                            <td>${busc.cupo}</td>
                            <td>${busc.disp}</td>
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
    }

   //BUSQUEDA EN MODAL
    $('#search2').keyup(function () {
        let search = $('#search2').val();
        let id = $('#Id').val();
        if (search != "") {
            $.ajax({
                url: 'search_alu.php',
                type: 'POST',
                data: {search, id},
                success: function (response) {
                    console.log(response);
                    let busca = JSON.parse(response);
                    let template = '';
                    if (busca == 0) {
                        template += `<tr><td colspan="4"><h5 align="center">**** SIN COINCIDENCIAS ****</h5></td></tr>`;
                        $('#dato').html(template);
                    } else {
                        busca.forEach(busc => {
                            template += `<tr id_act="${busc.boleta}">
                                <td>${busc.boleta}</td>
                                <td>${busc.name_a}</td>
                                <td>${busc.ap_a}</td>
                                <td><button class="alu_asist btn btn-outline-primary">
                                <span>${busc.carrera}</span>
                            </button></td>
                            </tr>`
                        });
                        $('#dato').html(template);
                    }
                }
            })
        } else {
            let id = $('#Id').val();
            $.post('alumno-list.php', {id}, function (response) {
                //console.log(response);
                let busca = JSON.parse(response);
                    console.log(response);
                    let template = '';  
                    if (busca == 0) {
                        template += `<tr><td colspan="4"><h5 align="center">**** SIN ALUMNOS INSCRITOS ****</h5></td></tr>`;
                        $('#dato').html(template);
                        $('#save').hide();
                    }
            });
            }
    })

    //MOSTRAR LISTA ALUMNOS REGSITRADOS
   $(document).on('click', '.alu_list', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('id_act');
        $('#Id').val(id);
        console.log(id);
        $.post('alumno-list.php', {id}, function (response) {
            //console.log(response);
            let busca = JSON.parse(response);
            console.log(response);
            let template = '';
            if (busca == 0) {
                template += `<tr><td colspan="4"><h5 align="center">**** SIN ALUMNOS INSCRITOS ****</h5></td></tr>`;
                $('#dato').html(template);
                $('#save').hide();
            } else {
                busca.forEach(busc => {
                    template += `<tr id_act="${busc.boleta}">
                        <td id_ac=>${busc.boleta}</td>
                        <td>${busc.name_a}</td>
                        <td>${busc.ap_a}</td>
                        <td><button class="alu_asist btn btn-outline-primary">
                                <span>${busc.carrera}</span>
                            </button></td>
                    </tr>`
                });
                $('#dato').html(template);
            }
        })
    });

 //PASE DE LISTA
 $(document).on('click', '.alu_asist', function (e) {
    console.log('click');
    let ident = $('#Id').val();
    console.log(ident);
    let element = $(this)[0].parentElement.parentElement;
    let boleta = $(element).attr('id_act');
    console.log(boleta);
    $.post('confirm_asist.php', {ident,boleta}, function () {
        id=$('#Id').val();
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
                    template += `<tr id_act="${busc.boleta}">
                        <td id_ac=>${busc.boleta}</td>
                        <td>${busc.name_a}</td>
                        <td>${busc.ap_a}</td>
                        <td><button class="alu_asist btn btn-outline-primary">
                                <span>${busc.carrera}</span>
                            </button></td>
                    </tr>`
                });
                $('#dato').html(template);
            }
        })
    })
    e.preventDefault();    
})

    //pase de lista
    $("#check_form").submit(function (e) { 
        id=$('#Id').val();
        console.log(id); 
        if(confirm("¿Deseas enviar los datos?: Una vez hecho, no se podrán hacer más modificaciones y la actividad será borrada.")){
            
            $.post('load_act.php', {id}, function (response) {
                alert(response);
                fetchAct();
            })
        }
        e.preventDefault();
    })
    
})