<?php require APPROOT . '/views/includes/header.php';?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
        <a class="navbar-brand" href="#"><h2><?php echo SITENAME; ?></h2></a>
    </nav>
    <div class="container">
        <div class="col-md-6 mx-auto my-5">
            <div class="card card-body bg-light">
                <h2 class="text-center">Sign In</h2>
                <p class="text-center">Please Enter Your Information To Login</p>
                <div class="alert alert-danger text-center"><?php echo $data['login_err']; ?></div>
                <form action="<?php echo URLROOT;?>/users/login" method="POST">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control  <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" placeholder="Your Email" value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-lock"></i>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control  <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" placeholder="Your Password">
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="remember_me" name="remember_me" <?php echo ($data['remember_me'] == 'on') ? 'checked' : '' ?> >
                        <label class="custom-control-label" for="remember_me">Remember Me</label>
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary btn-block my-3">
                    <hr>
                    <div class="form-group text-center">
                    <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-success btn-block mt-4">No Account? Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>