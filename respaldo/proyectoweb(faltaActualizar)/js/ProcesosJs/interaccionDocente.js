// funcion para traer los datos del archivo DocenteSelect.php
function DocenteSelect(){ 
	var data = new FormData();
    //alert("puras tonteas..");
	$.ajax(
		{
			url: "ProcesosPHP/DocenteSelect.php",
			type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false, 
            success: function(requestData)   // A function to be called if request succeeds
            {
                var data = JSON.parse(requestData);  
                CargarTabla(data);        
            }
		}
	);
}

// 

function CargarTabla(data){
    $("#dgvConsulta").html("");
    $.each(data,function(i,item){
      $("#dgvConsulta").append(
             "<tr><td>"+item.Nombre+"\
              </td><td>"+ item.Direccion +"</td>\
              <td>"+ item.Telefono +"</td> \
              <td>"+ item.Titulo +"</td>\
              <td>"+ item.Sexo +"</td> \
              <td>"+ item.idTipoContrato +"</td> \
              <td>"+ item.Descripcion +"</td> \
              <td><button type='button' class='btn btn-info' onClick='preparaActualizar("+item.idDocente+")'><i class='fa fa-check'></i></button></td>\
              <td><button type='button' class='btn btn-danger' onClick='DocenteDelete("+item.idDocente+")'><i class='fa fa-close'></i></button></td></tr>");
                   
          
    });
  }

  function DocenteBuscar(){ 
    var data = new FormData();
   // data.append("item",$("#txtBuscar").val());
    data.append('item',$('#txtBuscar').val());
    alert("puras tonteas..");
	$.ajax(
		{
			url: "ProcesosPHP/DocenteBuscar.php",
			type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false, 
            success: function(requestData)   // A function to be called if request succeeds
            {
                var data = JSON.parse(requestData);  
                CargarTabla(data);        
            }
		}
	);
}


// funcion para traer los datos del archivo DocenteSelect.php
function TipoContratoSelect(){ 
	var data = new FormData();
   // alert("puras tonteas..");
	$.ajax(
		{
			url: "ProcesosPHP/TipoContratoSelect.php",
			type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false, 
            success: function(requestData)   // A function to be called if request succeeds
            {
                var data = JSON.parse(requestData);  
                CargarCombo(data);        
            }
		}
	);
}

function CargarCombo(data){
    //$("#tablaDatos").html("");
    $.each(data,function(i,item){
      $("#cmbDescripcion").append(
             "<option value="+item.idTipoContrato+">"+item.Descripcion+"</option>");
                   
          
    });
  }

// 
////////////////////////////////////

function DocenteInsert(){ 
    var data = new FormData();
   // data.append("item",$("#txtBuscar").val());
    data.append('nombre',$('#txtNombre').val());
    data.append('direccion',$('#txtDireccion').val());
    data.append('telefono',$('#txtTelefono').val());
    data.append('titulo',$('#txtTitulo').val());
    data.append('sexo',$('#cmbSexo').val());
    data.append('descripcion',$('#cmbDescripcion').val());

    alert("puras tonteas..");
	$.ajax(
		{
			url: "ProcesosPHP/DocenteInsert.php",
			type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false, 
            success: function(requestData)   // A function to be called if request succeeds
            {  
                DocenteSelect(); 

            }
		}
	);
}

function DocenteDelete(id){ 
    var data = new FormData();
   // data.append("item",$("#txtBuscar").val());
    //data.append('item',$('#txtBuscar').val());
    data.append('item',id);

    //alert("puras tonteas..");
	$.ajax(
		{
			url: "ProcesosPHP/DocenteDelete.php",
			type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false, 
            success: function(requestData)   // A function to be called if request succeeds
            {
                DocenteSelect();       
            }
		}
	);
}