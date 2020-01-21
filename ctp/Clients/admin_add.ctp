<div id="wrapper" class="acc center fm-create">
    
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">Add a <span>Client</span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/1.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-8 center">

        <div class="actions btn-blue col-xs-2 center input left">
            <?php echo $this->Html->link(String::insert(__('List :param1', true), array('param1' => __('Clients', true))), array('action' => 'index')); ?>
        </div>

        <div class="clients form inline col-xs-12 left push-t push-b">

            <?php 
            echo $this->Form->create('Client', array('type' => 'file', 'action' => 'add'));
            $relative_path = 'portal/' . $this->data['Client']['login_page'];
            $absolute_path = 'http://' . env('SERVER_NAME') . '/app/docs/' . $relative_path . '/';
            ?>
            
            <p class="left col-xs-12 inline push-t">Name:</p>
            <?php echo $this->Form->input('name', array('class' => 'col-xs-12 inline left', 'label' => false, 'div' => array('class' => 'col-xs-12 input fm_input fm_text text last inline'), 'type' => 'text')); ?>

            <p class="left col-xs-12 inline push-t">Login Page:</p>
            <?php echo $this->Form->input('login_page', array('class' => 'col-xs-12 inline left', 'label' => false, 'div' => array('class' => 'input fm_input fm_text text last'))); ?>

            <div class="col-xs-12 left inline">
                <div class="col-xs-3 fm_input fm_text center inline">
                    <p class="left col-xs-12 inline push-t">Primary Color:</p>
                    <?php echo $this->Form->input('primary_color', array('class' => 'col-xs-12 inline left', 'label' => false, 'div' => array('class' => 'col-xs-12 input fm_input fm_text text last inline left'))); ?>
                </div>
                <div class="col-xs-3 fm_input fm_text center inline">
                    <p class="left col-xs-12 inline push-t">Secondary Color:</p>
                    <?php echo $this->Form->input('secondary_color', array('class' => 'col-xs-12 inline left', 'label' => false, 'div' => array('class' => 'col-xs-12 input fm_input fm_text text last inline left'))); ?>
                </div>
            </div>

        </div>
            <?php
            echo $this->Form->submit('Save', array(
                'type' => 'Save', 
                'type' => 'image',
                'div' => array(
                    'class' => 'fm_input fm_text col-xs-3 inline center push-t last'),
                'class' => 'btn-blue input'
            ));
            echo $this->Form->end();
            ?>
    </div>
    
</div>