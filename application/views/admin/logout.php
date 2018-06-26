<h1><?php echo $title; ?></h1>

<a href="<?php echo base_url('index.php'); ?>" class="btn btn-warning btn-lg" role="button">Home</a>
<?php echo $this->session->flashdata('error') ?>