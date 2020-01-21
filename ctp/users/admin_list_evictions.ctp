<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">Evictions <span><?php __('Actions'); ?></span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-12 center">
        
        <div class="actions col-xs-10 center">
            <div class="btn-blue col-xs-2 center left">
                <?php echo $this->Html->link('Back to User', array('controller' => 'users', 'action' => 'view', $user_id)); ?>
            </div>
        </div>

        <div class="inline col-xs-12 left push-t">
            

            <p class="col-xs-12 center inline">
                <?php 
                if (!empty($evictions)) {
                    echo $this->Paginator->counter(array(
                        'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
                    )); 
                ?>
            </p>

            <div class="paging col-xs-12 center inline push-b">
                <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class' => 'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
            </div>

            <?php foreach ($evictions as $eviction): ?>

                <a name="<?php echo $eviction['Eviction']['id']; ?>" id="<?php echo $eviction['Eviction']['id']; ?>"></a>

                <div id="eviction-wrapper-<?php echo $eviction['Eviction']['id']; ?>" class="eviction-wrapper left col-xs-12 push-t">
                    
                    <div class="acc_overview center col-xs-10" style="position:relative;">
                        
                        <!-- EVICTION SUMMARY BOX -->
                        <div id="eviction-summary-<?php echo $eviction['Eviction']['id']; ?>" class="eviction-summary acc-ov-summary center col-xs-12" style="position:relative;">
                            
                            <div class="eviction-wrapper-top">
                                
                                <div class="acc-ov-l left col-xs-9">

                                    <p><strong>Address: </strong>
                                        <?php 
                                            echo $eviction['Eviction']['property_street_address1'];
                                            if ($eviction['Eviction']['property_street_address2'] != '') echo ', Unit No. ' . $eviction['Eviction']['property_street_address2'];
                                            if ($eviction['Eviction']['property_city'] != '') echo ', ' . $eviction['Eviction']['property_city'];
                                            if ($eviction['Eviction']['property_state'] != '') echo ', ' . $eviction['Eviction']['property_state'];
                                            if ($eviction['Eviction']['property_zip_code'] != '') echo ', ' . $eviction['Eviction']['property_zip_code'];
                                        ?>
                                    </p>

                                    <?php
                                        if ($eviction['Eviction']['property_owner_is_company'] == 1) echo '<p><strong>Plaintiff: </strong>' . $eviction['Eviction']['property_owner_company'] . '</p>';
                                        else echo '<p><strong>Plaintiff: </strong>' . $eviction['Eviction']['property_owner_first_name'] . ' ' . $eviction['Eviction']['property_owner_last_name'] . '</p>';
                                    ?>

                                    <p><strong>Defendant(s): </strong>
                                        <?php
                                            $strDefendants = '';
                                            $defendants = $this->requestAction('admin/evictions/getDefendants/' . $eviction['Eviction']['id']);
                                            foreach ($defendants as $defendant) {
                                                $strDefendants .= $defendant['Defendant']['first_name'] . ' ' . $defendant['Defendant']['last_name'] . ', ';
                                            }
                                            echo substr($strDefendants, 0, strlen($strDefendants)-2);
                                        ?>
                                    </p>

                                    <p><strong>Matter No.: </strong><?php echo $eviction['Eviction']['id']; ?></p>
                                
                                </div>
                                
                                <div class="acc-ov-r right col-xs-3">
                                    
                                    <?php if (!$eviction['Eviction']['is_contested']) { ?>
                                    <div class="right">
                                        <p><?php echo $this->Html->link('Detailed Eviction Information', array('controller' => 'evictions', 'action' => 'view', $eviction['Eviction']['id'], $user_id)); ?></p>
                                    </div>
                                    <?php } ?>
                                    
                                </div>
                                
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php endforeach ?>


            <p class="col-xs-12 center inline">
                <?php
                    echo $this->Paginator->counter(array(
                        'format' =>'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'
                    ));
                ?>
            </p>

            <div class="paging col-xs-12 center inline">
                <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); ?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));
                } else { echo '<p>No evictions were found for this user.</p>'; } ?>
            </div>

        </div>

    </div>
    
</div>