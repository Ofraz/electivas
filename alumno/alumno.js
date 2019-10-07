jQuery(function () {
    console.log('jquery funciona');
    fetchUsers();

    //BUSQUEDA
    $('#search').keyup(function () {
        let search = $('#search').val();
        if (search != "") {
            $.ajax({
                url: 'search_a.php',
                type: 'POST',
                data: {
                    search
                },
                success: function (response) {
                    //console.log(response);
                    let busca = JSON.parse(response);
                    //console.log(busca);
                    let template = '';
                    if (busca == 0) {
                        template += `<tr><td colspan="4"><h5 align="center">**** SIN COINCIDENCIAS ****</h5></td></tr>`;
                        $('#datos').html(template);
                    } else {
                        busca.forEach(busc => {
                            template += `<tr boleta="${busc.boleta}">
                                <td>${busc.boleta}</td> 
                                <td>${busc.name_a}</td>
                                <td>${busc.ap_a}</td>
                                <td>${busc.cred}</td>
                                <td><button class="edit_a btn btn-warning" data-toggle="modal" data-target="#editar">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    </button></td>
                                <td><button class="delete_a btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button></td>
                            </tr>`
                        });
                        $('#datos').html(template);
                    }
                }
            })
        } else {
            fetchUsers();
        }
    })
    //LISTA TIEMPO REAL
    function fetchUsers() {
        $.ajax({
            url: 'admin-list.php',
            type: 'GET',
            success: function (response) {
                let busca = JSON.parse(response);
                //console.log(response);
                let template = '';
                busca.forEach(busc => {
                    template += `<tr boleta="${busc.boleta}">
                        <td>${busc.boleta}</td> 
                        <td>${busc.name_a}</td>
                        <td>${busc.ap_a}</td>
                        <td>${busc.cred}</td>
                        <td><button class="edit_a btn btn-warning" data-toggle="modal" data-target="#editar">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button></td>
                        <td><button class="delete_a btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span>
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
            let id = $(element).attr('boleta');
            //console.log(id);
            $.post('delete-a.php', {
                id
            }, function (response) {
                //console.log(response);
                fetchUsers();
            })
        }
    })
    //CAPTURAR DATO A EDITAR EN FORMULARIO
    $(document).on('click', '.edit_a', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('boleta');
        //console.log(id);
        $.post('admin-add.php', {id}, function (response) {
            //console.log(response);
            const valor = JSON.parse(response);
            $('#name_e').val(valor.name_a);
            $('#last_ne').val(valor.ap_a);
            $('#user_e').val(valor.boleta);
            $('#cred_e').val(valor.cred);
            $('#Id').val(valor.boleta);
        });
    })

    //actualizar admin
    $("#save_e").click(function (e) {
        const postData = {
            user: $('#user_e').val(),
            name: $('#name_e').val(),
            last: $('#last_ne').val(),
            cred: $('#cred_e').val(),
            id: $('#Id').val()
        };
        $.post('admin-add2.php', postData, function (response) {
            //console.log(response);
            alert(response);
            fetchUsers();
        });
    })
    //AGREGAR NUEVO USUARIO 
    $("#save").click(function (e) {
        e.preventDefault();
        const postData = {
            user_a: $('#user_a').val(),
            name_a: $('#name_a').val(),
            last_a: $('#last_na').val(),
            cred_a: $('#cred_a').val()
        };
        $.post('admin-add3.php', postData, function (response) {
            //console.log(response);
            alert(response);
            fetchUsers();
            $('#user_a').val('');
            $('#name_a').val('');
            $('#last_na').val('');
            $('#cred_a').val('');
            $('#alta').modal('hide');
        });
    })
})