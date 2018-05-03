<?php if (isset($this->session->user['logged'])) {
    header('location:https://localhost/project_CI/index.php/login/login');
}
?>

<h2><?php echo $title ?></h2>
<div class="other-block">
    <div class="container-fluid bg-light py-3">
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control" name="username" value="" placeholder="Enter your username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" value="" class="form-control" placeholder="Enter your password">
        </div>
        <button type="submit" name="login" class="btn btn-success btn-lg">Login</button>
    </div>
</div>
