<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    //
    public function generateQrCode()
    {
        $gymid='member'. 123;
        $qrCode = QrCode::size(300)->generate("https://example.com?$gymid");
        return response($qrCode)->header('Content-Type', 'image/svg+xml');
    }
}
