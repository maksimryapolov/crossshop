<? require_once  ROOT . "/application/views/admin/layots/header.php"; ?>
    <? if(isset($errors)): ?>
        <ul>
            <? foreach ($errors as $error): ?>
                <li>
                    <?= $error; ?>
                </li>
            <? endforeach; ?>
        </ul>
    <? endif; ?>
    <div class="container">
        <h1>Добавить товар</h1>
    </div>
    <hr>
    <div class="container">
        <form action="/admin/product/add/" class="form-group" method="post" enctype="multipart/form-data">
            <label class="form-group__item">
                <span class="form-group__title"> Название:</span>
                <input type="text" class="form-group__input" name="NAME">
            </label>
            <label class="form-group__item select">
                <span class="form-group__title">Размер:</span>
                <select name="SIZE[]" class="form-group__input" multiple="multiple">
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                    <option value="45">45</option>
                    <option value="46">46</option>
                </select>
            </label>
            <label class="form-group__item">
                <span class="form-group__title">Цена:</span>
                <input type="text" class="form-group__input" name="PRICE">
            </label>
            <label class="form-group__item">
                <span class="form-group__title">Пол:</span>
                <select name="SEX" class="form-group__input" id="">
                    <option value="Мужской">Мужской</option>
                    <option value="Женский">Женский</option>
                    <option value="Унисекс">Унисекс</option>
                </select>
            </label>
            <label class="form-group__item">
                <span class="form-group__title">Изображение товара:</span>
                <input type="file" class="form-group__input" name="IMAGE">
            </label>
            <label class="form-group__item">
                <span class="form-group__title">Доступное количество:</span>
                <input type="text" class="form-group__input" name="AVL">
            </label>
            <label class="form-group__item checkbox">
                <span class="form-group__title">Показ в слайдере на главной:</span>
                <input type="checkbox" class="form-group__input" name="IN_SLIDE">
            </label>
            <label class="form-group__item">
                <button type="submit" class="button-create" name="SUBMIT" value="Отправить">Отправить</button>
            </label>
        </form>
    </div>
    <br>
    <hr>
<? require_once  ROOT . "/application/views/admin/layots/footer.php"; ?>