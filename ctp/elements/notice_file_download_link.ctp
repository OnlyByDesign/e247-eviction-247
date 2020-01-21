<?php

	$extension = $document[$document_type . '_ext'];
	$link_label = __($document_type, true);
	if (isset($label)) {
		if ($label != '') $link_label = $label;
	}
	
	if (!empty($extension)) {
	    echo $this->Html->link(
	        $this->Html->image($extension . '.png') . ' ' . $link_label,
	        array(
	            'admin' => false,
	            'controller' => 'documentTemplates',
	            'action' => 'download_notice_documents',
	            $document_type,
	            $notice_id
	        ),
	        array(
	            'escape' => false,
	            'class' => 'download-link'
	        )
	    );
	}