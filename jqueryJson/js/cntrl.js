{
	let $busqueda, $botonCargar, $url, $img, $desc;
	function buscarAutoCompletar() {
		let textoBusqueda = $busqueda.val();
		if (textoBusqueda != "") {
			$.get("json.php", {buscador: textoBusqueda}, function(mensaje) {
					arrayCoincidencia = mensaje.split(",");
					$busqueda.autocomplete({source: arrayCoincidencia});
			}); 	
		}
	}

	function cargarJson(){
		let keyword = $busqueda.val();
		if(keyword != ""){
			$.getJSON("json.php", {cargarJson: keyword}, function(data){
			cambiarDOM(data);
			}).fail(function() {
				$( "#modal" ).dialog({dialogClass: "no-close", title: "Error", buttons: [{text: "Ok",
					click: function() {
						$( this ).dialog( "close" );
					}
				}]});
  			});
		}
	}

	function cambiarDOM(data){
		//cambiar DOM.
		$url.text(data.nombre);
		$url.attr("href", data.url);
		$img.attr("src", data.imagen);
		$desc.text(data.descripcion);
	}

	let init = function(){
		$url = $("#url");
		$img = $("#img");
		$desc = $("#desc");
		$busqueda = $("#busqueda").keyup(buscarAutoCompletar);
		$botonCargar = $("#cargarJson").click(cargarJson);
	}
	$(init);
}