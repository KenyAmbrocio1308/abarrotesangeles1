<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
	include '../res/x5engine.php';
	$form = new ImForm();
	$form->setField('Nombre Completo', @$_POST['imObjectForm_1_1'], '', false);
	$form->setField('Correo', @$_POST['imObjectForm_1_2'], '', false);
	$form->setField('MENSAJE', @$_POST['imObjectForm_1_3'], '', false);

	if(@$_POST['action'] != 'check_answer') {
		if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != 'AC4F7888A840BBBAE5388ABD39FBAC17' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
			die(imPrintJsError());
		$form->mailToOwner($_POST['imObjectForm_1_2'] != "" ? $_POST['imObjectForm_1_2'] : 'kenyambrocio1308@gmail.com', 'kenyambrocio1308@gmail.com', '', '', false);
		$form->mailToCustomer('kenyambrocio1308@gmail.com', $_POST['imObjectForm_1_2'], '', 'Correo recibido correctamente, nos contactaremos con usted en breve.

- Lic. Keny Ambrocio', false);
		@header('Location: ../index.html');
		exit();
	} else {
		echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
	}
}

// End of file