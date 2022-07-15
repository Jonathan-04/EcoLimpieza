<?php

//Cerrar la Session

session_start();
unset($_SESSION["id"]);
session_destroy();

header("Location: ../index.html");
