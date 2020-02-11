<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Basic Settings</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-3">Currency Symbol</div>
                        <div class="form-group col-lg-6">
                            <input type="text" name="currency" id="currency" class="form-control" value="<?php echo $currency ?>">
                        </div>
                        <div class="form-group col-lg-3">
                           <button type="submit" id="buttoncurrency" class="btn btn-success form-control">SAVE</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-lg-9">Reset All Data (Please Be Carrefull)</div>
                        <div class="form-group col-lg-3">
                           <a href="<?php echo URL; ?>post/deleteAllData" id="buttonreset" class="btn btn-danger form-control">SURE?</a>
                           <div id="buttonreset2" class="btn btn-danger form-control">RESET</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">
                            User Management
                            <div class="btn btn-success pull-right" id="btn-user-add"><i class="fa fa-plus"></i></div>
                        </strong>
                    </div>
                    <form action="<?php echo URL; ?>post/addUser" method="post">
                        <div class="card-body useraddform">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="form-label">User Name</label>
                                    <input type="text" required name="username" id="user" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-label">Password</label>
                                    <input type="password" required name="passworld" id="pass" class="form-control">
                                </div>
                                <div class="form-group col-lg-12 text-center">
                                    <button type="submit" class="btn btn-success">ADD</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body userlist">
                        <?php foreach($user_list as $value): ?>
                            <form action="<?php echo URL; ?>post/editUser/<?php echo $value['user_id']; ?>" method="post">
                                <div class="row">
                                    <div class="form-group col-lg-5">
                                        <label for="username" class=" form-control-label">User Name</label>
                                        <input type="text" required name="user_name" id="username" class="form-control" value="<?php echo $value['user_name']; ?>">
                                    </div>
                                    <div class="form-group col-lg-5">
                                        <label for="userpass" class=" form-control-label">User Password</label>
                                        <input type="password" required placeholder="To change any information please fill password" name="user_pass" id="userpass" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <label for="" class=" form-control-label">Edit</label>
                                        <button type="submit" class="btn btn-primary form-control"><i class="fa fa-pencil"></i></button>
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <label for="" class=" form-control-label">Delete</label>
                                        <a href="<?php echo URL; ?>post/deleteUser/<?php echo $value['user_id']; ?>" class="btn btn-danger form-control"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Project Category
                        <div class="btn btn-success pull-right" id="btn-category-add"><i class="fa fa-plus"></i></div>
                    </strong>
                </div>
                <div class="card-body" id="add-category">
                    <form action="<?php echo URL; ?>post/addProjectCategory" method="post">
                        <div class="row">
                            <div class="form-group col-lg-8">
                                <label for="catname" class=" form-control-label">Category Name</label>
                                <input type="text" name="category_name" id="catname" class="form-control" value="">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="catname" class=" form-control-label">Add Category</label>
                                <input type="submit" class="form-control btn btn-success" value="ADD">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body" id="edit-category">
                    <form action="<?php echo URL; ?>post/editProjectCategories" method="post">
                        <?php foreach($project_category as $value): ?>
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label for="catid" class=" form-control-label">Category ID</label>
                                    <input type="text" readonly name="category_id[]" id="catid" class="form-control" value="<?php echo $value['category_id']; ?>">
                                </div>
                                <div class="form-group col-lg-9">
                                    <label for="catname" class=" form-control-label">Category Name</label>
                                    <input type="text" name="category_name[]" id="catname" class="form-control" value="<?php echo $value['category_name']; ?>">
                                </div>
                                <div class="form-group col-lg-1">
                                    <label for="" class=" form-control-label">Delete</label>
                                    <a href="<?php echo URL; ?>post/deleteProjectCategory/<?php echo $value['category_id']; ?>" class="btn btn-danger form-control"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-primary form-control">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</div>

<script>
jQuery(document).ready(function () {
    jQuery('#add-category').hide();
    jQuery('.useraddform').hide();
    jQuery('#buttonreset').hide();
    jQuery('#buttonreset2').click(function (e) { 
        e.preventDefault();
        jQuery('#buttonreset2').slideUp(300);
        jQuery('#buttonreset').show(500);
    });
    jQuery('#buttonreset').click(function () { 
        var txt;
        var r = confirm("Your All Data Will Be Cleaned!");
        if (r == true) {
        
        } else {
        return false;
        }         
    });


    jQuery('#btn-category-add').click(function (e) { 
        e.preventDefault();
        jQuery('#add-category').slideToggle(400);      
        jQuery('#edit-category').slideToggle(300);      
    });
    jQuery('#btn-user-add').click(function (e) { 
        e.preventDefault();
        jQuery('.userlist').slideToggle(400);      
        jQuery('.useraddform').slideToggle(300);      
    });

    jQuery('#buttoncurrency').click(function (e) { 
        e.preventDefault();
        jQuery.ajax({
            type: "post",
            url: "<?php echo URL; ?>post/ajaxCurrencyChange",
            data: "currency="+jQuery('#currency').val(),
            success: function (response) {
                console.log(response);

                if(response=='true'){
                    jQuery('#buttoncurrency').text('SAVED');
                    jQuery('#buttoncurrency').removeClass('btn-success');
                    jQuery('#buttoncurrency').addClass('btn-dark');

                    setTimeout(() => {
                        jQuery('#buttoncurrency').text('SAVE');
                        jQuery('#buttoncurrency').removeClass('btn-dark');
                        jQuery('#buttoncurrency').addClass('btn-success');
                    }, 3000);

                }
            }
        });
        
    });
});

</script>