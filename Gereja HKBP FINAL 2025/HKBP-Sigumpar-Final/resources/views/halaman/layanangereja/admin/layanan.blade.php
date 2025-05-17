<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form Layanan Gereja') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">

        {{-- Notifikasi umum --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pilihan layanan --}}
        <div class="bg-white p-6 rounded shadow mb-6">
            <label for="layanan-select" class="block mb-2 font-semibold text-lg">Pilih layanan gereja:</label>
            <select id="layanan-select" class="border border-gray-300 rounded p-2 w-full">
                <option value="">-- Pilih Layanan --</option>
                <option value="martuppol">Martuppol (Pra Nikah)</option>
                <option value="naik_sidi">Pendaftaran Naik Sidi</option>
                <option value="pernikahan">Pendaftaran Pernikahan</option>
                <option value="anak_lahir">Pendataan Anak Lahir</option>
                <option value="jemaat_sakit">Pendataan Jemaat Sakit</option>
                <option value="kunjungan_makam">Pemesanan Kunjungan Makam</option>
                <option value="orang_meninggal">Pendataan Orang Meninggal</option>
            </select>
        </div>

        {{-- Form Martuppol --}}
        <section id="form-martuppol" class="hidden bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-4 text-lg">Form Martuppol (Pra Nikah)</h3>
            <form action="{{ route('martuppol.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="nama_pemohon" class="block font-medium text-gray-700">Nama Pemohon <span class="text-red-600">*</span></label>
                    <input type="text" id="nama_pemohon" name="nama_pemohon" value="{{ old('nama_pemohon') }}" required
                        class="border border-gray-300 rounded p-2 w-full" />
                    @error('nama_pemohon') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="tanggal_martuppol" class="block font-medium text-gray-700">Tanggal Martuppol <span class="text-red-600">*</span></label>
                    <input type="date" id="tanggal_martuppol" name="tanggal_martuppol" value="{{ old('tanggal_martuppol') }}"
                        min="{{ date('Y-m-d') }}" required class="border border-gray-300 rounded p-2 w-full" />
                    @error('tanggal_martuppol') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">Daftar Martuppol</button>
            </form>
        </section>

        {{-- Form Naik Sidi --}}
        <section id="form-naik_sidi" class="hidden bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-4 text-lg">Form Pendaftaran Naik Sidi</h3>
            <form action="{{ route('naik_sidi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="nama_jemaat" class="block font-medium text-gray-700">Nama Jemaat <span class="text-red-600">*</span></label>
                    <input type="text" id="nama_jemaat" name="nama_jemaat" value="{{ old('nama_jemaat') }}" required
                        class="border border-gray-300 rounded p-2 w-full" />
                    @error('nama_jemaat') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="batch_id" class="block font-medium text-gray-700">Pilih Batch Naik Sidi <span class="text-red-600">*</span></label>
                    <select id="batch_id" name="batch_id" required class="border border-gray-300 rounded p-2 w-full">
                        <option value="">-- Pilih Batch --</option>
                        @foreach ($batches ?? [] as $batch)
                            <option value="{{ $batch->id }}" {{ old('batch_id') == $batch->id ? 'selected' : '' }}>
                                {{ $batch->nama_batch }}
                            </option>
                        @endforeach
                    </select>
                    @error('batch_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="akta_upload" class="block font-medium text-gray-700">Upload Akta (PDF/JPG/PNG)</label>
                    <input type="file" id="akta_upload" name="akta_upload" accept=".pdf,.jpg,.png" class="border border-gray-300 rounded p-2 w-full" />
                    @error('akta_upload') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="surat_baptis_upload" class="block font-medium text-gray-700">Upload Surat Baptis (PDF/JPG/PNG)</label>
                    <input type="file" id="surat_baptis_upload" name="surat_baptis_upload" accept=".pdf,.jpg,.png" class="border border-gray-300 rounded p-2 w-full" />
                    @error('surat_baptis_upload') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">Daftar Naik Sidi</button>
            </form>
        </section>

        {{-- Form Pernikahan --}}
        <section id="form-pernikahan" class="hidden bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-4 text-lg">Form Pendaftaran Pernikahan</h3>
            <form action="{{ route('pernikahan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="nama_calon_suami" class="block font-medium text-gray-700">Nama Calon Suami <span class="text-red-600">*</span></label>
                    <input type="text" id="nama_calon_suami" name="nama_calon_suami" value="{{ old('nama_calon_suami') }}" required
                        class="border border-gray-300 rounded p-2 w-full" />
                    @error('nama_calon_suami') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="nama_calon_istri" class="block font-medium text-gray-700">Nama Calon Istri <span class="text-red-600">*</span></label>
                    <input type="text" id="nama_calon_istri" name="nama_calon_istri" value="{{ old('nama_calon_istri') }}" required
                        class="border border-gray-300 rounded p-2 w-full" />
                    @error('nama_calon_istri') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="tanggal_pernikahan" class="block font-medium text-gray-700">Tanggal Pernikahan <span class="text-red-600">*</span></label>
                    <input type="date" id="tanggal_pernikahan" name="tanggal_pernikahan" value="{{ old('tanggal_pernikahan') }}"
                        min="{{ date('Y-m-d') }}" required class="border border-gray-300 rounded p-2 w-full" />
                    @error('tanggal_pernikahan') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="dokumen_upload" class="block font-medium text-gray-700">Upload Dokumen Pernikahan (PDF/JPG/PNG)</label>
                    <input type="file" id="dokumen_upload" name="dokumen_upload" accept=".pdf,.jpg,.png" class="border border-gray-300 rounded p-2 w-full" />
                    @error('dokumen_upload') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">Daftar Pernikahan</button>
            </form>
        </section>

        {{-- Form Anak Lahir --}}
        <section id="form-anak_lahir" class="hidden bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-4 text-lg">Form Pendataan Anak Lahir</h3>
            <form action="{{ route('anak_lahir.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="nama_anak" class="block font-medium text-gray-700">Nama Anak <span class="text-red-600">*</span></label>
                    <input type="text" id="nama_anak" name="nama_anak" value="{{ old('nama_anak') }}" required
                        class="border border-gray-300 rounded p-2 w-full" />
                    @error('nama_anak') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="tanggal_lahir" class="block font-medium text-gray-700">Tanggal Lahir <span class="text-red-600">*</span></label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        max="{{ date('Y-m-d') }}" required class="border border-gray-300 rounded p-2 w-full" />
                    @error('tanggal_lahir') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="nama_ortu" class="block font-medium text-gray-700">Nama Orang Tua <span class="text-red-600">*</span></label>
                    <input type="text" id="nama_ortu" name="nama_ortu" value="{{ old('nama_ortu') }}" required
                        class="border border-gray-300 rounded p-2 w-full" />
                    @error('nama_ortu') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">Input Anak Lahir</button>
            </form>
        </section>

        {{-- Form Jemaat Sakit --}}
        <section id="form-jemaat_sakit" class="hidden bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-4 text-lg">Form Pendataan Jemaat Sakit</h3>
            <form action="{{ route('jemaat_sakit.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="nama_jemaat" class="block font-medium text-gray-700">Nama Jemaat <span class="text-red-600">*</span></label>
                    <input type="text" id="nama_jemaat" name="nama_jemaat" value="{{ old('nama_jemaat') }}" required
                        class="border border-gray-300 rounded p-2 w-full" />
                    @error('nama_jemaat') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="wijk" class="block font-medium text-gray-700">Wijk <span class="text-red-600">*</span></label>
                    <input type="text" id="wijk" name="wijk" value="{{ old('wijk') }}" required
                        class="border border-gray-300 rounded p-2 w-full" />
                    @error('wijk') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="keterangan" class="block font-medium text-gray-700">Keterangan (Opsional)</label>
                    <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan') }}"
                        class="border border-gray-300 rounded p-2 w-full" />
                    @error('keterangan') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">Input Jemaat Sakit</button>
            </form>
        </section>

        {{-- Form Kunjungan Makam --}}
        <section id="form-kunjungan_makam" class="hidden bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-4 text-lg">Form Pemesanan Kunjungan Makam</h3>
            <form action="{{ route('kunjungan_makam.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="nama_jemaat" class="block font-medium text-gray-700">Nama Jemaat <span class="text-red-600">*</span></label>
                    <input type="text" id="nama_jemaat" name="nama_jemaat" value="{{ old('nama_jemaat') }}" required
                        class="border border-gray-300 rounded p-2 w-full" />
                    @error('nama_jemaat') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="tanggal_kunjungan" class="block font-medium text-gray-700">Tanggal Kunjungan <span class="text-red-600">*</span></label>
                    <input type="date" id="tanggal_kunjungan" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan') }}"
                        min="{{ date('Y-m-d') }}" required class="border border-gray-300 rounded p-2 w-full" />
                    @error('tanggal_kunjungan') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="flex space-x-6 items-center">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="pendeta_ikut" class="form-checkbox" {{ old('pendeta_ikut') ? 'checked' : '' }}>
                        <span class="ml-2">Pendeta Ikut</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="kunci_disediakan" class="form-checkbox" {{ old('kunci_disediakan') ? 'checked' : '' }}>
                        <span class="ml-2">Kunci Disediakan</span>
                    </label>
                </div>
                <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">Pesan Kunjungan Makam</button>
            </form>
        </section>

        {{-- Form Orang Meninggal --}}
        <section id="form-orang_meninggal" class="hidden bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-4 text-lg">Form Pendataan Orang Meninggal</h3>
            <form action="{{ route('orang_meninggal.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="nama" class="block font-medium text-gray-700">Nama <span class="text-red-600">*</span></label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                        class="border border-gray-300 rounded p-2 w-full" />
                    @error('nama') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="tanggal_meninggal" class="block font-medium text-gray-700">Tanggal Meninggal <span class="text-red-600">*</span></label>
                    <input type="date" id="tanggal_meninggal" name="tanggal_meninggal" value="{{ old('tanggal_meninggal') }}"
                        max="{{ date('Y-m-d') }}" required class="border border-gray-300 rounded p-2 w-full" />
                    @error('tanggal_meninggal') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="lingkungan" class="block font-medium text-gray-700">Lingkungan <span class="text-red-600">*</span></label>
                    <input type="text" id="lingkungan" name="lingkungan" value="{{ old('lingkungan') }}" required
                        class="border border-gray-300 rounded p-2 w-full" />
                    @error('lingkungan') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">Input Data Orang Meninggal</button>
            </form>
        </section>

    </div>

    <script>
        const selectLayanan = document.getElementById('layanan-select');
        const forms = {
            'martuppol': document.getElementById('form-martuppol'),
            'naik_sidi': document.getElementById('form-naik_sidi'),
            'pernikahan': document.getElementById('form-pernikahan'),
            'anak_lahir': document.getElementById('form-anak_lahir'),
            'jemaat_sakit': document.getElementById('form-jemaat_sakit'),
            'kunjungan_makam': document.getElementById('form-kunjungan_makam'),
            'orang_meninggal': document.getElementById('form-orang_meninggal'),
        };

        selectLayanan.addEventListener('change', () => {
            // sembunyikan semua form
            Object.values(forms).forEach(form => form.classList.add('hidden'));
            // tampilkan form yg dipilih
            const val = selectLayanan.value;
            if (forms[val]) {
                forms[val].classList.remove('hidden');
            }
        });

        // Kalau mau, bisa tambahkan agar form yg terakhir dipilih langsung fokus atau scroll ke situ.
    </script>

</x-app-layout>
