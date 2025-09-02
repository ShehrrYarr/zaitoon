<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use Illuminate\Http\Response;

class MobileLabelController extends Controller
{
    public function zpl(Mobile $mobile): Response
    {
        // Resolve display values (fall back to N/A where needed)
        $mobileName  = $mobile->mobile_name_id ? ($mobile->mobileName->name ?? 'N/A') : ($mobile->mobile_name ?? 'N/A');
        $companyName = optional($mobile->company)->name ?? 'N/A';
        $color       = $mobile->color ?? 'N/A';
        $imei        = $mobile->imei_number ?? 'N/A';

        // Trim and sanitize (ZPL is picky; remove carets and escaped chars)
        $san = fn($v) => trim(str_replace(['^','~','\\'], '', (string)$v));

        $mobileName  = mb_strimwidth($san($mobileName), 0, 28, ''); // keep it short to avoid overflow
        $companyName = mb_strimwidth($san($companyName), 0, 28, '');
        $color       = mb_strimwidth($san($color), 0, 20, '');
        $imeiRaw     = preg_replace('/\D+/', '', $imei); // digits only
        $imeiSpaced  = trim(chunk_split($imeiRaw, 5, ' '));

        // Basic, readable 2.25" label (203 dpi)
        $zpl = "^XA
^PW448
^LL400
^CF0,30
^FO20,20^FD{$mobileName}^FS
^CF0,26
^FO20,60^FD{$companyName}^FS
^FO20,95^FDColor: {$color}^FS
^BY2,2,80
^FO20,140^BCN,80,Y,N,N
^FD{$imeiRaw}^FS
^CF0,24
^FO20,235^FDIMEI: {$imeiSpaced}^FS
^XZ";

        return response($zpl, 200)->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
