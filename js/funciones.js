// Funciones Jquery
$(document).ready(function() {
	

    // Cuadro de Dialogo con Animacion ejemplo 1
 	$( "#cajainfo" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
	// Boton Abrir
	$( "#abrir" ).click(function() {
      $( "#cajainfo" ).dialog( "open" );
    });
	
	// Boton Cerrar
	$( "#cerrar" ).click(function() {
      $( "#cajainfo" ).dialog( "close" );
    });
	// Fin Ejemplo 1
	
	// Cuadro de Dialogo Modal con Confirmación Ejemplo 2
	$( "#cajaconfirm" ).dialog({
	  autoOpen: false, 
      resizable: false,
      height:170,
      modal: true,
	  show: {
        effect: "slide",
        duration: 1000
      },
      hide: {
        effect: "fold",
        duration: 1000
      },
      buttons: {
        Eliminar: function() {
		  alert('Presione Eliminar'); // Dentro de estas llaves se coloca la acción a seguir despues de presionar eliminar
          $( this ).dialog( "close" );
        },
        Cancelar: function() {
		  alert('Presione Cancelar'); // Dentro de estas llaves se coloca la acción a seguir despues de presionar cancelar
          $( this ).dialog( "close" );
        }
      }
    });
	// Boton Abrir Confirm
	$( "#abrirconfirm" ).click(function() {
      $( "#cajaconfirm" ).dialog( "open" );
    });
	// Fin Ejemplo 2
	
	// Cuadro de Dialogo Modal con Mensaje Ejemplo 3
	$( "#cajamensaje" ).dialog({
	  autoOpen: false, 
      modal: true,
	  height:180,
	  show: {
        effect: "drop",
        duration: 1000
      },
      hide: {
        effect: "fade",
        duration: 1000
      },
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
	// Boton Abrir Mensaje
	$( "#abrirmensaje" ).click(function() {
      $( "#cajamensaje" ).dialog( "open" );
    });
	// Fin Ejemplo 3
	
	// Datepicker
	
	// Obtiene el Año actual del Sistema para definir el rango del datepicker	
	var fecha=new Date();
	var annoActual=fecha.getFullYear();
	// fin
	
	// definir Parametros por Defecto del Datepicker
	$.datepicker.setDefaults({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy',
		yearRange: '1980:'+annoActual,
		currentText: 'Hoy', currentStatus: '',
	  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	  	'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
	  	'Jul','Ago','Sep','Oct','Nov','Dic'],
	  monthStatus: '', yearStatus: '',
	  	weekHeader: 'Sm', weekStatus: '',
	  	dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;dabo'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
	  	dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
	 	dayStatus: 'DD', dateStatus: 'D, M d',
		showOn: "both",
		buttonImageOnly: true,
		buttonImage: "images/calendar.gif",
		buttonText: "Calendario",
		dateFormat: 'dd/mm/yy'
	});
	
	$( "#fechanacimiento" ).datepicker();

	$( "#accordion" ).accordion();
	
	$( "#tabs" ).tabs();

	// setup master volume
    $( "#master" ).slider({
      value: 60,
      orientation: "horizontal",
      range: "min",
      animate: true
    });
    // setup graphic EQ
    $( "#eq > span" ).each(function() {
      // read initial values from markup and remove that
      var value = parseInt( $( this ).text(), 10 );
      $( this ).empty().slider({
        value: value,
        range: "min",
        animate: true,
        orientation: "vertical"
      });
    });
	
	// Cambiar Tema en selección
	$('#themes').on("change", function(){		
		$("#stylesheet").prop("href", $('#themes').find(":selected").val());
	});

});  