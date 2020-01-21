Case Information
Date: <?php echo date('m/d/Y'); ?>

Parties: <?php echo strtoupper($eviction['Eviction']['property_owner_first_name']) ?> <?php echo strtoupper($eviction['Eviction']['property_owner_last_name']) ?> vs. <?php echo $defendants ?>

Service: <?php echo $eviction['Service']['name'] ?>


<?php
if (isset($is_user) && $is_user) {
    echo $eviction['DamagesStatus']['email_text'];
    echo "\r\n\r\nMore Detail: " . $this->Html->url('/evictions/status/' . $eviction['Eviction']['id'], true);
} else {
    echo $eviction['DamagesStatus']['extra_email_text'];
}