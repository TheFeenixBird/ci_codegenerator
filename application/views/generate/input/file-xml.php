<!--
<script type='text/javascript'>
$(document).ready(function(){
    $('#formUpload').submit(function(e){
        e.preventDefault();

        // Reqûete Ajax / Envoi
        $.ajax({
            type:"POST",
            url:'<?php //echo base_url();?>/generate/do_upload', // upload function
            data:new FormData(this),// form data
            processData:false, //stop data process
            contentType:false,
            cache:false,
            async: true,
            success: function(data){
              alert(data);
            }, error: function(data){
             alert('not working', data);
            }
        });
    });
});
</script>
-->

<script type='text/javascript'>
$(document).ready(function(e)
{
    $('#formUpload').on( 'submit', function(e)
    {
    e.preventDefault(); // Stop current ajax request

        // Creates form data / values
        var formData = new FormData($(this)[0]);

        // Reqûete Ajax / Envoi
        $.ajax({
            url:'<?php echo base_url();?>input/do_upload', // upload function
            data: formData,// form data
            type:"POST",
            processData:false,
            contentType:false,
            cache:false,
            success: function(data)
            {
              //$('#inputDiv').html('<div class="alert alert-success">Succesfully uploaded</div>');
              // Check if file is uploaded by checking data value
              if(data ==  '1')
              {
                $('#messageDiv').html('<div class="alert alert-success">Succesfully uploaded to folder and database</div>');
                setTimeout("window.location.href = '<?php echo base_url(); ?>';", 2000);
              } else {
                $('#messageDiv').html('<div class="alert alert-danger">All fields must be completed / Title must be at least 3 letters long</div>');
              }
            }, error: function(data)
            {
             $('#messageDiv').html('<div class="alert alert-danger">Ajax call failed</div>');
            }
        });

    });
});
</script>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<form method="post" id="formUpload" enctype="multipart/form-data">
    <div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="Title">
    </div>
    <div class="form-group">
        <label for="userfile">Upload File</label>
        <input id="userfile" class="form-control-file" type="file" name="userfile">
    </div>
    <button id="submit" class="btn btn-dark" name="submit" type="submit" value="">Upload
    </button>
</form>
