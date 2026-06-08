<?php

namespace App\Http\Controllers;

use App\Models\Warta;
use Illuminate\Http\Request;

class WartaController extends Controller
{
    public function index()
    {
        // Ambil semua warta, urut terbaru dulu
        $wartas = Warta::orderBy('created_at', 'desc')->get();

        // Ambil warta terbaru (pertama)
        $latestWarta = $wartas->first();

        return view('halaman.wartagereja.user.warta', compact('wartas', 'latestWarta'));
    }
}
