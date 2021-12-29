
<h1 class="pt-5 pb-4">Обновление тура</h1>

<div>
	<form action="<?= $data['URL_UPDATE_TOUR']?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="update">
		<div class="form-group flex-row row">
			<label for="tour_id" class="col-sm-2 col-form-label">ID</label>
			<div class="col-sm-10">
				<input readonly type="text" id="tour_id" name="tour_id" value="<?= htmlspecialchars($data['TOUR']['ID'])?>" class="form-control">
			</div>
		</div>
		<div class="form-group flex-row row">
			<label for="tour_name" class="col-sm-2 col-form-label" >Название тура</label>
			<div class="col-sm-10">
				<input type="text" id="tour_name" name="tour_name" value="<?= htmlspecialchars($data['TOUR']['NAME']) ?>" class="form-control">
			</div>
		</div>
		<div class="form-group flex-row row">
			<label for="tour_image" class="col-sm-2 col-form-label">Фотография</label>
			<div class="col-sm-10">
				<?php if(isset($data['TOUR']['IMAGE']) && $data['TOUR']['IMAGE'] != '') :?>
					<div>
						<img src="<?= $data['TOUR']['IMAGE']?>" style="width: 150px; height: 150px; object-fit:cover;" alt="">
					</div>
					<div class="form-control"><?= htmlspecialchars($data['TOUR']['IMAGE'])?></div>
				<?php endif; ?>
				<input type="file" name="tour_image" id="tour_image" accept="image/*" class="form-control">
			</div>
		</div>
		<div class="form-group flex-row row">
			<label for="tour_country_id" class="col-sm-2 col-form-label">Страна</label>
			<div class="col-sm-10">
				<select class="form-control" id="tour_country_id" name="tour_country_id">
					<option disabled>Выберите страну</option>
					<?php foreach ($data['COUNTRIES'] as $country) : ?>
						<?php if ($country['ID'] == $data['TOUR']['COUNTRY_ID']) : ?>
                            <option value="<?=$country['ID']?>" selected><?=$country['NAME']?></option>
						<?php else :?>
                            <option value="<?=$country['ID']?>"><?=htmlspecialchars($country['NAME'])?></option>
						<?php endif;?>
					<?php endforeach;?>
				</select>
			</div>
		</div>
		<div class="form-group flex-row row">
			<label for="tour_price" class="col-sm-2 col-form-label">Цена</label>
			<div class="col-sm-10">
				<input type="text" id="tour_price" name="tour_price" class="form-control" value="<?= htmlspecialchars($data['TOUR']['PRICE'])?>">
			</div>
		</div>
		<div class="form-group flex-row row">
			<label for="tour_description" class="col-sm-2 col-form-label">Описание</label>
			<div class="col-sm-10">
				<textarea name="tour_description" id="tour_description" class="form-control"><?=htmlspecialchars($data['TOUR']['DESCRIPTION'])?></textarea>
			</div>
		</div>

		<input type="submit" class="btn btn-primary" value="Сохранить">
	</form>
</div>
