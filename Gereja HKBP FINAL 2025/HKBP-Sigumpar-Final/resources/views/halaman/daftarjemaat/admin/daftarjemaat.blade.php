<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Jemaat & Akun') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form tambah jemaat --}}
        <div class="mb-6 bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('admin.storejemaat') }}">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block font-medium text-sm text-gray-700">Nama Jemaat</label>
                    <input id="nama" name="nama" type="text" required class="border rounded w-full p-2" />
                    @error('nama')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="alamat" class="block font-medium text-sm text-gray-700">Alamat</label>
                    <input id="alamat" name="alamat" type="text" class="border rounded w-full p-2" />
                    @error('alamat')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="no_hp" class="block font-medium text-sm text-gray-700">No. HP</label>
                    <input id="no_hp" name="no_hp" type="text" class="border rounded w-full p-2" />
                    @error('no_hp')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">Tambah Jemaat</button>
            </form>
        </div>

        {{-- Daftar Jemaat --}}
        <div class="mb-6 bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-4">Daftar Jemaat</h3>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Nama</th>
                        <th class="border border-gray-300 p-2">Alamat</th>
                        <th class="border border-gray-300 p-2">No. HP</th>
                        <th class="border border-gray-300 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jemaat as $j)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $j->id }}</td>
                            <td class="border border-gray-300 p-2">{{ $j->nama }}</td>
                            <td class="border border-gray-300 p-2">{{ $j->alamat ?? '-' }}</td>
                            <td class="border border-gray-300 p-2">{{ $j->no_hp ?? '-' }}</td>
                            <td class="border border-gray-300 p-2 space-x-2">

                                {{-- Tombol Edit --}}
                                <button type="button" onclick="toggleEditForm({{ $j->id }})" class="bg-yellow-500 text-black px-2 py-1 rounded">Edit</button>

                                {{-- Form Delete --}}
                                <form method="POST" action="{{ route('admin.destroyjemaat', $j->id) }}" class="inline" onsubmit="return confirm('Yakin ingin menghapus jemaat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                                </form>

                                {{-- Form Update (default hidden) --}}
                                <form id="edit-form-{{ $j->id }}" method="POST" action="{{ route('admin.updatejemaat', $j->id) }}" class="mt-2 p-4 border rounded bg-gray-50 hidden" onsubmit="return confirm('Yakin ingin menyimpan perubahan?')">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-2">
                                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                                        <input name="nama" type="text" value="{{ $j->nama }}" required class="border rounded w-full p-1" />
                                    </div>
                                    <div class="mb-2">
                                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                                        <input name="alamat" type="text" value="{{ $j->alamat }}" class="border rounded w-full p-1" />
                                    </div>
                                    <div class="mb-2">
                                        <label class="block text-sm font-medium text-gray-700">No. HP</label>
                                        <input name="no_hp" type="text" value="{{ $j->no_hp }}" class="border rounded w-full p-1" />
                                    </div>
                                    <button type="submit" class="bg-green-600 text-black px-3 py-1 rounded">Simpan</button>
                                    <button type="button" onclick="toggleEditForm({{ $j->id }})" class="ml-2 px-3 py-1 rounded border">Batal</button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center">Tidak ada data jemaat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Daftar Users --}}
        <div class="bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-4">Daftar Akun Pengguna</h3>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Nama</th>
                        <th class="border border-gray-300 p-2">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $user->id }}</td>
                            <td class="border border-gray-300 p-2">{{ $user->name }}</td>
                            <td class="border border-gray-300 p-2">{{ $user->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-center">Tidak ada akun terdaftar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <script>
        function toggleEditForm(id) {
            const form = document.getElementById('edit-form-' + id);
            if (form.classList.contains('hidden')) {
                form.classList.remove('hidden');
            } else {
                form.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>
