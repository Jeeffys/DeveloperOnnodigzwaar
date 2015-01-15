<?php
ini_set('display_errors', E_ALL);
error_reporting(E_ALL);

function debug($array) {
	return '<pre>'. print_r($array, true) .'</pre>';
}

$xmlstring = file_get_contents('mediadeveloper.xml');
$xml = simplexml_load_string($xmlstring);
$json = json_encode($xml);
$array = json_decode($json, true);

?>

<h1>Mediadeveloper</h1>

<h2>Kerntaken</h2>

<?php foreach($array['kerntaken'] as $kerntaken): ?>
	<?php foreach($kerntaken as $kerntaak): ?>		
		<h3>Kerntaak <?=$kerntaak['@attributes']['volgnummer']?>. <?=$kerntaak['@attributes']['titel']?> </h3>

		<?php foreach($kerntaak['werkprocessen'] as $werkprocessen): ?>
			<?php foreach($werkprocessen as $werkproces): ?>

				<fieldset>
					<legend><h4>Werkproces <?=$werkproces['@attributes']['volgnummer'] ?>: <?=$werkproces['@attributes']['titel']?> (<?=$werkproces['@attributes']['referentie']?>)</h4></legend>

					<?php foreach($werkproces['competenties'] as $competenties): ?>
						<ul>
						<?php foreach($competenties as $competentie): ?>
							<li>
								Competentie <?=$competentie['@attributes']['code']?>: <u><?=$competentie['@attributes']['titel'] ?></u>:

								<br /><strong>Vaardigheden</strong>
								<ol>
									<?php foreach($competentie['vaardigheden'] as $vaardigheden): ?>
										<?php foreach($vaardigheden as $vaardigheid): ?>
											<li><?=$vaardigheid['@attributes']['titel']?> (<?=$vaardigheid['@attributes']['referentie'] ?>)</li>

										<?php endforeach ?>
									<?php endforeach ?>
								</ol>
								<br />
							</li>
						<?php endforeach ?>
						</ul>
					<?php endforeach ?>
				</fieldset>

			<?php endforeach ?>
		<?php endforeach ?>
		<br />
			<br />
				<br />
	<?php endforeach ?>
<?php endforeach ?>