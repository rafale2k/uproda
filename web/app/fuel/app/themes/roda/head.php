  <meta charset="utf-8">
  <title><?php echo $title ?></title>
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<style amp-custom>
  <?php echo file_get_contents(dirname(__FILE__).'/assets/css/style.css'); ?>
	</style>
  <link rel="icon" href="favicon.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<?php if (isset($jsonld)) echo $jsonld; ?>
