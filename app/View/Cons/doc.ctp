<?php
$this->Pdf->core->addPage('P', 'Letter');
$this->Pdf->core->setFont('times', '', 9);
$this->Pdf->core->setCellHeightRatio(1.5);
$this->Pdf->core->SetLeftMargin(10);
$this->Pdf->core->SetRightMargin(10);
$this->Pdf->core->SetTopMargin(25);
$this->Pdf->core->SetFooterMargin(50);

switch ($solicitud['Persona']['nacionalidad']) {
	case 1:
		$nacionalidad = 'GUATEMALTECO';
		break;
	case 2:
		$nacionalidad = 'EXTRANJERO';
		break;
}

$monto_mensual = $solicitud['Persona']['salario']+$solicitud['Persona']['escalafon_mensual']+$solicitud['Persona']['bono_bilinguismo'];
$text='<b style="text-align: justify;">EL INFRASCRITO COORDINADOR TECNICO ADMINISTRATIVO DEL DISTRITO ESCOLAR 16-04-09 DE LA VILLA DE TACTIC, DEL DEPARTAMENTO DE ALTA VERAPAZ</b>';
$text.='<br><br><b style="text-align: center;">HACE CONSTAR QUE:</b>';
$text.='<br><br><b>'.strtoupper($solicitud['Persona']['nombre_completo']) .'</b>: nacionalidad <b>'.$nacionalidad.'</b> quien se identifica con el Código Único de Identificación DPI: <b>'.$solicitud['Persona']['cui'].'</b> : extendido por el Registro Nacional de las Personas RENAP, actualmente labora para el Ministerio de Educación bajo el reglón presupuestario CONTRATO DEL MINEDUC - '.$solicitud['Persona']['reglon'].' - en: <b>'.$solicitud['Persona']['Establecimiento']['nombre'].'</b> ubicado en: <b>'.$solicitud['Persona']['Establecimiento']['ubicado'].'</b><br><br>';
$text.='<table cellpadding="2">
		<tbody>
		<tr>
		<td width="180">Obtiene un ingreso base mensual de: </td>
		<td><b>Q.'.number_format($solicitud['Persona']['salario'], 2, '.', ',').'</b></td>
		</tr>
		<tr>
		<td width="180">Escalafon mensual de: </td>
		<td><b>Q.'.number_format($solicitud['Persona']['escalafon_mensual'], 2, '.', ',').'</b></td>
		</tr>
		<tr>
		<td width="180">Bono por bilingüismo de: </td>
		<td><b>Q'.number_format($solicitud['Persona']['bono_bilinguismo'], 2, '.', ',').'</b></td>
		</tr>
		<tr>
		<td width="180">Percibiendo un monto mensual de: </td>
		<td><b>Q.'.number_format($monto_mensual, 2, '.', ',').'</b></td>
		</tr>
		<tr>
		<td width="180">Por los servicios que presta como: </td>
		<td><b>'.strtoupper($solicitud['Persona']['Puesto']['nom_puesto']).'</b></td>
		</tr>
		</tbody>
		</table>';
$text.='<br><br><b style="text-align: justify;">Y PARA LOS USOS LEGALES QUE A LA PARTE INTERESADA CONVENGA, EXTIENDO, FIRMO Y SELLO LA PRESENTE CONSTANCIA DE INGRESOS EN UNA HOJA DE PAPEL BOND TAMAÑO CARTA, LUNES</b>';
$text.='<br><br><br><br><div style="text-align: center;"><br><br><b>Williams Roberto Escobar Torres</b>';
$text.='<br>Coordinador Técnico Administrativo';
$text.='<br>Distrito Escolar 16-04-09</div>';
$this->Pdf->core->writeHTML($text, true, 0, true, 0);
$this->Pdf->core->Output('constancia_ingreso.pdf');

?>