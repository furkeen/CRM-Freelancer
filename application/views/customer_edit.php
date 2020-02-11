
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                    <form action="<?php echo URL; ?>post/editcustomer/<?php echo $customer['customer_id']; ?>" method="post">
                        <div class="card">
                            <div class="card-header"><strong>Company</strong><small> Form</small></div>
                                <div class="card-body card-block row">
                                        <div class="form-group col-lg-6">
                                            <label for="name" class=" form-control-label">Name</label>
                                            <input type="text" name="customer_name"  value="<?php echo $customer['customer_name']?> " id="name" placeholder="Customer Name" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-6"><label for="surname" class=" form-control-label">Surname</label>
                                            <input type="text" name="customer_surname" value="<?php echo $customer['customer_surname']?> "  id="surname" placeholder="Customer Surname" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-6"><label for="imagelink" class=" form-control-label">Image Link</label>
                                            <input type="text" name="customer_imagelink" value="<?php echo $customer['customer_image']?> "  id="imagelink" placeholder="Customer Image Link" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-6"><label for="mobile" class=" form-control-label">Mobile Phone</label>
                                            <input type="text" name="customer_mobile" value="<?php echo $customer['customer_mobile']?> "  id="mobile" placeholder="Customer Mobile Phone" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-6"><label for="email" class=" form-control-label">E-Mail</label>
                                            <input type="text" name="customer_email" value="<?php echo $customer['customer_email']?> "  id="email" placeholder="Customer E-Mail" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-6"><label for="phone" class=" form-control-label">Phone</label>
                                            <input type="text" name="customer_phone" value="<?php echo $customer['customer_phone']?> "  id="phone" placeholder="Customer Phone" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-12 text-center mt-5">
                                            <button class="btn btn-primary btn-lg">UPDATE</button>
                                        </div>
                               </div>
                            </div>
                        </div>
                        </form>
                    </div>
                 </div>
            </div><!-- .animated -->
        </div><!-- .content -->
