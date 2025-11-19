<x-utama>
<div class="p-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center gap-2 mb-3">
        <button 
            class="px-3 py-1 rounded-md text-white text-sm bg-teal-500 hover:bg-teal-600 w-fit"
            onclick="this.parentElement.nextElementSibling.classList.toggle('hidden')">
            Sub Tugas
        </button>

        <h2 class="text-lg font-semibold">
            #1823702 - Jordan Yudhistira : Finansial
        </h2>
    </div>

    <!-- Filters -->
    <div class="bg-white shadow-md rounded-lg p-4 mb-6 flex flex-wrap gap-3">
        <select class="border rounded-md px-3 pr-8 py-2 text-sm w-full sm:w-auto">
            <option>Semua</option>
        </select>

        <select class="border rounded-md px-3 pr-8 py-2 text-sm w-full sm:w-auto">
            <option>Status</option>
        </select>

        <select class="border rounded-md px-3 pr-8 py-2 text-sm w-full sm:w-auto">
            <option>Prioritas</option>
        </select>

        <input type="date" class="border rounded-md px-3 py-2 text-sm w-full sm:w-auto" />
    </div>

    <!-- Card Group -->
    <div class="space-y-10">

        <!-- Grup 1 -->
        <div class="bg-white shadow-md rounded-lg p-4">
            
            <div class="flex flex-col md:flex-row md:items-center gap-2 mb-3">
                <h2 class="text-lg font-semibold flex-1">
                    #1823702 - Jordan Yudhistira : Finansial
                </h2>

                <button 
                    class="px-3 py-1 rounded-md text-white text-sm bg-teal-500 hover:bg-teal-600 w-fit"
                    onclick="this.parentElement.nextElementSibling.classList.toggle('hidden')">
                    Sub Tugas
                </button>
            </div>

            <!-- Main Tasks -->
            <div class="overflow-x-auto mb-4">
                <table class="min-w-max w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase border-b">
                        <tr>
                            <th class="px-4 py-3">Tugas</th>
                            <th class="px-4 py-3">Files</th>
                            <th class="px-4 py-3">Pembuat</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Prioritas</th>
                            <th class="px-4 py-3">Limit</th>
                            <th class="px-4 py-3">Tenggat</th>
                            <th class="px-4 py-3">Terakhir diubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">Negosiasi Penyelesaian</td>
                            <td class="px-4 py-3">8</td>
                            <td class="px-4 py-3">👤👤👤</td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-green-500 text-white text-xs">Selesai</span></td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-purple-500 text-white text-xs">Sedang</span></td>
                            <td class="px-4 py-3">6–7 Des</td>
                            <td class="px-4 py-3">7 Mar</td>
                            <td class="px-4 py-3">04–11–2024</td>
                        </tr>

                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">Analisis Dokumen Perjanjian</td>
                            <td class="px-4 py-3">3</td>
                            <td class="px-4 py-3">👤👤</td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-yellow-500 text-white text-xs">Dikerjakan</span></td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-blue-500 text-white text-xs">Sedang</span></td>
                            <td class="px-4 py-3">6–7 Des</td>
                            <td class="px-4 py-3">7 Mar</td>
                            <td class="px-4 py-3">04–11–2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Sub Tasks Header -->
            <h3 class="text-md font-semibold mb-2">Sub Tugas</h3>

            <!-- Subtasks Table -->
            <div class="overflow-x-auto">
                <table class="min-w-max w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase border-b">
                        <tr>
                            <th class="px-4 py-3">Tugas</th>
                            <th class="px-4 py-3">Files</th>
                            <th class="px-4 py-3">Pembuat</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Prioritas</th>
                            <th class="px-4 py-3">Limit</th>
                            <th class="px-4 py-3">Tenggat</th>
                            <th class="px-4 py-3">Terakhir diubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">Pencarian Sumber Hukum</td>
                            <td class="px-4 py-3">2</td>
                            <td class="px-4 py-3">👤👤</td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-red-500 text-white text-xs">Ditunda</span></td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-blue-300 text-white text-xs">Rendah</span></td>
                            <td class="px-4 py-3">6–7 Des</td>
                            <td class="px-4 py-3">7 Mar</td>
                            <td class="px-4 py-3">06–11–2024</td>
                        </tr>

                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">Pencarian Data Relevan</td>
                            <td class="px-4 py-3">1</td>
                            <td class="px-4 py-3">👤👤</td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-red-500 text-white text-xs">Ditunda</span></td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-blue-300 text-white text-xs">Rendah</span></td>
                            <td class="px-4 py-3">6–7 Des</td>
                            <td class="px-4 py-3">7 Mar</td>
                            <td class="px-4 py-3">06–11–2024</td>
                        </tr>

                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">Pengumpulan Bukti Tambahan</td>
                            <td class="px-4 py-3">3</td>
                            <td class="px-4 py-3">👤👤</td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-pink-500 text-white text-xs">Revisi</span></td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-purple-500 text-white text-xs">Tinggi</span></td>
                            <td class="px-4 py-3">6–7 Des</td>
                            <td class="px-4 py-3">7 Mar</td>
                            <td class="px-4 py-3">07–11–2024</td>
                        </tr>

                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">Koordinasi dengan Klien</td>
                            <td class="px-4 py-3">1</td>
                            <td class="px-4 py-3">👤</td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-green-500 text-white text-xs">Selesai</span></td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-purple-500 text-white text-xs">Sedang</span></td>
                            <td class="px-4 py-3">6–7 Des</td>
                            <td class="px-4 py-3">7 Mar</td>
                            <td class="px-4 py-3">07–11–2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Grup 2 -->
        <div class="bg-white shadow-md rounded-lg p-4">

            <div class="flex flex-col md:flex-row md:items-center gap-2 mb-3">
                <h2 class="text-lg font-semibold flex-1">
                    #1923702 - Paudra Sanjaya : Properti
                </h2>

                <button 
                    class="px-3 py-1 rounded-md text-white text-sm bg-teal-500 hover:bg-teal-600 w-fit"
                    onclick="this.parentElement.nextElementSibling.classList.toggle('hidden')">
                    Sub Tugas
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-max w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase border-b">
                        <tr>
                            <th class="px-4 py-3">Tugas</th>
                            <th class="px-4 py-3">Files</th>
                            <th class="px-4 py-3">Pembuat</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Prioritas</th>
                            <th class="px-4 py-3">Limit</th>
                            <th class="px-4 py-3">Tenggat</th>
                            <th class="px-4 py-3">Terakhir diubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">Pelaporan kepada Klien</td>
                            <td class="px-4 py-3">2</td>
                            <td class="px-4 py-3">👤👤</td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-pink-500 text-white text-xs">Revisi</span></td>
                            <td class="px-4 py-3"><span class="px-3 py-1 rounded-md bg-purple-500 text-white text-xs">Tinggi</span></td>
                            <td class="px-4 py-3">6–7 Mar</td>
                            <td class="px-4 py-3">7 Mar</td>
                            <td class="px-4 py-3">03–11–2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</div>
</x-utama>
