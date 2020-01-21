<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">Notices <span><?php __('Actions'); ?></span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="actions col-xs-12 center inline">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link('Back to User', array('controller' => 'users', 'action' => 'view', $user_id)); ?>
            </div>
        </div>

        <p class="col-xs-12 center inline">
            <?php
            if (!empty($notices)) {
                echo $this->Paginator->counter(array(
                    'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
                ));
            ?>
        </p>

        <div class="paging col-xs-12 center inline">
            <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class' => 'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
        </div>

        <div class="inline col-xs-12 left push-t push-b">

            <?php foreach ($notices as $notice): ?>

            <a name="<?php echo $notice['Notice']['id']; ?>" id="<?php echo $notice['Notice']['id']; ?>"></a>

            <div id="notice-wrapper-<?php echo $notice['Notice']['id']; ?>" class="notice-wrapper left col-xs-12 push-t">

                <div class="acc_overview center col-xs-10" style="position:relative;">

                    <!-- NOTICE SUMMARY BOX -->
                    <div id="notice-summary-<?php echo $notice['Notice']['id']; ?>" class="notice-summary">

                        <div class="notice-wrapper-top">

                            <div class="acc-ov-l left col-xs-9">

                                <p><strong>Address: </strong>
                                    <?php
                                    echo $notice['Notice']['property_street_address1'];
                                    if ($notice['Notice']['property_street_address2'] != '') echo ', Unit No. ' . $notice['Notice']['property_street_address2'];
                                    if ($notice['Notice']['property_city'] != '') 
                                        echo ', ' . $notice['Notice']['property_city'];
                                    if ($notice['Notice']['property_state'] != '') echo ', ' . $notice['Notice']['property_state'];
                                    if ($notice['Notice']['property_zip_code'] != '') echo ', ' . $notice['Notice']['property_zip_code'];
                                    ?>
                                </p>

                                <?php
                                echo '<p><strong>Landlord: </strong>' . $notice['Notice']['contact_first_name'] . ' ' . $notice['Notice']['contact_last_name'] . '</p>';
                                ?>

                                <p><strong>Tenant(s): </strong>
                                    <?php
                                    $strTenantNotices = '';
                                    $tenants = $this->requestAction('admin/notices/getTenants/' . $notice['Notice']['id']);
                                    foreach ($tenants as $tenant) {
                                        $strTenantNotices .= $tenant['TenantNotice']['first_name'] . ' ' . $tenant['TenantNotice']['last_name'] . ', ';
                                    }
                                    echo substr($strTenantNotices, 0, strlen($strTenantNotices)-2);
                                    ?>
                                </p>

                                <p><strong>Matter No.: </strong>
                                    <?php echo $notice['Notice']['id']; ?>
                                </p>

                            </div>

                            <div class="acc-ov-r right col-xs-3">
                                <?php
                                echo $this->Html->link('Detailed Notice Information', array('controller' => 'notices', 'action' => 'view', $notice['Notice']['id'], $user_id));
                                ?>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php endforeach ?>


            <p class="col-xs-12 center inline">
                <?php echo $this->Paginator->counter(array('format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')); ?>
            </p>

            <div class="paging col-xs-12 center inline">
                <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); ?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));
                } else { echo '<p>No notices were found for this user.</p>'; } ?>
            </div>

        </div>

    </div>
    
</div>


