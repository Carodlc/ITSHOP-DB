<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reporte de Venta</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;400;500;600;800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" />
    <link rel="stylesheet" href="ReporteVenta.css" />
</head>
<body>
    <div class="main-container">
        <div class="flex-row-d">
            <div class="rectangle">
                <div class="cart">
                    <div class="icon"></div>
                </div>
                <div class="home">
                    <div class="icon-1"></div>
                </div>
                <div class="notification">
                    <div class="icon-2"></div>
                </div>
                <div class="user">
                    <div class="icon-3"></div>
                </div>
            </div>
            <span class="itshop">ITSHOP</span>
        </div>
        <div class="mi-cuenta">
            <span class="inicio">Inicio > </span><span class="mi-cuenta-4">Mi Cuenta </span>
        </div>
        <div class="flex-row">
            <div class="rectangle-5">
                <button class="menu-btn general">General</button>
                <button class="menu-btn productos">Productos</button>
                <button class="menu-btn inventario">Inventario</button>
                <button class="menu-btn ventas">Ventas</button>
                <button class="menu-btn ajustes">Ajustes</button>
            </div>
            <div class="rectangle-7-container">
                <div class="rectangle-7">
                    <div class="ventas-title" style="margin-bottom: 20px;">VENTAS</div>
                    <div style="color: #8D2D2C; font-size: 17px; font-family: Outfit; font-weight: 400; word-wrap: break-word; margin-bottom: 10px;">Crear reporte de venta:</div>
                    <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                        <div style="color: #8D2D2C; font-size: 17px; font-family: Outfit; font-weight: 400; margin-right: 10px;">Desde:</div>
                        <input type="date" id="fechaDesde" name="fechaDesde">
                        <div style="margin-left: 20px; margin-right: 20px;">&nbsp;</div> <!-- Espacio entre DESDE y HASTA -->
                        <div style="color: #8D2D2C; font-size: 17px; font-family: Outfit; font-weight: 400; margin-left: 10px; margin-right: 10px;">Hasta:</div>
                        <input type="date" id="fechaHasta" name="fechaHasta">
                    </div>
                    <div style="display: flex; justify-content: center; margin-bottom: 20px;">
                        <button onclick="generarReporte()" style="background: #8D2D2C; color: white; font-size: 17px; font-family: Outfit; font-weight: 500; border-radius: 30px; padding: 6px 25px;">Generar</button>
                    </div>
                    <!-- Código PHP para generar los rectángulos de ventas -->
                    <?php
                    // Incluir el archivo de conexión
                    include 'conexion.php';
                    try {
                        // Establecer conexión a la base de datos
                        $dbh = new PDO($dsn, $username, $password);
                        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Obtener roles desde la base de datos
                        $ventas = getPedidos($dbh, 2);


                        if (!empty($ventas)) {
                            // Ahora, puedes iterar sobre los resultados y generar los elementos HTML para cada venta
                            foreach ($ventas as $venta) {
                                $numeroPedido = $venta['idpedido'];
                                $fechaPedido = $venta['fecha'];
                                echo $numeroPedido;


                                // Generar el rectángulo para esta venta
                                echo '<div class="venta-rectangle">';
                                echo '<span>Número de Pedido: ' . $numeroPedido . '</span><br>';
                                echo '<span>Fecha del Pedido: ' . $fechaPedido . '</span><br>';
                                echo '<button onclick="verDetallesVenta(' . $numeroPedido . ')" class="btn-ver-detalles">Ver Detalles</button>';
                                echo '<button onclick="confirmarVenta(' . $numeroPedido . ')" class="btn-confirmar-venta">Confirmar Venta</button>';
                                echo '</div>';
                            }
                        } else {
                            echo '<span>No se encontraron pedidos</span><br>';
                        }
                    } catch (PDOException $e) {
                        // Mostrar mensaje de error si la conexión falla
                        echo "Error: " . $e->getMessage();
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
