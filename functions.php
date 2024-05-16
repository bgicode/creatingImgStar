<?php

function createBackground(int $width, int $height)
{
    $im = imageCreateTrueColor($width, $height);
    imagesavealpha($im, true);
    imagefill($im, 0, 0, imagecolorallocatealpha($im, 0, 0, 0, 127));
    return $im;
}

function createElips(int $width, int $height, int $red, int $green, int $blue)
{
    $elips = createBackground($width, $height);
    $color = imageColorAllocate($elips, $red, $green, $blue);
    imagefilledellipse($elips, $width / 2, $height / 2, $width, $height, $color);
    return $elips;
}

function rotateImg($gdImage, int $angle)
{
    $intermediate = imagerotate($gdImage, $angle, 0);
    $width = imagesx($intermediate);
    $height = imagesy($intermediate);

    $new = imagecreatetruecolor($width, $height);
    $transparent = imagecolorallocatealpha($new, 0, 0, 0, 127);
    $rotate = imagerotate($gdImage, $angle, $transparent);
    imagealphablending($rotate, true);
    imagesavealpha($rotate, true);
    return $rotate;
}