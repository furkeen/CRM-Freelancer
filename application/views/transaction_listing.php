<div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Transaction List</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Project</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($transaction_list as $value): ?>
                                        <tr>
                                            <td class="serial">#<?php echo $value['transaction_id']; ?></td>
                                            <td class="projecttd"><span id="<?php echo $value['project_id']; ?>"><?php echo $value['project_name']; ?></span> </td>
                                            <td class="amounttd"><span><?php echo $value['transaction_amount'].' '.$currency; ?></span> </td>
                                            <td class="datetd"><span><?php echo $value['transaction_date']; ?></span> </td>
                                            <td>
                                            <div id="<?php echo $value['transaction_id']; ?>" class="btn btn-primary editbtn">Edit</div>
                                            <a href="<?php echo URL; ?>post/deletetransaction/<?php echo $value['transaction_id']; ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" id="transaction_edit">
                            <div class="card-header">
                                <strong class="card-title">TransAction Edit</strong>
                                <i class="fa fa-times btn btn-danger pull-right cancel-edit"></i>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form action="<?php echo URL; ?>post/editTransaction" method="post">
                                            <div class="form-group">
                                                <strong>Balance : <strong>
                                                <p id="balance_edit">1250</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="projectid" class="control-label mb-1">Project Name</label>
                                                <select name="project_id" id="projectid_edit" class="form-control">
                                                <?php foreach ($project_list as $value): ?>
                                                    <option value="<?php echo $value['project_id']; ?>"><?php echo $value['project_name']; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="amount_edit" class="control-label mb-1">Payment Amount</label>
                                                <input type="number" min="1" max="999999999" name="transaction_amount" id="amount_edit" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="date_edit" class="control-label mb-1">Payment Date</label>
                                                <input type="date" name="transaction_date" id="date_edit" class="form-control">
                                            </div>
                                            <input type="hidden" name="transaction_id" id="transaction_id_edit">

                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-edit fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Edit Transaction</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->
                        <div class="card" id="transaction_add">
                            <div class="card-header">
                                <strong class="card-title">TransAction</strong>
                                <div class="pull-right text-danger" id="balanceaddtext"></div>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form action="<?php echo URL; ?>post/addtransaction" method="post">
                                            <div class="form-group">
                                                <label for="projectid" class="control-label mb-1">Project Name</label>
                                                <select name="project_id" id="projectid" class="form-control">
                                                    <option selected="true" value="0">Please Select</option>
                                                <?php foreach ($project_list as $value): ?>
                                                    <option value="<?php echo $value['project_id']; ?>"><?php echo $value['project_name']; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="amount" class="control-label mb-1">Payment Amount</label>
                                                <input type="number"  min="1" max="999999999" name="transaction_amount" id="amount" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="date" class="control-label mb-1">Payment Date</label>
                                                <input type="date" name="transaction_date" id="date" class="form-control">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Add Transaction</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<script>
$(document).ready(function() {
    jQuery.fn.ForceNumericOnly =function(){
    return this.each(function()
    {
        jQuery(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};
    

    jQuery("#amount").ForceNumericOnly();
    jQuery("#amount").keyup(function (e) { 
        var currentVal =  parseInt(jQuery(this).val(),10);
        var maxVal =  parseInt(jQuery(this).attr('max'),10);
        if(currentVal>=maxVal){
            jQuery(this).val(maxVal)
        }
    });

    jQuery("#amount_edit").ForceNumericOnly();
    jQuery("#amount_edit").keyup(function (e) { 
        var currentVal =  parseInt(jQuery(this).val(),10);
        var maxVal =  parseInt(jQuery(this).attr('max'),10);
        if(currentVal>=maxVal){
            jQuery(this).val(maxVal)
        }
    });

    jQuery('#projectid').change(function(){
        var projectID = jQuery(this).val();
        if(projectID!=0){
            jQuery.ajax({
            type: "post",
            url: "<?php echo URL; ?>post/ajaxGetProjectBalance/"+projectID,
            success: function (response) {
                console.log(response);
                jQuery('#balanceaddtext').text(response+' <?php echo $currency ?>');
                jQuery('#amount').attr('max',response)
            }
        });
        }else{
            jQuery('#balanceaddtext').text(' ');
        }
        
    })

    jQuery('#transaction_edit').hide();

    jQuery('.editbtn').click(function (e) { 
        if(!jQuery('#transaction_edit').is(":visible")){
            jQuery('#transaction_add').slideToggle(300);
        }
                
        var dataid =jQuery(this).prop('id');
        var projectID = jQuery(this).parent().siblings(".projecttd").children('span').prop('id');
        var amount = jQuery(this).parent().siblings(".amounttd").children('span').html();
        var date = jQuery(this).parent().siblings(".datetd").children('span').html();
        
        jQuery('#amount_edit').val(amount);
        jQuery('#date_edit').val(date);
        jQuery('#transaction_id_edit').val(dataid);
        jQuery('#projectid_edit').val(projectID);
        
        jQuery.ajax({
            type: "post",
            url: "<?php echo URL; ?>post/ajaxGetProjectBalance/"+projectID,
            success: function (response) {
                jQuery('#balance_edit').text(response+' <?php echo $currency ?>');
                jQuery('#amount_edit').attr('max',response)
            }
        });

        if(!jQuery('#transaction_edit').is(":visible")){
            jQuery('#transaction_edit').slideToggle(600);
        }
    });

    jQuery('.cancel-edit').click(function(){
        jQuery('#transaction_edit').slideToggle(300);
        jQuery('#transaction_add').slideToggle(600);

    });

});

</script>
