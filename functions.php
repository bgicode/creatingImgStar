<?php
function createBackground(int $width, int $height): GdImage
{
    $im = imageCreateTrueColor($width, $height);
    imagesavealpha($im, true);
    imagefill($im, 0, 0, imagecolorallocatealpha($im, 0, 0, 0, 127));
    return $im;
}

function createElips(int $width, int $height, int $red, int $green, int $blue): GdImage
{
    $Elips = createBackground($width, $height);
    $color = imageColorAllocate($Elips, $red, $green, $blue);
    imagefilledellipse($Elips, $width / 2, $height / 2, $width, $height, $color);
    return $Elips;
}

function rotateImg(GdImage $GdImage, int $angle): GdImage
{
    $intermediate = imagerotate($GdImage, $angle, 0);
    $width = imagesx($intermediate);
    $height = imagesy($intermediate);

    $new = imagecreatetruecolor($width, $height);
    $transparent = imagecolorallocatealpha($new, 0, 0, 0, 127);
    $rotate = imagerotate($GdImage, $angle, $transparent);
    imagealphablending($rotate, true);
    imagesavealpha($rotate, true);
    return $rotate;
}