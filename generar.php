<?php

if (isset($_POST['genera_pie'])) {

	// TODO: Validación/limpieza de $_POST
	// WISH: Cachear la imagen ya en base64

	// Tomado de https://stackoverflow.com/a/13758760
	$path = 'res/JdA-logo-email.png';
	$type = pathinfo($path, PATHINFO_EXTENSION);
	$data = file_get_contents($path);
	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $filename="piefirma.html";

	$len_f = strlen($_POST['tel_fijo']);
	$len_f_c = strlen($_POST['tel_fijo_corp']);
	$len_m = strlen($_POST['tel_movil']);
	$len_m_c = strlen($_POST['tel_movil_corp']);
	$separador = '';
	
	
    header("Content-disposition: attachment; filename=" . $filename);
    header("Content-type: text/html");
	$html = '<!DOCTYPE html>';
    $html .='<html lang="es">';
    $html .='<head>';
    $html .='<meta charset="UTF-8"/>';
	$html .='<style>a {font-size: 11px;text-decoration: none;color: #3366ff;}</style>';
    $html .='<title>Firma de correo corporativo de la Junta de Andaluc&iacute;a</title>';
    $html .='</head>';
    $html .='<body>';
    $html .='<table width="700" border="0" cellspacing="0" cellpadding="0" style="font-family: Source Sans Pro, sans-serif, Verdana; color: #313B26; line-height: 18px; text-align: left;">';
     $html .='<tr>';
      $html .='<td width="700" align="left" valign="center">';
       $html .='<a href="http://www.juntadeandalucia.es" target="_blank">';
       $html .='<img src="'.$base64.'" alt="Marca gen&eacute;rica de la Junta de Andaluc&iacute;a" style="width:180px;"/></a>';
      $html .='</td>';
     $html .='</tr>';
     $html .='<tr>';
      $html .='<td width="700" align="left" valign="center">';
       $html .='<p style="font-family: Source Sans Pro, sans-serif, Verdana; font-size: 14px; margin-left:60px; margin-top: 0px;"><strong>'.$_POST['nombreapellidos'].'</strong><br/>';
        $html .='<span style="font-family: Source Sans Pro, sans-serif, Verdana; font-size: 13px; color: #9B9A9D; margin-top: 0px;">'.$_POST['cargo'].'</span><br/>';
        $html .='<span style="font-family: Source Sans Pro, sans-serif, Verdana; font-size: 13px; color: #9B9A9D; margin-top: 0px;">'.$_POST['organismo1'].'</span><br/>';
        $html .='<span style="font-family: Source Sans Pro, sans-serif, Verdana; font-size: 13px; color: #9B9A9D; margin-top: 0px;">'.$_POST['organismo2'].'</span>';
       $html .='</p>';
       $html .='<p style="font-family: Source Sans Pro, sans-serif, Verdana; margin-top: 4px; font-size: 11px; line-height: 16px; margin-left:60px">'.$_POST['direccion'].'<br/>';
        $html .='<span>';
	if ( ($len_f > 0) || ($len_f_c > 0 ) ) {
		$html .='T:';
		$separador = ' | ';
	}
	if ( $len_f > 0 ) {
		$html .=' <a href="tel:'.$_POST['tel_fijo'].'">'.$_POST['tel_fijo'].'</a>';
	}
	if ( $len_f_c > 0 ) {
        $html .=' (<a href="tel:'.$_POST['tel_fijo_corp'].'">'.$_POST['tel_fijo_corp'].'</a>)';
	}
	if ( ($len_m > 0) || ($len_m_c > 0 ) ) {
		$html .= $separador;
		$html .='M:';
	}
	if ( $len_m > 0 ) {
		$html .=' <a href="tel:'.$_POST['tel_movil'].'">'.$_POST['tel_movil'].'</a>';
	}
	if ( $len_m_c > 0 ) {
        $html .=' (<a href="tel:'.$_POST['tel_movil_corp'].'">'.$_POST['tel_movil_corp'].'</a>)';
	}
		$html .='<br/></span>';
        $html .='<a href="mailto:'.$_POST['email'].'" >'.$_POST['email'].'</a>&nbsp;|&nbsp;</span>';
        $html .='<a href="http://www.juntadeandalucia.es" target="_blank" style="color: #313B26; text-decoration:none;">www.juntadeandalucia.es</a><br/></span>';
       $html .='</p>';
      $html .='</td>';
     $html .='</tr>';
    $html .='</table>';
    $html .='</body>';
    $html .='</html>';
	
	echo $html;
} else {
    if (isset($_SERVER['HTTPS']))
        if (strtoupper($_SERVER['HTTPS'])=='ON')
            $protocol='https';
    $host     = $_SERVER['HTTP_HOST'];
    $uri      = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra    = 'index.html';
    $protocol ='http';
    header("Location: $protocol://$host$uri/$extra");
}
