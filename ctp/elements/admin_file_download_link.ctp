<?php
	$extension = $document[$document_type . '_ext'];
	if (!empty($extension)) {
	    echo $this->Html->link(
	        $this->Html->image($extension . '.png') . ' ' . __($document_type, true),
	        array(
	            'admin' => true,
	            'controller' => 'documentTemplates',
	            'action' => 'download',
	            $document_type,
	            $document['id']
	        ),
	        array(
	            'escape' => false,
	            'class' => 'download-link',
	            'target' => '_blank'
	        )
	    );
	}