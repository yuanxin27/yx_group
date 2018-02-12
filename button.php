
<?php
session_start();

if(isset($_SESSION['otp1']))
{
	if(isset($_POST['Audit_btn']))
	{
		// to update auditor details
		header("Location: updateaudit_input.php");
		exit;
	}



	if(isset($_POST['Auditdel_btn']))
	{
		// to delete auditor account
		header("Location: deleteaudit_data.php");
		exit;
	}



	if(isset($_POST['IT_btn']))
	{
		// to update IT personnel details
		header("Location: updateitp_input.php");
		exit;
	}


	
	if(isset($_POST['ITdel_btn']))
	{
		// to delete IT personnel account
		header("Location: deleteitp_data.php");
		exit;
	}
	
	if(isset($_POST['ITen_btn']))
	{
		// to enable IT personnel account
		header("Location: itenable.php");
		exit;
	}

	if(isset($_POST['home_btn']))
	{
		// back to home
		header("Location: adhome.php");
		exit;
	}



	if(isset($_POST['Reg_btn1']))
	{
		// to make IT personnel account
		header("Location: it_registerinput.php");
		exit;
	}



	if(isset($_POST['Reg_btn2']))
	{
		// to make auditor account
		header("Location: audit_registerinput.php");
		exit;
	}


	if(isset($_POST['register_btn']))
	{
		// to make admin account
		header("Location: registerinput_data.php");
		exit;
	}
}
else
{
	header('Location: logininput_data.php');
}
?>