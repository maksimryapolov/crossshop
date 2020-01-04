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
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                <tr>
                    <td>123</td>
                    <td>Ассорти из овощей, зелени и сыра</td>
                    <td>190</td>
                    <td>
                        <a href="button-close">
                            <img class="icon-edit" src="/dist/images/svg/edit.svg" alt="edit_icon">
                        </a>
                    </td>
                    <td>
                        <a class="button-close" href="">
                            x
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <button class="tst-btn">
        Добавить товар
    </button>
</div>
<? require_once  ROOT . "/application/views/admin/layots/footer.php"; ?>
