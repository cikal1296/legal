{{-- resources/views/cases/index.blade.php --}}
<x-utama>
<div class="p-6 space-y-6 text-gray-700 text-sm">

    <h1 class="text-2xl font-semibold flex items-center space-x-2 mb-4">
        <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h6l2 3h10v11H3V7z" />
        </svg>
        <span>Daftar Kasus</span>
    </h1>

    <!-- FILTER BAR -->
    <div class="flex items-center justify-between bg-white p-4 rounded-xl border shadow-sm">
        <input type="text" placeholder="Cari nama klien / nomor kasus" class="px-3 py-2 border rounded-lg w-80" />

        <select class="px-3 py-2 border rounded-lg">
            <option value="">Semua Status</option>
            <option>Terbuka</option>
            <option>Tertutup</option>
            <option>Pending</option>
        </select>
    </div>

    <!-- TABLE WRAPPER -->
    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100 text-xs text-gray-600">
                <tr>
                    <th class="px-4 py-3 text-left">Nomor Kasus</th>
                    <th class="px-4 py-3 text-left">Klien</th>
                    <th class="px-4 py-3 text-left">Jenis</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Tanggal Dibuat</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y text-sm">
                <tr>
                    <td class="px-4 py-3">#1823702 - Jordan : Finansial</td>
                    <td class="px-4 py-3">Jordan Yudhistira</td>
                    <td class="px-4 py-3">Finansial</td>
                    <td class="px-4 py-3">
                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">Terbuka</span>
                    </td>
                    <td class="px-4 py-3">04 - 15 - 2024</td>
                    <td class="px-4 py-3">
                        <a href="/cases" class="px-3 py-1 bg-teal-500 text-white rounded text-xs">Detail</a>
                    </td>
                </tr>

                <tr>
                    <td class="px-4 py-3">#1823703 - Alya : Properti</td>
                    <td class="px-4 py-3">Alya Permata</td>
                    <td class="px-4 py-3">Properti</td>
                    <td class="px-4 py-3">
                        <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-medium">Pending</span>
                    </td>
                    <td class="px-4 py-3">04 - 18 - 2024</td>
                    <td class="px-4 py-3">
                        <a href="/cases" class="px-3 py-1 bg-teal-500 text-white rounded text-xs">Detail</a>
                    </td>
                </tr>

                <tr>
                    <td class="px-4 py-3">#1823704 - Benjamin : Waris</td>
                    <td class="px-4 py-3">Benjamin Hartono</td>
                    <td class="px-4 py-3">Waris</td>
                    <td class="px-4 py-3">
                        <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">Tertutup</span>
                    </td>
                    <td class="px-4 py-3">04 - 20 - 2024</td>
                    <td class="px-4 py-3">
                        <a href="/cases" class="px-3 py-1 bg-teal-500 text-white rounded text-xs">Detail</a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
</x-utama>
