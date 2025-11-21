<x-utama>
    <div class="p-6">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-teal-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 7h18M3 12h18M3 17h18" />
            </svg>
            <h1 class="text-3xl font-semibold text-gray-800">Jurnal Biaya</h1>
        </div>

        <button id="openModal" class="px-4 py-2 bg-teal-500 hover:bg-teal-600 text-white rounded-lg shadow">
            Tambah Pengeluaran
        </button>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white shadow-md rounded-lg p-4 mb-6 flex flex-wrap items-center gap-3">

        <input type="text" placeholder="Cari..."
            class="border rounded-md px-3 py-2 text-sm w-40">

        <select class="border rounded-md px-3 py-2 text-sm">
            <option>Semua</option>
            <option>Pengeluaran</option>
        </select>

        <select class="border rounded-md pr-8 px-3 py-2 text-sm">
            <option>Rekan Mitra</option>
        </select>

        <input type="date" class="border rounded-md px-3 py-2 text-sm">

    </div>

    <!-- Table -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 uppercase text-xs border-b">
                <tr>
                    <th class="px-4 py-3">Shortcut</th>
                    <th class="px-4 py-3">Tipe</th>
                    <th class="px-4 py-3">Deskripsi</th>
                    <th class="px-4 py-3">Pekerjaan</th>
                    <th class="px-4 py-3">Kuantitas</th>
                    <th class="px-4 py-3">Nominal</th>
                    <th class="px-4 py-3">Tenggat</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>

            <tbody>

                <!-- ROW 1 -->
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <button class="px-2 py-1 rounded-md bg-gray-200 hover:bg-gray-300 text-xs">Edit</button>
                    </td>
                    <td class="px-4 py-3">📄</td>
                    <td class="px-4 py-3 font-medium">Red billet pesawat ke Batam</td>
                    <td class="px-4 py-3">#1823702 - Jordan • Finansial</td>
                    <td class="px-4 py-3">1</td>
                    <td class="px-4 py-3 font-semibold">IDR 500.000</td>
                    <td class="px-4 py-3">04 - 11 - 2024</td>
                    <td class="px-4 py-3">N/A</td>
                </tr>

                <!-- ROW 2 -->
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <button class="px-2 py-1 rounded-md bg-gray-200 hover:bg-gray-300 text-xs">Edit</button>
                    </td>
                    <td class="px-4 py-3">📄</td>
                    <td class="px-4 py-3 font-medium">Belibahan operasional</td>
                    <td class="px-4 py-3">#1933702 - Prod. Properti</td>
                    <td class="px-4 py-3">3</td>
                    <td class="px-4 py-3 font-semibold">IDR 150.000</td>
                    <td class="px-4 py-3">06 - 11 - 2024</td>
                    <td class="px-4 py-3">N/A</td>
                </tr>

                <!-- ROW 3 -->
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <button class="px-2 py-1 rounded-md bg-gray-200 hover:bg-gray-300 text-xs">Edit</button>
                    </td>
                    <td class="px-4 py-3">📄</td>
                    <td class="px-4 py-3 font-medium">Biaya Operasional</td>
                    <td class="px-4 py-3">#1623702 - Josephy • Litigasi</td>
                    <td class="px-4 py-3">12</td>
                    <td class="px-4 py-3 font-semibold">IDR 350.000</td>
                    <td class="px-4 py-3">07 - 11 - 2024</td>
                    <td class="px-4 py-3">N/A</td>
                </tr>

                <!-- ROW 4 -->
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <button class="px-2 py-1 rounded-md bg-gray-200 hover:bg-gray-300 text-xs">Edit</button>
                    </td>
                    <td class="px-4 py-3">📄</td>
                    <td class="px-4 py-3 font-medium">Biaya Operasional</td>
                    <td class="px-4 py-3">#1823702 - Karno • Warga</td>
                    <td class="px-4 py-3">20</td>
                    <td class="px-4 py-3 font-semibold">IDR 900.000</td>
                    <td class="px-4 py-3">08 - 11 - 2024</td>
                    <td class="px-4 py-3">N/A</td>
                </tr>

                <!-- ROW 5 -->
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <button class="px-2 py-1 rounded-md bg-gray-200 hover:bg-gray-300 text-xs">Edit</button>
                    </td>
                    <td class="px-4 py-3">📄</td>
                    <td class="px-4 py-3 font-medium">Konsultasi vendor</td>
                    <td class="px-4 py-3">#1823702 - Devy • Manajemen</td>
                    <td class="px-4 py-3">5</td>
                    <td class="px-4 py-3 font-semibold">IDR 650.000</td>
                    <td class="px-4 py-3">10 - 11 - 2024</td>
                    <td class="px-4 py-3">N/A</td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
<!-- MODAL OVERLAY -->
<div id="modalPengeluaran" class="fixed inset-0 bg-black/40 hidden flex items-center justify-center z-50">
    
    <!-- MODAL BOX -->
    <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6 animate-scaleIn">

        <!-- Header -->
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Pengeluaran</h2>

        <!-- Form -->
        <form class="space-y-4">

            <!-- Tipe -->
            <div>
                <label class="text-sm font-medium">Tipe Pengeluaran</label>
                <select class="w-full mt-1 px-3 py-2 border rounded-md">
                    <option>Transport</option>
                    <option>Operasional</option>
                    <option>Konsumsi</option>
                    <option>Lainnya</option>
                </select>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="text-sm font-medium">Deskripsi</label>
                <input type="text" class="w-full mt-1 px-3 py-2 border rounded-md"
                    placeholder="Contoh: Pembelian ATK">
            </div>

            <!-- Nominal -->
            <div>
                <label class="text-sm font-medium">Nominal</label>
                <input type="number" class="w-full mt-1 px-3 py-2 border rounded-md"
                    placeholder="Contoh: 250000">
            </div>

            <!-- Tanggal -->
            <div>
                <label class="text-sm font-medium">Tenggat / Tanggal</label>
                <input type="date" class="w-full mt-1 px-3 py-2 border rounded-md">
            </div>

            <!-- Footer Buttons -->
            <div class="flex justify-end gap-3 mt-6">
                <button type="button" id="closeModal"
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">
                    Batal
                </button>

                <button type="submit"
                    class="px-4 py-2 bg-teal-500 hover:bg-teal-600 text-white rounded-lg shadow">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>

<!-- ANIMATION -->
<style>
    .animate-scaleIn {
        animation: scaleIn 0.18s ease-out;
    }
    @keyframes scaleIn {
        from { transform: scale(0.95); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
</style>
<script>
    const modal = document.getElementById('modalPengeluaran');
    const openBtn = document.getElementById('openModal');
    const closeBtn = document.getElementById('closeModal');

    openBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Klik luar modal untuk tutup
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
</script>

</x-utama>