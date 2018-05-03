<h2><?php echo $title ?></h2>
<div class="other-block">
    <div class="container-fluid bg-light py-3">

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_open(); ?>

        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control" name="username" value="" placeholder="Enter your username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" value="" name="password" placeholder="Enter your password">
        </div>
        <div class="form-group">
            <button type="submit" name="register" class="btn btn-success btn-lg">Register</button>
        </div>
    </div>
</div>
