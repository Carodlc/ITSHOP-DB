<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detalles de Venta</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;800&display=swap" />
</head>
<style>
  :root {
    --default-font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
      Ubuntu, "Helvetica Neue", Helvetica, Arial, "PingFang SC",
      "Hiragino Sans GB", "Microsoft Yahei UI", "Microsoft Yahei",
      "Source Han Sans CN", sans-serif;
  }

  .main-container {
    overflow: hidden;
  }

  .main-container,
  .main-container * {
    box-sizing: border-box;
  }

  input,
  select,
  textarea,
  button {
    outline: 0;
  }

  .main-container {
    position: relative;
    width: 705px;
    height: 629px;
    margin: 0 auto;
    background: #f8f8f8;
    overflow: hidden;
    border-radius: 30px;
  }

  .flex-row-ed {
    position: relative;
    width: 562px;
    height: 30px;
    margin: 17px 0 0 29px;
    z-index: 11;
  }

  .venta {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 30px;
    top: 0;
    left: 0;
    color: #8d2d2c;
    font-family: Outfit, var(--default-font-family);
    font-size: 24px;
    font-weight: 600;
    line-height: 30px;
    text-align: left;
    text-transform: capitalize;
    white-space: nowrap;
    letter-spacing: 0.72px;
  }

  .venta-1 {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 30px;
    top: 0;
    left: 0;
    color: #8d2d2c;
    font-family: Outfit, var(--default-font-family);
    font-size: 24px;
    font-weight: 600;
    line-height: 30px;
    text-align: left;
    text-transform: capitalize;
    white-space: nowrap;
    letter-spacing: 0.72px;
    z-index: 1;
  }

  .fecha-venta {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 15px;
    top: 0;
    left: 435px;
    color: #311811;
    font-family: Outfit, var(--default-font-family);
    font-size: 17px;
    font-weight: 400;
    line-height: 15px;
    text-align: left;
    white-space: nowrap;
    z-index: 11;
  }

  .numero-venta {
    display: block;
    position: relative;
    height: 16px;
    margin: 8px 0 0 47px;
    color: #311811;
    font-family: Outfit, var(--default-font-family);
    font-size: 17px;
    font-weight: 400;
    line-height: 16px;
    text-align: left;
    white-space: nowrap;
    z-index: 10;
  }

  .flex-row-da {
    position: relative;
    width: 581px;
    height: 43px;
    margin: 19px 0 0 47px;
    z-index: 4;
  }

  .nombre-productos {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    width: 157px;
    height: 43px;
    top: 0;
    left: 0;
    color: #311811;
    font-family: Outfit, var(--default-font-family);
    font-size: 17px;
    font-weight: 400;
    line-height: 21.42px;
    text-align: left;
    z-index: 2;
  }

  .cantidad {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 20px;
    top: 0;
    left: 214px;
    color: #311811;
    font-family: Outfit, var(--default-font-family);
    font-size: 17px;
    font-weight: 400;
    line-height: 20px;
    text-align: left;
    white-space: nowrap;
    z-index: 3;
  }

  .subtotal {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 20px;
    top: 0;
    left: 417px;
    color: #311811;
    font-family: Outfit, var(--default-font-family);
    font-size: 17px;
    font-weight: 400;
    line-height: 20px;
    text-align: left;
    white-space: nowrap;
    z-index: 4;
  }

  .flex-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    width: 585px;
    height: 396px;
    margin: 0 0 0 51px;
    z-index: 16;
  }

  .rectangle {
    flex-shrink: 0;
    position: relative;
    width: 182px;
    height: 396px;
    background: #d9d9d9;
    z-index: 13;
    border-radius: 5px;
  }

  .botella-de-agua {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    width: 131px;
    height: 45px;
    top: 25px;
    left: 35px;
    color: #721918;
    font-family: Outfit, var(--default-font-family);
    font-size: 17px;
    font-weight: 400;
    line-height: 21.42px;
    text-align: left;
    z-index: 17;
  }

  .rectangle-2 {
    flex-shrink: 0;
    position: relative;
    width: 182px;
    height: 396px;
    background: #d9d9d9;
    z-index: 14;
    border-radius: 5px;
  }

  .number-one {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 21px;
    top: 25px;
    left: 85px;
    color: #721918;
    font-family: Outfit, var(--default-font-family);
    font-size: 17px;
    font-weight: 400;
    line-height: 21px;
    text-align: left;
    white-space: nowrap;
    z-index: 15;
  }

  .categoria {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 21px;
    top: 34px;
    left: 77px;
    color: #f4e1df;
    font-family: Outfit, var(--default-font-family);
    font-size: 17px;
    font-weight: 400;
    line-height: 21px;
    text-align: left;
    white-space: nowrap;
    z-index: 5;
  }

  .iconixto-linear-arrow-down {
    position: absolute;
    width: 24px;
    height: 24px;
    top: 35px;
    left: 159px;
    z-index: 6;
    overflow: hidden;
  }

  .icon {
    position: relative;
    width: 15px;
    height: 8px;
    margin: 8px 0 0 3px;
    background: url(./assets/images/e72e2ada-5f15-49c8-8d07-ebec858ef2d8.png) no-repeat center;
    background-size: 100% 100%;
    z-index: 7;
  }

  .rectangle-3 {
    flex-shrink: 0;
    position: relative;
    width: 182px;
    height: 396px;
    background: #d9d9d9;
    z-index: 16;
    border-radius: 5px;
  }

  .dollar-sign {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    position: absolute;
    height: 26px;
    top: 27px;
    left: 66px;
    color: #721918;
    font-family: Outfit, var(--default-font-family);
    font-size: 17px;
    font-weight: 400;
    line-height: 21.42px;
    text-align: left;
    white-space: nowrap;
    z-index: 18;
  }

  .total-mx {
    display: block;
    position: relative;
    height: 18px;
    margin: 19px 0 0 62px;
    color: #311811;
    font-family: Outfit, var(--default-font-family);
    font-size: 21px;
    font-weight: 800;
    line-height: 18px;
    text-align: left;
    white-space: nowrap;
    z-index: 12;
  }

  .frame {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: nowrap;
    gap: 10px;
    position: relative;
    width: 120px;
    margin: -9px 0 0 533px;
    padding: 6px 25px 6px 25px;
    cursor: pointer;
    background: #8d2d2c;
    border: none;
    z-index: 8;
    overflow: hidden;
    border-radius: 30px;
  }

  .return {
    flex-shrink: 0;
    flex-basis: auto;
    position: relative;
    height: 21px;
    color: #ffffff;
    font-family: Outfit, var(--default-font-family);
    font-size: 17px;
    font-weight: 500;
    line-height: 21px;
    text-align: left;
    white-space: nowrap;
    z-index: 9;
  }
</style>
<body>
    <div class="main-container">
        <div class="flex-row-ed">
            <span class="venta">Venta</span>
            <span class="venta-1">Venta</span>
            <span class="fecha-venta">Fecha de venta:</span>
        </div>
        <span class="numero-venta">Número de venta</span>
        
        <div class="flex-row-da">
            <span class="nombre-productos">Nombre producto(s):<br /></span>
            <span class="cantidad">Cantidad:</span>
            <span class="subtotal">Subtotal:</span>
        </div>
        
        <div class="flex-row">
            <div class="rectangle">
                <table>
                    <tbody>
                    <?php
                    include 'conexion.php';

                    try {
                        // Establecer conexión a la base de datos
                        $dbh = new PDO($dsn, $username, $password);
                        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Obtener información de productos desde la base de datos
                        $stmt_productos = $dbh->prepare("SELECT nombre, cantidad, importe FROM detalle_pedido WHERE pedido_idpedido = :idPedido ORDER BY nombre ASC");
                        $stmt_productos->bindParam(':idPedido', $_GET['idPedido'], PDO::PARAM_INT);
                        $stmt_productos->execute();
                        $productos = $stmt_productos->fetchAll(PDO::FETCH_ASSOC);

                        if (!empty($productos)) {
                            foreach ($productos as $producto) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($producto['nombre']) . "</td>";
                                echo "<td>" . htmlspecialchars($producto['cantidad']) . "</td>";
                                echo "<td>MX$" . number_format($producto['importe'], 2) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No se encontraron productos</td></tr>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="rectangle-2">
                <table>
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Asumiendo que $productos ya contiene la información necesaria
                    if (!empty($productos)) {
                        foreach ($productos as $producto) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($producto['cantidad']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td>No se encontraron productos</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="rectangle-3">
                <table>
                    <tbody>
                    <?php
                    // Asumiendo que $productos ya contiene la información necesaria
                    if (!empty($productos)) {
                        foreach ($productos as $producto) {
                            echo "<tr>";
                            echo "<td>MX$" . number_format($producto['importe'], 2) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td>No se encontraron productos</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <span class="total-mx">TOTAL MX$
        <?php
        // Calcular el total de la venta
        $total = 0;
        if (!empty($productos)) {
            foreach ($productos as $producto) {
                $total += $producto['importe'];
            }
        }
        echo number_format($total, 2);
        ?>
        </span>
        <button class="frame" onclick="history.back(); return false;">
            <span class="return">Regresar</span>
        </button>
    </div>
</body>
</html>