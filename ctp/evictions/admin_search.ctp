<?php
	//Get the current page number
	$page = 1;
	if (isset($this->request->params['named']['page'])) $page = $this->request->params['named']['page'];

	echo $this->element('admin_index_include', array('page' => $page));

	echo $this->Js->writeBuffer();
?>
