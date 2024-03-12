<!DOCTYPE html>
<html>
<body>

<?php
$letra = 'a'; // Altere para a letra desejada

switch (strtolower($letra)) {
    case 'a':
    case 'e':
    case 'i':
    case 'o':
    case 'u':
        echo "A letra '$letra' é uma vogal.";
        break;
    case 'b':
    case 'c':
    case 'd':
    case 'f':
    case 'g':
    case 'h':
    case 'j':
    case 'k':
    case 'l':
    case 'm':
    case 'n':
    case 'p':
    case 'q':
    case 'r':
    case 's':
    case 't':
    case 'v':
    case 'w':
    case 'x':
    case 'y':
    case 'z':
        echo "A letra '$letra' é uma consoante.";
        break;
    default:
        echo "Não é uma letra.";
}
?>

</body>
</html>
