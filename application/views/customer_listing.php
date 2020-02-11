<div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Customer List</strong>
                                <a href="<?php echo URL; ?>customer/addcustomer" class="btn btn-success pull-right"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Product</th>
                                            <th>Phone</th>
                                            <th>E-Mail</th>
                                            <th>Balance</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($customer_list as $value): ?>
                                        <tr>
                                            <td>#<?php echo $value['customer_id']; ?></td>
                                            <td><span class="name"><?php echo $value['customer_name']; ?></span></td>
                                            <td><span class="product"><?php echo $value['customer_surname']; ?></span></td>
                                            <td><span class="phone"><?php echo $value['customer_mobile']; ?></span></td>
                                            <td><span class="mail"><?php echo $value['customer_email']; ?></span></td>
                                            <td>
                                                <span class="badge badge-danger"><?php echo $value['customer_debt'].' '.$currency; ?></span>
                                            </td>
                                            <td>
                                            <a href="<?php echo URL; ?>customer/customernotes/<?php echo $value['customer_id']; ?>" class="btn btn-warning"><i class="fa fa-pencil mx-2"></i>Notes</a>
                                            <a href="<?php echo URL; ?>customer/editcustomer/<?php echo $value['customer_id']; ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?php echo URL; ?>post/deletecustomer/<?php echo $value['customer_id']; ?>" class="btn btn-danger">Delete</a>
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
