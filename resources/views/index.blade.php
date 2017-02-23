<?php
 
// Make sure SimplePie is included. You may need to change this to match the location of autoloader.php
// For 1.0-1.2:
 
#require_once('../simplepie.inc');
// For 1.3+:
require_once('php/autoloader.php');
 
// We'll process this feed with all of the default options.
$feed = new SimplePie();
 
// Set the feed to process.
$feed->set_feed_url('http://www.panoramacomerc.com.br/?feed=rss2');
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
 
// Let's begin our XHTML webpage code.  The DOCTYPE is supposed to be the very first thing, so we'll keep it on the same line as the closing-PHP tag.
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Comerc: Projeto Experimental</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/sticky-footer.css" rel="stylesheet">
  </head>

  <body>

    <!-- Begin page content -->
    <div class="container">
	    <div>
			    <div class="col-xs-12 col-sm-4 col-md-4" style="width: 65%;">
			        <div class="bloco">
			            <h2><a style="color: #7485f6; font-family: 'NeoSansStdRegular','Ropa Sans', sans-serif;" target='_blank' href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title(); ?></a></h2>
		<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	foreach ($feed->get_items() as $item):
	?>
		<div class="container_bloco_rss">
            <div class="bloco_rss">
                <h4><?php echo $item->get_title(); ?></h4>
				<p><?php echo $item->get_description(); ?></p>
				<p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
	        </div>
	        <button class="veja-mais-home" onclick="window.open('<?php echo $item->get_permalink();?>');return false;" <img src="http://www.comerc.com.br/comerc/images/icones/seta.gif" alt="seta" class="img"> Veja Mais</button>
        </div>
	<?php endforeach; ?>
	<div style="clear: both;"></div>
			        </div>
			    </div>
			     <div class="col-xs-12 col-sm-4 col-md-4" style="margin-top: 5%;">
		            <div class="bloco">
		                <iframe frameborder="0" allowtransparency="yes" scrolling="no" width="300" height="200" src="http://www.tempoagora.com.br/ta-widgets?cidades=SaoPaulo-SP&amp;tipo=horizontal"></iframe>
		            </div>
			    </div>
		    </div>
    </div>
    </div>
    <footer class="footer">
      	<div class="container">
	      <div class="container-fluid">
	        <div class="row">
	            <div class="col-xs-12 col-sm-4 col-md-4" style="background-color:#d8daee; height:16px;"></div>
	            <div class="col-xs-12 col-sm-8 col-md-8" style="background-color:#e1e4f5; height:16px;"></div>
	        </div>
	       </div>
			<div class="container-fluid">
			        <div class="row" style="background-color:#dee1f7;">
			            <div class="col-xs-12 col-sm-4 col-md-4" style="background-color:#dee1f7; height:74px;">   <h4><img src="http://www.comerc.com.br/comerc/images/logoComerc.gif" alt="COMERC"></h4>
			            </div>
			            <div class="col-xs-12 col-sm-8 col-md-8" style="background-color:#e9ecff; height:74px;">   
			                <div class="row">
			                    <div class="col-xs-12 col-sm-3 col-md-3">
			                        <div id="clockDiv" style="color:#7b7e95;"></div>
			                    </div>
			                </div>
			            </div>
			        </div>
			  </div>
		</div>
    </footer>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
		function clock() {
		   var now = new Date();
		   now.getHours() < 10 ? (hours = '0'+ now.getHours()) : hours = now.getHours();
		   now.getMinutes() < 10 ? (minutes = '0'+ now.getMinutes()) : minutes = now.getMinutes();
		   now.getSeconds() < 10 ? (seconds = '0'+ now.getSeconds()) : seconds = now.getSeconds();
		   var outStr = hours+':'+minutes+':'+seconds;
		   document.getElementById('clockDiv').innerHTML= '<h3>' + outStr + '</h3>';
		   setTimeout('clock()',1000);
		}
	clock();
</script>
  </body>
</html>
