
<!DOCTYPE html>
<html>
<head>
    <title>Graficas con jqPlot</title>
    <link class="include" rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
	  <script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery.jqplot.min.js"></script>
    <!-- Necesaria para poner los valores en el grafico de barras -->
    <script language="javascript" type="text/javascript" src="js/jqplot.pointLabels.js"></script>
    <!-- Necesaria para generar grafico de barras -->
    <script language="javascript" type="text/javascript" src="js/jqplot.barRenderer.js"></script>
	  <script language="javascript" type="text/javascript" src="js/jqplot.categoryAxisRenderer.js"></script>
    <!-- Necesaria para generar grafico de torta -->
	  <script language="javascript" type="text/javascript" src="js/jqplot.pieRenderer.js"></script>
  
  
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="../excanvas.js"></script><![endif]-->
    <script class="include" type="text/javascript" src="../jquery.min.js"></script>   
    
</head>
<body>

<div id="torta" style="height:300px;width:500px; "></div>
<br><br>
<div><span>Cursor en: </span><span id="info1">Nada todavia</span></div>
<div id="barras" style="height:300px;width:500px; "></div>

<script>
$(document).ready(function(){

  // Grafica de Torta
  var data = [
    ['Linux', 12],['Unix', 9], ['Mac OS', 14], 
    ['Solaris', 16],['Windows', 7], ['Android', 9]
  ];
  var plot1 = jQuery.jqplot ('torta', [data], 
    { 
      title: {
              text: 'Estadisticas de Sistemas Operativos',   // title for the plot,
              show: true,
      },
      seriesDefaults: {
        // Genera el Gafico de Torta
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Muestra Valores en la grafica
          // Por defecto, se muestran los valores en porcentaje.
          showDataLabels: true
        }
      }, 
      legend: { show:true, location: 'e' } // Muestra la Leyenda
    }
  );
  
  // Grafica de Barras  
        var s1 = [2, 6, 7, 10];
        var s2 = [7, 5, 3, 2];
        var ticks = ['a', 'b', 'c', 'd'];
         
        plot2 = $.jqplot('barras', [s1, s2], {
            title: {
              text: 'Estadisticas de Posible Encuesta',   // titulo
              show: true,
            },
            seriesDefaults:{ 
                renderer:$.jqplot.BarRenderer,    // Genera el Gafico de Barras
                pointLabels:{show: true}         // Muestra Valores en las barras
            },
            series:[                             // Etiqueta las seroies de datos
              {label:'Windows'},
              {label:'Linux'}              
            ],            
            legend: {                           // Muestra la leyenda
                show: true,
                location: 'e',
                placement: 'outside'
            },   
            axes: {                          // Define los valores a colocar en el eje de las X y Y   
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                },
                yaxis: {
                  pad: 1.05,
                  min: 0,
                  tickOptions: {formatString: '%d'}
                }
            }
        });

        // Opcional,muestra valors al posicionar el cursor encima de las barras
		    $('#barras').bind('jqplotDataHighlight', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', punto: '+pointIndex+', data: '+data);
            }
        );
             
        $('#barras').bind('jqplotDataUnhighlight', 
            function (ev) {
                $('#info1').html('Nada');
            }
        );
});
</script>
</body>
</html>