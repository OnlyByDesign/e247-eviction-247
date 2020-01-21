<h2>Admin Dashboard</h2>

<?php
	echo $this->Html->link('Manage Document Templates', array('controller' => 'documenttemplates', 'action' => 'index'));
	echo $this->Html->link('Manage Damage Fees', array('controller' => 'damagefeescategories', 'action' => 'index'));
?>