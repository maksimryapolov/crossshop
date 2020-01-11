<? require_once  ROOT . "/application/views/admin/layots/header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table>
                <caption>
                    Список товаров
                </caption>
                <tr>
                    <th>Идентификатор</th>
                    <th>Наименование товара</th>
                    <th>Цена, руб.</th>
                    <th>Размеры</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                <? if($result):
                    foreach ($result as $item): ?>
                        <tr>
                            <td><?= $item["id_product"]; ?></td>
                            <td><?= $item["name"]; ?></td>
                            <td><?= $item["price"]; ?></td>
                            <td><?= $item["size"]; ?></td>
                            <td>
                                <a class="button-close" href="/admin/edit/<?= $item['id_product']; ?>/">
                                    <img class="icon-edit" src="/dist/images/svg/edit.svg" alt="edit_icon">
                                </a>
                            </td>
                            <td>
                                <a class="button-close" href="/admin/delete/<?= $item['id_product']; ?>/">
                                    x
                                </a>
                            </td>
                        </tr>
                    <? endforeach; 
                    endif;
                    ?>
            </table>
        </div>
    </div>
    <a href="/admin/product/add/" class="btn-link">
        Добавить товар
    </a>
</div>
<? require_once  ROOT . "/application/views/admin/layots/footer.php"; ?>
