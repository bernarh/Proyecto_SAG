<?php
function ValidacionUsername($texto)
{
$n= preg_replace('/[^a-zA-ZαινσϊΑΙΝΣΪρΡράό_]/','',$texto);
return $n;
}
function ValidacionPass($texto)
{
$n= preg_replace('/[^a-zA-ZαινσϊΑΙΝΣΪρΡράό_@0-9]/','',$texto);
return $n;
}

?>