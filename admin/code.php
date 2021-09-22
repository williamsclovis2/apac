<?php
require_once "core/init.php"; 


$_DATA_ = FutureEventController::getActivePacipationCategoryByEventID(7);

echo '<pre>';
print_r($_DATA_);
echo '</pre>';