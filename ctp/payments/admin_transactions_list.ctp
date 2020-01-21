<?php require_once APP . 'webroot' . DS . 'config.php'; ?>
<script type="text/javascript" src="https://appcenter.intuit.com/Content/IA/intuit.ipp.anywhere.js"></script>
<script type="text/javascript">
    intuit.ipp.anywhere.setup({
        menuProxy: '<?php print($quickbooks_menu_url); ?>',
        grantUrl: '<?php print($quickbooks_oauth_url); ?>'
    });
</script>
	
<div id="wrapper" class="acc center fm-create">

    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span>transaction</span> list</h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">
        
        <?php if ($quickbooks_is_connected): ?>
            <div class="col-xs-12 center inline">
                <h3>Connected!</h3>
                <i>
                    Realm: <?php print($realm); ?><br>
                    Company: <?php print($quickbooks_CompanyInfo->getCompanyName()); ?><br>
                    Email: <?php print($quickbooks_CompanyInfo->getEmail()->getAddress()); ?><br>
                    Country: <?php print($quickbooks_CompanyInfo->getCountry()); ?>
                </i>
            </div>
        <?php else: ?>
            <div class="col-xs-12 center inline">
                <h3>NOT CONNECTED!</h3>
                <ipp:connectToIntuit></ipp:connectToIntuit>
                <p class="col-xs-12 center inline">
                    You must authenticate to QuickBooks <strong>once</strong> before you can exchange data with it. <br>
                    <strong>You only have to do this once!</strong><br>
                    After you've authenticated once, you never have to go through this connection process again. <br>
                    Click the button above to authenticate and connect.
                </p>
            </div>	
        <?php endif; ?>

        <div class="payments view col-xs-12 left flex push-t push-b">

            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Matter #</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th class="actions"><?php __('Actions');?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($transactions as $transaction):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class;?>>
                    <td><?php echo $transaction['Payment']['first_name']; ?>&nbsp;</td>
                    <td><?php echo $transaction['Payment']['last_name']; ?>&nbsp;</td>
                    <td><?php echo $transaction['Eviction']['id']; ?>&nbsp;</td>
                    <td><?php echo $transaction['Payment']['transaction_id']; ?>&nbsp;</td>
                    <td><?php echo $transaction['Payment']['amount']; ?>&nbsp;</td>
                    <td><?php echo $transaction['Payment']['created']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Export', true), array('action' => 'transactions_export', $transaction['Payment']['id']), null); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

        </div>
        
    </div>
    
</div>