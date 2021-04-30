<?php

use app\models\Alumno;

$PHPWord = new PHPWord();
$document_path = "../templates/certificado_titulo_tramite.docx";
$document = $PHPWord->loadTemplate(	$document_path );


$document->setValue('curso', $objAlumno->curso );
$document->setValue('alumno', $objAlumno->alumno );
$document->setValue('documento', $objAlumno->documento );

$division_numero= $char= substr($objAlumno->division, 0, 1);
$document->setValue('division', $division_numero  );



setlocale(LC_ALL, 'es_ES');
$monthNum  = date('m');
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$mes = strftime('%B', $dateObj->getTimestamp());


$document->setValue('dias', date("d") );
$document->setValue('mes', ucfirst($mes ) );
$document->setValue('anio', date("Y") );


$filename  =  $objAlumno->documento.'_titulo_tramite.docx';
$document->save($filename);

header('Content-Description: File Transfer');
header('Content-type: application/force-download');
header('Content-Disposition: attachment; filename='.basename($filename));
header('Content-Transfer-Encoding: binary');
header('Content-Length: '.filesize($filename));

ob_clean();
readfile( $filename);
unlink($filename);

?>
