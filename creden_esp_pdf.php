<?php
    //********************************************
    // Codigo para Creacion de documento PDF     *
    // Fecha: martes 9 de abril del 2019       *
    // Programador: Rolando Picon Nadales    *
    // Pais: República Bolivariana de Venezuela  *
    //*******************************************/
    require_once('../app/lib/pdf/mpdf.php'); // esto es la libreria que vamos a usar, con su direccion
  
//creando conexion de Enlace con la base de datos test tabla credencial
//funcion php para crear la tabla directamente de la base de datos
function selectTabla(){
  $con = new mysqli("localhost","root","","test");
  // verificar en caso de error
  $sql ="select * from creden";
  $res = $con->query($sql);
  $tabla="";
  while($fila = $res->fetch_assoc()){ 
        // Recorrido de la tabla while arreglo asosiativo
  $tabla .="<div><p>AQ/JG</p>

<p><img src='assets/img/logo.png'></p><br /><br /> <!-- Logo de UNELLEZ -->



<h2 name='title'>C R E D E N C I A L</h2>


<p>Quien suscribe Dr. ALBERTO QUINTERO,  titular de la Cédula de Identidad Nº 11.468.002,  en  mi  condición  de  Rector  de la Universidad Nacional  Experimental  de los Llanos Occidentales Ezequiel  Zamora “UNELLEZ”, designado  mediante  Gaceta Oficial  de la República Bolivariana  de Venezuela Nº 40.871,  Resolución N° 046  de  fecha 17/03/2016,  informo que este Despacho Rectoral, ha decidido OTORGAR la responsabilidad al  ciudadano <b>".$fila['ne']." ".$fila['nombre']." ".$fila['apellido']."</b>, titular de la cédula de identidad N° ".$fila['ci']." <b>".$fila['cargo']."</b>, a partir del ".$fila['dia']."/".$fila['mes']."/".$fila['year'].".</p>

    <p>En tal sentido, es de importancia resaltar que dicha Credencial, constituye solamente un       mérito en su historia laboral  y no genera ninguna incidencia presupuestaria.</p> 


<p>En  Barinas,  a  los ".$fila['fd']." (".$fila['fn'].") días  del mes de ".$fila['fm']." de ".$fila['fa'].".</p><br /><br /><br />

Atentamente,<br /><br /><br /><br />

<b>Dr. ALBERTO QUINTERO<br />
RECTOR</b></p><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><p><b>c.c. VRS<br />
c.c. DSG</b><br /><br />AQ/JG</p>
  </div>";
        }
        $tabla .= "</table>";
return $tabla;
}
$html = selectTabla();

  //crear un objeto de la libreria:
    $pdf = new mPDF('c', 'A4'); //constructor especificar entre los parentesis el tamaño carta A4    
    $css = file_get_contents('assets/css/style_credencial.css'); //creo una variable llamada $css y aporto donde esta carpeta.
    $pdf->writeHTML($css, 1);// ese es el archivo a especificar de estilos y parametro 1
    //metodo el que permite colocar codigo html
    $pdf->writeHTML($html); // usamos nuestra variable aqui sin comillas simples.
    //llamamos el objeto y generamos la salida PDF
    $pdf->Output('creden_histo.pdf', 'I');//nombre del archivo, vista previa (I), descarga directa (D)
exit;
?>