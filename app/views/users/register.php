<?php require APPROOT . '/views/includes/header.php';?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
        <a class="navbar-brand" href="#"><h2><?php echo SITENAME; ?></h2></a>
    </nav>
    <div class="container">
        <div class="col-md-6 mx-auto my-5">
            <div class="card card-body bg-light">
                <h2 class="text-center">Create A New Account</h2>
                <p class="text-center">Please Fill This Form To Join Us</p>
                <form action="<?php echo URLROOT;?>/users/register" method="POST">
                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : '' ?>" placeholder="Your Username" autocomplete="off" value="<?php echo $data['username']; ?>" required>
                        <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-id-card"></i>
                        <label for="fullname">Fullname:</label>
                        <input type="text" name="fullname" id="fullname" class="form-control  <?php echo (!empty($data['fullname_err'])) ? 'is-invalid' : '' ?>" placeholder="Your Fullname" autocomplete="off" value="<?php echo $data['fullname']; ?>" required>
                        <span class="invalid-feedback"><?php echo $data['fullname_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control  <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" placeholder="Your Email" autocomplete="off" value="<?php echo $data['email']; ?>" required>
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-lock"></i>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control  <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" placeholder="Your Password" autocomplete="new-password" required>
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-lock"></i>
                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control  <?php echo (!empty($data['cpassword_err'])) ? 'is-invalid' : '' ?>" placeholder="Rewrite Your Password" autocomplete="new-password" required>
                        <span class="invalid-feedback"><?php echo $data['cpassword_err']; ?></span>
                    </div>
                    <input type="submit" value="Register" class="btn btn-success btn-block">
                    <hr>
                    <div class="form-group text-center">
                        <span>already have an account? <a href="<?php echo URLROOT; ?>/users/login">Sign In</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>