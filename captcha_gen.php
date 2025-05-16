<?php
session_start(); //session start is important
$random_alpha = md5(rand()); //generation of random string
/** Genrate a captcha of length 6 */
$captcha_code = substr($random_alpha, 0, 6);
$_SESSION["captcha_code"] = $captcha_code;
/* Width and Height of captcha */
$target_layer = imagecreatetruecolor(145, 50);
/* Backgorund color of captcha */
$captcha_background = imagecolorallocate($target_layer, 255, 195, 95);
imagefill($target_layer, 0, 0, $captcha_background);
/* Captch Text Color RGB */
$captcha_text_color = imagecolorallocate($target_layer, 29, 35, 10);

/* Text size and properties */
$font_size = 25;
$img_width = 70;
$img_height = 48;
/** For Lines */
$line_color = imagecolorallocate($target_layer, 14, 34, 64);
for ($i = 0; $i < 3; $i++) {
    imageline($target_layer, 0, rand() % 50, 200, rand() % 50, $line_color);
}

/*For pixels */
$pixel_color = imagecolorallocate($target_layer, 0, 0, 255);
for ($i = 0; $i < 1000; $i++) {
    /** width and height of text image rand() */
    imagesetpixel($target_layer, rand() % 200, rand() % 100, $pixel_color);
}
/* Text Font */
$font = 'assets/font/BRITANIC.TTF';
/* you are the one is a font file */
imagettftext($target_layer, $font_size, 0, 25, 35, $captcha_text_color, $font, $captcha_code);


header("Content-type: image/jpeg");
imagejpeg($target_layer);
