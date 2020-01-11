<? require_once  ROOT . "/application/views/admin/layots/header.php"; ?>
    <div class="container">
        <h1>Редактирование товара</h1>
    </div>
    <hr>
    <div class="container">
        <? if(isset($errors)): ?>
            <ul class="errors">
                <? foreach ($errors as $error): ?>
                    <li>
                        <?= $error; ?>
                    </li>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
        <form action="/admin/edit/<?= $result["id_product"]; ?>" class="form-group" method="post" enctype="multipart/form-data">
            <label class="form-group__item">
                <span class="form-group__title"> Название:</span>
                <input type="text" class="form-group__input" name="NAME" value="<?= $result["name"]; ?>">
            </label>
            <label class="form-group__item select">
                <span class="form-group__title">Размер:</span>
                <select name="SIZE[]" class="form-group__input" multiple="multiple">
                    <? foreach($arSize as $size): ?>
                        <option value="<?= $size; ?>" <?if(in_array($size, $result['size'])):?>selected<?endif;?> >
                            <?= $size; ?>
                        </option>
                    <? endforeach; ?>
                </select>
            </label>
            <label class="form-group__item">
                <span class="form-group__title">Цена:</span>
                <input type="text" class="form-group__input" name="PRICE" value="<?= $result['price']; ?>">
            </label>
            <label class="form-group__item">
                <span class="form-group__title">Пол:</span>
                <select name="SEX" class="form-group__input" id="">
                    <? foreach($arSex as $sex): ?>
                        <option value="<?= $sex; ?>" <?if($sex == $result['sex']):?>selected<?endif;?> >
                            <?= $sex; ?>
                        </option>
                    <? endforeach; ?>
                </select>
            </label>
            <label class="form-group__item image">
                <span class="form-group__title">Изображение товара:</span>
                <img src="<?= $result['image']; ?>" id="image">
                <input type="file" id="image-field" class="form-group__input" name="IMAGE">
            </label>
            <label class="form-group__item">
                <span class="form-group__title">Доступное количество:</span>
                <input type="text" class="form-group__input" name="AVL" value="<?= $result['avl']; ?>">
            </label>
            <label class="form-group__item checkbox">
                <span class="form-group__title">Показ в слайдере на главной:</span>
                <input type="checkbox" class="form-group__input" name="IN_SLIDE" checked="<?= $result["in_slide"]; ?>">
            </label>
            <label class="form-group__item">
                <button type="submit" class="button-create" name="SUBMIT" value="Сохранить">Сохранить</button>
            </label>
        </form>
    </div>
    <br>
    <hr>
<? require_once  ROOT . "/application/views/admin/layots/footer.php"; ?>