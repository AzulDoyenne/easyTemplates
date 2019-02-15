<?php
	include 'class/template.php';
	
	$tables = array(
		'discussion A' => array(
			1 => array(
				array('text','ID'),
				array('text','Name'),
				array('text','Obs')),
			2 => array(
				array('integer','1'),
				array('text','Test A'),
				array('text','Bla bla')),
			3 => array(
				array('integer','2'),
				array('text','Test B'),
				array('text','Bla bla'))
			)
		);
	
	$tpl = new template();
	foreach($tables as $table => $rows) {
		$tpl->getHtmlBefore('table');
		foreach($rows as $row => $columns) {
			$tpl->getHtmlBefore('row');
			foreach($columns as $column) {
				$tpl->getHtmlBefore('column');
				$tpl->getHtml($column[0], $column[1]);
				$tpl->getHtmlAfter('column');
			}
			$tpl->getHtmlAfter('row');
		}
		$tpl->getHtmlAfter('table');
	}
	
	echo $tpl->printHtml();
?>
