<?php
		//********************************************
		// Codigo para Creacion de documento PDF     *
		// Fecha: martes 9 de abril del 2019	   	 *
		// Programador: Rolando Picon Nadales		 *
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
  $tabla .="<h2>Historial de Credenciales</h2>
          <main>
            <table  border='1'>
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cédula de identidad</th>
                    <th>Cargo</th>
                    <th>Fecha Cargo</th>
                    <th>Fecha elaboracion documento</th>
                </tr>
              </thead>
              <tbody>";
while($fila = $res->fetch_assoc()){
        // Recorrido de la tabla while arreglo asosiativo
          $tabla .= "<tr>
                        <td>".$fila['id']."</td>
                        <td>".$fila['nombre']."</td>
                        <td>".$fila['apellido']."</td>
                        <td>".$fila['ci']."</td>
                        <td>".$fila['cargo']."</td>
                        <td>".$fila['fecha_cargo']."</td>
                        <td>".$fila['fecha_elaboracion']."</td>
                    </tr>";
        }
        $tabla .= "</table>";
return $tabla;
}
$html = selectTabla();

  //crear un objeto de la libreria:
    $pdf = new mPDF('c', 'A4'); //constructor especificar entre los parentesis el tamaño carta A4    
    $css = file_get_contents('assets/css/style.css'); //creo una variable llamada $css y aporto donde esta carpeta.
    $pdf->writeHTML($css, 1);// ese es el archivo a especificar de estilos y parametro 1
    //metodo el que permite colocar codigo html
    $pdf->writeHTML($html); // usamos nuestra variable aqui sin comillas simples.
    //llamamos el objeto y generamos la salida PDF
    $pdf->Output('creden_histo.pdf', 'I');//nombre del archivo, vista previa (I), descarga directa (D)
exit;
?>