<h1>Gestion de productos</h1>

<a href="<?= base_url ?>productos/crear" class="button button-small">Crear Producto</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == "complete") : ?>
    <strong class="alert_green">El producto se ha creado correctamente.</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != "complete") : ?>
    <strong class="alert_green">El producto se ha creado correctamente.</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto');?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == "complete") : ?>
    <strong class="alert_green">El producto se ha creado correctamente.</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != "complete") : ?>
    <strong class="alert_green">El producto se ha creado correctamente.</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete');?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>
    <?php while ($prod = $productos->fetch_object()) : ?>
        <tr>
            <td>
                <?= $prod->id; ?>
            </td>
            <td>
                <?= $prod->nombre; ?>
            </td>
            <td>
                <?= $prod->precio; ?>
            </td>
            <td>
                <?= $prod->stock; ?>
            </td>
            <td>
                <a href="<?=base_url?>productos/editar&id=<?=$prod->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>productos/eliminar&id=<?=$prod->id?>" class="button button-gestion button-red">Borrar</a>
            </td>

        </tr>
    <?php endwhile; ?>
</table>