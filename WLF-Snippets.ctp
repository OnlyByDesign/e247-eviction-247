<?php 
//debug($this->data); 
//debug($lease_type);
//debug($autofill_custom_provisions['Provisions']);
?>

<head>
</head>

<body>
    

<!--Hero Alt-->
<div class="hero col-xs-12 center">
    <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main">lease <span>information</span> sheet</h1>
        </div>
    <div class="hr_over"></div>
    <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/pexels-photo-acc.jpeg"></div>
</div>


<!--Services-->
<div class="service col-xs-12 center">
    <div class="s1 svc_mn col-xs-6 center">
        <div class="svc_wrap"><a href="">                
        <img class="center" src="/img/dev/Lease-Icon.png" />
        <h2>leases</h2>
        <p class="col-xs-6 justify center">Create an account in minutes and get access to all the features of Eviction 24/7.</p>
    </a></div></div>
</div>


<!--Admin Template-->
<div id="wrapper" class="acc center fm-create">

    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
            <h1 class="main"><span></span></h1>
        </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/#.jpg"></div>
    </div>

    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('admin_tabs', array('currentTab' => 'users')); ?>
    </div>

    <div class="content col-xs-10 center">

        <div class="actions col-xs-12 inline">
            <div class="btn-blue col-xs-2 center left">
                <a href="<?php echo $this->Html->url(array('controller' => '#', 'action' => '#', $lease_id)); ?>"><p>Manage Landlords</p></a>
            </div>
            <p class="left inline push-l input center"><strong></strong></p>
        </div>

        <div class="# col-xs-12 left flex push-t push-b">

            <table cellpadding="0" cellspacing="0">

            </table>

        </div>

    </div>

</div>


<!--Account Tabs-->
<div class="db_tab col-xs-12 center">
    <?php echo $this->element('tabs', array('currentTab' => 'get_started')); ?>
    <div class="hilite center col-xs-12">
        <p class="inline">Click the tap above for the service you need.</p>
        <i id="hiliteClose" class="inline far fa-times-circle"></i>
    </div>
</div>


<!--Admin Tabs-->
<div class="db_tab col-xs-12 center">
    <?php echo $this->element('admin_tabs', array('currentTab' => 'leases')); ?>
</div>


<!--Html Link-->
<div class="tabElement tb_item inline col-xs-2-2 center <?php if ($currentTab == 'my_notices') echo 'active'; ?>">
    <?php echo $this->Html->link('<p>notices</p>', array('controller' => 'notices', 'action' => 'index'),array('escape' => false)); ?>
</div>


<!--Text Field-->
<?php
    echo $this->Form->input('#', [
        'div' => array('class' => 'fm_input fm_text col-xs-3-2 inline left'),
        'class' => 'input col-xs-12 center',
        'after' => '#',
        'placeholder' => '#',
        'label' => false
    ]);
?>


<!--Message Field-->
<?php
    echo $this->Form->input('message', [
        'div' => array('class' => 'fm_input fm_text col-xs-12 center msg last'),
        'class' => 'input col-xs-11 center',
        'type' => 'textarea',
        'name' => 'message',
        'placeholder' =>  'Message',
        'label' => false
    ]);
?>


<!--Select Field-->
<?php
    echo '<p class="col-xs-8 left inline">How much time before the end of the lease must the Tenant give you notice of not renewing?</p>';
    echo $this->Form->input('notice_non_renewal', array(
        'div' => array('class' => 'fm_input fm_text col-xs-3 inline right last'),
        'class' => 'input col-xs-12 center',
        'label' => false,
        'options' => $notice_non_renewal_options,
        'required' => false,
        'value' => $autofill_renewal['notice_non_renewal']
   ));
?>


<!--Radio Field-->
<?php
    echo '<p class="col-xs-12 left inline push-b">The plaintiff in this matter is:</p>';
    echo '<div class="col-xs-12 fm_input fm_text inline center left last">';
    $options = array('owner'=>'The Owner of the Property', 'manager' => 'The Manager of the Property', 'other' => 'Other (Please describe)' );
    $attributes = array(
        'class' => 'input center',
        'legend' => false,
        'onclick' => 'changeMatter();'
    );
    echo $this->Form->radio('plantiff_in_matter', $options, $attributes);
    echo '</div>';
?>

    
<!--SSN Field-->
<div class="fm_input fm_text col-xs-3-2 inline left ssn">
    <?php
    echo $this->Form->input('ssn1' . $i . '.ssn1', array( 'class' => 'col-xs-4 input center', 'placeholder' => 'SSN 1', 'label' => false,  'div'=> false, 'size' => 1,  'maxlength' => '3' )) . ' - ';
    echo $this->Form->input('ssn2' . $i . '.ssn2', array( 'class' => 'col-xs-3 input center', 'placeholder' => 'SSN 2', 'label' => false,  'div'=> false, 'maxlength' => '2' )) . ' - ';
    echo $this->Form->input('ssn3' . $i . '.ssn3', array( 'class' => 'col-xs-4 input center', 'placeholder' => 'SSN 3', 'label' => false, 'div'=> false, 'size' => 3, 'maxlength' => '4' ));
    ?>
    <p class="left col-xs-12 inline">Social Security Number</p>
</div>


<!--Check Field-->
<?php
    echo $this->Form->input('base_document', array('div' => array('class' => 'fm_input fm_text text left last col-xs-5-2 checkbox'), 'class' => 'col-xs-10 inline left', 'label' => array('class'=>'left push-r', 'text'=>'Generate a copy for each defendant')));    
?>


<!--Remember Info-->
<?php
    echo $this->Form->input('autofill_charges', array(
        'div' => array('class' => 'fm_mem col-xs-12 center right'),
        'class' => 'fm_check',
        'label' => 'Remember this information',
        'type' => 'checkbox',
        'checked' => $autofill_security_deposit['autofill_charges']
    ));
?>


<!--Custom Button-->
<?php		
    echo $this->Form->submit('Save', array(
        'name' => 'save_lease',
        'div' => array(
            'id' => 'saveBtn',
            'class' => 'fm_input fm_text col-xs-5 inline center left'),
        'class' => 'btn-blue input'
    ));
?>


<!--Back History-->
<div class="col-xs-3 center btn-blue" onclick="javascript:history.back();">
    <i class="center inline fa fa-caret-left" aria-hidden="true"></i>
    <p class="center inline">Back</p>
</div>


<!--Save / Cancel-->
<?php
    echo $this->Form->submit('Save', array( 'type' => 'Save', 'type' => 'image', 'div' => array('class' => 'fm_input fm_text col-xs-3 inline center push-t last'), 'class' => 'btn-blue input')); 
    echo $this->Form->end();
    echo '<p class="col-xs-12 center">';
    echo $this->Html->link('Cancel', array('controller' => 'damage_fees_categories', 'action' => 'index'));
    echo '</p>';
?>


<!--Popup Books-->
<div class="info_wrap fm_add mid col-xs-8 center inline left">
    <div id="addToPropertyAddressBook" class="if_box col-xs-4 inline center left" onclick="return false;">
        <i class="if_icon inline inline left far fa-address-book"></i>
        <p class="inline">Open Address Book</p> 
    </div>
    <div id="openPropertyAddressBook" class="if_box col-xs-4 center inline left" onclick="return false;">
        <i class="if_icon inline left fas fa-plus"></i>
        <p class="inline">Add to Address Book</p>
    </div>
</div>


<!--Form Next Prev-->
<div class="fld_cycle center col-xs-12 clearfix">
    <button type="button" id="prevBtn" class="fld_nav col-xs-1 center inline left" onclick="nextPrev(-1)">
        <i class="center inline fa fa-caret-left" aria-hidden="true"></i>
        <p class="center inline">prev</p>
    </button>
    <button type="button" id="nextBtn" class="fld_nav col-xs-1 center inline right" onclick="nextPrev(1)">
        <p class="center inline">next</p>
        <i class="center inline fa fa-caret-right" aria-hidden="true"></i>
    </button>
</div>
    
    
</body>