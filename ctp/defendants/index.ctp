<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">manage <span>defendants</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/4.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_account')); ?>
    </div>

    <div class="content col-xs-10 center">
        
        <?php if ($defendant_count < $defendants_number) { ?>
        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <?php
                $link_title = 'Add a defendant';
                if ($defendant_count > 0) {
                    $link_title = 'Add the next tenant';
                }
                echo $this->Html->link(
                    $link_title,
                    array('action' => 'add', $eviction_id)
                );
               ?>
            </div>
        </div>
        <?php } ?>

        <div class="defendants index col-xs-12 left flex push-t push-b">
            
            <table cellpadding="0" cellspacing="0">
                <tr>
              <th>First Name</th>
              <th>Middle Name</th>
              <th>Last Name</th>
              <th>DOB</th>
              <th>SSN</th>
                    <th class="actions"></th>
                </tr>
            <?php
                $i = 0;
                foreach ($defendants as $defendant):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
            ?>
                <tr<?php echo $class;?>>
                    <td><?php echo $defendant['Defendant']['first_name']; ?>&nbsp;</td>
                    <td><?php echo $defendant['Defendant']['middle_name']; ?>&nbsp;</td>
                    <td><?php echo $defendant['Defendant']['last_name']; ?>&nbsp;</td>
                    <td><?php echo $defendant['Defendant']['date_of_birth']; ?>&nbsp;</td>
                    <td><?php echo $defendant['Defendant']['ssn']; ?>&nbsp;</td>
                    <td class="actions">
                <?php
                    echo $this->Html->link(
                        'Delete',
                        array('action' => 'delete', $eviction_id, $defendant['Defendant']['id']),
                        null,
                        String::insert(
                            __('Are you sure you want to delete :param1 :param2?', true),
                            array('param1' => $defendant['Defendant']['first_name'],
                                        'param2' => $defendant['Defendant']['last_name']))
                    );
                ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>

        </div>
        
        <?php if (!empty($defendants)) { ?>
        <div class="btn-blue col-xs-3 center">
            <?php echo $this->Html->link('Continue', array('controller' => 'evictions', 'action' => 'edit', $eviction_id), array('escape' => false)); ?>
        </div>
        <?php } ?>
        
    </div>
    
</div>