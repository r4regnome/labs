<h1 class="pt-5 pb-4">Добавление страны</h1>

<div>
	<form action="<?= $data['URL_CREATE_COUNTRY']?>" method="post">
		<input type="hidden" name="action" value="add">
		<div class="form-group flex-row row">
			<label for="country_name" class="col-sm-2 col-form-label">Название страны</label>
			<div class="col-sm-10">
				<input type="text" id="country_name" name="country_name" class="form-control">
			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="Добавить">
	</form>
</div>