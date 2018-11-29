<?php 
include("../configs/conexion_db.php"); 
include("../mpdf/mpdf.php"); 

$id = mysqli_escape_string($enlace, $_GET['id']);
$query="SELECT nombres,asignatura_modulo, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla=$id and pr.titulo_profesional='PROFESOR(A)'";
$resultado= $enlace->query($query);

$html='
<style>
.lista-estudiantes{
	width:95%;
}
@page {
	margin-top: 100px;
	margin-right:20px;
	margin-left:40px;
   }
div{
	width: 200px;
	padding: 2px 0;
	margin: 0;
}

#flotante{  /*padre*/
	overflow: hidden;
	width: 100%; 
}

#flotante .A, #flotante .B, #flotante .C, #flotante .D, #flotante .E{  /*hijos*/
    float: left;
    text-align:center;
    width:19%;
}

#flotante2{  /*padre*/
	overflow: hidden;
	width: 1000px; 
}

#flotante2 .A, #flotante2 .B, #flotante2 .C, #flotante2 .F{  /*hijos*/
    float: left;
    text-align:center;
    width:100px;
}

#flotante2 .D, #flotante2 .E{  /*hijos*/
    float: left;
    text-align:center;
    width:150px;
}


.borde{
    border: solid 1px black ;
}
</style>
<h4>I EQUIPO DE AULA</h4>
<h4>1.- Identificación del Equipo de Aula</h4>
<p>Docente(s) de la educación regular del curso :</p>
<div id="flotante">
<div class="A borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Nombre</div>
<div class="B borde" style="height:32px;background-color:rgb(232,232,232);">Nucleo Asignatura y/o Modulo</div>
<div class="C borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Teléfono </div>
<div class="D borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Correo electrónico  </div>
<div class="E borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Firma </div>';

function selectTabla($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT nombres,apellidos,asignatura_modulo, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla='$s_id' and pr.titulo_profesional='PROFESOR(A)'";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:60px;">'.$row['nombres']." ".$row['apellidos'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['asignatura_modulo'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['telefono'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['correo'].'</div>
				 <div class="A borde" style="height:60px;"></div>';
	}

	return $tabla;
}

function selectTabla2($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT nombres,apellidos,asignatura_modulo,titulo_profesional, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla='$s_id' and (pr.titulo_profesional='EDUCADORA DE PARBULO' OR pr.titulo_profesional='EDUCADOR(A) DIFERENCIAL')";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:60px;">'.$row['nombres']." ".$row['apellidos'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['titulo_profesional'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['telefono'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['correo'].'</div>
				 <div class="A borde" style="height:60px;"></div>
				 ';
	}

	return $tabla;
}

function selectTabla3($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT nombres,apellidos,asignatura_modulo,titulo_profesional, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla='$s_id' and (pr.titulo_profesional='FONOAUDIOLOGO(A)' or pr.titulo_profesional='TERAPEUTA OCUPACIONAL' or pr.titulo_profesional='PSICOLOGO(A)' )";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:60px;">'.$row['nombres']." ".$row['apellidos'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['titulo_profesional'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['telefono'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['correo'].'</div>
				 <div class="A borde" style="height:60px;"></div>
				 ';
	}

	return $tabla;
}

function selectTabla4($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT p.lugar_establecimiento,p.lugar_daem,p.lugar_redes_apoyo,pr.nombres,pr.apellidos,pr.telefono,pr.correo FROM planilla p INNER JOIN profesionals pr ON p.lugar_establecimiento=pr.id WHERE p.id='$s_id' ";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:60px;">En el establecimiento</div>
				 <div class="A borde" style="height:60px;">'.$row['nombres']." ".$row['apellidos'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['telefono'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['correo'].'</div>
				 <div class="A borde" style="height:60px;"></div>
				 ';
	}

	return $tabla;
}

function selectTabla5($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT p.lugar_establecimiento,p.lugar_daem,p.lugar_daem,p.lugar_redes_apoyo,pr.nombres,pr.apellidos,pr.telefono,pr.correo FROM planilla p INNER JOIN profesionals pr ON p.lugar_daem=pr.id WHERE p.id='$s_id' ";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:60px;">En el DAEM (si el PIE es comunal)</div>
				 <div class="A borde" style="height:60px;">'.$row['nombres']." ".$row['apellidos'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['telefono'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['correo'].'</div>
				 <div class="A borde" style="height:60px;"></div>
				 ';
	}

	return $tabla;
}

function selectTabla6($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT p.lugar_establecimiento,p.lugar_daem,p.lugar_redes_apoyo,pr.nombres,pr.apellidos,pr.telefono,pr.correo FROM planilla p INNER JOIN profesionals pr ON p.lugar_redes_apoyo=pr.id WHERE p.id='$s_id' ";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:60px;">Con Redes de Apoyo</div>
				 <div class="A borde" style="height:60px;">'.$row['nombres']." ".$row['apellidos'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['telefono'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['correo'].'</div>
				 <div class="A borde" style="height:60px;"></div>
				 ';
	}

	return $tabla;
}

function selectTabla7($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT a.nombres, a.apellidos,up.id_planilla  FROM alumnos a INNER JOIN usuarios_planilla up ON a.id=up.id_alumno WHERE up.id_planilla='$s_id' ";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div  class="borde lista-estudiantes" >'.$row['nombres']." ".$row['apellidos'].'</div>';
	}

	return $tabla;
}

function selectTabla8($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT actividades,observaciones,nombres,apellidos,titulo_profesional,lugar_aula,horas_realizadas,fecha_ultimo_cambio FROM planilla_planilla INNER JOIN profesionals ON id_profesional=profesionals.id WHERE id_planilla='$s_id' ";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:120px;padding-top:11px;">'.$row['fecha_ultimo_cambio'].'</div>
		<div class="B borde" style="height:120px;padding-top:11px;">'.$row['horas_realizadas'].'</div>
		<div class="C borde" style="height:120px;padding-top:11px;">'.utf8_decode($row['lugar_aula']).'</div>
		<div class="D borde" style="height:120px;padding-top:11px;">'.utf8_decode($row['actividades']).'</div>
		<div class="E borde" style="height:120px;padding-top:11px;">'.utf8_decode($row['observaciones']).'</div>
		<div class="F borde" style="height:120px;padding-top:11px;">'.utf8_decode($row['nombres'])." ".$row['apellidos']." ".$row['titulo_profesional'].'</div>';
	}

	return $tabla;
}


$html .=(selectTabla($id));
$html2='<br/>
<p>Profesores especializados :</p>
<div id="flotante">
<div class="A borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Nombre</div>
<div class="B borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Especialidad</div>
<div class="C borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Teléfono </div>
<div class="D borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Correo electrónico  </div>
<div class="E borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Firma </div>';
$html .=$html2;
$html .=(selectTabla2($id));


$html3 ='<br/>
<p>Preofesionales especializados asistentes de la educación :</p>
<div id="flotante">
<div class="A borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Nombre</div>
<div class="B borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Especialidad</div>
<div class="C borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Teléfono </div>
<div class="D borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Correo electrónico  </div>
<div class="E borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Firma </div>'; 
$html .=$html3;
$html .=(selectTabla3($id));

$html4='<br/>
<p>Coordinación del programa :</p>
<div id="flotante">
<div class="A borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);"></div>
<div class="B borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Nombre</div>
<div class="C borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Teléfono </div>
<div class="D borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Correo electrónico  </div>
<div class="E borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Firma </div>';
$html .=$html4;
$html.=(selectTabla4($id));
$html.=(selectTabla5($id));
$html.=(selectTabla6($id));

$html5='<h4>2.- Registro de aopoyo para cada estudiante o grupo de estudiantes</h4>
<p>Registrar, por estudiante o grupos de estudiantes, los apoyos específicos o actividades especiales que se realizan en
forma individual o en pequeños grupos dentro o fuera del aula regular y el o las/os nombres de los profesionales que
los entregan.</p>
<div  class="borde lista-estudiantes" style="font-weight: bold;">Nombre/s estudiante/s</div>';
$html.=$html5;
$html.=(selectTabla7($id));

$html6 ='<br/><div  class=" lista-estudiantes" style="font-weight: bold;">Objetivos de Aprendizaje</div>
<div id="flotante2">
<div class="A borde" style="height:60px;padding-top:11px;background-color:rgb(232,232,232);">Fecha</div>
<div class="B borde" style="height:60px;padding-top:11px;background-color:rgb(232,232,232);">Horas Pedagógicas realizadas </div>
<div class="C borde" style="height:60px;padding-top:11px;background-color:rgb(232,232,232);">Lugar (dentro o fuera del aula) </div>
<div class="D borde" style="height:60px;padding-top:11px;background-color:rgb(232,232,232);">Acciones, actividades y apoyos entregados a estudiantes.  </div>
<div class="E borde" style="height:60px;padding-top:11px;background-color:rgb(232,232,232);">Observaciones y/o acuerdos </div>
<div class="F borde" style="height:60px;padding-top:11px;background-color:rgb(232,232,232);">Nombre del profesional </div>


';
$html .=$html6;
$html.=(selectTabla8($id));

$mpdf = new mPDF('c','A4');
$mpdf->SetImportUse();
$mpdf->SetDocTemplate('../assets/img/planilla.pdf',true);
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
$mpdf->allow_charset_conversion=true;
$mpdf->charset_in='UTF-8';
$mpdf->writeHTML($html);

$mpdf->Output('planilla.pdf','I');

