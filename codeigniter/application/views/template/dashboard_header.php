<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url('3rdparty/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">

  <!--load datatables css -->
  <link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"  rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="<?=base_url('3rdparty/bootstrap/dist/css/dashboard.css')?>" rel="stylesheet">

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Jquery -->
  <script src="<?=base_url('3rdparty/jquery-2.1.4.js')?>" ></script>
  <script src="<?=base_url('3rdparty/bootstrap/dist/js/bootstrap.js')?>" ></script>
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" ></script>
  
  <script>
    $(document).ready(function(){
      $('#example').DataTable();
    });
  </script>

</head>

<body>