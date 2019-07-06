# Introducción
Diseñar una aplicación basada en el diseño de clases de la jerarquía “Caja” con acceso a tablas en un servidor en el que debemos implementar un determinado almacén de cajas que se encuentran dispuestas en las lejas por estanterías.
El almacén está organizado en pasillos de estanterías, identificados por una letra y dentro de cada pasillo las distintas estanterías están identificadas por un número correlativo.
Cada estantería tiene asociado un lugar del almacén mediante coordenadas pasillo-número (Ej. C-2).
Las cajas que formarán parte del almacén son del tipo genérico Caja, pudiendo contener cualquier objeto.
Cada estantería podrá tener un número diferente de lejas.
Cuando se creen cajas, estas se depositarán en una leja libre de una determinada estantería. Se hará de manera discrecional, a gusto del administrador del almacén.
Las operaciones a realizar sobre la web del almacén son:
1.  Alta de Estanterías. Ubicación de las mismas en el almacén.
2.  Creación de cajas y asignación de leja dentro de una estantería.
La estantería destino se puede elegir dentro de las disponibles, es decir, que tengan lejas libres y dentro de esta se podrá elegir la leja no ocupada que se estime oportuna.
Esta operación de elección de estantería y leja se debe implementar con generación dinámica de componentes web.
Al verse afectadas dos tablas, en esta operación también es obligatorio realizar un control de transacciones.
3.  Inventario del almacén. Consiste en obtener una relación detallada de las distintas estanterías del almacén que contengan cajas, ordenadas por pasillo y número, y la descripción completa en cada una de ellas de las cajas que contienen.
4.  Control de errores. En todo proceso que lo requiera se implementará un control de errores con captura de excepciones. Crear clases de excepciones propias. Derivar su visualización a una página de errores común.
5.  Uso de sentencias preparadas. En todo campo de formulario susceptible de captar código malicioso en forma de SQL Injection, se utilizarán sentencias preparadas para las órdenes SQL oportunas.

# BACKEND
PHP
# FRONTEND
Bootstrap
