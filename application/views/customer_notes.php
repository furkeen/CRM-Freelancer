
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
        <?php foreach($notes as $value): ?>
            <div class="col-md-4">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <strong class="card-title">#<?php echo $value['note_id'];?> Note 
                            <small><a href="<?php echo URL; ?>post/deletenote/<?php echo $value['note_id']; ?>" class="badge badge-danger float-right mt-1 mx-2">Delete</a></small>
                            <small><div style="cursor:pointer" href="" class="badge badge-primary float-right mt-1 mx-2 edit-btn">Edit</div></small>
                            <small><span class="badge badge-success float-right mt-1"><?php echo $value['note_date']; ?></span></small>
                        </strong>
                    </div>
                    <div class="card-body note-info">
                        <p class="card-text"><?php echo $value['note_content']; ?></p>
                    </div>
                    <div class="card-body edit-form">
                        <form action="<?php echo URL; ?>post/editNote/<?php echo $customer_id; ?>" method="post">
                            <textarea name="note_content" id="content" cols="30" rows="10" class="form-control"><?php echo $value['note_content']; ?></textarea>
                            <input type="hidden" name="note_id" value="<?php echo $value['note_id']; ?>">
                            <button type="submit" class="btn btn-primary form-control my-2">EDIT</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
            <div class="col-md-4">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <strong class="card-title">Add New Note</strong>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo URL; ?>post/addNote/<?php echo $customer_id; ?>" method="post">
                            <textarea name="note_content" id="content" cols="30" rows="10" class="form-control"></textarea>
                            <button type="submit" class="btn btn-success form-control my-2">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function () {
    jQuery('.edit-form').hide();
    jQuery('.edit-btn').click(function (e) { 
        console.log('editleme');
        jQuery(this).parents('.card').children('.edit-form').slideToggle(500);
        jQuery(this).parents('.card').children('.note-info').slideToggle(800);
        
    });
});
</script>