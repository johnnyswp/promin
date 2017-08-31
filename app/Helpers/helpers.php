<?php

function old_input($old,$update,$valor)
{
	if(isset($old)){return $old; }else{
		if(isset($update)){return $valor;}
	}
}