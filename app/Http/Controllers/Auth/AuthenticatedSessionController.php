<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class AuthenticatedSessionController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function testPdf()
{
    $pdf = Pdf::loadView('test', []);
    return $pdf->stream('test.pdf');
}
}
