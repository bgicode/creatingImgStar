<?php
declare(strict_types = 1);
include_once('functions.php');

// Start Star_______________

$im = createBackground(920, 855);

$color = imageColorAllocate($im, 225, 240, 0);

$arStarCoord = [
    27, 329,
    316, 271,
    460, 10,
    603, 271,
    892, 329,
    692, 547,
    727, 833,
    460, 718,
    192, 844,
    227, 547
];

imageFilledPolygon($im, $arStarCoord, count($arStarCoord) / 2, $color);

// End Star_______________

// Start Eye____________

$Eye = createElips(56, 76, 0, 0, 0);
$flash = createElips(25, 25, 255, 255, 255);
imagecopy($Eye, $flash, (int)((imagesx($Eye) - imagesx($flash)) / 2), 13, 0, 0, imagesx($flash), imagesy($flash));

$EyeLeft = rotateImg($Eye, 340);

$Eyes = createBackground(240, imagesy($EyeLeft));
imagecopy($Eyes, $EyeLeft, 0, 0, 0, 0, imagesx($EyeLeft), imagesy($EyeLeft));

$EyeRight = rotateImg($Eye, 20);
imagecopy($Eyes, $EyeRight, imagesx($Eyes) - imagesx($EyeRight), 0, 0, 0, imagesx($EyeLeft), imagesy($EyeLeft));

// End Eye____________

// Start сheeks____________

$cheek = createElips(97, 57, 244, 148, 191);
$cheeks = createBackground(460, imagesy($cheek));

imagecopy($cheeks, $cheek, 0, 0, 0, 0, imagesx($cheek), imagesy($cheek));
imagecopy($cheeks, $cheek, imagesx($cheeks) - imagesx($cheek), 0, 0, 0, imagesx($cheek), imagesy($cheek));

// End сheeks____________

// Start Smile___________

// $arc = createBackground(120, 120);
// imageantialias($arc, true);
// $arcColor = [ 0, 0, 0];
// imageSetStyle($arc, $arcColor);
// imageSetThickness($arc, 12);
// imagearc($arc, (imagesx($arc) / 2), (imagesy($arc) / 2) - 12, imagesx($arc), imagesy($arc), 25, 155, IMG_COLOR_STYLED);

$smile = createBackground(120,120);
$smElips1 = createElips(120, 120, 0, 0, 0);
$smElips2 = createElips(102, 102, 225, 240, 0);

$smRec = imageCreateTrueColor(120, 60);
$colorRec = imageColorAllocate($smRec, 225, 240, 0);
imagefill($smRec, 0, 0, $colorRec);

// End Smile_____________

// Start add smile__________

imagecopy($im, $smElips1, (int)(imagesx($im) - imagesx($smElips1)) / 2, 420, 0, 0, imagesx($smElips1), imagesy($smElips1));

imagecopy($im, $smElips2, (int)(imagesx($im) - imagesx($smElips2)) / 2, 420 + (imagesx($smElips1) - imagesx($smElips2)) / 2, 0, 0, imagesx($smElips2), imagesy($smElips2));

imagecopy($im, $smRec, (int)(imagesx($im) - imagesx($smRec)) / 2, 420, 0, 0, imagesx($smRec), imagesy($smRec));

// End add smile__________

// Start add other_________

imagecopy($im, $Eyes, (int)(imagesx($im) - imagesx($Eyes)) / 2, 370, 0, 0, imagesx($Eyes), imagesy($Eyes));

imagecopy($im, $cheeks, (int)(imagesx($im) - imagesx($cheeks)) / 2, 430, 0, 0, imagesx($cheeks), imagesy($cheeks));

// End add other_________

// imagecopy($im, $arc, (imagesx($im) - imagesx($arc)) / 2, 410, 0, 0, imagesx($arc), imagesy($arc));

header("Content-type: image/png");
imagePng($im);
