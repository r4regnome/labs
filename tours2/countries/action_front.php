<h1 class="pt-5 pb-4"><?= $data['TITLE']?></h1>

<div>
    <form action="/countries/action.php" method="post">
        <input type="hidden" name="action" value="<?=$data['ACTION']?>">
        <?php if ($data['ACTION'] == 'countries_update') : ?>
        <div class="form-group flex-row row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" id="id" name="id" class="form-control" readonly value="<?= htmlspecialchars($data['FIELDS_COUNTRIES_FOR_UPDATE']['ID'])?>">
            </div>
        </div>
        <?php endif; ?>
        <div class="form-group flex-row row">
            <label for="name" class="col-sm-2 col-form-label">Название страны</label>
            <div class="col-sm-10">
                <input type="text" id="name" name="name" class="form-control" value="<?=htmlspecialchars($data['FIELDS_COUNTRIES_FOR_UPDATE']['NAME'] ?? '')?>">
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
</div>
