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

$eye = createElips(56, 76, 0, 0, 0);
$flash = createElips(25, 25, 255, 255, 255);
imagecopy($eye, $flash, (int)((imagesx($eye) - imagesx($flash)) / 2), 13, 0, 0, imagesx($flash), imagesy($flash));

$eyeLeft = rotateImg($eye, 340);

$eyes = createBackground(240, imagesy($eyeLeft));
imagecopy($eyes, $eyeLeft, 0, 0, 0, 0, imagesx($eyeLeft), imagesy($eyeLeft));

$eyeRight = rotateImg($eye, 20);
imagecopy($eyes, $eyeRight, imagesx($eyes) - imagesx($eyeRight), 0, 0, 0, imagesx($eyeLeft), imagesy($eyeLeft));

// End Eye____________

// Start сheeks____________

$cheek = createElips(97, 57, 244, 148, 191);
$cheeks = createBackground(460, imagesy($cheek));

imagecopy($cheeks, $cheek, 0, 0, 0, 0, imagesx($cheek), imagesy($cheek));
imagecopy($cheeks, $cheek, imagesx($cheeks) - imagesx($cheek), 0, 0, 0, imagesx($cheek), imagesy($cheek));

// End сheeks____________

// Start Smile___________

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

imagecopy($im, $eyes, (int)(imagesx($im) - imagesx($eyes)) / 2, 370, 0, 0, imagesx($eyes), imagesy($eyes));

imagecopy($im, $cheeks, (int)(imagesx($im) - imagesx($cheeks)) / 2, 430, 0, 0, imagesx($cheeks), imagesy($cheeks));

// End add other_________

header("Content-type: image/png");
imagePng($im);
