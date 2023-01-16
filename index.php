<?php

declare(strict_types=1);

if (exec("adb devices -l", $output, $exitCode) !== false && $exitCode !== 0) {
    die("failed to perform `adb` command");
}

array_shift($output);
array_pop($output);

$devices = array_map(fn(string $deviceInfo) => array_values(array_filter(explode(" ", $deviceInfo))), $output);
if (count($devices) !== 1) {
    die("you can only connect 1 device to take screenshot from it");
}

$device = $devices[0];
$model = explode(":", $device[4])[1];
$date = date("Y_m_d_H_i_s");

header("Content-Type: image/png");
header("Content-Disposition: inline; filename=\"$date-$model.png\"");

ob_start();
passthru("adb shell screencap -p", $exitCode);
$output = ob_get_contents();
ob_end_clean();

$buffer = PHP_OS_FAMILY === "Linux" ? $output : str_replace("\r\n", "\n", $output);
$image = imagecreatefromstring($buffer);
imagepng($image);
imagedestroy($image);
