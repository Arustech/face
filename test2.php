<?php

$ffmpeg = trim(shell_exec('which ffmpeg'));

if (empty($ffmpeg))
{
    die('ffmpeg not available');
}

shell_exec($ffmpeg . ' -i ...');

?>