<?php

namespace App\Helpers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeHelper
{
    /**
     * Generate QR code as base64 encoded image
     * Tries PNG first (requires imagick), falls back to SVG
     */
    public static function generateBase64(string $data, int $size = 180): string
    {
        try {
            // Try PNG format (requires imagick)
            $png = QrCode::format('png')
                ->size($size)
                ->margin(1)
                ->errorCorrection('H')
                ->generate($data);
            
            return 'data:image/png;base64,' . base64_encode($png);
        } catch (\Exception $e) {
            // Fallback to SVG (works without imagick)
            $svg = QrCode::format('svg')
                ->size($size)
                ->margin(1)
                ->errorCorrection('H')
                ->generate($data);
            
            return 'data:image/svg+xml;base64,' . base64_encode($svg);
        }
    }

    /**
     * Generate QR code as inline SVG
     */
    public static function generateInlineSvg(string $data, int $size = 180): string
    {
        return QrCode::size($size)
            ->margin(1)
            ->errorCorrection('H')
            ->generate($data);
    }
}
