<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ReportController extends Controller
{

    public function index()
    {
        Paginator::useBootstrap();

        $checkout = Checkout::latest()->paginate(5);

        $data = [
            'checkout' => $checkout
        ];

        return view('pages.report', $data);

    }

    public function CreatePDF()
    {
        $checkout = Checkout::all();
        $data = ['checkout'=> $checkout];
        $pdf = Pdf::loadview('pages.report-pdf', $data);

        return $pdf->download('Report.pdf');
    }
}
