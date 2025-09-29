<?php

namespace App\Http\Controllers;
use App\Models\Rezervacija;
use Barryvdh\DomPDF\Facade\Pdf; 
use App\Models\User;
use Illuminate\Http\Request;


class PDFController extends Controller
{
    public function generatePDF()
    {
        date_default_timezone_set('Europe/Berlin');

        $orders=Rezervacija::all();
        $data = [
            'title' => 'Spisak narudzbina - ' .date('d.m.Y H:i'),
            'orders'=>$orders
        ];

        $pdf = PDF::loadView('pdf.orders', $data);

        return $pdf->download('document.pdf');
    }
}
