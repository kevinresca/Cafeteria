1. Realizar una consulta que permita conocer cuál es el producto que más stock tiene.
RESPUESTA:
(SELECT ID, Nombre, Referencia, Precio, Peso, Categoria, MAX(Stock), Fecha FROM inventario;)