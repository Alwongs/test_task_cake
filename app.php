<?php

require_once("Magic.php");
require_once("Test.php");

if (!empty($_POST["phrase"])) {
    $reversed = Magic::reverseFraseAccordingToTask($_POST["phrase"]);
    header("Location: index.php?reversed=" . $reversed . "&phrase=" . $_POST["phrase"]);
    return;
}

if (
    !empty($_POST["enter"])
    && !empty($_POST["expected"])
) {
    $result = Test::checkMagic($_POST["enter"], $_POST["expected"]);
    $success = $result == "Результат совпадает с ожидаемым" ? 1 : "";
    header("Location: index.php?result=" . $result . "&success=" . $success . "&enter=" . $_POST["enter"] . "&expected=" . $_POST["expected"]);
    return;
}

header("Location: index.php");
