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