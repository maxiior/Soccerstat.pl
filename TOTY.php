<?php
require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

echo $twig->render('TOTY.twig');

//TUTAJ
$connection = @new mysqli($host, $db_user, $db_password, $db_name);

if($connection->connect_errno!=0)
{
    echo '<script type="text/JavaScript">';
    echo 'vueApp.showInfo=true;';
    echo 'vueApp.infoVal="Database connection error.";';
    echo '</script>';
}
else
{
    echo '<script type="text/JavaScript">';
    echo 'vueApp.players[0].precise[0].name = ;';
    echo 'vueApp.players[0].precise[0].lastname = ;';
    echo 'vueApp.players[0].precise[0].rate = ;';
    echo 'vueApp.players[0].precise[0].arms = ;';

    echo 'vueApp.players[1].precise[0].name = ;';
    echo 'vueApp.players[1].precise[0].lastname = ;';
    echo 'vueApp.players[1].precise[0].rate = ;';
    echo 'vueApp.players[1].precise[0].arms = ;';

    echo 'vueApp.players[1].precise[1].name = ;';
    echo 'vueApp.players[1].precise[1].lastname = ;';
    echo 'vueApp.players[1].precise[1].rate = ;';
    echo 'vueApp.players[1].precise[1].arms = ;';

    echo 'vueApp.players[2].precise[0].name = ;';
    echo 'vueApp.players[2].precise[0].lastname = ;';
    echo 'vueApp.players[2].precise[0].rate = ;';
    echo 'vueApp.players[2].precise[0].arms = ;';

    echo 'vueApp.players[3].precise[0].name = ;';
    echo 'vueApp.players[3].precise[0].lastname = ;';
    echo 'vueApp.players[3].precise[0].rate = ;';
    echo 'vueApp.players[3].precise[0].arms = ;';

    echo 'vueApp.players[3].precise[1].name = ;';
    echo 'vueApp.players[3].precise[1].lastname = ;';
    echo 'vueApp.players[3].precise[1].rate = ;';
    echo 'vueApp.players[3].precise[1].arms = ;';

    echo 'vueApp.players[4].precise[0].name = ;';
    echo 'vueApp.players[4].precise[0].lastname = ;';
    echo 'vueApp.players[4].precise[0].rate = ;';
    echo 'vueApp.players[4].precise[0].arms = ;';

    echo 'vueApp.players[4].precise[1].name = ;';
    echo 'vueApp.players[4].precise[1].lastname = ;';
    echo 'vueApp.players[4].precise[1].rate = ;';
    echo 'vueApp.players[4].precise[1].arms = ;';

    echo 'vueApp.players[5].precise[0].name = ;';
    echo 'vueApp.players[5].precise[0].lastname = ;';
    echo 'vueApp.players[5].precise[0].rate = ;';
    echo 'vueApp.players[5].precise[0].arms = ;';

    echo 'vueApp.players[5].precise[1].name = ;';
    echo 'vueApp.players[5].precise[1].lastname = ;';
    echo 'vueApp.players[5].precise[1].rate = ;';
    echo 'vueApp.players[5].precise[1].arms = ;';

    echo 'vueApp.players[6].precise[0].name = ;';
    echo 'vueApp.players[6].precise[0].lastname = ;';
    echo 'vueApp.players[6].precise[0].rate = ;';
    echo 'vueApp.players[6].precise[0].arms = ;';
    echo '</script>';

    $connection->close();
}
/////////////////////////////////

?>