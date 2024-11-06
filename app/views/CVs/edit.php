<?php require APPROOT . '/views/includes/header.php'; require APPROOT . '/views/includes/navbar.php'; ?>
<div class="my-5">
    <div class="container">
    <a href="<?php echo URLROOT . '/cvs/show/' . $_SESSION['curID'] . '/#ln' . $data['miniCvId']; ?>" class="btn btn-secondary mb-3"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
        <div class="card card-body bg-light">
            <h2 class="card-title">Add To Your CV</h2>
            <p>Fill this form to add a new achievment to your cv</p>
            <form action="<?php echo URLROOT . '/cvs/edit/' . $data['miniCvId']; ?>" method="POST">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : '' ?>" name="title" id="title" placeholder="ex: name of the job / company / ... etc" value="<?php echo isset($data['title']) ? $data['title'] : ''; ?>" autocomplete="off">
                    <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" rows="8" class="form-control <?php echo (!empty($data['content_err'])) ? 'is-invalid' : '' ?>" placeholder="more info about this job"><?php echo isset($data['content']) ? $data['content'] : ''; ?></textarea>
                    <span class="invalid-feedback"><?php echo $data['content_err']; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>