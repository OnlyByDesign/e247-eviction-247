<script type="text/javascript">
    $(function() {
        $("#btn-continue").click(function(event) {
            $('#btn-continue').hide();
        });
    });

    //If the current user has a saved CC, remove the required flag from the CC fields
    <?php if (!empty($anet_profiles)) { ?>
        $(document).ready(function() {
            set_required_fields(false);
        });

        function set_required_fields(status) {
            if (status) {
                $('#PaymentFirstName').attr('required', true);
                $('#PaymentLastName').attr('required', true);
                $('#PaymentStreetAddress1').attr('required', true);
                $('#PaymentCity').attr('required', true);
                $('#PaymentZipCode').attr('required', true);
                $('#PaymentCreditCardNumber').attr('required', true);
                $('#PaymentCreditCardSecurityCode').attr('required', true);
            } else {
                $('#PaymentFirstName').removeAttr('required');
                $('#PaymentLastName').removeAttr('required');
                $('#PaymentStreetAddress1').removeAttr('required');
                $('#PaymentCity').removeAttr('required');
                $('#PaymentZipCode').removeAttr('required');
                $('#PaymentCreditCardNumber').removeAttr('required');
                $('#PaymentCreditCardSecurityCode').removeAttr('required');
            }
        }
    <?php } ?>
</script>

<div id="wrapper" class="acc center fm-lease">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">agreement and <span>payment</span></h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/2.jpeg"></div>
    </div>
        
    <div class="content col-xs-10 center">
            
        <div class="progress center col-xs-9">
                <i class="pg_icon inline center fas fa-plus"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center fas fa-dollar-sign current"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center far fa-file-alt"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center far fa-bell"></i>
                <div class="pg_strike inline center"></div>
                <i class="pg_icon inline center fas fa-check"></i>
                <div class="progress_alt center col-xs-12">
                    <span class="pg_text step center inline">Start</span>
					<span class="pg_text step center inline">Property</span>
					<span class="pg_text step center inline">Managing</span>
					<span class="pg_text step center inline">Lease</span>
                    <span class="pg_text step center inline">Mandatory</span>
                    <span class="pg_text step center inline">Maintenance</span>
                    <span class="pg_text step center inline">Provisions</span>
                </div>
            </div>
            
        <div class="info col-xs-12 center clearfix">
            
            <div class="lrg col-xs-12 center">
                <h3>Attorneys' Fees and Costs Agreement</h3>
                <div id="feeAgreement" class="fee_agree center left">
                    <?php echo $fee_agreements; ?>
                </div>
            </div>
            
            <div class="lrg col-xs-12 center">
                <h3 class="push-b push-t">Credit Card Payment</h3>
                <?php echo $this->Form->create(); ?>
                <div class="col-xs-12 left flex">
                    <?php                
                        if (!empty($anet_profiles)) {

                            echo $this->Form->input('cc_info', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                                'class' => 'input col-xs-12 center',
                                'type' => 'radio',
                                'options' => 'Use my saved credit card information',
                                'value' => 1, 'div' => array(
                                    'class' => 'input-radio-short'
                                ),
                                'onclick' => 'set_required_fields(false);',
                                'checked' => 'checked'
                            ));
                            echo $this->Form->input('payment_profile_id', array('type' => 'hidden', 'value' => $anet_profiles[0]['payment_profile_id']));

                            echo '	Card Type: ' . $anet_profiles[0]['card_type'];

                            echo '	Card Number: ' . $anet_profiles[0]['card_number'];

                            echo $this->Form->input('cc_info', array(
                                'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                                'class' => 'input col-xs-12 center',
                                'type' => 'radio',
                                'options' => 'Use a different credit card',
                                'value' => 2,
                                'div' => array(
                                    'class' => 'input-radio-short'
                                ),
                                'onclick' => 'set_required_fields(true);',
                                'label' => false
                            ));

                        }

                        echo $this->Form->input('Payment.first_name', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'Cardholder First Name',
                            'after' => 'First Name',
                            'label' => false
                        ));
                        echo $this->Form->input('Payment.last_name', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'Cardholder Last Name',
                            'after' => 'Last Name',
                            'label' => false
                        ));
                    ?>
                </div>
                <div class="col-xs-12 left flex">
                    <?php
                        echo $this->Form->input('Payment.street_address1', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'Street Address',
                            'after' => 'Street Address',
                            'label' => false
                        ));
                        echo $this->Form->input('Payment.street_address2', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'Street Address 2',
                            'label' => false
                        ));
                        echo $this->Form->input('Payment.city', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'City',
                            'label' => false
                        ));
                    ?>
                </div>
                <div class="col-xs-12 left flex">
                    <?php
                        echo $this->Form->input('Payment.state', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'State',
                            'after' => 'State',
                            'options' => $states,
                            'empty' => '<Please select a state>',
                            'label' => false
                        ));
                        echo $this->Form->input('Payment.zip_code', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'Zip code',
                            'after' => 'Zip code',
                            'label' => false
                        ));
                        echo $this->Form->input('Payment.country', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'Country',
                            'after' => 'Country',
                            'options' => $countries,
                            'default' => 'US',
                            'label' => false
                        ));
                    ?>
                </div>
                <div class="col-xs-12 left flex">
                    <?php
                        echo $this->Form->input('Payment.credit_card_type', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                            'class' => 'input col-xs-12 center',
                            'empty' => 'Credit card type',
                            'after' => 'Credit card type',
                            'options' => $credit_cards,
                            'label' => false
                        ));

                        echo $this->Form->input('Payment.credit_card_number', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'Credit card number',
                            'after' => 'Credit card number',
                            'label' => false
                        ));
                        echo $this->Form->input('Payment.credit_card_security_code', array(
                            'div' => array('class' => 'fm_input fm_text col-xs-3 inline left last'),
                            'class' => 'input col-xs-12 center',
                            'placeholder' => 'Security code',
                            'after' => 'Three-digit number printed on the back of the card.',
                            'label' => false
                        ));
                    ?>
                </div>
                <div class="col-xs-12 left flex">
                    <?php
                        echo '<p class="col-xs-1-2 left inline">Expiration month</p>';
                        echo '<div class="fm_input fm_text col-xs-2-2 inline left">' . $this->Form->month('Payment.credit_card_expiration_date', array(
                            'class' => 'input col-xs-12 center',
                            'after' => 'Expiration month',
                            'placeholder' => 'Expiration month',
                            'empty' => false,
                            'label' => false
                       )) . '</div>';
                        echo '<p class="col-xs-1-2 left inline">Expiration year</p>';
                        echo '<div class="fm_input fm_text col-xs-2-2 inline left">' . $this->Form->year('Payment.credit_card_expiration_date', date('Y'), date('Y') + 6, array(
                            'class' => 'input col-xs-12 center',
                            'after' => 'Expiration year',
                            'placeholder' => 'Expiration year',
                            'empty' => false,
                            'label' => false
                        )) . '</div>';
                        echo $this->Form->input('save_customer_profile', array(
                            'div' => array('class' => 'fm_mem col-xs-12 center right'),
                            'class' => 'fm_check',
                            'label' => 'Use my transaction information for future transactions',
                            'type' => 'checkbox',
                            'label' => false
                        ));
                    ?>
                </div>
            </div>
        
            <?php if ($service_type == 'eviction') { ?>
            
            <div class="lrg col-xs-9 center push-t inline">

                <div class="col-xs-5-2 left">

                        <p class="col-xs-12 left col-xs-12 feesDetails push-r">
                            <strong>Attorney Fees:</strong>
                        </p>

                        <div class="col-xs-12 left feesDetailsAmount push-r">
                            <p class="left">Flat Attorney Fee: $</p>
                            <?php echo '<p class="right">'
                                 . number_format($this->Session->read('Service.fee'), 2) . 
                            '</p>'; ?>
                        </div>

                        <?php if ($posting_fee > 0) ?>

                            <div class="col-xs-12 left feesDetailsAmount push-r">
                                <p class="left">Posting of Notice to Pay: $</p>
                                <?php echo '<p class="right">'
                                    . number_format($posting_fee, 2) .
                                '</p>'; ?>
                            </div>

                        <div class="col-xs-12 left feesDetailsAmount push-r">
                            <p class="left">Cost Retainer: $</p>
                            <?php echo '<p class="right">' . number_format($cost_summons + $cost_process_server + $cost_writ + $cost_writ_issuance + $cost_filing_fee, 2) . '</p> '; ?>
                        </div>

                        <div class="col-xs-12 left feesDetailsAmount total" style="border-bottom:2px solid black;">
                            <p class="left"><strong>Total Amount:</strong> $</p>
                            <?php echo '<p class="right">' . number_format($this->Session->read('Total.fee'), 2) . '</p>' ; ?>
                        </div>

                    </div>
                
                <div id="costRetainer" class="lrg col-xs-6 right inline push-b">
                    
                        <p class="col-xs-12 left"><strong>Estimated costs to be paid by the Cost Retainer<sup>*</sup></strong></p>

                        <div class="col-xs-12 left feesDetailsAmount push-r">
                            <p class="left">Issuance of Summons: $</p>
                            <?php echo '<p class="right">' . number_format($cost_summons, 2) . '</p>' ; ?>
                        </div>

                        <div class="col-xs-12 left feesDetailsAmount push-r">
                            <p class="left">Process Server: $</p>
                            <?php echo '<p class="right">' . number_format($cost_process_server, 2) . '</p>' ; ?>
                        </div>

                        <?php if ($include_writ) { ?>

                            <div class="col-xs-12 left feesDetailsAmount push-r">
                                <p class="left">Writ of Possession: $</p>
                                <?php echo '<p class="right">' . number_format($cost_writ, 2) . '</p>' ; ?>
                            </div>

                            <div class="col-xs-12 left feesDetailsAmount push-r">
                                <p class="left">Issuance of Writ of Possession: $</p>
                                <?php echo '<p class="right">' . number_format($cost_writ_issuance, 2) . '</p>' ; ?>
                            </div>

                        <?php } ?>

                        <div class="col-xs-12 left feesDetailsAmount push-r">
                            <p class="left">Clerk Filing Fee: $</p>
                            <?php echo '<p class="right">' . number_format($cost_filing_fee, 2) . '</p>' ; ?>
                        </div>

                        <span class="costDisclaimer left col-xs-12"><sup>*</sup>Your actual final costs may vary based on the facts of your case.</span>

                    <?php } elseif ($service_type == 'lease' || $service_type == 'notice') { ?>

                        <div class="left feesDetailsAmount">
                            <p class="left"><strong>Attorney Fee: $</strong></p>
                            <?php echo '<p class="right"><strong>' . number_format($this->Session->read('Total.fee'), 2) . '</strong></p>' ; ?>
                        </div>
                    
                    <?php } ?>
                    
                    </div>
                
                </div>
            
            </div>
        
            <div class="col-xs-12 center push-b push-t">
            <?php 
                echo $this->Form->submit('Save', array(
                    'id' => 'btn-continue',
                    'div' => array(
                        'class' => 'fm_input fm_text col-xs-3 center'),
                    'class' => 'btn-blue input'
                ));
                echo $this->Form->end();
            ?>
            <p class="text2 center col-xs-12">
                <strong>By clicking "Continue" you are agreeing to the terms of the Fee Agreement and payment of the Total Amount shown above.</strong>
            </p>
        </div>
        
        <!-- (c) 2005, 2014. Authorize.Net is a registered trademark of CyberSource Corporation -->
        <div class="AuthorizeNetSeal center push-t" style="margin: 0 auto">
            <script type="text/javascript" language="javascript">var ANS_customer_id="47a48bd4-702b-4c28-8059-36542f9c8a31";</script>
            <script type="text/javascript" language="javascript" src="//verify.authorize.net/anetseal/seal.js" ></script>
            <a href="http://www.authorize.net/" id="AuthorizeNetText" target="_blank">Online Credit Card Processing</a>
        </div>
        <div class="center push-t">
            <span id="siteseal">
                <script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=2nBjiPC3PD6Lnxpuk9UmLSby6mihd7sCuDsaDE4DVr3pnisIfOoL7TKN93eW"></script>
            </span>
        </div>
    </div>
        
    </div>
</div>
    
<script type="text/javascript">
window.onpageshow = function(event) {
    if (event.persisted) {
        window.location.reload() 
    }
};
</script>
<?php include '/app/webroot/files/alert_popup.inc';?>