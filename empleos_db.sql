-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2025 a las 16:30:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empleos_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleos`
--

CREATE TABLE `empleos` (
  `id` int(11) NOT NULL,
  `nombre_empleo` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `responsabilidades` text DEFAULT NULL,
  `requisitos` text DEFAULT NULL,
  `funciones` text DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleos`
--

INSERT INTO `empleos` (`id`, `nombre_empleo`, `descripcion`, `foto`, `responsabilidades`, `requisitos`, `funciones`, `fecha_creacion`) VALUES
(1, 'Pasantía en Creación de Contenido (no remunerada)', 'Somos una startup innovadora, con apenas seis meses en el mercado, en busca de diseñadores gráficos talentosos para impulsar nuestra visión de transformar la experiencia visual y estética de nuestras plataformas a través de soluciones creativas y efectivas.\r\n\r\nEstamos buscando específicamente estudiantes que necesiten completar horas de servicio social, pasantías o prácticas profesionales como parte de sus programas académicos. Esta es una oportunidad no remunerada que ofrece experiencia práctica, un entorno dinámico y desafiante, y la posibilidad de crecer junto a un equipo con visión de futuro.\r\n\r\n Si buscas un entorno dinámico, desafiante y lleno de oportunidades de crecimiento, ¡esta es tu oportunidad!', 'https://botblaze.tech/wp-content/uploads/2025/02/content-creator-2048x1075.png', 'Grabar y editar videos para redes sociales, campañas publicitarias y contenido corporativo.\r\nCrear contenido para Instagram, TikTok, YouTube y LinkedIn.\r\nDiseñar piezas audiovisuales alineadas con la estrategia de cada marca.\r\nApoyar en la conceptualización y desarrollo de campañas de video marketing.\r\nColaborar con equipos de diseño y marketing en la producción de contenido digital.', 'Experiencia en edición de video con diferentes herramientas (Adobe Premiere, After Effects, etc.)\r\nConocimientos básicos en grabación, iluminación y producción audiovisual.\r\nCapacidad para contar historias atractivas a través del contenido digital.\r\nConocimiento de tendencias en redes sociales y estrategias de video marketing.\r\nHabilidad para trabajar en equipo y adaptarse a entornos ágiles.', 'Captura y edición de material audiovisual según las necesidades de la marca.\r\nCreación de videos atractivos y optimizados para cada plataforma.\r\nDesarrollo de guiones, conceptos y estrategias para mejorar la comunicación visual.\r\nAplicación de efectos visuales, transiciones y animaciones para mejorar la calidad de los videos.\r\nAdaptación de contenido audiovisual a diferentes plataformas digitales.', '2025-02-21 00:41:17'),
(2, 'Pasantía en Desarrollo Web (no remunerada)', 'Somos una startup innovadora, con tan solo un año en el mercado, en busca de desarrolladores de sistemas talentosos e integradores de chatbots para impulsar nuestra visión de revolucionar la interacción entre empresas y clientes a través de la inteligencia artificial y la comunicación digital.\r\n\r\nEstamos buscando específicamente estudiantes que necesiten completar horas de servicio social, pasantías o prácticas profesionales como parte de sus programas académicos. Esta es una oportunidad no remunerada que ofrece experiencia práctica, un entorno dinámico y desafiante, y la posibilidad de crecer junto a un equipo con visión de futuro.\r\n\r\n¡Si estás listo para marcar la diferencia y adquirir experiencia valiosa, nos encantaría saber de ti!', 'https://botblaze.tech/wp-content/uploads/2025/01/full-stack-jr-2048x1075.png', 'Contribuir al desarrollo y mantenimiento de aplicaciones web.\r\nColaborar con el equipo para crear funcionalidades utilizando PHP (preferiblemente Laravel).\r\nDiseñar y estructurar páginas web usando HTML y CSS.\r\nImplementar interactividad en páginas web mediante JavaScript.\r\nProbar y depurar código para garantizar calidad y rendimiento.\r\nDocumentar tareas y soluciones implementadas.', 'Conocimientos básicos en desarrollo web:\r\nPHP (la experiencia con Laravel es un plus).\r\nHTML5 y CSS3.\r\nJavaScript (la experiencia con frameworks como Vue.js o React es un plus).\r\nFamiliaridad con bases de datos (MySQL, PostgreSQL).\r\nCapacidad para trabajar en equipo y adaptarse a entornos ágiles.\r\nHabilidades analíticas y de resolución de problemas.\r\nDisposición para aprender y mejorar continuamente.\r\n\r\nPreferible (no obligatorio)\r\n\r\nExperiencia con herramientas de control de versiones como Git.\r\nUso de inteligencia artificial.\r\nConocimientos en diseño responsive o frameworks de CSS (Bootstrap, Tailwind CSS).\r\nExperiencia con entornos de desarrollo local (XAMPP, Docker, etc.).', NULL, '2025-02-21 00:58:15'),
(3, 'Pasantía en Diseño Gráfico (no remunerada)', 'Somos una startup innovadora, con apenas seis meses en el mercado, en busca de diseñadores gráficos talentosos para impulsar nuestra visión de transformar la experiencia visual y estética de nuestras plataformas a través de soluciones creativas y efectivas.\r\n\r\nEstamos buscando específicamente estudiantes que necesiten completar horas de servicio social, pasantías o prácticas profesionales como parte de sus programas académicos. Esta es una oportunidad no remunerada que ofrece experiencia práctica, un entorno dinámico y desafiante, y la posibilidad de crecer junto a un equipo con visión de futuro.\r\n\r\n Si buscas un entorno dinámico, desafiante y lleno de oportunidades de crecimiento, ¡esta es tu oportunidad!', 'https://botblaze.tech/wp-content/uploads/2025/01/disenador-grafico-1-2048x1075.png', 'Diseñar landing pages utilizando Illustrator u otras herramientas de diseño.\r\nCrear contenido visual para redes sociales, asegurando coherencia con la identidad de marca.\r\nApoyar en el diseño de interfaces de usuario (UI) y experiencia de usuario (UX).\r\nColaborar con los equipos de desarrollo y marketing en la producción de material gráfico.\r\nContribuir a la conceptualización de campañas visuales.', 'Conocimiento en Adobe Illustrator, Photoshop y herramientas de diseño gráfico.\r\nCreatividad y habilidades para conceptualizar diseños atractivos y funcionales.\r\nExperiencia o interés en diseño UI/UX.\r\nCapacidad de trabajo en equipo y adaptación a entornos dinámicos.\r\nDisposición para aprender y aportar nuevas ideas.', 'Crear gráficos, ilustraciones y diseños visuales que representen la identidad de la marca y cumplan con los objetivos del proyecto.\r\nDiseñar publicaciones atractivas y optimizadas para diferentes plataformas sociales.\r\nCrear prototipos para mejorar la experiencia del usuario en aplicaciones y plataformas web.\r\nAsegurar la coherencia visual de todos los materiales de la marca mediante la actualización de guías de estilo y branding.\r\nAsegurar que los diseños estén listos para impresión o publicación, cumpliendo con las especificaciones técnicas necesarias.', '2025-02-21 00:59:32'),
(4, 'Pasantía en Animación Digital (No remunerada)', 'Somos una startup innovadora, con apenas seis meses en el mercado, en busca de animadores digitales talentosos para impulsar nuestra visión de transformar la experiencia visual y estética de nuestras plataformas a través de soluciones creativas y efectivas.\r\n\r\nEstamos buscando específicamente estudiantes que necesiten completar horas de servicio social, pasantías o prácticas profesionales como parte de sus programas académicos. Esta es una oportunidad no remunerada que ofrece experiencia práctica, un entorno dinámico y desafiante, y la posibilidad de crecer junto a un equipo con visión de futuro.\r\n\r\n Si buscas un entorno dinámico, desafiante y lleno de oportunidades de crecimiento, ¡esta es tu oportunidad!', 'https://botblaze.tech/wp-content/uploads/2025/02/BotBlaze-pasantes-2048x1075.png', 'Crear animaciones 2D o 3D para redes sociales, presentaciones y contenido web.\r\nColaborar con el equipo de diseño gráfico y marketing para desarrollar contenido animado atractivo.\r\nParticipar en la planificación y conceptualización de proyectos visuales.\r\nOptimizar animaciones para diferentes plataformas digitales.\r\nAsistir en la edición y postproducción de videos.', 'Estudiante de Diseño Gráfico, Animación Digital, Multimedia o carreras afines.\r\nConocimientos básicos en software de animación como Adobe After Effects, Blender, Toon Boom, Cinema 4D u otros.\r\nHabilidad para crear motion graphics y/o modelado 3D (deseable).\r\nCreatividad y atención al detalle.\r\nCapacidad para trabajar en equipo y cumplir plazos.', 'Diseñar y animar gráficos en movimiento para videos promocionales, presentaciones y redes sociales.\r\nImplementar efectos visuales y transiciones atractivas en videos y animaciones.\r\nAdaptar animaciones según las necesidades del equipo de marketing y diseño.\r\nTrabajar con ilustradores y diseñadores para dar vida a conceptos visuales a través de la animación.\r\nInvestigar y aplicar nuevas tendencias en animación y motion graphics.', '2025-02-21 01:01:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulaciones`
--

CREATE TABLE `postulaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `whatsApp` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `portafolio` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `fecha_postulacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Estructura de tabla para la tabla `postulaciones_empleos`
--

CREATE TABLE `postulaciones_empleos` (
  `id` int(11) NOT NULL,
  `postulacion_id` int(11) DEFAULT NULL,
  `empleo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleos`
--
ALTER TABLE `empleos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `postulaciones_empleos`
--
ALTER TABLE `postulaciones_empleos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postulacion_id` (`postulacion_id`),
  ADD KEY `empleo_id` (`empleo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleos`
--
ALTER TABLE `empleos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `postulaciones_empleos`
--
ALTER TABLE `postulaciones_empleos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `postulaciones_empleos`
--
ALTER TABLE `postulaciones_empleos`
  ADD CONSTRAINT `postulaciones_empleos_ibfk_1` FOREIGN KEY (`postulacion_id`) REFERENCES `postulaciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `postulaciones_empleos_ibfk_2` FOREIGN KEY (`empleo_id`) REFERENCES `empleos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
