<?php

require '../fpdf/fpdf.php';
include ('../configs/conexion_db.php');


$id = mysqli_escape_string($enlace, $_GET['id']);

$query="SELECT nombres,asignatura_modulo, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla=$id and pr.titulo_profesional='PROFESOR(A)'";
$resultado= $enlace->query($query);


class pdf extends FPDF{

    public function header(){

        $this->Image('..\assets\img\logomined.jpg',30,8,50,30,'jpg');
        $this->SetFont('Helvetica','',10);
        $this->SetX(48);
        $this->SetTextColor(120,120,120);
        $this->Write(14,utf8_decode('Educación Especial'));
        $this->Ln();
    }

    //***** Aquí comienza código para ajustar texto *************
    //***********************************************************
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
 
        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;
 
        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }
 
        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
 
        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }
 
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }
 
    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }
//************** Fin del código para ajustar texto *****************
//******************************************************************
} 


$pdf = new pdf();
$pdf->AddPage('portrait','letter');
$pdf->SetLineWidth(0.2);
$pdf->Line(8,8,208,8);
$pdf->Line(8,8,8,272);
$pdf->Line(8,272,208,272);
$pdf->Line(208,8,208,272);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B');
$pdf->Write(14,utf8_decode('I EQUIPO DE AULA 1'));
$pdf->Ln();
$pdf->Write(14,utf8_decode('1.- Identificación del Equipo de Aula'));
$pdf->Ln();
$pdf->SetFont('Arial');
$pdf->Write(14,utf8_decode('Docente(s) de educación regular del curso: '));
$pdf->Ln();
$pdf->SetFont('Arial','B');
$pdf->Cell(35,6,'Nombre',1,0,'C',1);
$pdf->CellFitSpace(45,6,utf8_decode('Asignatura y/o módulo'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Teléfono'),1,0,'C',1);
$pdf->Cell(55,6,utf8_decode('Correo'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Firma'),1,1,'C',1);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->CellFitSpace(35,6,$row['nombres'],1,0,'C',1);
    $pdf->Cell(45,6,$row['asignatura_modulo'],1,0,'C',1);
    $pdf->Cell(30,6,$row['telefono'],1,0,'C',1);
    $pdf->CellFitSpace(55,6,$row['correo'],1,0,'C',1);
    $pdf->Cell(30,6,'',1,1,'C',1);
}

$pdf->Ln();
$pdf->SetFont('Arial');
$pdf->Write(14,utf8_decode('Profesores especiaizados: '));
$pdf->Ln();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B');
$pdf->Cell(35,6,'Nombre',1,0,'C',1);
$pdf->CellFitSpace(45,6,utf8_decode('Especialidad'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Teléfono'),1,0,'C',1);
$pdf->Cell(55,6,utf8_decode('Correo'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Firma'),1,1,'C',1);

$query="SELECT nombres,asignatura_modulo,titulo_profesional, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla='$id' and (pr.titulo_profesional='EDUCADORA DE PARBULO' OR pr.titulo_profesional='EDUCADOR(A) DIFERENCIAL')";

$resultado= $enlace->query($query);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->CellFitSpace(35,6,$row['nombres'],1,0,'C',1);
    $pdf->CellFitSpace(45,6,$row['titulo_profesional'],1,0,'C',1);
    $pdf->Cell(30,6,$row['telefono'],1,0,'C',1);
    $pdf->CellFitSpace(55,6,$row['correo'],1,0,'C',1);
    $pdf->Cell(30,6,'',1,1,'C',1);
}


$pdf->Ln();
$pdf->SetFont('Arial');
$pdf->Write(14,utf8_decode('Profesionales especializados de la educación: '));
$pdf->Ln();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B');
$pdf->Cell(35,6,'Nombre',1,0,'C',1);
$pdf->CellFitSpace(45,6,utf8_decode('Especialidad'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Teléfono'),1,0,'C',1);
$pdf->Cell(55,6,utf8_decode('Correo'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Firma'),1,1,'C',1);

$query="SELECT nombres,asignatura_modulo,titulo_profesional, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla=$id and (pr.titulo_profesional='FONOAUDIOLOGO(A)' or pr.titulo_profesional='TERAPEUTA OCUPACIONAL' or pr.titulo_profesional='PSICOLOGO(A)' )";

$resultado= $enlace->query($query);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->CellFitSpace(35,6,$row['nombres'],1,0,'C',1);
    $pdf->CellFitSpace(45,6,$row['titulo_profesional'],1,0,'C',1);
    $pdf->Cell(30,6,$row['telefono'],1,0,'C',1);
    $pdf->CellFitSpace(55,6,$row['correo'],1,0,'C',1);
    $pdf->Cell(30,6,'',1,1,'C',1);
}

$pdf->Ln();
$pdf->SetFont('Arial');
$pdf->Write(14,utf8_decode('Coordinación del programa: '));
$pdf->Ln();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B');
$pdf->Cell(40,6,'',1,0,'C',1);
$pdf->CellFitSpace(40,6,utf8_decode('Nombre'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Teléfono'),1,0,'C',1);
$pdf->Cell(55,6,utf8_decode('Correo'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Firma'),1,1,'C',1);

$query="SELECT p.lugar_establecimiento,p.lugar_daem,p.lugar_redes_apoyo,pr.nombres,pr.telefono,pr.correo FROM planilla p INNER JOIN profesionals pr ON p.lugar_establecimiento=pr.id WHERE p.id=$id ";
$resultado= $enlace->query($query);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->Cell(40,6,'En establecimiento',1,0,'C',1);
    $pdf->Cell(40,6,$row['nombres'],1,0,'C',1);
    $pdf->Cell(30,6,$row['telefono'],1,0,'C',1);
    $pdf->CellFitSpace(55,6,$row['correo'],1,0,'C',1);
    $pdf->Cell(30,6,utf8_decode(''),1,1,'C',1);
   
}

$query="SELECT p.lugar_establecimiento,p.lugar_daem,p.lugar_daem,p.lugar_redes_apoyo,pr.nombres,pr.telefono,pr.correo FROM planilla p INNER JOIN profesionals pr ON p.lugar_daem=pr.id WHERE p.id=$id ";
$resultado= $enlace->query($query);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->Cell(40,6,'En el Daem',1,0,'C',1);
    $pdf->Cell(40,6,$row['nombres'],1,0,'C',1);
    $pdf->Cell(30,6,$row['telefono'],1,0,'C',1);
    $pdf->CellFitSpace(55,6,$row['correo'],1,0,'C',1);
    $pdf->Cell(30,6,utf8_decode(''),1,1,'C',1);
   
}

$query="SELECT p.lugar_establecimiento,p.lugar_daem,p.lugar_redes_apoyo,pr.nombres,pr.telefono,pr.correo FROM planilla p INNER JOIN profesionals pr ON p.lugar_redes_apoyo=pr.id WHERE p.id=$id ";
$resultado= $enlace->query($query);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->Cell(40,6,'Con Redes de Apoyo',1,0,'C',1);
    $pdf->Cell(40,6,$row['nombres'],1,0,'C',1);
    $pdf->Cell(30,6,$row['telefono'],1,0,'C',1);
    $pdf->CellFitSpace(55,6,$row['correo'],1,0,'C',1);
    $pdf->Cell(30,6,utf8_decode(''),1,1,'C',1);
   
}




$pdf->Output();