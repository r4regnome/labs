<h1 class="pt-5 pb-4">Список стран</h1>

<?php if (count($data['COUNTRIES'])) : ?>
    <div class="mt-1 scroll">
        <table class="table">
            <thead>
            <tr>
                <?php foreach (array_keys($data['COUNTRIES'][0]) as $nameColumn) : ?>
                    <th scope="col" class="field-table"><?= $nameColumn ?></th>
                <?php endforeach; ?>
                <th colspan="2" scope="col" class="field-table">Действие</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['COUNTRIES'] as $country) : ?>
                <tr>
                    <?php foreach ($country as $nameColumn => $valueColumn) : ?>
                        <?php if ($nameColumn == 'NAME') : ?>
                            <th class="p-2 text-center field-table"><a href="/tours/list.php?country_id=<?=$country['ID']?>"><?= htmlspecialchars($valueColumn)?></a></th>
                        <?php else: ?>
                            <th class="p-2 text-center field-table"><?= htmlspecialchars($valueColumn) ?></th>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <th scope="row" class="field-table">
                        <form action="/countries/action.php" method="get">
                            <input type="hidden" name="action" value="countries_update">
                            <input type="hidden" name="id" value="<?=$country['ID']?>">
                            <input type="submit" class="btn btn-warning field-table" value="Изменить">
                        </form>
                    </th>
                    <th scope="row"  class="field-table">
                        <form action="/countries/list.php" method="post">
                            <input type="hidden" name="action" value="countries_delete">
                            <input type="hidden" name="id" value="<?=$country['ID']?>">
                            <input type="submit" class="btn btn-danger field-table" onclick="return confirm('Удалить?')" value="Удалить">
                        </form>
                    </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
<form action="/countries/action.php" class="m-1" method="get" >
    <input type="hidden" name="action" value="countries_create">
    <input type="submit" class="btn btn-primary" value="Добавить">
</form>
