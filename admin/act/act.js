jQuery(function(){
    console.log('jquery funciona');
    fetchAct();

    //BUSQUEDA
    $('#search').keyup(function() {
        let search = $('#search').val();
        if(search != "") {
            $.ajax({
            url:'search_act.php',
            type: 'POST',
            data: {search},
            success: function(response) {
                console.log(response);
                let busca = JSON.parse(response);
                let template = '';
                if(busca == 0) {
                    template +=`<tr><td colspan="4">SIN COINCIDENCIAS</td></tr>`;
                    $('#datos').html(template);
                }else{
                busca.forEach(busc=>{
                    template += `<tr id_act="${busc.id_act}">
                    <td>${busc.id_act}</td>
                    <td>${busc.name_act}</td>
                    <td>${busc.description}</td>
                    <td>${busc.cupo}</td>
                    <td>${busc.cred_act}</td>
                    <td><button class="edit_a btn btn-warning" data-toggle="modal" data-target="#editar">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button></td>
                    <td><button class="delete_a btn btn-danger">
                        <span class="glyphicon glyphicon-remove"></span>
                    </button></td>
                </tr>`
                });
                $('#datos').html(template);
            } }      
            })
        }else{
            fetchAct();
        }
    })
//LISTA TIEMPO REAL
    function fetchAct() {
        $.ajax({
            url: 'actividades-list.php',
            type: 'GET',
            success: function(response) {
                let busca = JSON.parse(response);
                //console.log(response);
                let template = '';
                busca.forEach(busc => {
                    template += `<tr id_act="${busc.id_act}">
                    <td>${busc.id_act}</td>
                    <td>${busc.name_act}</td>
                    <td>${busc.description}</td>
                    <td>${busc.cupo}</td>
                    <td>${busc.cred_act}</td>
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
    $(document).on('click','.delete_a', function () {
        if(confirm('¿Deseas eliminar?')){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('id_act');
            //console.log(id);
            $.post('delete_act.php', {id}, function(response) {
                //console.log(response);
                alert(response);
                fetchAct();
            })
        }
    })    
//CAPTURAR DATO A EDITAR EN FORMULARIO
    $(document).on('click','.edit_a', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('id_act');
        console.log(id);
        $.post('act_add.php', {id}, function(response) {
            console.log(response);
            const valor = JSON.parse(response);
            $('.modal-body #name_e').val(valor.name_act);
            $('.modal-body #last_ne').val(valor.description);
            $('.modal-body #cupo').val(valor.cupo);
            $('.modal #cred_e').val(valor.cred_act);
            $('#Id').val(valor.id_act);
        })      
    })  
    
//ACTUALIZAR DATOS FORMULARIO MODIFICADO
    $("#save_e").click(function(e){
        const postData= {
            name: $('#name_e').val(),
            last: $('#last_ne').val(),
            cupo: $('#cupo').val(),
            cred: $('#cred_e').val(),
            id: $('#Id').val() 
        };  
        $.post('act_add2.php', postData, function (response){
            console.log(response);
            alert(response);
            fetchAct();
            $('#editar').trigger('reset');
            $('#editar').modal('hide');    
        });
    })

 //AGREGAR DATOS
 $("#save").click(function(e){
    const postData= {
        name: $('#name_e').val(),
        last: $('#last_ne').val(),
        cupo: $('#cupo').val(),
        cred: $('#cred_e').val(),
    };  
    $.post('act_add3.php', postData, function (response){
        //console.log(response);
        alert(response);
        fetchAct();
        $('#alta').trigger('reset');
        $('#alta').modal('hide');    
    });
    })   
})