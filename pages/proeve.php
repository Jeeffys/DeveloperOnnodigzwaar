<div class="row">
  <div class="col-md-12">
  <div class="panel panel-primary">
	  <div class="panel-heading"><h2><?php echo $title ?></h2></div>
	  		<div class="panel-body">
	  			<table class="table">
	  				<tr>
  						<th>Werkproces</th>
  						<th></th>
  					</tr>

            <?php foreach($viewWerkprocessen as $werkproces) { ?>
  					<tr>
  						<td> Werkproces <?=$werkproces->volgnummer?>. <?=$werkproces->titel?> </td>
  						<td><a href="#">Beoordelen</a></td>
  					</tr>
            <?php } ?>
				</table>
	  		</div>
	  </div>
  </div>
</div>