        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Project List</strong>
                                <div class="d-inline-flex mx-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input filter" type="checkbox" id="inlineCheckbox1" value="started" checked>
                                        <label class="form-check-label text-primary" for="inlineCheckbox1">Started</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input filter" type="checkbox" id="inlineCheckbox2" value="completed" checked>
                                        <label class="form-check-label text-success" for="inlineCheckbox2">Completed</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input filter" type="checkbox" id="inlineCheckbox3" value="draft" checked>
                                        <label class="form-check-label text-info" for="inlineCheckbox3">Draft</label>
                                    </div>
                                </div>
                                <a href="<?php echo URL; ?>project/addproject" class="btn btn-success pull-right"><i class="fa fa-plus"></i></a>
                            </div>
                       
                            <div class="table-stats order-table ov-h">
                                <table class="table" id="projectlisttable">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Project Name</th>
                                            <th>Project Budget</th>
                                            <th>Project Balance</th>
                                            <th>Customer Name</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($project_list as $value): ?>
                                        <tr class="started-data">
                                            <td><?php echo $value['project_id']; ?></td>
                                            <td><span class="name"><?php echo $value['project_name']; ?></span> </td>
                                            <td><span class="product"><?php echo $value['project_budget']; ?> <?php echo $currency; ?></span> </td>
                                            <td><span class="product text-danger"><?php echo $value['project_balance']; ?> <?php echo $currency; ?></span> </td>
                                            <td><span class="phone"><?php echo $value['customer_name'].' '.$value['customer_surname']; ?></span></td>
                                            <td><span class="phone"><?php echo $value['category_name']; ?></span></td>
                                            <td>
                                                <span class="badge badge-primary">Started</span>
                                            </td>
                                            <td>
                                            <a href="<?php echo URL; ?>project/viewproject/<?php echo $value['project_id']; ?>" class="btn btn-warning"><i class="fa fa-eye mr-1"></i>View</a>
                                            <a href="<?php echo URL; ?>project/editproject/<?php echo $value['project_id']; ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?php echo URL; ?>post/deleteproject/<?php echo $value['project_id']; ?>" class="btn btn-danger">Delete</a>
                                            <a href="<?php echo URL; ?>post/completeProject/<?php echo $value['project_id']; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Make project completed"><i class="fa fa-check"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                        <tr class="draft-data">
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    <?php foreach($opportunity_list as $value): ?>
                                        <tr class="bg-info text-white draft-data">
                                            <td><?php echo $value['project_id']; ?></td>
                                            <td><span class="name"><?php echo $value['project_name']; ?></span> </td>
                                            <td><span class="product"><?php echo $value['project_budget']; ?> <?php echo $currency; ?></span> </td>
                                            <td><span class="product">-</span> </td>
                                            <td><span class="phone"><?php echo $value['customer_name'].' '.$value['customer_surname']; ?></span></td>
                                            <td><span class="phone"><?php echo $value['category_name']; ?></span></td>
                                            <td>
                                                <span class="badge badge-danger">Draft</span>
                                            </td>
                                            <td>
                                            <a href="<?php echo URL; ?>project/viewproject/<?php echo $value['project_id']; ?>" class="btn btn-warning"><i class="fa fa-eye mr-1"></i>View</a>
                                            <a href="<?php echo URL; ?>project/editproject/<?php echo $value['project_id']; ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?php echo URL; ?>post/deleteproject/<?php echo $value['project_id']; ?>" class="btn btn-danger">Delete</a>
                                            <a style="cursor: not-allowed;" href="#" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="It is not started project"><i class="fa fa-ban"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                        <tr class="completed-data">
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    <?php foreach($complete_list as $value): ?>
                                        <tr class="bg-secondary text-white completed-data">
                                            <td><?php echo $value['project_id']; ?></td>
                                            <td><span class="name"><?php echo $value['project_name']; ?></span> </td>
                                            <td><span class="product"><?php echo $value['project_budget']; ?> <?php echo $currency; ?></span> </td>
                                            <td><span class="badge badge-danger font-weight-bold"><?php echo $value['project_balance']; ?> <?php echo $currency; ?></span> </td>
                                            <td><span class="phone"><?php echo $value['customer_name'].' '.$value['customer_surname']; ?></span></td>
                                            <td><span class="phone"><?php echo $value['category_name']; ?></span></td>
                                            <td>
                                                <span class="badge badge-complete">Completed</span>
                                            </td>
                                            <td>
                                            <a href="<?php echo URL; ?>project/viewproject/<?php echo $value['project_id']; ?>" class="btn btn-warning"><i class="fa fa-eye mr-1"></i>View</a>
                                            <a href="<?php echo URL; ?>project/editproject/<?php echo $value['project_id']; ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?php echo URL; ?>post/deleteproject/<?php echo $value['project_id']; ?>" class="btn btn-danger">Delete</a>
                                            <a href="<?php echo URL; ?>post/uncompleteProject/<?php echo $value['project_id']; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Make project started"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<script>
jQuery(document).ready(function () {
    jQuery('[data-toggle="tooltip"]').tooltip()
    jQuery('.filter').change(function (e) { 
        e.preventDefault();
        var val = jQuery(this).val();
        // console.log('değişti val : '+val);

        var checked = []
        jQuery(".filter:checked").each(function ()
        {
            checked.push(jQuery(this).val());
        });
        // console.log(checked);
        jQuery('.started-data').hide(100);
        jQuery('.completed-data').hide(100);
        jQuery('.draft-data').hide(100);
    
        checked.forEach(element => {
            jQuery('.'+element+'-data').fadeIn(300);
        });
    });
});  

</script>
