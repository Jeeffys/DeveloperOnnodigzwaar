<?php foreach($this->kerntaken->haalVoorId('1') as $proef) { ?>
	<h2><?=$proef->titel ?></h2>

	<?php foreach($proef->kerntaken() as $kerntaak) { ?>
		<h3><?=$kerntaak->titel?></h3>
			<br />

		<?php foreach($kerntaak->werkprocessen() as $werkproces) { ?>
			<h4>Werkproces <?=$werkproces->volgnummer ?>. <?=$werkproces->titel ?> (<?=$werkproces->referentie?>)</h4>

			<?php foreach($werkproces->competenties() as $competentie) { ?>
				<h5><?=$competentie->code ?>: <?=$competentie->titel?> (<?=$competentie->referentie ?>)</h5>

				<!--
					<br />
				<h4>Vaardigheden</h4>
				<?php foreach($competentie->vaardigheden() as $vaardigheid) { ?>
					<h6><?=$vaardigheid->titel ?> (<?=$vaardigheid->referentie ?>)</h6>
				<?php } ?>-->

				<h5>Indicator</h5>
				<?php echo $competentie->indicator()->indicator ?>

				<br />
				<br />
			<?php } ?>
		<?php } ?>
	<?php } ?>
<?php } ?>

<form method="POST">
	<br>
	<br>
	<p>Bewijs: <input type="text" name="bewijs"></p>
	<br>
	<br>
	<p>Beoordelingscriterium</p><br>
	<select name="beoordeling_indicator_1">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select>
	<input type="text" name="beoordeling_criterium_1" placeholder="Vul criterium in..." /> <br>

	<select name="beoordeling_indicator_2">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select>
	<input type="text" name="beoordeling_criterium_2" placeholder="Vul criterium in..." /> <br>

	<select name="beoordeling_indicator_3">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select>
	<input type="text" name="beoordeling_criterium_3" placeholder="Vul criterium in..." />
	<br>
	<br>

	<p>Het product van de kandidaat voldoet aan de volgende eisen:</p><br>
	<select name="eis_indicator_1">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select>
	<input type="text" name="eis_criterium_1" placeholder="Vul criterium in..." /> <br>

	<select name="eis_indicator_2">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select>
	<input type="text" name="eis_criterium_2" placeholder="Vul criterium in..." /> <br>

	<select name="eis_indicator_3">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select>
	<input type="text" name="eis_criterium_3" placeholder="Vul criterium in..." /> <br>
</form>