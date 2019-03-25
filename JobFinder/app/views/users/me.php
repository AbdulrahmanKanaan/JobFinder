<?php require APPROOT . '/views/includes/header.php'; require APPROOT . '/views/includes/navbar.php'; ?>

<div class="my-5">
    <div class="container bg-light p-4">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="nav flex-column nav-pills">
                <a href="<?php echo URLROOT . '/users/me' ?>" class="nav-link active">Me</a>
                    <a href="<?php echo URLROOT . '/users/profile' ?>" class="nav-link">Profile</a>
                    <a href="<?php echo URLROOT . '/users/account' ?>" class="nav-link">Account</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- profile -->
                    <div class="card">
                        <div class="card-header text-white bg-dark"><h4><?php echo $data['pageTitle']; ?></h4></div>
                        <div class="card-body">
                            <div class="row justify-content-md-center">
                                <div class="col" style="max-width: 360px; max-height: 360px;">
                                    <img src="https://via.placeholder.com/2048x1024" class="mx-auto d-block my-3 img-thumbnail img-fluid">
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td><strong>ID: </strong></td>
                                            <td><?php echo $data['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Fullname: </strong></td>
                                            <td><?php echo $data['fullname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Education: </strong></td>
                                            <td><?php echo $data['edu']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Country: </strong></td>
                                            <td><?php echo $data['nat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email: </strong></td>
                                            <td><?php echo $data['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone Number: </strong></td>
                                            <td><?php echo $data['phone_number']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Birth Date: </strong></td>
                                            <td><?php echo $data['birth_date']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Gender: </strong></td>
                                            <td><?php echo $data['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Shareable: </strong></td>
                                            <td><?php echo ($data['shareable']) ? 'Yes': 'No'; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Created At: </strong></td>
                                            <td><?php echo $data['created_at']; ?></td>
                                        </tr>
                                    </table>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- end profile -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>