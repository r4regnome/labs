<h1 class="pt-5 pb-4">Обновление страны</h1>

<div>
	<form action="<?= $data['URL_UPDATE_COUNTRY']?>" method="post">
		<input type="hidden" name="action" value="update">
		<div class="form-group flex-row row">
			<label for="country_id" class="col-sm-2 col-form-label">ID</label>
			<div class="col-sm-10">
				<input type="text" id="country_id" name="country_id" class="form-control" readonly value="<?= $data['COUNTRY']['ID']?>">
			</div>
		</div>
		<div class="form-group flex-row row">
			<label for="country_name" class="col-sm-2 col-form-label">Название страны</label>
			<div class="col-sm-10">
				<input type="text" id="country_name" name="country_name" class="form-control" value="<?= htmlspecialchars($data['COUNTRY']['NAME'])?>">
			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="Сохранить">
	</form>
</div>