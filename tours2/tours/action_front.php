
<h1 class="pt-5 pb-4"><?=$data['TITLE']?></h1>

<div>
    <form action="/tours/action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="<?= $data['ACTION']?>">
        <?php if ($data['ACTION'] == 'tours_update') : ?>
            <div class="form-group flex-row row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input readonly type="text" id="id" name="id" value="<?= htmlspecialchars($data['FIELDS_TOURS_FOR_UPDATE']['ID'])?>" class="form-control">
                </div>
            </div>
        <?php endif; ?>
        <div class="form-group flex-row row">
            <label for="name" class="col-sm-2 col-form-label" >Название тура</label>
            <div class="col-sm-10">
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($data['FIELDS_TOURS_FOR_UPDATE']['NAME'] ?? '') ?>" class="form-control">
            </div>
        </div>
        <div class="form-group flex-row row">
            <label for="image" class="col-sm-2 col-form-label">Фотография</label>
            <div class="col-sm-10">
                <?php if(isset($data['FIELDS_TOURS_FOR_UPDATE']['IMAGE']) && $data['FIELDS_TOURS_FOR_UPDATE']['IMAGE'] != '') :?>
                    <div>
                        <img src="<?= $data['FIELDS_TOURS_FOR_UPDATE']['IMAGE']?>" style="width: 150px; height: 150px; object-fit:cover;" alt="">
                    </div>
                    <div class="form-control"><?= htmlspecialchars($data['FIELDS_TOURS_FOR_UPDATE']['IMAGE'])?></div>
                <?php endif; ?>
                <input type="file" name="image" id="image" accept="image/*" class="form-control">
            </div>
        </div>
        <div class="form-group flex-row row">
            <label for="country_id" class="col-sm-2 col-form-label">Страна</label>
            <div class="col-sm-10">
                <select class="form-control" id="country_id" name="country_id">
                    <option disabled>Выберите страну</option>
                    <?php foreach ($data['COUNTRIES'] as $country) : ?>
                        <?php if ($country['ID'] == ($data['FIELDS_TOURS_FOR_UPDATE']['COUNTRY_ID'] ?? '')) : ?>
                            <option value="<?=$country['ID']?>" selected><?=$country['NAME']?></option>
                        <?php else :?>
                            <option value="<?=$country['ID']?>"><?=htmlspecialchars($country['NAME'])?></option>
                        <?php endif;?>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="form-group flex-row row">
            <label for="price" class="col-sm-2 col-form-label">Цена</label>
            <div class="col-sm-10">
                <input type="text" id="price" name="price" class="form-control" value="<?= htmlspecialchars($data['FIELDS_TOURS_FOR_UPDATE']['PRICE'] ?? '')?>">
            </div>
        </div>
        <div class="form-group flex-row row">
            <label for="description" class="col-sm-2 col-form-label">Описание</label>
            <div class="col-sm-10">
                <textarea name="description" id="description" class="form-control"><?=htmlspecialchars($data['FIELDS_TOURS_FOR_UPDATE']['DESCRIPTION'] ?? '')?></textarea>
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
</div>
