
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
					<?php foreach ($country as $valueColumn) : ?>
						<th scope="row" class="field-table"><?= htmlspecialchars($valueColumn) ?></th>
					<?php endforeach; ?>
					<th scope="row" class="field-table">
						<form action="<?= $data['URL_CRUD_COUNTRIES']?>" method="get">
							<input type="hidden" name="page" value="update">
							<input type="hidden" name="country_id" value="<?=$country['ID']?>">
							<input type="submit" class="btn btn-warning field-table" value="Изменить">
						</form>
					</th>
					<th scope="row"  class="field-table">
						<form action="<?= $data['URL_CRUD_COUNTRIES']?>" method="post">
							<input type="hidden" name="action" value="delete">
							<input type="hidden" name="country_id" value="<?=$country['ID']?>">
							<input type="submit" class="btn btn-danger field-table" onclick="return confirm('Удалить?')" value="Удалить">
						</form>
					</th>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php endif; ?>
<form action="<?= $data['URL_CRUD_COUNTRIES']?>" class="m-1" method="get" >
	<input type="hidden" name="page" value="add">
	<input type="submit" class="btn btn-primary" value="Добавить">
</form>