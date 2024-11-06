<?php require APPROOT . '/views/includes/header.php'; require APPROOT . '/views/includes/navbar.php'; ?>

<div class="my-5">
    <div class="container bg-light p-4">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="nav flex-column nav-pills">
                    <a href="<?php echo URLROOT . '/users/me' ?>" class="nav-link">Me</a>
                    <a href="<?php echo URLROOT . '/users/profile' ?>" class="nav-link active">Profile</a>
                    <a href="<?php echo URLROOT . '/users/account' ?>" class="nav-link">Account</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- profile -->
                    <div class="card">
                        <div class="card-header text-white bg-dark"><h4><?php echo $data['pageTitle']; ?></h4></div>
                        <div class="card-body">
                            <form action="<?php echo URLROOT . '/users/profile' ?>" method="POST">
                                <div class="form-group">
                                    <i class="far fa-id-badge"></i>
                                    <label for="fullname">Fullname:</label>
                                    <input class="form-control <?php echo (!empty($data['fullname_err'])) ? 'is-invalid' : ''; ?>" id="fullname" type="text" value="<?php echo $data['fullname']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['fullname_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-university"></i>
                                    <label for="education">Education:</label>
                                    <input class="form-control  <?php echo (!empty($data['education_err'])) ? 'is-invalid' : ''; ?>" id="education" type="text" value="<?php echo $data['education']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['education_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <i class="<?php echo $data['countryIcon']; ?>"></i>
                                    <label for="country">Country:</label>
                                    <select class="custom-select <?php echo (!empty($data['country_err'])) ? 'is-invalid' : ''; ?>">
                                        <option selected>Open this select menu</option>
                                        <?php foreach($data['countries'] as $country): ?>
                                        <option value="<?php echo $country->id; ?>"><?php echo $country->country_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="invalid-feedback"><?php echo $data['country_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <i class="far fa-images"></i>
                                    <label for="country">Profile Picture:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose File</label>
                                        <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
                                    </div>
                                </div>
                                <div class="form-group" id="gender-radio">
                                    <label for="country"><i class="fas fa-venus-mars"></i> Gender:</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input <?php echo (!empty($data['gender_err'])) ? 'is-invalid' : ''; ?>" id="male" name="gender" value="Male" required>
                                        <label class="custom-control-label" for="male"><i class="fas fa-mars <?php echo (!empty($data['gender_err'])) ? 'icon-invalid' : ''; ?>" style="color:#54a0ff;"></i> Male</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input <?php echo (!empty($data['gender_err'])) ? 'is-invalid' : ''; ?>" id="female" name="gender" value="Female" required>
                                        <label class="custom-control-label" for="female"><i class="fas fa-venus <?php echo (!empty($data['gender_err'])) ? 'icon-invalid' : ''; ?>" style="color:#ff9ff3;"></i> Female</label>
                                    </div>
                                    <input type="hidden" class="form-control <?php echo (!empty($data['gender_err'])) ? 'is-invalid' : ''; ?>">
                                    <span class="invalid-feedback"><?php echo $data['gender_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Save">
                                    <a href="#" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end profile -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>