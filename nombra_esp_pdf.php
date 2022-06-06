<?php
    //********************************************
    // Código para Creación de documento PDF     *
    // Fecha: martes 9 de abril del 2019       *
    // Programador: Rolando Picon Nadales    *
    // Pais: República Bolivariana de Venezuela  *
    //*******************************************/
    require_once('../app/lib/pdf/mpdf.php'); 
    // esto es la libreria que vamos a usar, con su direccion
  
//creando conexion de Enlace con la base de datos test de la tabla nombra
//funcion para hacer aparecer la tabla en el documento PDF
function selectTabla(){
  $con = new mysqli("localhost","root","","test");
  // verificar en caso de error
  $sql ="select * from nombra";
  $res = $con->query($sql);
  $tabla="";
while($fila = $res->fetch_assoc()){
        // Recorrido de la tabla while arreglo asosiativo
          $tabla .= "<div><p><img src='assets/img/logo.png'></p><br /><br /><!-- Logo de UNELLEZ -->
R/     /02  /19<br />
<div id='fecha'>Barinas, ".$fila['dia']." de ".$fila['fm']." de ".$fila['fa']."<div>

Ciudadana:<br />
<b>".$fila['ne']." ".$fila['nombre']." ".$fila['apellido']."</b><br />
C.I. ".$fila['ci']."<br />
".$fila['cargo']."<br />
Presente.-


           <p>Me dirijo a usted, en la oportunidad de comunicarle que de acuerdo con el capítulo III artículo  20, numeral 9 del Reglamento de la Universidad Nacional Experimental  de los Llanos Occidentales “Ezequiel Zamora”,  artículo 19 de la Ley del Estatuto de la Función Pública y Punto de Cuenta N° 463, de fecha 28/01/2019, suscrita por la Dra. Yajaira Pujol, Vicerrectora Académica (E) VPDS, he decidido designarla como <b>".$fila['designado']."</b>, a partir de la presente fecha ".$fila['fecha_cargo'].", en sustitución de ".$fila['ne_sust']." ".$fila['nomb_sust']." ".$fila['ap_sust'].", titular de la cédula de identidad N° ".$fila['ci_sust'].", quien deberá hacer entrega formal, de conformidad con el artículo 9 de  las Normas para Regular la Entrega de los Órganos y Entidades de la Administración Pública y sus Respectivas Oficinas o Dependencias, publicadas en Gaceta Oficial N° 39.229, de fecha 27 de julio de 2009. De lo contrario, en la condición de servidor público entrante debe levantar acta detallada a que se refiere el artículo 4 ejusdem, con asistencia de dos testigos, y del auditor interno del organismo o entidad, en la cual dejará constancia del estado en que se encuentren los asuntos, bienes y los recursos asignados, y se especificarán los errores, deficiencias u omisiones que se advirtieren, así como cualquier otra situación que sea necesario señalar en resguardo de la delimitación de responsabilidades de quien recibe.</p>

    <p>En tal sentido, le informo los deberes que los funcionarios o funcionarias públicos de libre nombramiento y remoción, cumplirán de acuerdo con lo establecido en el artículo 33 de la Ley del Estatuto de la Función Pública, entre ellos: 1. Prestar sus servicios personalmente con la eficiencia requerida; 2. Acatar las órdenes e instrucciones emanadas de los superiores jerárquicos; 3. Guardar la reserva, discreción y secreto que requieran los asuntos relacionados con las funciones que tengan atribuidas,  dejando  a  salvo  lo  previsto en el numeral 4 del referido artículo; 4. Vigilar, conservar y salvaguardar los  documentos  y  bienes de la Administración Pública confiados a su guarda, uso o administración; 5. Poner en conocimiento  de  sus   superiores   las   iniciativas   que   estimen   útiles   para  laconservación del patrimonio nacional, el mejoramiento de los servicios y cualesquiera otras que incidan favorablemente en las actividades a cargo de esta Universidad; y 6. Inhibirse del conocimiento de los asuntos en que tenga interés, según lo dispuesto en el numeral 10 del mencionado artículo.</p>

    <p>De igual manera, se le notifica que de conformidad con los artículos 5, 6  y
10  numeral  1 de la Ley del Estatuto de la Función Pública, la Oficina de Recursos 
Humanos es la que tiene  competencia   de   ejecutar   las   decisiones   sobre   la   gestión   de  la  función pública o en materia de  administración de personal, que 
tome el Rector por ser el presidente del Consejo Directivo, por lo  que se exhorta 
no emitir constancias de trabajo o constancias por realizar funciones distintas a su cargo nominal que pudieran afectar los intereses y derechos de la UNELLEZ, asimismo; se insta a dar cumplimiento a la circular N° 03/2012, de fecha 17/04/2012, suscrita por este despacho, la cual establece que ningún Jefe de unidad académica  o  administrativa  de  la  UNELLEZ,  incluyendo   los   Vicerrectores  y  Secretario General  deben  designar,    trasladar,   reubicar,  remover  o  despedir  al  personal   bajo   su supervisión, previa evaluación y aprobación del ciudadano Rector, ni contratar o permitir la entrada y permanencia de personas que no sean trabajadores de la institución para que realicen actividades académicas, administrativas o propias de la unidad que dirigen, ya que de comprobarse dicha situación, será responsable por los futuros actos administrativos o decisiones judiciales que causen perjuicios a la UNELLEZ, de conformidad con el artículo 79 de la Ley del Estatuto de la Función Pública.</p> 
 

    <p>Sin más a que hacer referencia, aprovecho la ocasión para desearle el mayor éxito en sus funciones.</p>

<div id='firma'>Atentamente,<br /><br /><br />


<b>Dr.  ALBERTO QUINTERO</b><br />
<b>RECTOR</b><br /> </div>


<p>c.c  Programa Ciencias de la Educación<br />
c.c. RRHH<br />
c.c. VPDS<br />
c.c. Bienes<br /><br /><br /><br />



AQ/JG</p></div>";
        }
        $tabla .= "</table>";
return $tabla;
}
$html = selectTabla();

  //crear un objeto de la libreria:
    $pdf = new mPDF('c', 'A4'); //constructor especificar entre los parentesis el tamaño carta A4    
    $css = file_get_contents('assets/css/style_nomb.css'); //creo una variable llamada $css y aporto donde esta carpeta.
    $pdf->writeHTML($css, 1);// ese es el archivo a especificar de estilos y parametro 1
    //metodo el que permite colocar codigo html
    $pdf->writeHTML($html); // usamos nuestra variable aqui sin comillas simples.
    //llamamos el objeto y generamos la salida PDF
    $pdf->Output('nombra_histo.pdf', 'I');// vista previa (I), descarga directa (D)
exit;
?>