<?php 
include("../configs/conexion_db.php"); 
include("../mpdf/mpdf.php"); 

$caca="hola";

$mpdf = new mPDF('c','A4');
$mpdf->SetImportUse();
$mpdf->SetDocTemplate('../assets/img/planilla.pdf',true);
$mpdf->writeHTML('
<style>
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

.borde{
    border: solid 1px black ;
}
</style>
<br/>
<br/>
<br/>
<div id="flotante">
<div class="A borde" style="height:30px;padding-top:11px;">Nombre</div>
<div class="B borde">Nucleo Asignatura y/o Modulo</div>
<div class="C borde" style="height:30px;padding-top:11px;">Teléfono </div>
<div class="D borde" style="height:30px;padding-top:11px;">Correo electrónico  </div>
<div class="E borde" style="height:30px;padding-top:11px;">Firma </div>

<div class="A borde">'".<?php echo $caca?>."'</div>
<div class="B borde">div B </div>
<div class="C borde">div C </div>
<div class="D borde">div B </div>
<div class="E borde">div B </div>
</div>
');
$mpdf->Output('planilla.pdf','I');

