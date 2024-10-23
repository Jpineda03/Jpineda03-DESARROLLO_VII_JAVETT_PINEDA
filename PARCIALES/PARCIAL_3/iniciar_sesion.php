<?php
session_start();

$_SESSION['usuario'] = "Javett";
$_SESSION['rol'] = "Profesor";

$_SESSION['usuario'] = "Mario";
$_SESSION['rol'] = "Estudiante";

echo "Sesión iniciada para " . $_SESSION['usuario'];
?>