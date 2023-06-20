<?php
function verifLoc($loc, $listaLocuri, $listaAchizitii)
{
    if (in_array($loc, $listaLocuri) || in_array($loc, $listaAchizitii)) {
        return "disabled ";
    }
    return ' ';
}
function setCuloareRezervari($loc, $listaLocuri, $listaAchizitii)
{
    if (in_array($loc, $listaLocuri)) {
        return "style='background-color:yellow' ";
    } else if (in_array($loc, $listaAchizitii)) {
        return "style='background-color:red' ";
    }
    return "style='background-color:green'";;
}
function verifParola($password)
{
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        return false;
    }
    return true;
}
