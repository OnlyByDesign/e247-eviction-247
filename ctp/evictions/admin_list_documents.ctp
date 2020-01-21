
<h2>Pleadings</h2>

<h3><strong>Property address:</strong> <?php echo $address; ?></h3><br />


<ul style="margin-left:20px;">

<?php
	foreach($documents_list as $document) {
			echo '<li>' . $this->Html->link(
			$this->Html->image('pdf.png') . ' ' . $document['name'], 
				array(
            'admin' => true,
            'controller' => 'documentTemplates',
            'action' => 'download_documents',
            /*$eviction_id*/
            $document['path']
        ),
        array(
            'escape' => false,
            'class' => 'download-link'
        )
			) . '</li>';
	}
?>

</ul>