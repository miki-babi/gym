<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function generateQrCode()
    {
        $gymid = 'member' . 123;
        $directoryPath = storage_path("app/private/qrcodes");
        $filePath = $directoryPath . "/$gymid-qrcode.png";

        // Check if the directory exists, if not, create it
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        QrCode::format('png')->size(300)->generate("https://example.com?$gymid", $filePath);
        dd($filePath);
        return response()->download($filePath);
    }
}
