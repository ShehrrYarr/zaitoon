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

// $zpl = "^XA
// ^CI28
// ^PW448
// ^LL420
// ^MD30                     // set max darkness

// ^FO20,16^A0N,24,24^FB408,1,0,L,0^FD{$mobileName}^FS

// // Company left
// ^FO20,48^A0N,20,20^FD{$companyName}^FS
// // Color right side
// ^FO220,48^A0N,20,20^FDColor: {$color}^FS

// // SIM Lock below
// ^FO20,74^A0N,20,20^FDSIM Lock: {$san($mobile->sim_lock)}^FS

// // Barcode (no human-readable)
// ^BY2,3,60
// ^FO20,110^BCN,60,N,N,N
// ^FD{$imeiRaw}^FS

// ^XZ";
$zpl = "^XA
^CI28
^PW448
^LL420
^MD30                     // maximum darkness

^FO20,16^A0N,24,24^FB408,1,0,L,0^FD{$mobileName}^FS

// Company left
^FO20,48^A0N,20,20^FD{$companyName}^FS

// Battery Health in the middle
^FO220,48^A0N,20,20^FDBattery: {$mobile->battery_health}^FS

// Storage on the right
^FO220,74^A0N,20,20^FDStorage: {$mobile->storage}^FS

// SIM Lock below
^FO20,74^A0N,20,20^FD{$san($mobile->sim_lock)}^FS

// Barcode (no human-readable text)
^BY2,3,60
^FO20,110^BCN,60,N,N,N
^FD{$imeiRaw}^FS

^XZ";






        return response($zpl, 200)->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
