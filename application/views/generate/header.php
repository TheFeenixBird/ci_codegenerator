<!DOCTYPE html>

<!-- Cross-Origin Request -->
<?php header("Access-Control-Allow-Origin: *");?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA Compatible" content="IE-Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title ?></title>

        <!-- BOOTSTRAP && CSS -->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style1.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Quicksand|Raleway" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300" rel="stylesheet">

<div class="nav-scroller py-1">
    <nav class="nav d-flex justify-content-center fixed-top bg-light">
        <a class="nav-link" href="<?php echo base_url('index.php/admin/logout'); ?>">Logout</a>
    </nav>
</div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('input').on('change', function () {
                    var input = $('input[type=radio][name=input][id=input]:checked').val();

                    $.ajax({
                    url: "<?php echo base_url('/index.php/generate/manageInput')?>",
                    method: 'POST',
                    data: 'input=' + input,
                    dataType: 'html',
                    success: function (data) {
                        $('#inputDiv').html(data);
                    },
                    error: function (){
                        $('#inputDiv').html('<div class="alert alert-danger" role="alert">Error</div>');
                    }
                    })
                  })
            })
        </script>
      </head>

      <body>
