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
        $this->Cell(0, 10, 'ID del Pedido: ' . htmlspecialchars($pedido['idpedido']), 0, 1, 'L');
        $this->Cell(0, 10, 'Vendedor: ' . htmlspecialchars($pedido['vendedor']), 0, 1, 'L');
        $this->Cell(0, 10, 'Comprador: ' . htmlspecialchars($pedido['comprador']), 0, 1, 'L');
        $this->Cell(0, 10, 'Fecha del Pedido: ' . htmlspecialchars($pedido['fecha']), 0, 1, 'L');
        $this->Cell(0, 10, 'Total del Pedido: MX$' . number_format($pedido['totalprecio'], 2), 0, 1, 'R'); // Justificado a la derecha
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
            $this->Cell(60, 10, htmlspecialchars($producto['nombre']), 1);
            $this->Cell(40, 10, htmlspecialchars($producto['cantidad']), 1);
            $this->Cell(40, 10, 'MX$' . number_format($producto['importe'], 2), 1, 0, 'R'); // Justificado a la derecha
            $this->Ln();
        }
    }
}

// Verificar si idUsuario y idPedido están presentes
if (isset($_GET['idUsuario']) && isset($_GET['idPedido'])) {
    $idUsuario = $_GET['idUsuario'];
    $idPedido = $_GET['idPedido'];

    try {
        // Establecer conexión a la base de datos
        $query = "SELECT p.idpedido, DATE_FORMAT(p.fecha, '%d/%m/%Y') AS fecha, p.totalprecio, 
                         v.nombre_usuario AS vendedor, c.nombre_usuario AS comprador 
                  FROM pedido p
                  JOIN datos_usuario v ON p.idusuariovendedor = v.idusuario
                  JOIN datos_usuario c ON p.idusuariocliente = c.idusuario
                  WHERE p.idpedido = :idPedido";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':idPedido', $idPedido, PDO::PARAM_INT);
        $stmt->execute();
        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

        $query = "SELECT p.nombre, dp.cantidad, dp.importe 
                  FROM detalle_pedido dp 
                  JOIN datos_producto p ON dp.datos_producto_idproducto = p.idproducto 
                  WHERE dp.pedido_idpedido = :idPedido 
                  ORDER BY p.idproducto ASC";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':idPedido', $idPedido, PDO::PARAM_INT);
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
        $pdf->Cell(0, 10, 'Fecha de Emisión: ' . date('d/m/Y'), 0, 1, 'L');

        // Salida del PDF
        $pdf->Output('D', 'recibo_pedido.pdf');

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No se ha especificado un ID de usuario o un ID de pedido.";
}
?>
