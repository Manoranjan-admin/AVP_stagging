<?php
define('QR_IMAGE', true);

class QRimage
{
    // --------------------------------------------------------------
    // Correct order matching original library (required → optional)
    // --------------------------------------------------------------
    public static function png(
        $frame,
        $filename = false,
        $pixelPerPoint = 4,
        $outerFrame = 4,
        $saveandprint = false,
        $back_color = 0xFFFFFF,
        $fore_color = 0x000000
    ) {
        $image = self::image($frame, $pixelPerPoint, $outerFrame, $back_color, $fore_color);

        if ($filename === false) {
            header("Content-type: image/png");
            imagepng($image);
        } else {
            imagepng($image, $filename);
            if ($saveandprint) {
                header("Content-type: image/png");
                imagepng($image);
            }
        }

        imagedestroy($image);
    }

    // --------------------------------------------------------------
    public static function jpg(
        $frame,
        $filename = false,
        $pixelPerPoint = 8,
        $outerFrame = 4,
        $q = 85
    ) {
        $image = self::image($frame, $pixelPerPoint, $outerFrame);

        if (!$filename) {
            header("Content-type: image/jpeg");
            imagejpeg($image, null, $q);
        } else {
            imagejpeg($image, $filename, $q);
        }

        imagedestroy($image);
    }

    // --------------------------------------------------------------
    private static function image(
        $frame,
        $pixelPerPoint = 4,
        $outerFrame = 4,
        $back_color = 0xFFFFFF,
        $fore_color = 0x000000
    ) {
        $h = count($frame);
        $w = strlen($frame[0]);

        $imgW = $w + 2 * $outerFrame;
        $imgH = $h + 2 * $outerFrame;

        // prevent giant QR memory crash
        if ($imgW * $imgH > 5000 * 5000) {
            die("QR size too large");
        }

        $base = imagecreate($imgW, $imgH);

        // parse colors
        $r1 = ($fore_color >> 16) & 0xFF;
        $g1 = ($fore_color >> 8) & 0xFF;
        $b1 = $fore_color & 0xFF;

        $r2 = ($back_color >> 16) & 0xFF;
        $g2 = ($back_color >> 8) & 0xFF;
        $b2 = $back_color & 0xFF;

        $col[0] = imagecolorallocate($base, $r2, $g2, $b2);
        $col[1] = imagecolorallocate($base, $r1, $g1, $b1);

        imagefill($base, 0, 0, $col[0]);

        for ($y = 0; $y < $h; $y++) {
            for ($x = 0; $x < $w; $x++) {
                if ($frame[$y][$x] == '1') {
                    imagesetpixel($base, $x + $outerFrame, $y + $outerFrame, $col[1]);
                }
            }
        }

        $target = imagecreatetruecolor($imgW * $pixelPerPoint, $imgH * $pixelPerPoint);
        imagecopyresized(
            $target,
            $base,
            0, 0, 0, 0,
            $imgW * $pixelPerPoint,
            $imgH * $pixelPerPoint,
            $imgW,
            $imgH
        );

        imagedestroy($base);
        return $target;
    }
}
