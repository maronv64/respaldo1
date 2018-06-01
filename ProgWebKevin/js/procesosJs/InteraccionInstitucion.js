function MostrarInstitucion() {
	//alert("En esta funcion se carga la tabla");
    
	 			var data = new FormData();
                data.append('opc',  "4");
                $.ajax({
                    url: "CRUD/ProcesosInstitucion.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        //alert(data);
                        ActualizarTabla(data);
                    } 
                });
                

}

function EliminarInstitucion(id) {
	//alert("En esta funcion se carga la tabla");

	 			var data = new FormData();
                data.append('opc',  "3");
				data.append('codigo', id);

                $.ajax({
                    url: "CRUD/ProcesosInstitucion.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                       MostrarInstitucion();
                    }
                 });


}

function preparaActualizar(id) {
    //alert("En esta funcion se carga la tabla");

                var data = new FormData();
                data.append('opc',  "5");
                data.append('codigo', id);

                $.ajax({
                    url: "CRUD/ProcesosInstitucion.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                          $.each(data, function(i, item) {
                        $('#IdInstitucion').val(item.IdInstitucion);
                        $('#Nombre').val(item.Nombre);
                        $('#Ubicacion').val(item.Ubicacion);
                        $('#Codigo').val(item.Codigo);
                        $('#NomRector').val(item.NomRector);
                        $('#Telefono').val(item.Telefono);
                        $('#select').val(item.IdTipoInst);
                    });
                    }
                 });


}

function MostarTipoIns() {
    //alert("En esta funcion se carga la tabla");

                var data = new FormData();
                //data.append('opc',  "4");
                $.ajax({
                    url: "CRUD/ProcesosTipoIns.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        //alert(data);
                        LLenarCombo(data);
                    } 
                });
                

}

function LLenarCombo(data){

                   
                $.each(data, function(i, item) {
                    $("#select").append("<option value="+item.IdTipoInst+">"+item.Descripcion+"</option>");                    
                });
}

 function ActualizarTabla(data){

                $("#tablaDatos").html("");    
                $.each(data, function(i, item) {
                    $("#tablaDatos").append("<tr><td>"+ item.IdInstitucion +"\
                                </td><td>"+ item.Codigo +"</td>\
                                <td>"+ item.Nombre +"</td> \
                                <td>"+ item.Ubicacion +"</td>\
                                <td>"+ item.NomRector +"</td>\
                                <td>"+ item.Telefono +"</td> \
                                <td><button type='button' class='btn btn-info' onClick='preparaActualizar("+item.IdInstitucion+")'><i class='fa fa-check'></i></button></td>\
                                <td><button type='button' class='btn btn-danger' onClick='EliminarInstitucion("+item.IdInstitucion+")'><i class='fa fa-close'></i></button></td></tr>");
                    });
}

function Limpiar(){
                var data = new FormData();
                data.append('IdInstitucion',  $('#IdInstitucion').val(""));
                data.append('Nombre',  $('#Nombre').val(""));
                data.append('Ubicacion',  $('#Ubicacion').val(""));
                data.append('Codigo',  $('#Codigo').val(""));
                data.append('NomRector',  $('#NomRector').val(""));
                data.append('Telefono',  $('#Telefono').val(""));
                data.append('IdTipoInst',  $('#select').val(""));
}

function InsertarInstitucion() {
    //alert("En esta funcion se carga la tabla");
$valor=$('#IdInstitucion').val();
if ($valor=="") {
                var data = new FormData();
                data.append('Nombre',  $('#Nombre').val());
                data.append('Ubicacion',  $('#Ubicacion').val());
                data.append('Codigo',  $('#Codigo').val());
                data.append('NomRector',  $('#NomRector').val());
                data.append('Telefono',  $('#Telefono').val());
                data.append('IdTipoInst',  $('#select').val());
                data.append('opc',  "1");
                $.ajax({
                    url: "CRUD/ProcesosInstitucion.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        MostrarInstitucion();
                        Limpiar();
                    } 
                });
}else{

    ActualizarInstitucion();
    Limpiar();
}
}

function ActualizarInstitucion() {
    //alert("En esta funcion se carga la tabla");

                var data = new FormData();
                data.append('IdInstitucion',  $('#IdInstitucion').val());
                data.append('Nombre',  $('#Nombre').val());
                data.append('Ubicacion',  $('#Ubicacion').val());
                data.append('Codigo',  $('#Codigo').val());
                data.append('NomRector',  $('#NomRector').val());
                data.append('Telefono',  $('#Telefono').val());
                data.append('IdTipoInst',  $('#select').val());
                data.append('opc',  "2");
                $.ajax({
                    url: "CRUD/ProcesosInstitucion.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        MostrarInstitucion();
                        Limpiar();
                    } 
                });
}

function BuscarLike(){

                var data = new FormData();
                data.append('busca',$("#Buscar").val());    
                data.append('opc',  "6");
                $.ajax({
                    url: "CRUD/ProcesosInstitucion.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        //alert(data);
                        ActualizarTabla(data);
                    } 
                });
}