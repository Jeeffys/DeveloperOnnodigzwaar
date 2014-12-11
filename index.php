<?php
    require 'lib/Kerntaken.php';
    require 'lib/Page.php';
    require 'lib/pageFetcher.php';
    include 'lib/functions.php';

    include 'lib/Proef.php';
    include 'lib/Kerntaak.php';
    include 'lib/Werkproces.php';
    require 'lib/Competentie.php';
    require 'lib/Vaardigheid.php';

    $objKerntaken = new Kerntaken;
    $objKerntaken->haalAlleKerntakenOp();

    $pageFetcher = new PageFetcher($objKerntaken);
        $pageFetcher->setSource(
        ( isset ( $_GET['page'] ) ? $_GET['page'] : 'home' )
        );
    $page = $pageFetcher->fetch();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $page->getTitle() ?></title>
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
          	<a href="index.php?page=Proeve" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kerntaken<span class="caret"></span></a>
	          	<ul class="dropdown-menu" role="menu">
                <?php foreach($objKerntaken->alleKerntaken()['kerntaken'] as $kerntaken){ ?>
                    <?php foreach($kerntaken as $kerntaak){ ?>   
                       <li><a href="index.php?page=proeve&title=<?=slugify($kerntaak['@attributes']['titel'])?>">Kerntaak <?=$kerntaak['@attributes']['volgnummer']?>. <?=$kerntaak['@attributes']['titel']?></a></li>
                    <?php } ?>
                <?php } ?>
	          	</ul>
        	</li>         
            <li><a href="index.php?page=contact">Contact</a></li>
            <li><a href="index.php?page=dashboard">Dashboard</a></li>
        </ul>

        <h3 class="text-muted">Proeve van Bekwaamheid</h3>
      </div>

      <?php echo $page->getContent() ?>

      <div class="footer">
        <p>&copy; onnodigzwaar.nl | 2014-2015</p>
      </div>

    </div> <!-- /container -->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>
