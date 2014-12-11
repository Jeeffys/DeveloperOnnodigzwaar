<h1>Kerntaken</h1>

<?php foreach($kerntaken as $proef) { ?>
	<h2><?=$proef->titel ?></h2>

	<?php foreach($proef->kerntaken() as $kerntaak) { ?>
		<h3><?=$kerntaak->titel?></h3>
			<br />

		<?php foreach($kerntaak->werkprocessen() as $werkproces) { ?>
			<h4>Werkproces <?=$werkproces->volgnummer ?>. <?=$werkproces->titel ?> (<?=$werkproces->referentie?>)</h4>

			<?php foreach($werkproces->competenties() as $competentie) { ?>
				<h5><?=$competentie->code ?>: <?=$competentie->titel?> (<?=$competentie->referentie ?>)</h5>

				<?php foreach($competentie->vaardigheden() as $vaardigheid) { ?>
					<h6><?=$vaardigheid->titel ?> (<?=$vaardigheid->referentie ?>)</h6>
				<?php } ?>

				<br />
			<?php } ?>
		<?php } ?>
	<?php } ?>
<?php } ?>