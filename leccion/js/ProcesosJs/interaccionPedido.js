function PedidoSelect(){ 
	var data = new FormData();
    //alert("puras tonteas..");
	$.ajax(
		{
			url: "ProcesosPHP/PedidoSelect.php",
			type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false, 
            success: function(requestData)   // A function to be called if request succeeds
            {
                var data = JSON.parse(requestData);  
                CargarTabla(data);
                //$('#idTipoCon').hide();
                $('#dgvPadre').show();         
            }
		}
	);
}

function CargarTabla(data){
    $("#dgvConsulta").html("");
    $.each(data,function(i,item){
      $("#dgvConsulta").append(
             "<tr><td>"+item.pedNumero+"\
              </td><td>"+ item.pedPrecioTotal +"</td>\
              <td>"+ item.pedDescuento +"</td> \
              <td>"+ item.pedIva +"</td>\
              <td><button type='button' class='btn btn-info' onClick='PreparePedidoUpdate("+item.id+")'><i class='fa fa-check'></i></button></td>\
              <td><button type='button' class='btn btn-danger' onClick='PedidoDelete("+item.id+")'><i class='fa fa-close'></i></button></td></tr>");
                   
          
    });
  }


  function PedidoBuscar(){ 
    var data = new FormData();
   // data.append("item",$("#txtBuscar").val());
    data.append('item',$('#txtBuscar').val());
    //alert("puras tonteas..");
	$.ajax(
		{
			url: "ProcesosPHP/PedidoBuscar.php",
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

function PedidoInsert(){ 
    var data = new FormData();
   // data.append("item",$("#txtBuscar").val());
    data.append('pedNumero',$('#txtNombre').val());
    data.append('pedPrecioTotal',$('#txtDireccion').val());
    data.append('pedDescuento',$('#txtTelefono').val());
    data.append('pedIva',$('#txtTitulo').val());
   
    //
	$.ajax(
		{
			url: "ProcesosPHP/PedidoInsert.php",
			type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false, 
            success: function(requestData)   // A function to be called if request succeeds
            {  
                PedidoSelect(); 

            }
		}
	);
}

function PreparePedidoUpdate(id){ 
    var data = new FormData();
   // data.append("item",$("#txtBuscar").val());
    data.append('item',id);

    //alert("puras tonteras..");
	$.ajax(
		{
			url: "ProcesosPHP/PedidoBuscarId.php",
			type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false, 
            success: function(requestData)   // A function to be called if request succeeds
            {  
                var data = JSON.parse(requestData);
                //alert("hola"+id);
                
                
                $.each(data, function(i, item) {
                    $('#txtidDocente').val(item.id);
                    $('#txtNombre').val(item.pedNumero);
                    $('#txtDireccion').val(item.pedPrecioTotal);
                    $('#txtTelefono').val(item.pedDescuento);
                    $('#txtTitulo').val(item.pedIva);

                });
                //$('#btnActualizar').attr("class","btn-success btn-block")
                //$('#btnActualizar').animate({backcolor:red});
                $('#dgvPadre').hide();
            }
		}
	);
}



function PedidoUpdate(){ 
    var data = new FormData();
   // data.append("item",$("#txtBuscar").val());
    data.append('id',$('#txtidDocente').val());
    data.append('pedNumero',$('#txtNombre').val());
    data.append('pedPrecioTotal',$('#txtDireccion').val());
    data.append('pedDescuento',$('#txtTelefono').val());
    data.append('pedIva',$('#txtTitulo').val());
    
    alert("Actualizacion realizada..");
	$.ajax(
		{
			url: "ProcesosPHP/PedidoUpdate.php",
			type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false, 
            success: function(requestData)   // A function to be called if request succeeds
            {  
                PedidoSelect();
                
            }
		}
	);
}

function PedidoDelete(id){ 
    var data = new FormData();
   // data.append("item",$("#txtBuscar").val());
    //data.append('item',$('#txtBuscar').val());
    data.append('item',id);

    //alert("puras tonteas..");
	$.ajax(
		{
			url: "ProcesosPHP/PedidoDelete.php",
			type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false, 
            success: function(requestData)   // A function to be called if request succeeds
            {
                PedidoSelect();       
            }
		}
	);
}