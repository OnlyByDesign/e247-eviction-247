<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">Leases <span><?php __('Actions'); ?></span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="inline col-xs-12 left push-t push-b">

            <div class="actions col-xs-12 center inline">
                <div class="btn-blue col-xs-2 center left">
                    <?php echo $this->Html->link('Back to User', array('controller' => 'users', 'action' => 'view', $user_id)); ?>
                </div>
            </div>

            <p class="col-xs-12 center inline">
                <?php
                    if (!empty($leases)) {
                        echo $this->Paginator->counter(array(
                            'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
                        ));
                ?>
            </p>

            <div class="paging col-xs-12 center inline">
                <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
            </div>


               <?php foreach ($leases as $lease): ?>

                <a name="<?php echo $lease['Lease']['id']; ?>" id="<?php echo $lease['Lease']['id']; ?>"></a>

                <div id="lease-wrapper-<?php echo $lease['Lease']['id']; ?>" class="lease-wrapper left col-xs-12 push-t">
                    <div class="acc_overview center col-xs-10" style="position:relative;">

                        <div id="lease-summary-<?php echo $lease['Lease']['id']; ?>" class="lease-summary acc-ov-summary center col-xs-12" style="position:relative;">

                            <div class="lease-wrapper-top">

                                <div class="acc-ov-l left col-xs-9">

                                    <p><strong>Address: </strong>
                                        <?php 
                                        echo $lease['Lease']['property_street_address1'];
                                        if ($lease['Lease']['property_street_address2'] != '') echo ', Unit No. ' . $lease['Lease']['property_street_address2'];
                                        if ($lease['Lease']['property_city'] != '') echo ', ' . $lease['Lease']['property_city'];
                                        if ($lease['Lease']['property_state'] != '') echo ', ' . $lease['Lease']['property_state'];
                                        ?>
                                    </p>

                                    <p><strong>Owner(s): </strong>
                                        <?php
                                            foreach ($lease['Owner'] as $k => $owner) {
                                                if ($owner['first_name'] != '') echo $owner['first_name'] . " " . $owner['last_name'];
                                                else echo $owner['company_name'];
                                                if (count($lease['Owner'])-1 != $k) echo ", ";
                                            }
                                        ?>
                                    </p>

                                    <p><strong>Tenant(s): </strong>
                                        <?php foreach ($lease['Tenant'] as $k => $tenant) {
                                            echo $tenant['first_name'] . " " . $tenant['last_name'];
                                            if (count($lease['Tenant'])-1 != $k) echo ", ";
                                        } ?>
                                    </p>

                                    <p><strong>Matter No.: </strong>
                                        <?php echo $lease['Lease']['id']; ?>
                                    </p>

                                </div>

                                <div class="acc-ov-r right col-xs-3">

                                    <p><?php echo $this->Html->link('Detailed Lease Information', array('controller' => 'leases', 'action' => 'view', $lease['Lease']['id'], $user_id)); ?></p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            <?php endforeach ?>


            <p class="col-xs-12 inline center">
                <?php echo $this->Paginator->counter(array( 'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}' )); ?>
            </p>

            <div class="paging col-xs-12 inline center">
                <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); ?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled')); } else { echo '<p class="center push-t">No leases were found for this user.</p>'; } ?>
            </div>

        </div>

    </div>
    
</div>
