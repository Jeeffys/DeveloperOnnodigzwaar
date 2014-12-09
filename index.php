<?php
  // test
	include 'lib/index_functions.php';
	$index = new Index;
	$page = $index->get('page');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $index->get_pageTitle($page); ?></title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:700' rel='stylesheet' type='text/css'>
  </head>

  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="index.php">Home</a></li>
          <li class="dropdown">
          	<a href="index.php?page=Proeve" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kerntaaken<span class="caret"></span></a>
	          	<ul class="dropdown-menu" role="menu">
		            <li><a href="index.php?page=Proeve&id=1">Kerntaak 1. (Ontwerpen van de applicatie, (cross)media-uiting of game) </a></li>
		            <li><a href="index.php?page=Proeve&id=2">Kerntaak 2. (Realiseren van de applicatie, (cross)media-uiting of game)</a></li>
		            <li><a href="index.php?page=Proeve&id=3">Kerntaak 3. (Implementeren van de applicatie of (cross)media-uiting)</a></li>
		            <li><a href="index.php?page=Proeve&id=4">Kerntaak 4. (Onderhouden en beheren van de applicatie, (cross)media-uiting of game)</a></li>
	          	</ul>
        	</li>         
        	<li><a href="index.php?page=contact">Contact</a></li>
        </ul>

        <h3 class="text-muted">Proeve van bekwaamheid</h3>
      </div>

      <?php $index->get_content($page); ?>

      <div class="footer">
        <p>&copy; onnodigzwaar.nl | 2014-2015</p>
      </div>

    </div> <!-- /container -->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>
