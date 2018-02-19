<?php
//mensaje a mostrar
$mensaje = "";	
$frameworks = array(
	array("nombre" => "Angular", "url" => "https://angularjs.org/", "descripcion" => "es un framework de JavaScript de código abierto, mantenido por Google, que se utiliza para crear y mantener aplicaciones web de una sola página. Su objetivo es aumentar las aplicaciones basadas en navegador con capacidad de Modelo Vista Controlador (MVC), en un esfuerzo para hacer que el desarrollo y las pruebas sean más fáciles.", "imagen" => "http://www.analiticaweb.es/wp-content/uploads/2015/03/AngularJS.png"),
	array("nombre" => "React", "url" => "https://reactjs.org/", "descripcion" => " es una biblioteca Javascript de código abierto para crear interfaces de usuario con el objetivo de animar al desarrollo de aplicaciones en una sola página. Es mantenido por Facebook, Instagram y una comunidad de desarrolladores independientes y compañías.", "imagen" => "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/1200px-React-icon.svg.png"),
	array("nombre" => "Ember", "url" => "https://www.emberjs.com/", "descripcion" => "Ember.js es un framework de código libre que se basa en la arquitectura Modelo-Vista-Controlador. Permite crear SPA’s escalables incorporando data-binding bidireccional, propiedades computadas, templates de actualización automática y un manejador del estado de la aplicación.", "imagen" => "http://emberjs.com/images/tomster-twitter-card.png"),
	array("nombre" => "Backbone", "url" => "http://backbonejs.org", "descripcion" => "una herramienta de desarrollo/API para el lenguaje de programación Javascript con un interfaz RESTful por JSON , basada en el paradigma de diseño de aplicaciones Modelo Vista Controlador. Está diseñada para desarrollar aplicaciones de una única página2​ y para mantener las diferentes partes de las aplicaciones web (p.e. múltiples clientes y un servidor) sincronizadas.", "imagen" => "http://backbonejs.org/docs/images/backbone.png"),
	array("nombre" => "Aurelia", "url" => "http://aurelia.io/", "descripcion" => "Aurelia es un framework javascript que nos permite desarrollar aplicaciones para móvil, escritorio y la web que aprovecha las convenciones simples para potenciar su creatividad.", "imagen" => "https://cdn-images-1.medium.com/max/420/1*hiRo1b8-FurGZS-i3P0CyA.png"),
	array("nombre" => "Mercury", "url" => "https://github.com/Raynos/mercury", "descripcion" => "no he encontrado na de na de na.", "imagen" => "http://techbloghunting.com/wp-content/uploads/2016/10/en_js_mercury-js.png"),
	array("nombre" => "Vue", "url" => "https://vuejs.org/", "descripcion" => "Vue.js es una librería javascript para construir interfaces web interactivas, la documentación dice que no es un framework por que solo se especializa en la capa de vista (VM - ViewModel).", "imagen" => "https://vuejs.org/images/logo.png")
	);

/*buscar por los nombres del array*/
if(isset($_GET['buscador'])){
	$consultaBusqueda = $_GET['buscador'];	
	if(isset($consultaBusqueda)){
		foreach($frameworks as $x){
			if(stristr($x["nombre"], trim($consultaBusqueda))){
				$mensaje .= $x["nombre"].",";
			}
		}
	}
	echo $mensaje;
}else if(isset($_GET['cargarJson'])){
	$keyword = $_GET['cargarJson'];
 	foreach ($frameworks as $key => $val) {
    	if (strtoupper($val['nombre']) === strtoupper($keyword)) {
        	$mensaje = json_encode($val);
        	break;
    	}
	}
	echo $mensaje;
}


?>