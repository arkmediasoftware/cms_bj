<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Balconies Jakarta</title>
    <meta name="description" content="Balconies Jakarta"/>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
    <!-- Loading Bootstrap -->
    <link href="<?php echo base_url('asset') ?>/dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="<?php echo base_url('asset') ?>/dist/css/flat-ui.css" rel="stylesheet">
    <link href="<?php echo base_url('asset') ?>/dist/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('asset') ?>/dist/css/colorbox.css" rel="stylesheet">
    <link href="<?php echo base_url('asset') ?>/dist/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url('asset') ?>/dist/css/jquery.dataTables_themeroller.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.4.5/styles.min.js">

    <link rel="shortcut icon" href="<?php echo base_url('asset') ?>/img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="dist/js/vendor/html5shiv.js"></script>
      <script src="dist/js/vendor/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo base_url('asset') ?>/dist/js/vendor/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.5.1/basic/ckeditor.js"></script>
    
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-4X-TOTtdNFy52CEYe-DytzWv7caEWlk">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: { lat: -34.397, lng: 150.644},
          zoom: 8
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
  <div class="container">