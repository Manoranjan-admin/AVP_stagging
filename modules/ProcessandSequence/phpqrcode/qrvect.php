<?php
define('QR_VECT', true);

class QRvect
{
    // --------------------------------------------------------------
    // FIXED signature: required params first
    // --------------------------------------------------------------
    public static function eps(
        $frame,
        $back_color = 0xFFFFFF,
        $fore_color = 0x000000,
        $filename = false,
        $pixelPerPoint = 4,
        $outerFrame = 4,
        $saveandprint = false,
        $cmyk = false
    ) {
        $vect = self::vectEPS($frame, $pixelPerPoint, $outerFrame, $back_color, $fore_color, $cmyk);

        if ($filename === false) {
            header("Content-Type: application/postscript");
            echo $vect;
        } else {
            QRtools::save($vect, $filename);
            if ($saveandprint) {
                header("Content-Type: application/postscript");
                echo $vect;
            }
        }
    }

    // --------------------------------------------------------------
    private static function vectEPS(
        $frame,
        $pixelPerPoint = 4,
        $outerFrame = 4,
        $back_color = 0xFFFFFF,
        $fore_color = 0x000000,
        $cmyk = false
    ) {
        $h = count($frame);
        $w = strlen($frame[0]);

        $imgW = $w + 2 * $outerFrame;
        $imgH = $h + 2 * $outerFrame;

        if ($cmyk) {
            // Convert CMYK
            $fore_color_string =
                (($fore_color >> 24) & 0xFF) . ' ' .
                (($fore_color >> 16) & 0xFF) . ' ' .
                (($fore_color >> 8) & 0xFF) . ' ' .
                ($fore_color & 0xFF) . " setcmykcolor\n";

            $back_color_string =
                (($back_color >> 24) & 0xFF) . ' ' .
                (($back_color >> 16) & 0xFF) . ' ' .
                (($back_color >> 8) & 0xFF) . ' ' .
                ($back_color & 0xFF) . " setcmykcolor\n";
        } else {
            // Convert RGB
            $fore_color_string =
                (($fore_color >> 16) & 0xFF) / 255 . ' ' .
                (($fore_color >> 8) & 0xFF) / 255 . ' ' .
                ($fore_color & 0xFF) / 255 . " setrgbcolor\n";

            $back_color_string =
                (($back_color >> 16) & 0xFF) / 255 . ' ' .
                (($back_color >> 8) & 0xFF) / 255 . ' ' .
                ($back_color & 0xFF) / 255 . " setrgbcolor\n";
        }

        $output =
            '%!PS-Adobe EPSF-3.0' . "\n" .
            '%%Creator: PHPQrcodeLib' . "\n" .
            '%%BoundingBox: 0 0 ' . ($imgW * $pixelPerPoint) . ' ' . ($imgH * $pixelPerPoint) . "\n" .
            $pixelPerPoint . ' ' . $pixelPerPoint . " scale\n" .
            $outerFrame . ' ' . $outerFrame . " translate\n" .
            "/F { rectfill } def\n" .
            $back_color_string .
            '-' . $outerFrame . ' -' . $outerFrame . ' ' . ($imgW) . ' ' . ($imgH) . " F\n" .
            $fore_color_string;

        for ($i = 0; $i < $h; $i++) {
            for ($j = 0; $j < $w; $j++) {
                if ($frame[$i][$j] === '1') {
                    $output .= $j . ' ' . ($h - 1 - $i) . " 1 1 F\n";
                }
            }
        }

        return $output . "%%EOF";
    }

    // --------------------------------------------------------------
    public static function svg(
        $frame,
        $back_color = 0xFFFFFF,
        $fore_color = 0x000000,
        $filename = false,
        $pixelPerPoint = 4,
        $outerFrame = 4,
        $saveandprint = false
    ) {
        $vect = self::vectSVG($frame, $pixelPerPoint, $outerFrame, $back_color, $fore_color);

        if ($filename === false) {
            header("Content-Type: image/svg+xml");
            echo $vect;
        } else {
            QRtools::save($vect, $filename);
            if ($saveandprint) {
                header("Content-Type: image/svg+xml");
                echo $vect;
            }
        }
    }

    // --------------------------------------------------------------
    private static function vectSVG(
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

        $output =
            '<?xml version="1.0" encoding="utf-8"?>' . "\n" .
            '<svg xmlns="http://www.w3.org/2000/svg" width="' . ($imgW * $pixelPerPoint) .
            '" height="' . ($imgH * $pixelPerPoint) . '">' . "\n";

        $output .= '<rect width="100%" height="100%" fill="#' . str_pad(dechex($back_color), 6, "0", STR_PAD_LEFT) . '"/>' . "\n";
        $output .= '<g fill="#' . str_pad(dechex($fore_color), 6, "0", "STR_PAD_LEFT") . '">' . "\n";

        for ($i = 0; $i < $h; $i++) {
            for ($j = 0; $j < $w; $j++) {
                if ($frame[$i][$j] === '1') {
                    $x = ($j + $outerFrame) * $pixelPerPoint;
                    $y = ($i + $outerFrame) * $pixelPerPoint;
                    $output .= '<rect x="' . $x . '" y="' . $y . '" width="' . $pixelPerPoint . '" height="' . $pixelPerPoint . '"/>' . "\n";
                }
            }
        }

        return $output . "</g></svg>";
    }
}
