function DocenteSelect(){
	var data = new FormData();

	$.ajax(
		{
			url: "procesosPHP/procesosDocente/DocenteSelect.php",
			type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false, 
            success: function(requestData)   // A function to be called if request succeeds
            {
                var data = JSON.parse(requestData);
                alert(data);
                //actualizartabla(data);
            }
		}
	);
}
