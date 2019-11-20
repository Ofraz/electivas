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
                            template += `<tr id_act="${busc.id_act}">
                                <td>${busc.boleta}</td>
                                <td>${busc.name_a}</td>
                                <td>${busc.ap_a}</td>
                                <td align="center"><div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" name="check_list[]" value="${busc.boleta}">
                                    </div>
                                </div></td>
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
                    } else {
                        busca.forEach(busc => {
                            template += `<tr id_act="${busc.id_bol_act}">
                                <td>${busc.boleta}</td>
                                <td>${busc.name_a}</td>
                                <td>${busc.ap_a}</td>
                                <td align="center"><div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" name="check_list[]" value="${busc.boleta}">
                                    </div>
                                </div></td>
                            </tr>`
                        });
                        $('#dato').html(template);
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
            } else {
                busca.forEach(busc => {
                    template += `<tr id_act="${busc.id_bol_act}">
                        <td>${busc.boleta}</td>
                        <td>${busc.name_a}</td>
                        <td>${busc.ap_a}</td>
                        <td align="center"><div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" name="check_list[]" value="${busc.boleta}">
                            </div>
                        </div></td>
                    </tr>`
                });
                $('#dato').html(template);
            }
        })
    });

    //pase de lista
    $("#check_form").submit(function (e) {  

        var id = $('#Id').val();
        console.log(id);

    var checkboxes = document.getElementsByName('check_list[]');
    var vals = "";
    for (var i=0, n=checkboxes.length;i<n;i++) 
    {
        if (checkboxes[i].checked) 
        {
           vals += ","+checkboxes[i].value;
        }
    }
    if (vals) vals = vals.substring(1);

    console.log(vals);
    $.post('confirm_asist.php', {vals,id}, function (response) {
        alert(response);
    });
    

        /*const postData = {
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
        });*/
        e.preventDefault();
    })

})