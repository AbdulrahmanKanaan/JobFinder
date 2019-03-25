<?php require APPROOT . '/views/includes/header.php'; require APPROOT . '/views/includes/navbar.php'; ?>

<div class="my-5">
    <div class="container">
        <?php flash('cv_add'); ?>
        <?php flash('cv_edit'); ?>
        <?php flash('edit_err'); ?>
        <div id="cv_delete"></div>
        <!-- Profile Card -->
        <div class="card">
            <div class="card-header bg-info"><h4><?php echo $data['fullname']; ?></h4></div>
            <div class="card-body">
                <div class="row">
                    <div class='col-md-3'>
                        <img src="http://colegioclassea.com.br/wp-content/themes/PageLand/assets/img/avatar/avatar.jpg" class="mx-auto my-3" style="width:100%">
                    </div>
                    <div class='col-md-9'>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td><strong>Education: </strong></td>
                                    <td><?php echo $data['edu']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Nationality: </strong></td>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- / Profile Card -->
        <!-- CV cards -->
        <h4 class='card card-body bg-info'>Experience</h4>
        <div id="cards">
            <?php foreach ($data['miniCVs'] as $miniCV): ?>
                <div class="media border p-3 my-2 bg-light" id="ln<?php echo $miniCV->ID; ?>">
                    <img src="https://cdn0.iconfinder.com/data/icons/shopping-online-and-e-commerce/100/shop57-512.png" alt="Job" class="mr-3 my-auto rounded-circle border" style="width:75px;">
                    <div class="media-body" style="overflow: hidden;">
                        <h4><?php echo $miniCV->title; ?></h4>
                        <p style="white-space: pre-wrap;"><?php echo $miniCV->content; ?></p>
                        <?php if ($_SESSION['curID'] == $data['ID']): ?>
                        <div class="btn-group">
                            <a href="<?php echo URLROOT . '/cvs/edit/' . $miniCV->ID ?>" class="btn btn-success"><i class="far fa-edit"></i> Edit</a>
                            <input type="hidden" class="hiddenId" value="<?php echo $miniCV->ID; ?>" disabled>
                            <button type="button" class="btn btn-danger delete_modal" data-toggle="modal" data-target="#deleteModal"><i class="far fa-trash-alt"></i> Delete</button>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        Are You Sure You Want To Delete This Mini CV?
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="deleteMiniCv();" data-dismiss="modal"><i class="fa fa-check"></i> Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($_SESSION['curID'] == $data['ID']): ?>
        <a href="<?php echo URLROOT . '/cvs/add' ?>" class="btn btn-primary my-2"><i class="fa fa-plus"></i> Add New</a>
        <?php endif; ?>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>