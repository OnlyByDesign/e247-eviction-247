<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">New <span>Administrator</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/2.jpeg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="users form inline col-xs-12 left push-t push-b">

            <?php 
            echo $this->Form->create('User');
            echo $this->Form->input('role', array('value' => 'admin', 'type' => 'hidden'));
            echo $this->Form->input('username', [
                'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Username',
                'placeholder' => 'Username',
                'label' => false
            ]);
            echo $this->Form->input('password1', [
                'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Password',
                'placeholder' => 'Password',
                'label' => false,
                'type' => 'password'
            ]);
            echo $this->Form->input('password2', [
                'div' => array('class' => 'fm_input fm_text col-xs-12 inline left'),
                'class' => 'input col-xs-12 center',
                'after' => 'Confirm password',
                'placeholder' => 'Confirm password',
                'label' => false,
                'type' => 'password'
            ]);
            ?>

        </div>
        
        <?php
            echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
            echo $this->Form->end();
            echo '<p class="col-xs-12 center">';
                echo $this->Html->link('Cancel', array('controller' => 'users', 'action' => 'index'));
            echo '</p>';
        ?>

    </div>
    
</div>