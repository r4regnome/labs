
<h1 class="pt-5 pb-4">Добавление тура</h1>

<div>
	<form action="<?= $data['URL_CREATE_TOUR']?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="add">
		<div class="form-group flex-row row">
			<label for="tour_name" class="col-sm-2 col-form-label">Название тура</label>
			<div class="col-sm-10">
				<input type="text" id="tour_name" name="tour_name" class="form-control">
			</div>
		</div>
		<div class="form-group flex-row row">
			<label for="tour_image" class="col-sm-2 col-form-label">Фотография</label>
			<div class="col-sm-10">
				<input type="file" name="tour_image" id="tour_image" accept="image/*" class="form-control">
			</div>
		</div>
		<div class="form-group flex-row row">
			<label for="tour_country_id" class="col-sm-2 col-form-label">Страна</label>
			<div class="col-sm-10">
				<select class="form-control" id="tour_country_id" name="tour_country_id">
					<option disabled>Выберите страну</option>
					<?php foreach ($data['COUNTRIES'] as $country) : ?>
						<option value="<?=$country['ID']?>"><?=$country['NAME']?></option>
					<?php endforeach;?>
				</select>
			</div>
		</div>
		<div class="form-group flex-row row">
			<label for="tour_price" class="col-sm-2 col-form-label">Цена</label>
			<div class="col-sm-10">
				<input type="text" id="tour_price" name="tour_price" class="form-control">
			</div>
		</div>
		<div class="form-group flex-row row">
			<label for="tour_description" class="col-sm-2 col-form-label">Описание</label>
			<div class="col-sm-10">
				<textarea name="tour_description" id="tour_description" class="form-control"></textarea>
			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="Сохранить">
	</form>
</div>
