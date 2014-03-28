<?php
include('/lib/Main.php');
$main = new Main;
$img = $main->load_model('Image');
$img->create_thumb('386596606.png');