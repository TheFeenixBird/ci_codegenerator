<div class="title"><h1><?php echo $title ?></h1></div>


<div class="mid-middle-block">
    <div class="container-fluid bg-light py-3">
        <?php echo $this->session->flashdata('success'); ?>
        <?php echo $this->session->flashdata("error") ?>
        <?php echo $this->session->flashdata("session_success") ?>


        <?php if (validation_errors()) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            </div>
        <?php endif; ?>

        <?php echo form_open(); ?>
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Enter your username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password">
        </div>
        <button type="submit" name="login" class="btn btn-dark btn-lg">Login</button>
        <?php echo $this->session->flashdata("logout_button") ?>
    </div>
</div>
