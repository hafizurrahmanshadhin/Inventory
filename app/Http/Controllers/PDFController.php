<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller {
    function getPDF() {
        $pdf = Pdf::loadView('invoice');
        return $pdf->download('invoice.pdf');
    }
}
