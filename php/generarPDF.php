<?php
require ("../dompdf/autoload.inc.php"); 

use Dompdf\Dompdf;


ob_start();
require ("reportePDF.php");
$html = ob_get_clean();


$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("reporte.pdf", ["Attachment" => false]);
?>
