<script type="text/javascript">
$(function() {
    $("#btn-continue").click(function(event) {
        $('#btn-continue').hide();
    });    
});
</script>
<div id="wrapper" class="acc center fm-create">
        
<div class="hero col-xs-12 center">
    <div class="hr_mn acc_txt hr_txt center">
        <h1 class="main">agreement and <span>payment</span></h1>
    </div>
    <div class="hr_over"></div>
    <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/5.jpg"></div>
</div>
        
<div class="content col-xs-10 center">
            
    <div class="progress center col-xs-9">
        <i class="pg_icon inline center fas fa-plus"></i>
        <div class="pg_strike inline center current"></div>
        <i class="pg_icon inline center fas fa-dollar-sign current"></i>
        <div class="pg_strike inline center"></div>
        <i class="pg_icon inline center far fa-file-alt"></i>
        <div class="pg_strike inline center"></div>
        <i class="pg_icon inline center far fa-bell"></i>
        <div class="pg_strike inline center"></div>
        <i class="pg_icon inline center fas fa-check"></i>
    </div>
    
    <div class="info col-xs-10 center"> 
        <div class="fld col-xs-12 center">                        
                <div class="info_wrap lrg col-xs-12 center">                    
                        <?php
                            echo $this->Form->create();
                            echo $this->Form->input('Payment.first_name', array('type' => 'hidden', 'value' => $profile['first_name']));
                            echo $this->Form->input('Payment.last_name', array('type' => 'hidden', 'value' => $profile['last_name']));
                            echo $this->Form->input('Payment.street_address1', array('type' => 'hidden', 'value' => $profile['mailing_address1']));
                            echo $this->Form->input('Payment.street_address2', array('type' => 'hidden', 'value' => $profile['mailing_address2']));
                            echo $this->Form->input('Payment.city', array('type' => 'hidden', 'value' => $profile['city']));
                            echo $this->Form->input('Payment.state', array('type' => 'hidden', 'value' => $profile['state']));
                            echo $this->Form->input('Payment.zip_code', array('type' => 'hidden', 'value' => $profile['zip_code']));
                        ?>
                        <h2>Attorneys' Fees and Costs Agreement</h2>
                        <div id="feeAgreement" class="fee_agree center left">
                            <?php echo $fee_agreements; ?>
                        </div>
                        <div class="col-xs-12 center">
                            <?php
                                if ($service_type == 'eviction') {
                                    echo '<div class="left">';
                                    echo '<div class="left feesDetails"><strong>Attorney Fee:</strong></div><div class="left"></div><br class="clear" />';
                                    echo '<div class="left feesDetails">&nbsp;&nbsp; Flat Attorney Fee:</div><div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($this->Session->read('Service.fee'), 2) . '</div></div><br class="clear" />';
                                    if ($posting_fee > 0) echo '<div class="left feesDetails">&nbsp;&nbsp; Posting of Notice to Pay:</div><div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($posting_fee, 2) . '</div></div><br class="clear" />';
                                    echo '<div class="left feesDetails"><strong>Cost Retainer:</strong></div><div class="left feesDetailsAmount" style="border-bottom:2px solid black;"><div class="left">$</div><div class="right">' . number_format($cost_summons + $cost_process_server + $cost_writ + $cost_writ_issuance + $cost_filing_fee, 2) . '</div></div><br class="clear" />';
                                    echo '<br />';
                                    echo '<div class="left feesDetails total"><strong>Total Amount:</strong></div><div class="left feesDetailsAmount total"><div class="left">$</div><div class="right">' . number_format($this->Session->read('Total.fee'), 2) . '</div></div><br class="clear" />';
                                    echo '</div>';
                                    echo '<div id="costRetainer">';
                                    echo '<strong>Estimated costs to be paid by the Cost Retainer<sup>*</sup></strong>';
                                    echo '<br /><br />';
                                    echo '<div class="left feesDetails">&nbsp;&nbsp; Issuance of Summons:</div><div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($cost_summons, 2) . '</div></div><br class="clear" />';
                                    echo '<div class="left feesDetails">&nbsp;&nbsp; Process Server:</div><div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($cost_process_server, 2) . '</div></div><br class="clear" />';
                                    if ($include_writ) {
                                        echo '	<div class="left feesDetails">&nbsp;&nbsp; Writ of Possession:</div><div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($cost_writ, 2) . '</div></div><br class="clear" />';
                                        echo '	<div class="left feesDetails">&nbsp;&nbsp; Issuance of Writ of Possession:</div><div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($cost_writ_issuance, 2) . '</div></div><br class="clear" />';
                                    }
                                    echo '	<div class="left feesDetails">&nbsp;&nbsp; Clerk Filing Fee:</div><div class="left feesDetailsAmount"><div class="left">$</div><div class="right">' . number_format($cost_filing_fee, 2) . '</div></div><br class="clear" />';
                                    echo '	<br /><span class="costDisclaimer"><sup>*</sup>Your actual final costs may vary based on the facts of your case.</span>';
                                    echo '</div>';
                                    
                                } else if ($service_type == 'lease' || $service_type == 'notice') {
                                    echo '<div class="col-xs-12 left"><p>Attorney Fee: <span>$' . number_format($this->Session->read('Total.fee'), 2) . '</span></p></div>';
                                }
                            
                                if ($service_type == 'eviction') echo '<p class="text2" style="color:red;">NOTICE: Your eviction will not be filed with the Court until the Attorney Fee and Court Costs are paid in full. The invoice will be sent to you today via email.</p>';
                            
                                else if ($service_type == 'lease' || $service_type == 'notice') echo '<span class="col-xs-12 left push-b">NOTICE: All invoiced amounts are due immediately upon receipt of the invoice.</span>';
                            
                                echo $this->Form->submit('Continue', array(
                                    'div' => array('class' => 'submit col-xs-12 last push-b'),
                                    'id' => 'btn-continue',
                                    'class' => 'btn-orng input col-xs-12 center',
                                    'type' => 'submit'
                                ));
                            
                            echo '</div><div class="col-xs-12 center">';
                            
                                echo '<strong class="col-xs-12 center">By clicking "Continue" you are agreeing to the terms of the Fee Agreement and payment of the Total Amount shown above.</strong>';
                            
                                echo $this->Form->end();
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- This forces the browser to reload the page instead of getting it from the cache, this way we can prevent the user from paying again. -->
<script type="text/javascript">
    window.onpageshow = function(event) {
    if (event.persisted) {
        window.location.reload() 
    }
};
</script>

<?php include '/app/webroot/files/alert_popup.inc';?>