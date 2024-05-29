<?php
require('fpdf186/fpdf.php');
include 'conexion.php';

// Establecer la zona horaria predeterminada
date_default_timezone_set('America/Mexico_City'); // Ajusta la zona horaria según tu ubicación

// Clase para generar el PDF
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Título
        $this->Cell(0, 10, 'ITSHOP - Recibo de Pedido', 0, 1, 'C');
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
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }

    // Tabla de detalles del pedido
    function PedidoTable($pedido, $productos)
    {
        // Datos del pedido
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'ID del Pedido: ' . $pedido['IDPEDIDO'], 0, 1, 'L');
        $this->Cell(0, 10, 'Vendedor: ' . $pedido['VENDEDOR'], 0, 1, 'L');
        $this->Cell(0, 10, 'Comprador: ' . $pedido['COMPRADOR'], 0, 1, 'L');
        $this->Cell(0, 10, 'Fecha del Pedido: ' . $pedido['FECHA'], 0, 1, 'L');
        $this->Cell(0, 10, 'Total del Pedido: MX$' . number_format($pedido['TOTALPRECIO'], 2), 0, 1, 'R'); // Justificado a la derecha
        $this->Ln(10);

        // Cabecera de la tabla
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(60, 10, 'Producto', 1);
        $this->Cell(40, 10, 'Cantidad', 1);
        $this->Cell(40, 10, 'Subtotal', 1, 0, 'R'); // Justificado a la derecha
        $this->Ln();

        // Datos de los productos
        $this->SetFont('Arial', '', 12);
        foreach ($productos as $producto) {
            $this->Cell(60, 10, $producto['NOMBRE'], 1);
            $this->Cell(40, 10, $producto['CANTIDAD'], 1);
            $this->Cell(40, 10, 'MX$' . number_format($producto['IMPORTE'], 2), 1, 0, 'R'); // Justificado a la derecha
            $this->Ln();
        }
    }
}

// Verificar si idUsuario está presente
if (isset($_GET['idUsuario']) && isset($_GET['idPedido'])) {
    $idUsuario = $_GET['idUsuario'];
    $IDPEDIDO = $_GET['idPedido'];

    try {
        // Establecer conexión a la base de datos
        $query = "SELECT p.IDPEDIDO, TO_CHAR(p.FECHA, 'DD/MM/YYYY') AS FECHA, p.TOTALPRECIO, 
                         v.NOMBRE_USUARIO AS VENDEDOR, c.NOMBRE_USUARIO AS COMPRADOR 
                  FROM PEDIDO p
                  JOIN DATOS_USUARIO v ON p.IDUSUARIOVENDEDOR = v.IDUSUARIO
                  JOIN DATOS_USUARIO c ON p.IDUSUARIOCLIENTE = c.IDUSUARIO
                  WHERE p.IDPEDIDO = :idPedido";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':idPedido', $IDPEDIDO, PDO::PARAM_INT);
        $stmt->execute();
        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

        $query = "SELECT p.NOMBRE, dp.CANTIDAD, dp.IMPORTE 
                  FROM DETALLE_PEDIDO dp 
                  JOIN DATOS_PRODUCTO p ON dp.DATOS_PRODUCTO_IDPRODUCTO = p.IDPRODUCTO 
                  WHERE dp.PEDIDO_IDPEDIDO = :idPedido 
                  ORDER BY p.IDPRODUCTO ASC";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':idPedido', $IDPEDIDO, PDO::PARAM_INT);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Crear instancia del PDF
        $pdf = new PDF();
        $pdf->AddPage();

        // Agregar datos del pedido y los productos al PDF
        $pdf->PedidoTable($pedido, $productos);

        // Mostrar la fecha de emisión
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Fecha de Emision: ' . date('d/m/Y'), 0, 1, 'L');

        // Salida del PDF
        $pdf->Output('D', 'recibo_pedido.pdf');

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No se ha especificado un ID de usuario o un ID de pedido.";
}
?>
