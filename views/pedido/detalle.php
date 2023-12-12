<h1>Detalle del pedido</h1>

<?php if (isset($pedido)) : ?>
    <?php if(isset($_SESSION['admin'])) : ?>
        <h3>Cambiar estado del pedido: </h3>
        <form action="<?=base_url?>pedido/estado" method="POST">
            <input type="hidden" value ="<?=$pedido->id?>" name="pedido_id">
            <select name="estado" >
                <option value="confirm" <?=$pedido->estado == "confirm" ? 'selected' : '' ?> >Pendiente</option>
                <option value="preparation"<?=$pedido->estado == "preparation" ? 'selected' : '' ?> >En preparación</option>
                <option value="ready"<?=$pedido->estado == "ready" ? 'selected' : '' ?> >Preparado para enviar</option>
                <option value="sended"<?=$pedido->estado == "sended" ? 'selected' : '' ?> >Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado">
        </form>
        <br>
    <?php endif; ?>
        <h3>Dirección de envío</h3>
        Provincia: <?= $pedido->provincia ?><br>
        Ciudad: <?=$pedido->localidad?> <br>
        Direccion: <?=$pedido->direccion?> <br>

        <br>
        <h3>Datos del pedido</h3>
        Estado: <?=Utils::showStatus($pedido->estado)?><br>
        Número de pedido: <?=$pedido->id?> <br>
        Total a pagar: <?=$pedido->coste?> <br>
        Productos:
        <?php while($producto = $productos->fetch_object()): ?>
            <ul>
                <li><?= $producto->nombre?> - <?= $producto->precio ?>$ x<?= $producto->unidades ?></li>
            </ul>
        <?php endwhile; ?>

    <?php endif; ?>