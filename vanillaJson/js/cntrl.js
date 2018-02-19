{
	let input, data, botonCargar, url, img, desc;
	//se que de esta forma me estoy cargando el dom pero no se me ocurría nada mejor.
	function buscarAutoCompletar() {
		//eliminamos todos los hijos.
		while(data.hasChildNodes()){
			data.removeChild(data.firstChild);
		}
		let textoBusqueda = input.value;
		if (textoBusqueda != "") {
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	let coincidencias = this.responseText.split(",");
			    	for(i=0; i<coincidencias.length-1; i++){
						let options = document.createElement("OPTION");
						options.setAttribute("value", coincidencias[i]);
						data.appendChild(options);
			    	}
		  	 	}
		  	};
		  	xhttp.open("GET", "json.php?buscador="+input.value, true);
		 	xhttp.send();	
		}
	}

	function cargarJson(){
		let keyword = input.value;
		if(keyword != ""){
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	if(this.responseText == ""){
			    		// falta poner modal.
			    		console.log("No se encontraron elementos con los parámetros especificados");
			    	}else{
			    		cargarDOM(JSON.parse(this.responseText));  	
		  	 		}
		  	 	}
		  	};
		  	xhttp.open("GET", "json.php?cargarJson="+keyword, true);
		 	xhttp.send();
		}
	}

	let cargarDOM = function(json){
		url.innerHTML = json.nombre;
		url.href = json.url;
		img.src = json.imagen;
		desc.innerHTML = json.descripcion;
	}
	let init = function(){
		//inicializamos el xhttp.
		xhttp = new XMLHttpRequest();
		//input donde escribimos.
		input = document.getElementById('busqueda');
		//es el datalist
		data = document.getElementById("data");
		//boton
		botonCargar = document.getElementById("cargarJson");
		botonCargar.addEventListener("click", cargarJson);
		input.addEventListener("keyup", buscarAutoCompletar);
		//inicializamos los campos imagenes etc.
		url = document.getElementById("url");
		img = document.getElementById("img");
		desc = document.getElementById("desc");
	}

window.onload = init;
}