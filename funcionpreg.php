<?php
function ValidacionUsername($texto)
{
$n= preg_replace('/[^a-zA-Z���������������_]/','',$texto);
return $n;
}
function ValidacionPass($texto)
{
$n= preg_replace('/[^a-zA-Z���������������_@0-9]/','',$texto);
return $n;
}

?>