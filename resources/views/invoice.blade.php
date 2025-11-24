{{-- resources/views/invoices/index.blade.php --}}
<x-utama><div x-data="invoicePage()" class="p-4 space-y-6 text-gray-700 text-sm">

    {{-- Title --}}
    <h1 class="text-2xl font-semibold flex items-center space-x-2">
        <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
             d="M9 17V7a2 2 0 012-2h6" /><rect x="3" y="7" width="6"
             height="10" rx="2"/></svg>
        <span>Transaksi</span>
    </h1>

    {{-- Tabs --}}
    <div class="flex items-center space-x-4 border-b pb-2">
        <button class="px-3 py-1 text-sm border-b-2 border-teal-600 font-medium">Invoice</button>
        <button class="px-3 py-1 text-sm text-gray-500">Bukti Pembayaran</button>
        <button class="px-3 py-1 text-sm text-gray-500">Dana Deposit</button>
    </div>

    {{-- SUBFILTER --}}
    <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg border">
        <div class="flex items-center space-x-3">
            <input x-model="search" placeholder="Cari" 
                   class="px-3 py-2 border rounded-lg w-64" />

            <select x-model="selectedStatus" class="px-2 py-2 border rounded-md">
                <option value="">Semua</option>
                <option value="Draft">Draft</option>
                <option value="Belum Bayar">Belum Bayar</option>
                <option value="Lunas">Lunas</option>
                <option value="Belum Lunas">Belum Lunas</option>
            </select>

            <div class="flex items-center space-x-2 text-xs">
                <button class="px-3 py-1 rounded bg-white shadow">Semua</button>
                <button class="px-3 py-1 rounded">Draft</button>
                <button class="px-3 py-1 rounded">Belum disetujui</button>
                <button class="px-3 py-1 rounded">Lunas</button>
                <button class="px-3 py-1 rounded">Belum Bayar</button>
                <button class="px-3 py-1 rounded">Belum Lunas</button>
            </div>
        </div>

        <div class="text-xs text-gray-500">50 baris</div>
    </div>

    {{-- MAIN WRAPPER --}}
    <div class="flex gap-6">

        {{-- TABLE --}}
        <div class="flex-1 bg-white border rounded-lg overflow-hidden shadow-sm">
            <table class="w-full">
                <thead class="bg-gray-100 text-xs text-gray-600">
                    <tr>
                        <th class="px-4 py-3 text-left"></th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                        <th class="px-4 py-3 text-left">ID Invoice</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Jatuh tempo</th>
                        <th class="px-4 py-3 text-left">Klien</th>
                        <th class="px-4 py-3 text-left">Pekerjaan</th>
                        <th class="px-4 py-3 text-left">Tanggal dibuat</th>
                        <th class="px-4 py-3 text-left">Sisa saldo</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    <template x-for="row in invoices" :key="row.id">
                        <tr class="text-sm">
                            <td class="px-4 py-3">
                                <input type="checkbox">
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2">
                                    <button class="px-2 py-1 text-xs bg-white border rounded">Edit</button>
                                    <button class="px-2 py-1 text-xs bg-teal-50 text-teal-700 rounded">
                                        Rekam Pembayaran
                                    </button>
                                </div>
                            </td>

                            <td class="px-4 py-3 font-mono text-xs" x-text="row.no"></td>

                            <td class="px-4 py-3">
                                <span class="px-3 py-1 rounded-full text-xs font-medium"
                                      :class="{
                                        'bg-red-100 text-red-600': row.status == 'Belum Bayar',
                                        'bg-green-100 text-green-700': row.status == 'Lunas',
                                        'bg-yellow-100 text-yellow-700': row.status == 'Belum Lunas',
                                        'bg-gray-200 text-gray-600': row.status == 'Draft'
                                      }"
                                      x-text="row.status">
                                </span>
                            </td>

                            <td class="px-4 py-3" x-text="row.jatuh"></td>
                            <td class="px-4 py-3" x-text="row.klien"></td>
                            <td class="px-4 py-3 text-xs" x-text="row.pekerjaan"></td>
                            <td class="px-4 py-3 text-xs" x-text="row.tanggal"></td>

                            <td class="px-4 py-3 text-xs font-semibold" 
                                :class="row.saldo > 0 ? 'text-green-600' : ''"
                                x-text="row.saldo > 0 ? 'IDR ' + row.saldo.toLocaleString() : 'IDR 0'">
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        {{-- PANEL KANAN PERSIS SPT FOTO --}}
      
    </div>
</div>

<script>
function invoicePage(){
    return {
        search:'',
        selectedStatus:'',

        invoices: [
            { id:1, no:'22192892 INV', status:'Belum Bayar', jatuh:'7 Mar', klien:'Benjamin',
              pekerjaan:'#1823702-Jordan : Finansial', tanggal:'04 - 15 - 2024', saldo:0 },

            { id:2, no:'22192892 INV', status:'Lunas', jatuh:'7 Mar', klien:'Benjamin',
              pekerjaan:'#1923702-Paudra : Properti', tanggal:'04 - 15 - 2024', saldo:0 },

            { id:3, no:'22192892 INV', status:'Lunas', jatuh:'7 Mar', klien:'Benjamin',
              pekerjaan:'#1923702-Paudra : Properti', tanggal:'6 - 7 Mar', saldo:0 },

            { id:4, no:'22192892 INV', status:'Draft', jatuh:'7 Mar', klien:'Benjamin',
              pekerjaan:'#2023702-Jesslyn : Lingkungan', tanggal:'04 - 15 - 2024', saldo:3000000 },

            { id:5, no:'22192892 INV', status:'Draft', jatuh:'7 Mar', klien:'Benjamin',
              pekerjaan:'#2123702-Richard : Akuisisi', tanggal:'04 - 15 - 2024', saldo:0 },

            { id:6, no:'22192892 INV', status:'Belum Bayar', jatuh:'7 Mar', klien:'Benjamin',
              pekerjaan:'#2223702-Kusno : Merger', tanggal:'04 - 15 - 2024', saldo:0 },

            { id:7, no:'22192892 INV', status:'Belum Lunas', jatuh:'7 Mar', klien:'Benjamin',
              pekerjaan:'#2233702-Steven Diva : Waris', tanggal:'04 - 15 - 2024', saldo:0 },

            { id:8, no:'22192892 INV', status:'Lunas', jatuh:'7 Mar', klien:'Benjamin',
              pekerjaan:'#2243702-Dery : Wanprestasi', tanggal:'04 - 15 - 2024', saldo:0 },
        ]
    }
}
</script>
</x-utama>