<?php
require_once "core/init.php"; 

// echo $_Dictionary->string('consumed-e'); 

echo "FTS"."021"."2"."00"."4".date('s');

$_ID_ = "FTS".data('y');

echo

require_once 'config/phpqrcode/qrlib.php';

                            $text = "ABCDEFGHIJ";
                            $enco = "https://www.youtube.com/watch?v=dzgEjZyN9ec";
							$folder='includes/';
							$file_name=$text.".png";
							$file_name=$folder.$file_name;
							QRcode::png($enco, $file_name);

?>
                           <img style=" margin-top: -15px;width: 300px" src='<?=$file_name?>'>


