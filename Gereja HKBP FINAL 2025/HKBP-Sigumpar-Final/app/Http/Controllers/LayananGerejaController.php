<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LayananGereja\Martuppol;
use App\Models\LayananGereja\BatchNaikSidi;
use App\Models\LayananGereja\NaikSidi;
use App\Models\LayananGereja\Pernikahan;
use App\Models\LayananGereja\AnakLahir;
use App\Models\LayananGereja\JemaatSakit;
use App\Models\LayananGereja\KunjunganMakam;
use App\Models\LayananGereja\OrangMeninggal;

class LayananGerejaController extends Controller
{
    public function createMartuppol()
    {
        return view('admin.layanan.martuppol.create');
    }

    public function storeMartuppol(Request $request)
    {
        $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'tanggal_martuppol' => 'required|date|after_or_equal:today',
        ]);

        Martuppol::create($request->only('nama_pemohon', 'tanggal_martuppol'));

        return redirect()->back()->with('success', 'Martuppol berhasil didaftarkan.');
    }

    public function createNaikSidi()
    {
        $batches = BatchNaikSidi::all();
        return view('admin.layanan.naik_sidi.create', compact('batches'));
    }

    public function storeNaikSidi(Request $request)
    {
        $request->validate([
            'nama_jemaat' => 'required|string|max:255',
            'batch_id' => 'required|exists:batch_naik_sidis,id',
            'akta_upload' => 'nullable|file|mimes:pdf,jpg,png',
            'surat_baptis_upload' => 'nullable|file|mimes:pdf,jpg,png',
        ]);

        $data = $request->only('nama_jemaat', 'batch_id');

        if ($request->hasFile('akta_upload')) {
            $data['akta_upload'] = $request->file('akta_upload')->store('dokumen/akta');
        }
        if ($request->hasFile('surat_baptis_upload')) {
            $data['surat_baptis_upload'] = $request->file('surat_baptis_upload')->store('dokumen/surat_baptis');
        }

        NaikSidi::create($data);

        return redirect()->back()->with('success', 'Pendaftaran naik sidi berhasil.');
    }

    public function createPernikahan()
    {
        return view('admin.layanan.pernikahan.create');
    }

    public function storePernikahan(Request $request)
    {
        $request->validate([
            'nama_calon_suami' => 'required|string|max:255',
            'nama_calon_istri' => 'required|string|max:255',
            'tanggal_pernikahan' => 'required|date|after_or_equal:today',
            'dokumen_upload' => 'nullable|file|mimes:pdf,jpg,png',
        ]);

        $data = $request->only('nama_calon_suami', 'nama_calon_istri', 'tanggal_pernikahan');

        if ($request->hasFile('dokumen_upload')) {
            $data['dokumen_upload'] = $request->file('dokumen_upload')->store('dokumen/pernikahan');
        }

        Pernikahan::create($data);

        return redirect()->back()->with('success', 'Pendaftaran pernikahan berhasil.');
    }

    public function createAnakLahir()
    {
        return view('admin.layanan.anak_lahir.create');
    }

    public function storeAnakLahir(Request $request)
    {
        $request->validate([
            'nama_anak' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|before_or_equal:today',
            'nama_ortu' => 'required|string|max:255',
        ]);

        AnakLahir::create($request->only('nama_anak', 'tanggal_lahir', 'nama_ortu'));

        return redirect()->back()->with('success', 'Pendataan anak lahir berhasil.');
    }

    public function createJemaatSakit()
    {
        return view('admin.layanan.jemaat_sakit.create');
    }

    public function storeJemaatSakit(Request $request)
    {
        $request->validate([
            'nama_jemaat' => 'required|string|max:255',
            'wijk' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        JemaatSakit::create($request->only('nama_jemaat', 'wijk', 'keterangan'));

        return redirect()->back()->with('success', 'Pendataan jemaat sakit berhasil.');
    }

    public function createKunjunganMakam()
    {
        return view('admin.layanan.kunjungan_makam.create');
    }

    public function storeKunjunganMakam(Request $request)
    {
        $request->validate([
            'nama_jemaat' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date|after_or_equal:today',
            'pendeta_ikut' => 'sometimes|boolean',
            'kunci_disediakan' => 'sometimes|boolean',
        ]);

        $data = $request->only('nama_jemaat', 'tanggal_kunjungan');
        $data['pendeta_ikut'] = $request->has('pendeta_ikut');
        $data['kunci_disediakan'] = $request->has('kunci_disediakan');

        KunjunganMakam::create($data);

        return redirect()->back()->with('success', 'Pemesanan kunjungan makam berhasil.');
    }

    public function createOrangMeninggal()
    {
        return view('admin.layanan.orang_meninggal.create');
    }

    public function storeOrangMeninggal(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_meninggal' => 'required|date|before_or_equal:today',
            'lingkungan' => 'required|string|max:255',
        ]);

        OrangMeninggal::create($request->only('nama', 'tanggal_meninggal', 'lingkungan'));

        return redirect()->back()->with('success', 'Pendataan orang meninggal berhasil.');
    }
}
