-- Ejercicio 1: Crear la base de datos y las tablas

CREATE DATABASE tienda_frutas;
USE tienda_frutas;

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion TEXT
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    categoria_id INT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT DEFAULT 0,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

CREATE TABLE usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);


-- Ejercicio 2: Insertar datos de ejemplo

USE `tienda_frutas`;

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Cítricos', 'Frutas ricas en vitamina C con un sabor ácido característico.'),
(2, 'Frutas Rojas', 'Frutas de color rojo o morado, ricas en antioxidantes.'),
(3, 'Tropicales', 'Frutas exóticas cultivadas en climas cálidos.');

INSERT INTO `productos` (`nombre`, `categoria_id`, `precio`, `stock`, `activo`) VALUES
('Naranja', 1, 1.50, 100, 1),
('Limón', 1, 1.20, 80, 1),
('Mandarina', 1, 1.80, 120, 1),
('Fresa', 2, 4.50, 50, 1),
('Frambuesa', 2, 5.50, 40, 1),
('Arándano', 2, 6.00, 60, 1),
('Mango', 3, 2.50, 30, 1),
('Piña', 3, 3.00, 25, 1),
('Maracuyá', 3, 2.80, 35, 1),
('Kiwi', 3, 2.10, 70, 1);

-- Ejercicio 3: Consultas Select Basicas

    -- A. Obtener todos los productos ordenados por precio (menor a mayor)

        SELECT * FROM productos ORDER BY precio ASC;

    -- B. Obtener productos de una categoria especifica

        SELECT * FROM productos WHERE categoria_id = 1;

    -- C. Obtener productos con stock menor a 20 
        SELECT * FROM productos WHERE stock < 20;

    -- D. Contar cuantos productos hay en total 

        SELECT COUNT(*) AS total_productos FROM productos;

-- Ejercicio 4: JOIN - Productos con categoria

    SELECT p.nombre, p.precio, c.nombre FROM productos p INNER JOIN categorias c ON p.categoria_id = c.id;

-- Ejercicio 5: UPDATE - Cambiar precio

    -- A. Aumente el precio de todos los productos de una categoria en un 10%

        UPDATE productos SET precio = precio * 1.10 WHERE categoria_id = 2;
    
    -- B. Reduzca el stock de un producto especifico cuando se realiza una compra

        UPDATE productos SET stock = stock - 5 WHERE id = 1;
    
    -- C. Valide que el stock no sea negatico ante de actializar 

        UPDATE productos SET stock = GREATES(stock - 5, 0) WHERE id = 1;

-- Ejercicio 6: DELETE - Eliminar Productos

    UPDATE productos SET activo = 0 WHERE id = 3;

-- Ejercicio 7: Simulacion de compra

    -- A. Crear un nuevo pedido para un usuario 

        INSERT INTO pedidos (usuario_id, total) VALUES (1, 15.00);
    
    -- B. Reducir el stock del producto 

        UPDATE productos SET stock = stock - 3 WHERE id = 4;
    
    -- C. Calcular el total del pedido 

        SELECT SUM(precio * 3) AS total_pedido FROM productos WHERE id = 4;
    
    -- D. Usar transacciones para garentizar consistencia

        START TRANSACTION;

        INSERT INTO pedidos (usuario_id, total) VALUES (1, 15.00);
        UPDATE productos SET stock = stock - 3 WHERE id = 4;

        COMMIT;
        ROLLBACK;

    -- E. Manejar errores (stock insuficiente, usuario no existen, etc)
    
        SET @usuario_id = 1;
        SET @producto_id = 4;
        SET @cantidad = 3;

        START TRANSACTION;

        DECLARE stock_actual INT;

        SELECT stock INTO stock_actual FROM productos WHERE id = @producto_id;

        IF stock_actual >= @cantidad THEN
            INSERT INTO pedidos (usuario_id, total) VALUES (@usuario_id, (SELECT precio * @cantidad FROM productos WHERE id = @producto_id));
            UPDATE productos SET stock = stock - @cantidad WHERE id = @producto_id;
            COMMIT;
        ELSE
            ROLLBACK;
            SELECT 'Error: Stock insuficiente' AS mensaje;
        END IF;
    END; 

-- Ejercicio 8: Reportes y analisis

    -- A. Productos mas vendidos

        SELECT p.nombre, SUM(pd.cantidad) AS total_vebdudi 
        FROM productos p
        JOIN pedido_detalles pd ON p.id = pd.producto_id
        GROUP BY p.id
        ORDER BY total_vendido DESC
        LIMIT 5;

    -- B. Ingresos totales por categoria
    
        SELECT c.nombre, SUM(pd.cantidad * p.precio) AS ingresos_totales
        FROM categorias c
        JOIN productos p ON c.id = p.categoria_id
        JOIN pedido_detalles pd ON p.id = pd.producto_id
        GROUP BY c.id;
    
    -- C.Productos con bajo stock

        SELECT * FROM productos WHERE stock < 10;   

    -- D. Usuarios con mas compras

        SELECT u.nombre_usuario, COUNT(p.id) AS total_compras
        FROM usuarios u
        JOIN pedidos p ON u.id = p.usuario_id
        GROUP BY u.id
        ORDER BY total_compras DESC
        LIMIT 5;