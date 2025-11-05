<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Goteros para la Vista</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<header>
    <h1>💧 Goteros para la Vista</h1>
    <p>Mejora tu salud visual de forma natural y efectiva</p>
</header>

<!-- Productos -->
<section class="productos">
    <?php
    $consulta = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion, $consulta);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '
        <div class="producto">
            <img src="imagenes/'.$fila['imagen'].'" alt="'.$fila['nombre'].'">
            <h2>'.$fila['nombre'].'</h2>
            <p>'.$fila['descripcion'].'</p>
            <span>$'.$fila['precio'].'</span><br>
            <a href="https://wa.me/5930988476514?text=Hola estoy intereaado en el gotero, como puedo arquirirlo'.$fila['nombre'].'" class="boton">Comprar por WhatsApp</a>
        </div>';
    }
    ?>
</section>

<!-- Testimonios -->
<section class="testimonios">
    <h2>💬 Opiniones de Nuestros Clientes</h2>
    <div class="testimonio">
        <p>“Desde que uso los goteros naturales mi vista ha mejorado muchísimo. Ya no tengo el ardor al final del día.”</p>
        <span>— María López, Quito</span>
    </div>
    <div class="testimonio">
        <p>“Producto excelente, envío rápido y atención muy amable por WhatsApp. ¡Recomendado!”</p>
        <span>— Carlos Andrade, Guayaquil</span>
    </div>
    <div class="testimonio">
        <p>“Llevo un mes usándolos y noto menos cansancio visual. Muy satisfecho con los resultados.”</p>
        <span>— Andrea Ruiz, Cuenca</span>
    </div>
</section>

<!-- Preguntas Frecuentes -->
<section class="faq">
    <h2>❓ Preguntas Frecuentes</h2>

    <div class="pregunta">
        <h3>¿Los goteros son naturales?</h3>
        <p>Sí, están elaborados con extractos herbales naturales que ayudan a relajar y proteger tus ojos.</p>
    </div>

    <div class="pregunta">
        <h3>¿Cómo se usan?</h3>
        <p>Aplica 1 o 2 gotas en cada ojo, dos veces al día, o según indicaciones médicas.</p>
    </div>

    <div class="pregunta">
        <h3>¿Realizan envíos a todo el Ecuador?</h3>
        <p>¡Sí! Hacemos envíos a todo el país. Los pedidos se coordinan directamente por WhatsApp.</p>
    </div>

    <div class="pregunta">
        <h3>¿Puedo pagar al recibir?</h3>
        <p>Sí, aceptamos pago contra entrega en la mayoría de provincias del Ecuador.</p>
    </div>
</section>

<!-- Formulario de Contacto -->
<section class="contacto">
    <h2>📩 Contáctanos</h2>
    <p>¿Tienes alguna duda o quieres más información sobre nuestros goteros? Escríbenos y te responderemos enseguida.</p>

    <form id="formContacto" onsubmit="return enviarWhatsApp();">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

        <button type="submit">Enviar por WhatsApp</button>
    </form>
</section>

<script>
function enviarWhatsApp() {
    const nombre = document.getElementById('nombre').value;
    const correo = document.getElementById('correo').value;
    const mensaje = document.getElementById('mensaje').value;

    const texto = `Hola, mi nombre es ${nombre}.%0A📧 Correo: ${correo}%0A💬 Mensaje: ${mensaje}`;
    const telefono = "5930988476514"; // 👉 Reemplaza con tu número de WhatsApp

    const url = `https://wa.me/${telefono}?text=${texto}`;
    window.open(url, '_blank');
    return false; // Evita recargar la página
}
</script>

