
<h1 class="pt-5 pb-4">Список туров</h1>

<?php if (count($data['TOURS'])) : ?>
    <div class="mt-1 scroll">
        <table class="table">
            <thead>
            <tr>
                <?php foreach (array_keys($data['TOURS'][0]) as $nameColumn) : ?>
                    <th scope="col" class="field-table"><?= $nameColumn ?></th>
                <?php endforeach; ?>
                <th colspan="2" scope="col" class="field-table">Действие</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['TOURS'] as $tour) : ?>
                <tr>
                    <?php foreach ($tour as $nameColumn => $valueColumn) : ?>
                        <?php if ($nameColumn == 'COUNTRY_ID') : ?>
                            <?php foreach ($data['COUNTRIES'] as $country) : ?>
                                <?php if ($country['ID'] == $valueColumn) : ?>
                                    <th class="p-2 text-center field-table"><?= htmlspecialchars($valueColumn) . '<br>(' . htmlspecialchars($country['NAME']) . ')'?></th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <th class="p-2 text-center field-table"><?= htmlspecialchars($valueColumn) ?></th>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <th scope="row" class="field-table">
                        <form action="/tours/action.php" method="get">
                            <input type="hidden" name="action" value="tours_update">
                            <input type="hidden" name="id" value="<?=$tour['ID']?>">
                            <input type="submit" class="btn btn-warning field-table" value="Изменить">
                        </form>
                    </th>
                    <th scope="row"  class="field-table">
                        <form action="/tours/list.php" method="post">
                            <input type="hidden" name="action" value="tours_delete">
                            <input type="hidden" name="id" value="<?=$tour['ID']?>">
                            <input type="submit" class="btn btn-danger field-table" onclick="return confirm('Удалить?')" value="Удалить">
                        </form>
                    </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
<form action="/tours/action.php" class="m-1" method="get" >
    <input type="hidden" name="action" value="tours_create">
    <input type="submit" class="btn btn-primary" value="Добавить">
</form>