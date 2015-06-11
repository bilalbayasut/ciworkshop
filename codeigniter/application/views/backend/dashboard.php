<!-- header -->
<?=$header?>
<?php
$user_info=array();
$user_info=$this->session->all_userdata();
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">CI Workshop</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">
          Selamat Datang, <?=$user_info['user_firstname']?>&nbsp;<?=$user_info['user_lastname']?></a></li>
          <li><a href="<?=base_url('login/doLogout')?>">Log out</a></li>
        </ul>

      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li class=""><a href="<?=site_url('backend/dashboard')?>">Dashboard <span class="sr-only">(current)</span></a></li>
          <li class=""><a href="<?=site_url('backend/dashboard/manage_user')?>">Manage User <span class="sr-only">(current)</span></a></li>

          <li><a href="#">Log Out</a></li>

        </ul>

      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <div class="row">
         <div class="col-md-12 ">
           <?php

           if($this->session->flashdata('login_success')!='')
           {
            ?>
            <div class="alert alert-success" role="alert">
              <?=$this->session->flashdata('login_success')?></div>
              <?php
            }
            ?>
          </div>
        </div>
          <!-- content start -->
        <div id="content">
          <?=$content?>
        </div>
        <!-- content ends-->
      </div>
    </div>
  </div>
  <!-- footer -->
  <?=$footer?>
