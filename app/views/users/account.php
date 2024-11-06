<?php require APPROOT . '/views/includes/header.php'; require APPROOT . '/views/includes/navbar.php'; ?>

<div class="my-5">
    <div class="container bg-light p-4">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="nav flex-column nav-pills">
                <a href="<?php echo URLROOT . '/users/me' ?>" class="nav-link">Me</a>
                    <a href="<?php echo URLROOT . '/users/profile' ?>" class="nav-link">Profile</a>
                    <a href="<?php echo URLROOT . '/users/account' ?>" class="nav-link active">Account</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                <div class="card">
                        <div class="card-header text-white bg-dark"><h4><?php echo $data['pageTitle']; ?></h4></div>
                        <div class="card-body">
                            <form action="<?php echo URLROOT . '/users/profile' ?>" method="POST">
                                <div class="form-group">
                                    <i class="far fa-envelope"></i>
                                    <label for="email">Email:</label>
                                    <input class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="email" type="email" value="<?php echo $data['email']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-mobile-alt"></i>
                                    <label for="phone_number">Phone Number:</label>
                                    <input class="form-control  <?php echo (!empty($data['phone_number_err'])) ? 'is-invalid' : ''; ?>" id="phone_number" type="text" value="<?php echo $data['phone_number']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['phone_number_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <i class="<?php echo $data['birthDateIcon']; ?>"></i>
                                    <label for="birth_date">Birth Date:</label>
                                    <!-- commented -->
                                    <!-- <input class="form-control  <?php echo (!empty($data['birth_date_err'])) ? 'is-invalid' : ''; ?>" id="birth_date" type="text" value="<?php echo $data['birth_date']; ?>"> -->
                                    <!-- commented -->
                                    <!-- start -->
                                    <div class="row">
                                        <label for="b_day" class="col">Day:</label>
                                        <label for="b_month" class="col">Month:</label>
                                        <label for="b_year" class="col">Year:</label>
                                    </div>
                                    <div class="form-group row px-3">
                                        <select id="b_day" name="b_day" class="custom-select col mx-1" required>
                                        </select>
                                        <select id="b_month" name="b_month" class="custom-select col mx-1" required>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">May</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Aug</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                        </select>
                                        <select id="b_year" name="b_year" class="custom-select col mx-1" required>
                                            
                                        </select>
                                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                                    </div>
                                    <!-- end -->
                                    <span class="invalid-feedback"><?php echo $data['birth_date_err']; ?></span>
                                </div>
                                <button type="button" id="pwdFlagButton" class="btn btn-info btn-block mb-3" data-toggle="collapse" data-target="#pwdChange">Change Password:</button>
                                <div id="pwdChange" class="collapse form-group">
                                    <i class="fa fa-key"></i>
                                    <label for="password">Password:</label>
                                    <input type="hidden" value="0" id="pwdFlag" name="pwdFlag">
                                    <input type="hidden" value="<?php /* echo hashed pass */ ?>" name="hPassword">
                                    <input type="password" class="form-control mb-1" name="oldPassword" id="oldPassword" autocomplete="new-password" placeholder="Old Password" >
                                    <input type="password" class="form-control mb-1" name="newPassword" id="newPassword" autocomplete="new-password" placeholder="New Password" >
                                    <input type="password" class="form-control mb-1" name="confirmNewPassword" id="confirmNewPassword" autocomplete="new-password" placeholder="Confirm New Password" >
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Save">
                                    <a href="#" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>