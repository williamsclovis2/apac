<?php
require_once "core/init.php"; 


$_DATA_ = FutureEventController::getVisiblePacipationSubCategory(7, 'INPERSON');

foreach($_DATA_ As $_data):
    $_data = (Object) $_data;
    
    echo '<pre>';
    print_r($_data->participation_type_name);
    echo '</pre>';

endforeach;
