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
    $N_name = ;
    $N_lastname = ;
    $N_rate = ;
    $N_arms = ;

    $LS_name = ;
    $LS_lastname = ;
    $LS_rate = ;
    $LS_arms = ;

    $PS_name = ;
    $PS_lastname = ;
    $PS_rate = ;
    $PS_arms = ;

    $SPO_name = ;
    $SPO_lastname = ;
    $SPO_rate = ;
    $SPO_arms = ;

    $LP_name = ;
    $LP_lastname = ;
    $LP_rate = ;
    $LP_arms = ;

    $PP_name = ;
    $PP_lastname = ;
    $PP_rate = ;
    $PP_arms = ;

    $LO_name = ;
    $LO_lastname = ;
    $LO_rate = ;
    $LO_arms = ;

    $PO_name = ;
    $PO_lastname = ;
    $PO_rate = ;
    $PO_arms = ;

    $LSO_name = ;
    $LSO_lastname = ;
    $LSO_rate = ;
    $LSO_arms = ;

    $PSO_name = ;
    $PSO_lastname = ;
    $PSO_rate = ;
    $PSO_arms = ;

    $BR_name = ;
    $BR_lastname = ;
    $BR_rate = ;
    $BR_arms = ;

    echo '<script type="text/JavaScript">';
    echo 'vueApp.players[0].precise[0].name = '.$N_name.';';
    echo 'vueApp.players[0].precise[0].lastname = '.$N_lastname.';';
    echo 'vueApp.players[0].precise[0].rate = '.$N_rate.';';
    echo 'vueApp.players[0].precise[0].arms = '.$N_arms.';';

    echo 'vueApp.players[1].precise[0].name = '.$LS_name.';';
    echo 'vueApp.players[1].precise[0].lastname = '.$LS_lastname.';';
    echo 'vueApp.players[1].precise[0].rate = '.$LS_rate.';';
    echo 'vueApp.players[1].precise[0].arms = '.$LS_arms.';';

    echo 'vueApp.players[1].precise[1].name = '.$PS_name.';';
    echo 'vueApp.players[1].precise[1].lastname = '.$PS_lastname.';';
    echo 'vueApp.players[1].precise[1].rate = '.$PS_rate.';';
    echo 'vueApp.players[1].precise[1].arms = '.$PS_arms.';';

    echo 'vueApp.players[2].precise[0].name = '.$SPO_name.';';
    echo 'vueApp.players[2].precise[0].lastname = '.$SPO_lastname.';';
    echo 'vueApp.players[2].precise[0].rate = '.$SPO_rate.';';
    echo 'vueApp.players[2].precise[0].arms = '.$SPO_arms.';';

    echo 'vueApp.players[3].precise[0].name = '.$LP_name.';';
    echo 'vueApp.players[3].precise[0].lastname = '.$LP_lastname.';';
    echo 'vueApp.players[3].precise[0].rate = '.$LP_rate.';';
    echo 'vueApp.players[3].precise[0].arms = '.$LP_arms.';';

    echo 'vueApp.players[3].precise[1].name = '.$PP_name.';';
    echo 'vueApp.players[3].precise[1].lastname = '.$PP_lastname.';';
    echo 'vueApp.players[3].precise[1].rate = '.$PP_rate.';';
    echo 'vueApp.players[3].precise[1].arms = '.$PP_arms.';';

    echo 'vueApp.players[4].precise[0].name = '.$LO_name.';';
    echo 'vueApp.players[4].precise[0].lastname = '.$LO_lastname.';';
    echo 'vueApp.players[4].precise[0].rate = '.$LO_rate.';';
    echo 'vueApp.players[4].precise[0].arms = '.$LO_arms.';';

    echo 'vueApp.players[4].precise[1].name = '.$PO_name.';';
    echo 'vueApp.players[4].precise[1].lastname = '.$PO_lastname.';';
    echo 'vueApp.players[4].precise[1].rate = '.$PO_rate.';';
    echo 'vueApp.players[4].precise[1].arms = '.$PO_arms.';';

    echo 'vueApp.players[5].precise[0].name = '.$LSO_name.';';
    echo 'vueApp.players[5].precise[0].lastname = '.$LSO_lastname.';';
    echo 'vueApp.players[5].precise[0].rate = '.$LSO_rate.';';
    echo 'vueApp.players[5].precise[0].arms = '.$LSO_arms.';';

    echo 'vueApp.players[5].precise[1].name = '.$PSO_name.';';
    echo 'vueApp.players[5].precise[1].lastname = '.$PSO_lastname.';';
    echo 'vueApp.players[5].precise[1].rate = '.$PSO_rate.';';
    echo 'vueApp.players[5].precise[1].arms = '.$PSO_arms.';';

    echo 'vueApp.players[6].precise[0].name = '.$BR_name.';';
    echo 'vueApp.players[6].precise[0].lastname = '.$BR_lastname.';';
    echo 'vueApp.players[6].precise[0].rate = '.$BR_rate.';';
    echo 'vueApp.players[6].precise[0].arms = '.$BR_arms.';';
    echo '</script>';

    $connection->close();
}
/////////////////////////////////

?>