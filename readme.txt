index.php
registrarse.php usa insertar_usuario.php
inicio_sesion.html usa verificar_login.php
cuando hay un usuario registrado, si le picas ver perfil,
GeneralCliente.php de ahi FormEditarPerfilUsuario.php que usa Editar_perfil_usuario.php
tambien se va a Ajustes.html para borrar cuenta

si es Vendedor va a Vendedor_perfil.php
de ahi a FormEditarPerfilVendedor.php que usa Editar_perfil_usuario_vendedor.php
y de vendedor tiene varios casos de uso:
General es editarlo ese ya esta, 
Productos donde el vendedor puede agregar productos, AgregarProducto.php ese es en el 
que estoy trbajando, que usa AgregarProducto_insertar.php
Inventario donde se puede surtir un producto, es decir agregar inventario este usa SurtirC.html y css
tambien se crea el reporte de inventario que es ReporteDeInventario.html que tiene que puede ingresar fechas para ver los 
surtidos de los productos
Ventas es donde estarian todas las ventas que ha hecho el usuario, al principio aparecen las que no ha confirmado
este usa , se puede ver los detalles de cada venta que es detallesVenta.php, ademas de que si ingresas fechas y le picas
generar, te crea un reporte de las ventas realizadas entre esas fechas (la interfaz no esta todavia)
Y por ultimo AJUSTEs que solo seria para borrar la cuenta y todos los productos que el vendedor creo


en la pantalla principal(index.php) aparecen los productos creados mas recientemente, faltaria aplicar una funcion para
realizar busqueda de productos, de dos formas: con el select de cat4egorias, y con la barra de busqueda se busca el input en 
la descripcion de los productos

falta interfaz de comentario que realmente es la pagina para ver los detalles del producto al hacerle clic en la pantalla
principal, de esta interfaz puedo escoger que tanta cantidad de producto quiere el usuario y si quiere comprarlo se manda
el id del producto y la cantidad a la tabla de carrito y el id del usuario,
en la interfaz de carrito.php es donde apareceran los productos que el usuario agrego a la tabla carrito, tambien se deberia poder editar la cantidad de cada producto en el carrito
cuando el usuario este satisfecho con los productos que quiere comprar le da al boton de comprar y los datos, se mandan a la tabla de
pedidos, al vendedor tambien se deberia actualizar sus ventas y al usuario sus compras, todavia no sabemos como poner
en contacto al vendedor y al cliente cuando se realize una compra

(si se puede un sistema de notificaciones, si no para borrarlo el icono de las interfaces)