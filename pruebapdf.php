<?php
require('fpdf186/fpdf.php');
include 'conexion.php';

// Clase para generar el PDF
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Título
        $this->Cell(0, 10, 'ITSHOP - Reporte de Venta', 0, 1, 'C');
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1.5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }

    // Tabla simple
    function BasicTable($header, $data)
    {
        // Anchos de las columnas
        $w = array(90, 90); // Ajusta los anchos de las columnas

        // Cabecera
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        }
        $this->Ln();
        
        // Datos
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 1);
            $this->Cell($w[1], 6, $row[1], 1);
            $this->Ln();
        }
    }
}

// Verificar si idUsuario está presente
if (isset($_GET['idUsuario']) && isset($_GET['fechaDesde']) && isset($_GET['fechaHasta'])) {
    $idUsuario = $_GET['idUsuario'];
    $fechaDesde = $_GET['fechaDesde'];
    $fechaHasta = $_GET['fechaHasta'];

    // Convertir fechas de DD/MM/AA a DD/MM/YYYY para la consulta
    $fechaDesde = DateTime::createFromFormat('Y-m-d', $fechaDesde)->format('d/m/y');
    $fechaHasta = DateTime::createFromFormat('Y-m-d', $fechaHasta)->format('d/m/y');

    try {
        // Establecer conexión a la base de datos
        $query = "SELECT IDPEDIDO, FECHA FROM PEDIDO WHERE IDUSUARIOVENDEDOR = :idUsuario AND TO_DATE(FECHA, 'DD/MM/YY') BETWEEN TO_DATE(:fechaDesde, 'DD/MM/YY') AND TO_DATE(:fechaHasta, 'DD/MM/YY') ORDER BY ESTADO ASC";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->bindParam(':fechaDesde', $fechaDesde, PDO::PARAM_STR);
        $stmt->bindParam(':fechaHasta', $fechaHasta, PDO::PARAM_STR);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Crear instancia del PDF
        $pdf = new PDF();
        $pdf->AddPage();

        // Agregar IDPEDIDO del vendedor y fecha de emisión del reporte
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Nombre del Vendedor: ' . obtenerNombreVendedor($idUsuario, $dbh), 0, 1, 'L');
        $pdf->Cell(0, 10, 'Fecha de Emision: ' . date('d/m/Y'), 0, 1, 'L');
        $pdf->Ln(10); // Espacio entre el encabezado y la tabla

        // Cabecera de la tabla
        $header = array('IDPEDIDO', 'Fecha');

        // Agregar datos a la tabla
        $data = [];
        if (!empty($productos)) {
            foreach ($productos as $producto) {
                // Convertir fecha de DD/MM/YY a DD/MM/YYYY para la salida
                $fecha = DateTime::createFromFormat('d/m/y', $producto['FECHA'])->format('d/m/Y');
                $data[] = array($producto['IDPEDIDO'], $fecha);
            }
        }

        $pdf->BasicTable($header, $data);

        // Salida del PDF
        $pdf->Output('D', 'reporte_ventas.pdf');

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No se ha especificado un ID de usuario o las fechas.";
}

// Función para obtener el nombre del vendedor
function obtenerNombreVendedor($idUsuario, $dbh) {
    $query = "SELECT NOMBRE_USUARIO FROM DATOS_USUARIO WHERE IDUSUARIO = :idUsuario";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    return $usuario ? $usuario['NOMBRE_USUARIO'] : 'Desconocido';
}
?>
