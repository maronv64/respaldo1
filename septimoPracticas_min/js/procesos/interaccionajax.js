

function cargarPersona() {
	//alert("En esta funcion se carga la tabla");

	 			var data = new FormData();
                data.append('opc',  "4");

                $.ajax({
                    url: "procesosPhp/procesosPersona.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        //alert(data);
                        actualizartabla(data);
                    }
                 });

}

function eliminarPersona(id) {
	//alert("En esta funcion se carga la tabla");

	 			var data = new FormData();
                data.append('opc',  "3");
				data.append('codigo', id);

                $.ajax({
                    url: "procesosPhp/procesosPersona.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                       cargarPersona();
                    }
                 });


}


   function actualizartabla(data){

                $("#tablaDatos").html("");    
                $.each(data, function(i, item) {
                    $("#tablaDatos").append("<tr><td>"+ item.idpersona +"\
                                </td><td>"+ item.identificacion +"</td>\
                                <td>"+ item.nombre +"</td> \
                                <td>"+ item.apellido +"</td>\
                                <td>"+ item.usuario +"</td>\
                                <td>"+ item.fechanacimiento +"</td> \
                                <td><button type='button' class='btn btn-info' onClick='preparaActualizar("+item.idpersona+","+item.idtipo+")'><i class='fa fa-check'></i></button></td>\
                                <td><button type='button' class='btn btn-danger' onClick='eliminarPersona("+item.idpersona+")'><i class='fa fa-close'></i></button></td></tr>");
                    });
        }
