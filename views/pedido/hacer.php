<?php if (isset($_SESSION['identity'])) : ?>

    <h1>Hacer pedido</h1>
    <p>
        <a href="<?= base_url ?>carrito/index">Ver los productos y el preciodel pedido</a>
    </p>
    <br>
    <h3>Domicilio para el envio</h3>
    <form action="<?=base_url?>pedido/add" method="POST">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" require>

        <label for="localidad">Localidad</label>
        <input type="text" name="localidad" require>

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" require>

        <input type="submit" value="Confirmar">
    </form>

<?php else : ?>

    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logueado</p>

<?php endif; ?>