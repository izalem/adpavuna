<?php
function validaEmail($email)
{
$pattern = "/^([a-z0-9A-Z-]{1,})(@)([a-zA-Z0-9-]{2,})(\.)(com|net|org|info)(\.)?(br)?/";
if(preg_match($pattern, $email))
{
return true;
}else{
	return false;
	}
}	
function validaSenha($senha)
{
$pattern = "/^([a-z]{1,})([0-9]{1,})$|([0-9]{1,})([a-z]{1,})$|([0-9]{1,})([a-z]{1,})([0-9]{1,})$|([a-z]{1,})([0-9]{1,})([a-z]{1,})$/";
	if(preg_match($pattern, $senha))
	{
	return true;
	}else{
		return false;
		}
}
?>