
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                    <form action="<?php echo URL; ?>post/addProject" method="post">
                        <div class="card">
                            <div class="card-header"><strong>Company</strong><small> Form</small></div>
                                <div class="card-body card-block row">
                                        <div class="form-group col-lg-4">
                                            <label for="name" class=" form-control-label">Customer Name</label>
                                           
                                            <select type="text" name="customer_id" id="customer"  class="form-control">
                                            <?php foreach($customer_list as $value): ?>
                                                <option value="<?php echo $value['customer_id']; ?>"><?php echo $value['customer_name'].' '.$value['customer_surname']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="name" class=" form-control-label">Project Category</label>
                                           
                                            <select type="text" name="project_category" id="category" class="form-control">
                                            <?php foreach($project_category as $value): ?>
                                                <option value="<?php echo $value['category_id']; ?>"><?php echo $value['category_name']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="name" class=" form-control-label">Project Status</label>
                                           
                                            <select type="text" name="isOpportunity" id="status" class="form-control">
                                                <option value="1">Fırsat / Fiyat Teklifi</option>
                                                <option value="0">Ödeme Alındı İşe Başlandı</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6"><label for="projectname" class=" form-control-label">Project Name</label>
                                            <input type="text" name="project_name" id="projectname" placeholder="Project Name" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-6"><label for="budget" class=" form-control-label">Project Budget</label>
                                            <input type="text" name="project_budget" id="budget" placeholder="Project Budget" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-12"><label for="budget" class=" form-control-label">Project Detail</label>
                                            <textarea name="project_details" id="details" cols="30" rows="12"  class="form-control"></textarea>
                                        </div>
                                        <div class="form-group col-lg-12 text-center mt-5">
                                            <button class="btn btn-success btn-lg">Save</button>
                                        </div>
                               </div>
                            </div>
                        </div>
                        </form>
                    </div>
                 </div>
            </div><!-- .animated -->
        </div><!-- .content -->
