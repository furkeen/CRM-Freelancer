<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">UI Elements</a></li>
                                    <li class="active">Tab</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                                <h4>Project Info</h4>
                            </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>
                                        Project No
                                    </label> 
                                    <h3>
                                        <?php echo $project_detail['project_id']; ?>
                                    </h3>
                                </div>
                                <div class="col-lg-6">
                                    <label>
                                        Project Budget
                                    </label> 
                                    <h3>
                                        <?php echo $project_detail['project_budget']; ?>
                                    </h3>
                                </div>
                                <div class="col-lg-6">
                                    <label>
                                        Project Category
                                    </label> 
                                    <h3>
                                        <?php echo $project_detail['category_name']; ?>
                                    </h3>
                                </div>
                                <div class="col-lg-6">
                                    <label>
                                        Project Detail
                                    </label> 
                                    <h3>
                                        <?php echo $project_detail['project_detail']; ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Customer Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="customer-tab" data-toggle="tab" href="#customer" role="tab" aria-controls="nav-home" aria-selected="true">Customer</a>
                                        <a class="nav-item nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="nav-profile" aria-selected="false">Contact</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Name & Surname</label>
                                                <h3><?php echo $project_detail['customer_name'].' '.$project_detail['customer_surname']; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Mobile</label>
                                                <h4><?php echo $project_detail['customer_mobile']; ?></h4>
                                            </div>
                                            <div class="col-6">
                                                <label>E-Mail</label>
                                                <h4><?php echo $project_detail['customer_email']; ?></h4>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label>Phone</label>
                                                <h4><?php echo $project_detail['customer_phone']; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Porject Stages</strong>
                            <a id="addstagesbtn" href="#" class="btn btn-success"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card-body" id="addstages">
                            
                            <form id="addstages-form">

                                <div class="row">
                                        <div class="col-lg-3 form-group text-center">
                                            <label for="date" class="form-control-label">Stages Deadline</label>
                                            <input type="date" name="stages_date" id="date" class="form-control">
                                        </div>
                                        <div class="col-lg-9 form-group text-center">
                                            <label for="details" class="form-control-label">Stages Details</label>
                                            <textarea name="stage_details" id="details" rows="3" class="form-control"></textarea>
                                        </div>
                                        <div class="col-lg-12 form-group text-center">
                                            <div class="btn btn-success btn-lg" id="submit-addstage">ADD</div>
                                        </div>                                
                                        <input type="hidden" name="project_id" value="<?php echo $project_detail['project_id']; ?>">
                                </div>
                            </form>

                        </div>
                    </div>

                    <?php foreach($project_detail['project_stages'] as $value): ?>
                    <div class="card">
                        <div class="row">

                            <div class="col-lg-2 text-center">
                                <label>Stage Deadline</label>
                                <h3><?php echo $value['stages_deadline']; ?></h3>
                            </div>
                            
                            <div class="col-lg-6 text-center">
                                <label>Stage Details</label>
                                <h4><?php echo $value['stages_detail']; ?></h4>
                            </div>
                            
                            <div class="col-lg-2 text-center">
                                <label>Status</label>
                                <h3><?php echo $value['stages_status']; ?></h3>
                            </div>

                            <div class="col-lg-1 text-center display-inline">
                                <span class="btn-group mt-3">
                                    <div class="btn btn-primary mx-1 edit-stages" id="<?php echo $value['stages_id']; ?>" >EDIT</div>
                                    <a href="<?php echo URL; ?>post/deleteStage/<?php echo $value['stages_id']; ?>" class="btn btn-danger mx-1">DELETE</a>
                                    <?php if($value['stages_status']==1): ?>
                                    <a href="<?php echo URL; ?>post/changeStageStatusFalse/<?php echo $value['stages_id']; ?>" class="btn btn-warning mx-1"><i class="fa fa-times-circle"></i></a>
                                    <?php else: ?>
                                    <a href="<?php echo URL; ?>post/changeStageStatusTrue/<?php echo $value['stages_id']; ?>" class="btn btn-success mx-1"><i class="fa fa-check-square-o"></i></a>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                        <div class="card-body editstages" id="editstages-<?php echo $value['stages_id']; ?>">
                        <form class="editstages-form" action="<?php echo URL; ?>post/editStage/<?php echo $value['stages_id']; ?>" method="post">

                            <div class="row">
                                    <div class="col-lg-3 form-group text-center">
                                        <label for="date" class="form-control-label">Stages Deadline</label>
                                        <input type="date" name="stages_date" id="date" class="form-control" value="<?php echo $value['stages_deadline']; ?>">
                                    </div>
                                    <div class="col-lg-8 form-group text-center">
                                        <label for="details" class="form-control-label">Stages Details</label>
                                        <textarea name="stage_details" id="details" rows="3" class="form-control"><?php echo $value['stages_detail']; ?></textarea>
                                    </div>
                                    <div class="col-lg-1 form-group text-center">
                                        <label for="submit-editstages" class="form-control-label">Click Button For Edit</label>
                                        <button type="submit" class="btn btn-success btn-lg" class="submit-editstages">SAVE</button>
                                    </div>                                
                                    <input type="hidden" name="project_id" value="<?php echo $value['project_id']; ?>">
                            </div>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <script>
        $(document).ready(function () {
            jQuery('#addstages').hide();
            jQuery('.editstages').hide();

            jQuery('#addstagesbtn').click(function () { 
                jQuery('#addstages').slideToggle(700);                                
            });

            jQuery('#submit-addstage').click(function () { 
                jQuery.ajax({
                    type: "post",
                    url: "<?php echo URL; ?>post/ajaxAddStages",
                    data: jQuery('#addstages-form').serialize(),
                    success: function (response) {
                       if(response=='true'){
                        jQuery('#addstages').slideToggle(300);
                        location.reload();
                       }
                    }
                });
                
            });

            jQuery('.edit-stages').click(function (e) { 
                console.log('editlendiniz');
                var dataid =jQuery(this).prop('id');
                console.log('edit id : '+dataid);
                jQuery('#editstages-'+dataid).slideToggle(500);          
            });
            
        });
        </script>