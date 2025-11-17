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
