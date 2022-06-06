<?php
    //********************************************
    // Codigo para Creacion de documento PDF     *
    // Fecha: martes 7 de mayo del 2019          *
    // Programador: Rolando Picon Nadales        *
    // Pais: República Bolivariana de Venezuela  *
    //*******************************************/
    require_once('../app/lib/pdf/mpdf.php'); // esto es la libreria que vamos a usar, con su direccion
  
//creando conexion de Enlace con la base de datos test tabla ceses
//funcion php para crear llamado datos de la tabla directamente de la base de datos
function selectTabla(){
  $con = new mysqli("localhost","root","","test");
  // verificar en caso de error
  $sql ="select * from ceses";
  $res = $con->query($sql);
  $tabla="";
  while($fila = $res->fetch_assoc()){ 
        // Recorrido de la tabla while arreglo asosiativo
  $tabla .="<div><p><img src='assets/img/logo.png'></p><br /><br /><!-- Logo de UNELLEZ -->
<div id='titulo'>RECTORADO</div>                               
R/     /01/2019 
<div id='fecha'>Barinas, ".$fila['dia']." de ".$fila['fm']." de ".$fila['fa']."<div>
Ciudadana:<br />
<b>".$fila['ne']." ".$fila['nombre']." ".$fila['apellido']."</b><br />
C.I.".$fila['ci']."<br />
Presente.-


 	<p>Me dirijo a usted, en la oportunidad de comunicarle que de acuerdo con el artículo  20, numeral 9 del Reglamento de la Universidad Nacional Experimental  de los Llanos Occidentales “Ezequiel Zamora”,  artículo 19 de la Ley del Estatuto de la Función Pública y Punto de Cuenta N° 463, de fecha 24/01/2019, suscrita por la Dra. Yajaira Pujol, Vicerrectora Académico (E) VPDS, he decidido removerla del cargo como <b>".$fila['cargo']."</b>, a partir de la presente fecha ".$fila['fecha_cargo'].", sin perjuicio de continuar en el ejercicio del cargo nominal, que venía desempeñando antes de su designación.</p>
 
 	<p>Tal decisión obedece a la naturaleza jurídica del cargo, la cual es, de libre nombramiento y remoción, que no goza de estabilidad y por tanto, no es necesario la tramitación de procedimiento administrativo alguno por faltas imputadas al funcionario, basta la potestad discrecional del jerarca que lo designó. En tal sentido, se le informa que deberá hacer entrega, de conformidad con las Normas para Regular la Entrega de los Órganos y Entidades de la Administración Pública y sus Respectivas Oficinas o Dependencias, publicadas en Gaceta Oficial N° 39.229, de fecha 27 de julio de 2009.Notificación que se hace de conformidad con lo establecido en el artículo 75 de la Ley Orgánica de Procedimientos Administrativos. Igualmente  y  en  nombre de la comunidad universitaria,  agradezco el empeño  y esfuerzo desplegado  por usted  en el cumplimiento de sus  funciones.</p>

 	   <p>Sin más a que hacer referencia, se suscribe.</p>

<div id='firma'>Atentamente,<br /><br /><br />

<b>Dr.  ALBERTO QUINTERO</b><br />
<b>RECTOR</b><br /><br /><br /></div> 

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />C.C. RRHH
</div>";
}
$tabla .= "</table>";
return $tabla;
}
$html = selectTabla();

  //crear un objeto de la libreria:
    $pdf = new mPDF('c', 'A4'); //constructor especificar entre los parentesis el tamaño carta A4    
    $css = file_get_contents('assets/css/style_cese.css'); //creo una variable llamada $css y aporto donde esta carpeta.
    $pdf->writeHTML($css, 1);// ese es el archivo a especificar de estilos y parametro 1
    //metodo el que permite colocar codigo html
    $pdf->writeHTML($html); // usamos nuestra variable aqui sin comillas simples.
    //llamamos el objeto y generamos la salida PDF
    $pdf->Output('cese_histo.pdf', 'I');//nombre del archivo, vista previa (I), descarga directa (D)
exit;
?>