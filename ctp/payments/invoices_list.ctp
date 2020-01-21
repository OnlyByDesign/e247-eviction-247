<script type="text/javascript">
	$(document).ready(function () {
		$('#invoicesPayAll').click(function() {
      if ($(this).attr("checked")) $(".checkBox").attr("checked", true);
      else $(".checkBox").attr("checked", false);
    });

    $('.checkBox').click(function() {
    	if ($(".checkBox").length == $(".checkBox:checked").length) $("#invoicesPayAll").attr("checked", true);
      else $("#invoicesPayAll").attr("checked", false);
    });


		$("#btnContinue").click(function() {
			if ($(".checkBox:checked").length > 0) return true;
			else {
				alert('Please select at least one invoice.');
				return false;
			}
		});

	});
</script>

<div id="wrapper" class="acc center fm-create invoices index">       
        
        <div class="hero col-xs-12 center">
            <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">pay <span>outstanding</span> invoices</h1>
            </div>
            <div class="hr_over"></div>
            <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/6.jpg"></div>
        </div>
        
        <div class="db_tab col-xs-12 center">
            <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
        </div>
    
        <div class="content col-xs-12 center">
            
            <?php echo//$this->Form->create('invoices', array('action' => 'invoices_payment'));?>

            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?php echo $this->Form->input('pay_all', array('type' => 'checkbox', 'label' => '')); ?></th>
                    <th>Invoice #</th>
                    <th style="white-space: nowrap">Invoice Date</th>
                    <th>Due Date</th>
                    <th>Property Info</th>
                    <th>Amount</th>
                </tr>

                <?php
                $i = 0;
                foreach ($unpaidInvoices as $unpaidInvoice):
                    $class = null;
                    if ($i++ % 2 == 0) $class = ' class="altrow"';
                ?>
                <tr<?php echo $class;?>>
                    <td><?php echo $this->Form->input('pay_invoice', array('type' => 'checkbox', 'label' => '', 'class' => 'checkBox')); ?></td>
                    <td style="white-space: nowrap"><?php echo $unpaidInvoice['DocNumber']; ?></td>
                    <td style="white-space: nowrap"><?php echo $unpaidInvoice['TxnDate']; ?></td>
                    <td style="white-space: nowrap"><?php echo $unpaidInvoice['DueDate']; ?></td>
                    <td><?php echo $unpaidInvoice['CustomerMemo']; ?></td>
                    <td>$<?php echo $unpaidInvoice['Balance']; ?></td>
                </tr>
            <?php endforeach; ?>
            </table>

            <?php
                echo $this->Form->submit('/img/btn_continue.png', array('type' => 'image', 'id' => 'btnContinue', 'style' => 'width:129px; height:29px; display:block;'));
                echo $this->Form->end();
            ?>
    
    </div>
</div>

<?php include '/app/webroot/files/alert_popup.inc';?>