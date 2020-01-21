<div id="wrapper" class="acc center fm-lease">
        
    <div class="hero col-xs-12 center">
        <div class="hr_mn acc_txt hr_txt center">
                <h1 class="main">lease <span>complete</span></h1>
            </div>
        <div class="hr_over"></div>
        <div class="parallax-window hr_img hr_mn" data-scroll="9" data-parallax="scroll" data-image-src="/img/dev/7.jpg"></div>
    </div>
    
    <div class="db_tab col-xs-12 center">
        <?php echo $this->element('tabs', array('currentTab' => 'my_leases')); ?>
    </div>
    
    <div class="content center col-xs-9">
        <h1 class="push-b center">Detailed Lease Information</h1>
        <div class="evictions left view view-info-table push-t">
            <fieldset>
                <h3 class="push-b">Property Information</h3>

                <table class="list-items">
                    <tr>
                        <td><?php echo __('Street Address'); ?></td>
                        <td><?php echo $lease['Lease']['property_street_address1']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Unit No.'); ?></td>
                        <td><?php echo $lease['Lease']['property_street_address2']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('City'); ?></td>
                        <td><?php echo $lease['Lease']['property_city']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('State'); ?></td>
                        <td><?php echo $lease['Lease']['property_state']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('County'); ?></td>
                        <td><?php echo $lease['County']['name']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Zip Code'); ?></td>
                        <td><?php echo $lease['Lease']['property_zip_code']; ?></td>
                    </tr>
                </table>
            </fieldset>



            <fieldset>
            <h3 class="push-b">Property Owner's Information</h3>
                <?php echo $this->element('owners'); ?>
            </fieldset>



            <fieldset>
            <h3 class="push-b">Tenant's Information</h3>
            <?php echo $this->element('tenants'); ?>
            </fieldset>


            <?php if (!empty($occupants)) { ?>
                <fieldset>
                <h3 class="push-b">Occupant's Information</h3>
                <?php echo $this->element('occupants'); ?>
                </fieldset>
            <?php } ?>


            <fieldset>
            <h3 class="push-b">Person Responsible for Managing the Property</h3>

                <table class="list-items">
                    <tr>
                        <td><?php echo __('Company Name'); ?></td>
                        <td><?php echo $lease['Lease']['contact_company_name']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('First Name'); ?></td>
                        <td><?php echo $lease['Lease']['contact_first_name']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Last Name'); ?></td>
                        <td><?php echo $lease['Lease']['contact_last_name']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Street Address'); ?></td>
                        <td><?php echo $lease['Lease']['contact_street_address1']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Unit No.'); ?></td>
                        <td><?php echo $lease['Lease']['contact_street_address2']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('City'); ?></td>
                        <td><?php echo $lease['Lease']['contact_city']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('State'); ?></td>
                        <td><?php echo $lease['Lease']['contact_state']; ?></td>
                    </tr>
        <?php if (isset($lease['Lease']['contact_county_name'])) { ?>
                    <tr>
                        <td><?php echo __('County'); ?></td>
                        <td><?php echo $lease['Lease']['contact_county_name']; ?></td>
                    </tr>
        <?php } ?>
                    <tr>
                        <td><?php echo __('Zip Code'); ?></td>
                        <td><?php echo $lease['Lease']['contact_zip_code']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Phone Number'); ?></td>
                        <td><?php echo $lease['Lease']['contact_phone_number']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Emergency Phone Number'); ?></td>
                        <td><?php echo $lease['Lease']['contact_phone_number_emergencies']; ?></td>
                    </tr>
                </table>
            </fieldset>



            <fieldset>
                <h3 class="push-b">Lease Information</h3>

                <table class="list-items">
                    <tr>
                        <td><?php echo __('Lease request date'); ?></td>
                        <td><?php echo date('l, F jS Y', strtotime($lease['Lease']['created'])); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Lease needed by'); ?></td>
                        <td>
                            <?php
                                if (strlen($lease['Lease']['requested_by']) > 10) echo date('l, F jS Y - g:ia', strtotime($lease['Lease']['requested_by']));
                                else echo date('l, F jS Y', strtotime($lease['Lease']['requested_by']));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo __('Matter No.'); ?></td>
                        <td><?php echo $lease['Lease']['id']; ?></td>
                    </tr>
                    <?php
                        if ($lease['Lease']['lease_type'] == 'multi') {
                            echo '<tr>';
                            echo '	<td>' . __('Lease Type') . '</td>';
                            echo '	<td>Multifamily</td>';
                            echo '</tr>';
                        } 
                    ?>
                    <tr>
                        <td><?php echo __('Who will Manage the Property'); ?></td>
                        <td><?php echo ($lease['Lease']['manager'] == Configure::read('Lease.manager_company') ? 'Management Company' : 'Property Owner'); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Who is signing the Lease'); ?></td>
                        <td><?php echo ($lease['Lease']['signer'] == Configure::read('Lease.signer_agent') ? 'Management Company Agent' : 'Property Owner'); ?></td>
                    </tr>
                </table>
            </fieldset>

                <fieldset class="top-only"><h3 class="push-b">Term</h3>
                    <table class="list-items">
                        <tr>
                            <td><?php echo __('Lease Start'); ?></td>
                            <td><?php echo date('l, F jS Y', strtotime($lease['Lease']['lease_start'])); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Lease End'); ?></td>
                            <td><?php echo date('l, F jS Y', strtotime($lease['Lease']['lease_end'])); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Is the Lease term longer than one year?'); ?></td>
                            <td><?php echo ($lease['Lease']['lease_term'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                    </table>
                </fieldset>


                <fieldset class="top-only"><h3 class="push-b">Rent</h3>
                    <table class="list-items">
                        <tr>
                            <td><?php echo __('Monthly Rent'); ?></td>
                            <td><?php echo "$" . $lease['Lease']['monthly_rent']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Sales Tax'); ?></td>
                            <td><?php echo "$" . number_format($lease['Lease']['sales_tax'], 2); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('County Tax'); ?></td>
                            <td><?php echo "$" . number_format($lease['Lease']['county_tax'], 2); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Rent Due Date'); ?></td>
                            <td><?php echo $lease['Lease']['rent_due_date']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Rent Late Date'); ?></td>
                            <td><?php echo $lease['Lease']['rent_late_date']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Initial Late Rent Fee'); ?></td>
                            <td>
                                <?php
                                    if ($lease['Lease']['rent_late_fee_type'] == 0) echo '$' . $lease['Lease']['rent_late_fee'];
                                    else echo $lease['Lease']['rent_late_fee'] . '%';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo __('Additional Late Rent Fee'); ?></td>
                            <td>
                                <?php echo "$" . number_format($lease['Lease']['rent_late_fee_daily'], 2);
                                    if (!is_null($lease['Lease']['rent_late_fee_daily'])) {
                                        echo " per ";
                                        echo ($lease['Lease']['rent_late_date_type'] == 0) ? 'day' : 'week';
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo __('Cash Payment Accepted'); ?></td>
                            <td><?php echo ($lease['Lease']['cash_payment'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                    </table>
                </fieldset>


                <fieldset class="top-only"><h3 class="push-b">Prorated Rent</h3>
                    <table class="list-items">
                        <tr>
                            <td><?php echo __('Prorated Rent'); ?></td>
                            <td><?php echo "$" . number_format($lease['Lease']['prorated_rent'],2); ?></td>
                        </tr>
                        <?php //if ($lease['Lease']['lease_type'] == 'short') { ?>
                            <tr>
                                <td><?php echo __('Sales Tax'); ?></td>
                                <td><?php echo "$" . number_format($lease['Lease']['prorated_sales_tax'], 2); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('County Tax'); ?></td>
                                <td><?php echo "$" . number_format($lease['Lease']['prorated_county_tax'], 2); ?></td>
                            </tr>
                        <?php //} ?>
                        <tr>
                            <td><?php echo __('Prorated Start Date'); ?></td>
                            <td><?php if ($lease['Lease']['prorated_start_date'] != '') echo date('l, F jS Y', strtotime($lease['Lease']['prorated_start_date'])); else echo '&nbsp;'; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Prorated End Date'); ?></td>
                            <td><?php if ($lease['Lease']['prorated_end_date'] != '') echo date('l, F jS Y', strtotime($lease['Lease']['prorated_end_date']));  else echo '&nbsp;';?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Prorated Rent Due Date'); ?></td>
                            <td><?php if ($lease['Lease']['prorated_rent_due_date'] != '') echo date('l, F jS Y', strtotime($lease['Lease']['prorated_rent_due_date'])); else echo '&nbsp;'; ?></td>
                        </tr>
                    </table>
                </fieldset>


                <fieldset class="top-only"><h3 class="push-b">Advance Rent</h3>
                    <table class="list-items">
                        <tr>
                            <td><?php echo __('Advance Rent'); ?></td>
                            <td><?php echo "$" . number_format($lease['Lease']['advance_rent'], 2); ?></td>
                        </tr>

                        <?php //if ($lease['Lease']['lease_type'] == 'short') { ?>
                            <tr>
                                <td><?php echo __('Sales Tax'); ?></td>
                                <td><?php echo "$" . number_format($lease['Lease']['advance_sales_tax'], 2); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('County Tax'); ?></td>
                                <td><?php echo "$" . number_format($lease['Lease']['advance_county_tax'], 2); ?></td>
                            </tr>
                        <?php //} ?>
                    </table>
                </fieldset>


                <fieldset class="top-only"><h3 class="push-b">Security Deposit</h3>
                    <table class="list-items">
                        <tr>
                            <td><?php echo __('Security Deposit'); ?></td>
                            <td><?php echo "$" . $lease['Lease']['security_deposit']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Security Deposit Account Type'); ?></td>
                            <td><?php echo ($lease['Lease']['security_deposit_account_type'] == Configure::read('Lease.account_type_interest') ? 'Interest Bearing' : 'Non-Interest Bearing'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Name and Address of Bank where Security Deposit Held'); ?></td>
                            <td><?php echo $lease['Lease']['security_deposit_bank_account']; ?></td>
                        </tr>
                    </table>
                </fieldset>

                <?php if ($lease['Lease']['lease_type'] != 'short') { ?>
                    <fieldset class="top-only"><h3 class="push-b">Termination and Renewal of Lease</h3>
                        <table class="list-items">
                            <tr>
                                <td><?php echo __('Notice of Tenant Non-Renewal'); ?></td>
                                <td><?php echo $lease['Lease']['notice_non_renewal'] . ' Days'; ?></td>
                            </tr>
                        </table>
                    </fieldset>
                <?php } ?>

                <fieldset class="top-only"><h3 class="push-b">Vacating</h3>
                    <table class="list-items">
                        <tr>
                            <td><?php echo __('Cleaning Mandatory Minimum Charge'); ?></td>
                            <td><?php echo ($lease['Lease']['cleaning_charge'] == 0 ? 'No' : 'Yes'); ?>
                                <?php
                                    if ($lease['Lease']['cleaning_charge'] == 1) {
                                        if (is_numeric($lease['Lease']['cleaning_charge_fee'])) echo ' - $' . number_format($lease['Lease']['cleaning_charge_fee'], 2);
                                        else echo ' - ' . $lease['Lease']['cleaning_charge_fee'];
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo __('Carpet/Floor Cleaning Mandatory Minimum Charge'); ?></td>
                            <td><?php echo ($lease['Lease']['carpet_charge'] == 0 ? 'No' : 'Yes'); ?>
                                <?php
                                    if ($lease['Lease']['carpet_charge'] == 1) {
                                        if (is_numeric($lease['Lease']['carpet_charge_fee'])) echo ' - $' . number_format($lease['Lease']['carpet_charge_fee'], 2);
                                        else echo ' - ' . $lease['Lease']['carpet_charge_fee'];
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo __('Missing Keys, Garage Remotes, Access Card Mandatory Minimum Charge'); ?></td>
                            <td><?php echo ($lease['Lease']['key_charge'] == 0 ? 'No' : 'Yes'); ?>
                                <?php
                                    if ($lease['Lease']['key_charge'] == 1) {
                                        if (is_numeric($lease['Lease']['key_charge_fee'])) echo ' - $' . number_format($lease['Lease']['key_charge_fee'], 2);
                                        else echo ' - ' . $lease['Lease']['key_charge_fee'];
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>
                </fieldset>


                <fieldset class="top-only"><h3 class="push-b">Appliances and Fixtures</h3>
                    <p><?php echo __('Appliances and Fixtures Included, Repaired and Maintained by the Landlord.'); ?></p>
                    <table class="list-items">
                        <tr>
                            <td><?php echo __('Ceiling Fans'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_ceiling_fans'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Dishwasher'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_dishwasher'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Dryer'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_dryer'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Garbage Disposal'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_garbage_disposal'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Irrigation/Sprinkler System'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_irrigation'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Microwave'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_microwave'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Oven'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_oven'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Range'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_range'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Refrigerator'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_refrigerator'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Washer'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_washer'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Water Softener'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_water_conditioner'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Water Heater'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_water_heater'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Window Blinds'); ?></td>
                            <td><?php echo ($lease['Lease']['appliances_window_blinds'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Other'); ?></td>
                            <td><?php echo $lease['Lease']['appliances_other_desc']; ?></td>
                        </tr>
                    </table>
                </fieldset>

                <?php if ($lease['Lease']['lease_type'] != 'short') { ?>
                    <fieldset class="top-only"><h3 class="push-b">Property Maintenance and Repair</h3>
                        <p><?php echo __('Maintenance and Repairs at Tenant\'s Expense.'); ?></p>
                        <table class="list-items">
                            <tr>
                                <td><?php echo __('A/C Filters'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_ac_filters'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('All Drain Lines'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_drain_lines'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Ceiling Fans'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_ceiling_fans'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Dishwasher'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_dishwasher'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Dryer'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_dryer'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Garbage Disposal'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_garbage_disposal'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Irrigation/Sprinkler System'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_irrigation'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Locks and Keys'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_locks'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Microwave'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_microwave'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Oven'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_oven'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Range'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_range'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Refrigerator'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_refrigerator'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Refrigerator Ice Maker'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_refrigerator_ice_maker'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Refrigerator Water Dispenser'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_refrigerator_dispenser'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Refrigerator Water Filter'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_refrigerator_filter'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Smoke Detector Batteries'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_smoke_detector'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Washer'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_washer'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Water Softener'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_water_conditioner'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Water Filter'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_water_filter'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Water Heater'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_water_heater'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Window Blinds'); ?></td>
                                <td><?php echo ($lease['Lease']['maintenance_window_blinds'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <?php if ($lease['Lease']['lease_type'] == 'single') { ?>
                                <tr>
                                    <td><?php echo __('Windows & Screens'); ?></td>
                                    <td><?php echo ($lease['Lease']['maintenance_windows_screens'] == 0 ? 'No' : 'Yes'); ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td><?php echo __('Other'); ?></td>
                                <td><?php echo $lease['Lease']['maintenance_other_desc']; ?></td>
                            </tr>
                        </table>
                    </fieldset>
                <?php } ?>


                <?php if ($lease['Lease']['lease_type'] == 'single') { ?>
                    <fieldset class="top-only"><h3 class="push-b">Landscaping and Pool Maintenance</h3>
                        <table class="list-items">
                            <tr>
                                <td><?php echo __('If there is a lawn or landscaping to maintain at the Property who is responsible'); ?></td>
                                <td><?php echo ($lease['Lease']['lawn'] == 0 ? 'Tenant' : 'Landlord'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Is there a pool or hot tub at the Property'); ?></td>
                                <td><?php echo ($lease['Lease']['pool'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <?php if ($lease['Lease']['pool'] == 1) { ?>
                                <tr>
                                    <td><?php echo __('Who will maintain the pool/hot tub'); ?></td>
                                    <td>
                                        <?php switch ($lease['Lease']['pool_maintain']) {
                                            case 1: echo 'Professional Pool Company'; break;
                                            case 2: echo 'Landlord'; break;
                                            case 3: echo 'Tenant'; break;
                                        } ?>
                                    </td>
                                </tr>

                                <?php if ($lease['Lease']['pool_maintain'] == 1) { ?>
                                    <tr>
                                        <td><?php echo __('Who will pay for the professional pool company'); ?></td>
                                        <td><?php echo ($lease['Lease']['pool_maintain_pay'] == 0 ? 'Tenant' : 'Landlord'); ?></td>
                                    </tr>
                                <?php } ?>

                                <tr>
                                    <td><?php echo __('Who will pay for the repair or replacement of pool components such as filters and heating system parts'); ?></td>
                                    <td><?php echo ($lease['Lease']['pool_repair'] == 0 ? 'Tenant' : 'Landlord'); ?></td>
                                </tr>
                            <?php } ?>
                            </tr>
                        </table>
                    </fieldset>
                <?php } ?>


                <fieldset class="top-only"><h3 class="push-b">Utilities</h3>
                    <table class="list-items">
                        <tr>
                            <td><?php echo __('Is Landlord responsible to provide and pay for any utilities'); ?></td>
                            <td><?php echo ($lease['Lease']['utilities'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                    </table>

                    <?php if ($lease['Lease']['utilities'] == 1) { ?>
                        <table class="list-items">
                            <tr>
                                <td><?php echo __('Basic Cable'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_cable'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Electricity'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_electricity'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Garbage'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_garbage'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Gas'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_gas'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Internet'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_internet'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <!--tr>
                                <td><?php echo __('Local Phone'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_local_phone'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Oil'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_oil'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr-->
                            <tr>
                                <td><?php echo __('Reclaimed Water'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_reclaimed_water'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Recycling Pickup'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_recycling_pickup'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Satellite'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_satellite'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Sewer'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_sewer'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Trash Pickup'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_trash_pickup'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Water'); ?></td>
                                <td><?php echo ($lease['Lease']['utilities_water'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Other'); ?></td>
                                <td><?php echo $lease['Lease']['utilities_other_desc']; ?></td>
                            </tr>
                        </table>
                    <?php } ?>
                </fieldset>


                <?php if ($lease['Lease']['lease_type'] == 'single' || $lease['Lease']['lease_type'] == 'short') { ?>
                    <fieldset class="top-only"><h3 class="push-b">Vehicles</h3>
                        <table class="list-items">
                            <tr>
                                <td><?php echo __('What vehicles other than standard automobiles and motorcycles are permitted on the property?'); ?></td>
                                <td><?php echo ($lease['Lease']['vehicles_permitted'] == 0 ? 'Do not specify particular vehicles' : 'The following specific vehicles'); ?></td>
                            </tr>
                        </table>
                        <?php if ($lease['Lease']['vehicles_permitted'] == 1) echo $this->element('vehicles'); ?>
                    </fieldset>
                    <?php } ?>


                <fieldset class="top-only"><h3 class="push-b">Additional Provisions</h3>
                    <table class="list-items">
                        <tr>
                            <td><?php echo __('Is smoking permitted inside the property?'); ?></td>
                            <td><?php echo ($lease['Lease']['smoking_inside'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Is smoking permitted on the porches, patios and balconies?'); ?></td>
                            <td><?php echo ($lease['Lease']['smoking_outside'] == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>

                        <?php if ($lease['Lease']['lease_type'] == 'single' || $lease['Lease']['lease_type'] == 'short') { ?>
                            <tr>
                                <td><?php echo __('Commission Paid to Broker on Sale of Property?'); ?></td>
                                <td><?php echo ($lease['Lease']['sales_commission_paid'] == 0 ? 'No' : 'Yes'); ?>
                                    <?php if ($lease['Lease']['sales_commission_paid'] == 1) echo ' - ' . $lease['Lease']['sales_commission'] . '%'; ?>
                                </td>
                            </tr>
                        <?php } ?>

                        <?php if ($lease['Lease']['lease_type'] == 'single') { ?>
                            <tr>
                                <td><?php echo __('Lease Termination on Sale or Contract Clause?'); ?></td>
                                <td><?php echo ($lease['Lease']['lease_termination'] == 0 ? 'No' : 'Yes'); ?></td>
                            </tr>
                        <?php } ?>

                        <?php
                            foreach ($provisions as $provision) {
                                echo '<tr><td colspan="2" style="padding-bottom:15px !important;">' . $provision['LeaseProvision']['description'] . '</td></tr>';
                            }
                        ?>
                    </table>
                </fieldset>
          </fieldset>



          <fieldset>
            <h3 class="push-b">Lease Addendum</h3>
                <table class="list-items">
                    <tr>
                        <td><?php echo __('Was the property built before 1978?'); ?></td>
                        <td><?php echo ($lease['Lease']['prior_1979'] == 0 ? 'No' : 'Yes'); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Does the tenant have a Pet?'); ?></td>
                        <td><?php echo ($lease['Lease']['pet'] == 0 ? 'No' : 'Yes'); ?></td>
                    </tr>
                </table>

                <?php if ($lease['Lease']['pet'] == 1) { ?>
                <table class="list-items">
                    <tr>
                        <td><?php echo __('Monthly Pet Fee'); ?></td>
                        <td><?php echo '$' . number_format($lease['Lease']['monthly_pet_fee'], 2); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Non-Refundable Fee'); ?></td>
                        <td><?php echo '$' . number_format($lease['Lease']['pet_fee'], 2); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo __('Additional Security Deposit'); ?></td>
                        <td><?php echo '$' . number_format($lease['Lease']['pet_deposit'], 2); ?></td>
                    </tr>
                </table>

                <?php echo $this->element('pets'); } ?>


                <table class="list-items">
                    <tr>
                        <td><?php echo __('Is there a Personal Guaranty?'); ?></td>
                        <td><?php echo ($lease['Lease']['personal_guaranty'] == 0 ? 'No' : 'Yes'); ?>
                            <?php if ($lease['Lease']['personal_guaranty'] == 1) echo ' - ' . $lease['Lease']['how_many_guarantors']; ?>
                        </td>
                    </tr>
                </table>

                <table class="list-items">
                    <tr>
                        <td><?php echo __('Is this a waterfront property? (ocean/river/pond/canal)'); ?></td>
                        <td><?php echo ($lease['Lease']['waterfront'] == 0 ? 'No' : 'Yes'); ?></td>
                    </tr>
                </table>

                <?php if ($lease['Lease']['lease_type'] == 'single') { ?>
                    <table class="list-items">
                        <tr>
                            <td><?php echo __('Allow Tenant Option for Early Lease Termination?'); ?></td>
                            <td><?php echo ($lease['Lease']['early_termination'] == 0 ? 'No' : 'Yes'); ?>
                                <?php if ($lease['Lease']['early_termination'] == 1) echo ' - $' . $lease['Lease']['early_termination_fee']; ?>
                            </td>
                        </tr>
                    </table>
                <?php } ?>
            </fieldset>



            <fieldset class="payfield">
                <!--<h3 class="push-b">Client Documents</h3>-->
                <h3 class="secondh3 push-b">Client Charges</h3>

                <div id="divClientDocuments">
                    <?php if ($lease['Document']['lease_ext'] == 'pdf' || $lease['Status']['step'] == Configure::read('Lease.status_step_draft')) { ?>
                        <td>
                            <div class="documentList">
                                <ul>
                                    <?php
                                        $path = str_replace('leases', '', $lease['Document']['path']);
                                    $year = '20' . substr($path, 1, 2);
                                    if ($lease['Status']['step'] == Configure::read('Lease.status_step_draft')) {
                                        $title = ' Lease Agreement (DRAFT)';
                                        $filename = '_residential_lease_agreement_DRAFT.pdf';
                                    } else {
                                        $title = ' Lease Agreement';
                                        $filename = '_residential_lease_agreement.pdf';
                                    }

                                        echo '<li>' . $this->Html->link(
                                        $this->Html->image('pdf.png') . $title, 
                                            array(
                                        'admin' => true,
                                        'controller' => 'documentTemplates',
                                        'action' => 'download_documents',
                                        $path,
                                        $year . '_' . $lease['Lease']['id'] . $filename,
                                        true
                                    ),
                                    array(
                                        'escape' => false
                                    )
                                        ) . '</li>';
                                    ?>
                                </ul>
                            </div>
                        </td>
                    <?php } ?>

                    <td>
                        <p><strong>Administrative Documents</strong></p>
                        <?php
                            if(substr($lease['Payment']['transaction_id'], 0, 1) == 'C') {
                                echo $this->Html->link('Invoiced Amount', array('controller' => 'payments', 'action' => 'view', $lease['Payment']['id'], 'leases'));
                            }
                            else {
                                echo $this->Html->link('Receipt', array('controller' => 'payments', 'action' => 'view', $lease['Payment']['id'], 'leases'));
                            }
                            //if ($lease['Payment']['signature'] != '') {
                                echo '<br />';
                                echo $this->Html->link('Fee Agreement', array('controller' => 'payments', 'action' => 'view_fee_agreement', $lease['Payment']['id'], 'lease'));
                            //}
                        ?>
                        &nbsp;
                    </td>
                </div>

                <div id="divClientFees" class="push-t col-xs-6">
                    <?php
                      echo '<div class="left feesDetailsLease">New lease:</div><div class="right feesDetailsAmount"><div class="right">$' . number_format($lease['Payment']['amount'], 2) . '</div></div><br class="clear" />';
                      echo '<div class="left feesDetailsLease total"><strong>Total:</strong></div><div class="right feesDetailsAmount total"><div class="right">$' . number_format($lease['Payment']['amount'], 2) . '</div></div><br class="clear" />';
                    ?>
                </div>

                <br class="clear" />
            </fieldset>
        </div>
    </div>

<script>
function resizeGridItem(item){
    grid = document.getElementsByClassName("view-info-table")[0];
    rowHeight = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-auto-rows'));
    rowGap = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-row-gap'));
    rowSpan = Math.ceil((item.querySelector('fieldset').getBoundingClientRect().height+rowGap)/(rowHeight+rowGap));
    item.style.gridRowEnd = "span "+rowSpan;
}

function resizeAllGridItems(){
    allItems = document.getElementsByClassName("fieldset");
    for(x=0;x<allItems.length;x++){
        resizeGridItem(allItems[x]);
    }
}

function resizeInstance(instance){
    item = instance.elements[0];
    resizeGridItem(item);
}

window.onload = resizeAllGridItems();
window.addEventListener("resize", resizeAllGridItems);

allItems = document.getElementsByClassName("fieldset");
for(x=0;x<allItems.length;x++){
    imagesLoaded( allItems[x], resizeInstance);
}
</script>
