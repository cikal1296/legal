{{-- resources/views/invoices/index.blade.php --}}
<x-utama>
<div x-data="invoicePage()" class="p-4 space-y-6 text-gray-700 text-sm">

    <!-- Title -->
    <h1 class="text-2xl font-semibold flex items-center space-x-2">
        <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7a2 2 0 012-2h6" />
            <rect x="3" y="7" width="6" height="10" rx="2"/>
        </svg>
        <span>Transaksi</span>
    </h1>

    <!-- Tabs -->
    <div class="flex items-center space-x-4 border-b pb-2">
        <button @click="activeTab='invoice'" :class="activeTab=='invoice' ? 'border-b-2 border-teal-600 font-medium' : 'text-gray-500'" class="px-3 py-1 text-sm">Invoice</button>
        <button @click="activeTab='bukti'"   :class="activeTab=='bukti'   ? 'border-b-2 border-teal-600 font-medium' : 'text-gray-500'" class="px-3 py-1 text-sm">Bukti Pembayaran</button>
        <button @click="activeTab='deposit'" :class="activeTab=='deposit' ? 'border-b-2 border-teal-600 font-medium' : 'text-gray-500'" class="px-3 py-1 text-sm">Dana Deposit</button>
    </div>

    <!-- SUBFILTER (Invoice only) -->
    <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg border" x-show="activeTab=='invoice'">
        <div class="flex items-center space-x-3">
            <input x-model="search" placeholder="Cari" class="px-3 py-2 border rounded-lg w-64" />

            <select x-model="selectedStatus" class="px-2 py-2 border rounded-md">
                <option value="">Semua</option>
                <option value="Draft">Draft</option>
                <option value="Belum Bayar">Belum Bayar</option>
                <option value="Lunas">Lunas</option>
                <option value="Belum Lunas">Belum Lunas</option>
            </select>

            <div class="flex items-center space-x-2 text-xs">
                <button @click="quickFilter('')" class="px-3 py-1 rounded bg-white shadow">Semua</button>
                <button @click="quickFilter('Draft')" class="px-3 py-1 rounded">Draft</button>
                <button @click="quickFilter('Belum disetujui')" class="px-3 py-1 rounded">Belum disetujui</button>
                <button @click="quickFilter('Lunas')" class="px-3 py-1 rounded">Lunas</button>
                <button @click="quickFilter('Belum Bayar')" class="px-3 py-1 rounded">Belum Bayar</button>
                <button @click="quickFilter('Belum Lunas')" class="px-3 py-1 rounded">Belum Lunas</button>
            </div>
        </div>

        <div class="text-xs text-gray-500">50 baris</div>
    </div>

    <!-- INVOICE CONTENT -->
    <div class="flex gap-6" x-show="activeTab=='invoice'">

        <!-- TABLE -->
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
                    <template x-for="row in filteredInvoices()" :key="row.id">
                        <tr class="text-sm cursor-pointer" @click="openPanel(row)">
                            <td class="px-4 py-3">
                                <input type="checkbox" :value="row.id" x-model="checked"/>
                            </td>

                            <td class="px-4 py-3" @click.stop>
                                <div class="flex items-center space-x-2">
                                    <button @click="edit(row)" class="px-2 py-1 text-xs bg-white border rounded">Edit</button>
                                    <button @click="rekam(row)" class="px-2 py-1 text-xs bg-teal-50 text-teal-700 rounded">Rekam Pembayaran</button>
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

        <!-- PANEL KANAN -->
        <div class="w-72 bg-white border rounded-lg p-4 shadow-sm" x-show="panel">
            <h2 class="font-semibold text-lg mb-3" x-text="panelTitle"></h2>

            <div class="text-sm space-y-2">
                <p><strong>ID:</strong> <span x-text="panelData.no"></span></p>
                <p><strong>Status:</strong> <span x-text="panelData.status"></span></p>
                <p><strong>Klien:</strong> <span x-text="panelData.klien"></span></p>
                <p><strong>Jatuh tempo:</strong> <span x-text="panelData.jatuh"></span></p>
                <p><strong>Saldo:</strong> <span x-text="panelData.saldo"></span></p>

                <div x-show="panelTitle === 'Edit Invoice' || panelTitle === 'Rekam Pembayaran'">
                    <label class="block text-xs mt-2">Catatan</label>
                    <textarea x-model="panelNote" class="w-full border rounded p-2 text-xs" rows="3"></textarea>

                    <div class="flex justify-end space-x-2 mt-2">
                        <button @click="savePanel()" class="px-3 py-1 bg-teal-600 text-white rounded text-xs">Simpan</button>
                        <button @click="panel=false" class="px-3 py-1 bg-gray-100 rounded text-xs">Batal</button>
                    </div>
                </div>
            </div>

            <div class="mt-4 flex space-x-2">
                <button class="px-3 py-1 bg-gray-100 rounded" @click="panel=false">Tutup</button>
                <button class="px-3 py-1 bg-red-50 text-red-600 rounded" @click="deleteRow(panelData)">Hapus</button>
            </div>
        </div>
    </div>

    <!-- BUKTI PEMBAYARAN -->
    <div x-show="activeTab=='bukti'" class="bg-white border rounded-lg p-4 shadow-sm">
        <h2 class="font-semibold text-lg mb-3">Bukti Pembayaran</h2>

        <!-- Filter kecil (search/status) -->
        <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg border mb-4">
            <div class="flex items-center space-x-3">
                <input x-model="buktiSearch" placeholder="Cari bukti (nama/file/invoice)" class="px-3 py-2 border rounded-lg w-80" />
                <select x-model="buktiFilterStatus" class="px-2 py-2 border rounded-md">
                    <option value="">Semua</option>
                    <option value="Pending">Pending</option>
                    <option value="Terverifikasi">Terverifikasi</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>
            <div class="text-xs text-gray-500">Jumlah: <span x-text="bukti.length"></span></div>
        </div>

        <!-- Table Bukti -->
        <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
            <table class="w-full">
                <thead class="bg-gray-100 text-xs text-gray-600">
                    <tr>
                        <th class="px-4 py-3 text-left">Aksi</th>
                        <th class="px-4 py-3 text-left">ID Bukti</th>
                        <th class="px-4 py-3 text-left">Invoice</th>
                        <th class="px-4 py-3 text-left">Klien</th>
                        <th class="px-4 py-3 text-left">Jumlah</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">File</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm">
                    <template x-for="b in filteredBukti()" :key="b.id">
                        <tr class="cursor-pointer" @click="openBukti(b)">
                            <td class="px-4 py-3" @click.stop>
                                <div class="flex items-center space-x-2">
                                    <button @click="openBukti(b)" class="px-2 py-1 text-xs bg-white border rounded">Detail</button>
                                    <button @click="verifBukti(b)" class="px-2 py-1 text-xs bg-teal-50 text-teal-700 rounded">Verif</button>
                                    <button @click="tolakBukti(b)" class="px-2 py-1 text-xs bg-red-50 text-red-600 rounded">Tolak</button>
                                </div>
                            </td>
                            <td class="px-4 py-3 font-mono text-xs" x-text="b.id"></td>
                            <td class="px-4 py-3" x-text="b.invoice"></td>
                            <td class="px-4 py-3" x-text="b.klien"></td>
                            <td class="px-4 py-3 text-xs font-semibold" x-text="'IDR ' + b.jumlah.toLocaleString()"></td>
                            <td class="px-4 py-3 text-xs" x-text="b.status"></td>
                            <td class="px-4 py-3 text-xs">
                                <template x-for="(f, idx) in b.files" :key="idx">
                                    <div class="flex items-center justify-between mb-1">
                                        <div class="truncate mr-2 text-xs" style="max-width:220px" x-text="f.name + ' · ' + formatBytes(f.size)"></div>
                                        <div class="flex items-center space-x-1">
                                            <button @click.stop="previewFile(f)" class="px-2 py-1 text-xs bg-gray-100 rounded">Lihat</button>
                                            <button @click.stop="downloadFile(f)" class="px-2 py-1 text-xs bg-gray-100 rounded">Download</button>
                                            <button @click.stop="removeFile(b, idx)" class="px-2 py-1 text-xs bg-red-50 text-red-600 rounded">Hapus</button>
                                        </div>
                                    </div>
                                </template>

                                <!-- Upload input -->
                                <div class="mt-2">
                                    <label class="text-xs text-gray-500">Upload file</label>
                                    <input type="file" :data-bukti="b.id" @change="handleUpload($event, b)" multiple class="block text-xs mt-1"/>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <!-- PREVIEW MODAL -->
        <div x-show="previewModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded shadow-lg max-w-3xl w-full p-4">
                <div class="flex justify-between items-center mb-3">
                    <div class="font-medium" x-text="previewName"></div>
                    <button @click="closePreview()" class="px-2 py-1 bg-gray-100 rounded text-xs">Tutup</button>
                </div>

                <div class="max-h-[70vh] overflow-auto">
                    <template x-if="previewIsImage">
                        <img :src="previewSrc" class="w-full h-auto rounded" />
                    </template>
                    <template x-if="!previewIsImage">
                        <iframe :src="previewSrc" class="w-full h-[60vh]" frameborder="0"></iframe>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- DEPOSIT -->
    <div x-show="activeTab=='deposit'" class="bg-white border rounded-lg p-4 shadow-sm">
        <h2 class="font-semibold text-lg mb-3">Dana Deposit</h2>

        <ul class="text-sm space-y-2">
            <template x-for="d in deposit" :key="d.id">
                <li class="border p-3 rounded-md flex justify-between">
                    <span x-text="d.nama"></span>
                    <span x-text="'IDR ' + d.amount.toLocaleString()"></span>
                </li>
            </template>
        </ul>
    </div>

</div>

<script>
function invoicePage(){
    return {
        activeTab: 'invoice',
        search: '',
        selectedStatus: '',
        checked: [],
        panel: false,
        panelData: {},
        panelTitle: '',
        panelNote: '',

        // Preview modal state
        previewModal: false,
        previewSrc: '',
        previewName: '',
        previewIsImage: true,

        // BUKTI filters
        buktiSearch: '',
        buktiFilterStatus: '',

        // ========== INVOICE METHODS ==========
        quickFilter(v){
            this.selectedStatus = v;
        },

        edit(row){
            this.panel = true;
            this.panelData = { ...row };
            this.panelTitle = 'Edit Invoice';
            this.panelNote = row.note || '';
        },

        rekam(row){
            this.panel = true;
            this.panelData = { ...row };
            this.panelTitle = 'Rekam Pembayaran';
            this.panelNote = '';
        },

        openPanel(row){
            this.panel = true;
            this.panelData = { ...row };
            this.panelTitle = 'Detail Invoice';
        },

        savePanel(){
            const idx = this.invoices.findIndex(i => i.id === this.panelData.id);
            if(idx > -1){
                this.invoices[idx] = { ...this.panelData, note: this.panelNote };
            }
            this.panel = false;
        },

        deleteRow(row){
            if(confirm('Hapus invoice ' + row.no + '?')){
                this.invoices = this.invoices.filter(i => i.id !== row.id);
                this.panel = false;
            }
        },

        filteredInvoices(){
            const s = this.search.toLowerCase();
            return this.invoices.filter(r => {
                const okSearch = !s ||
                    (r.no && r.no.toLowerCase().includes(s)) ||
                    (r.klien && r.klien.toLowerCase().includes(s)) ||
                    (r.pekerjaan && r.pekerjaan.toLowerCase().includes(s));

                const okStatus = !this.selectedStatus || r.status === this.selectedStatus;

                return okSearch && okStatus;
            });
        },

        // ========== BUKTI PEMBAYARAN METHODS & DATA ==========
        bukti: [
            {
                id:'BKT-001',
                invoice:'22192892 INV-004',
                klien:'Dian',
                jumlah:3000000,
                status:'Terverifikasi',
                files:[
                    // example initial file (dataURL small placeholder)
                    { name:'transfer-bca.jpg', size:120400, type:'image/jpeg', src:'' }
                ]
            },
            {
                id:'BKT-002',
                invoice:'22192892 INV-001',
                klien:'Benjamin',
                jumlah:500000,
                status:'Pending',
                files:[]
            }
        ],

        filteredBukti(){
            const s = this.buktiSearch.trim().toLowerCase();
            return this.bukti.filter(b => {
                const okSearch = !s ||
                    (b.id && b.id.toLowerCase().includes(s)) ||
                    (b.invoice && b.invoice.toLowerCase().includes(s)) ||
                    (b.klien && b.klien.toLowerCase().includes(s)) ||
                    (b.files && b.files.some(f => f.name.toLowerCase().includes(s)));
                const okStatus = !this.buktiFilterStatus || b.status === this.buktiFilterStatus;
                return okSearch && okStatus;
            });
        },

        openBukti(b){
            // open panel-ish: show a simple alert if you just click row
            // but keep the UX: open the first file preview if exists
            if(b.files && b.files.length) {
                this.previewFile(b.files[0]);
            } else {
                alert('Tidak ada file untuk ' + b.id);
            }
        },

        verifBukti(b){
            if(confirm('Verifikasi bukti ' + b.id + ' ?')) {
                b.status = 'Terverifikasi';
                // Optionally: sync invoice status (frontend-only)
                const inv = this.invoices.find(i => i.no === b.invoice);
                if(inv) inv.status = 'Lunas';
            }
        },

        tolakBukti(b){
            const alasan = prompt('Alasan penolakan (opsional):');
            if(alasan !== null) {
                b.status = 'Ditolak';
                // Optionally: add note
                b.note = alasan;
            }
        },

        // FILE HELPERS
        formatBytes(bytes) {
            if (bytes === 0) return '0 B';
            const k = 1024;
            const sizes = ['B', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        },

        handleUpload(e, buktiObj){
            const files = Array.from(e.target.files || []);
            if(!files.length) return;
            files.forEach(file => {
                const reader = new FileReader();
                reader.onload = (ev) => {
                    // push a file object with data URL for preview/download
                    buktiObj.files.push({
                        name: file.name,
                        size: file.size,
                        type: file.type,
                        src: ev.target.result
                    });
                };
                // read as data URL for images/pdf
                reader.readAsDataURL(file);
            });
            // reset input
            e.target.value = '';
        },

        previewFile(file){
            if(!file) return;
            this.previewName = file.name || 'Preview';
            this.previewSrc = file.src || file.url || '';
            // basic type detection
            const t = (file.type || file.name || '').toLowerCase();
            this.previewIsImage = t.includes('image') || t.match(/\.(jpg|jpeg|png|gif)$/);
            this.previewModal = true;
        },

        closePreview(){
            this.previewModal = false;
            this.previewSrc = '';
            this.previewName = '';
            this.previewIsImage = true;
        },

        downloadFile(file){
            if(!file) return;
            // dataURL -> download
            const link = document.createElement('a');
            link.href = file.src || file.url || '#';
            link.download = file.name || 'download';
            document.body.appendChild(link);
            link.click();
            link.remove();
        },

        removeFile(buktiObj, index){
            if(!confirm('Hapus file ini?')) return;
            buktiObj.files.splice(index, 1);
        },

        // ========== DEPOSIT ==========
        deposit: [
            { id:1, nama:'Deposit Benjamin', amount:2000000 },
            { id:2, nama:'Deposit Agus', amount:500000 },
        ],

        // ========== BASE DATA INVOICES ==========
        invoices: [
            { id:1, no:'22192892 INV-001', status:'Belum Bayar', jatuh:'7 Mar', klien:'Benjamin', pekerjaan:'#1823702-Jordan : Finansial', tanggal:'04 - 15 - 2024', saldo:0 },
            { id:2, no:'22192892 INV-002', status:'Lunas', jatuh:'7 Mar', klien:'Agus', pekerjaan:'#1923702-Paudra : Properti', tanggal:'04 - 15 - 2024', saldo:0 },
            { id:3, no:'22192892 INV-003', status:'Lunas', jatuh:'6 Mar', klien:'Siti', pekerjaan:'#1923703-Alya : Properti', tanggal:'06 - 07 - 2024', saldo:0 },
            { id:4, no:'22192892 INV-004', status:'Draft', jatuh:'7 Mar', klien:'Dian', pekerjaan:'#2023702-Jesslyn : Lingkungan', tanggal:'04 - 15 - 2024', saldo:3000000 },
            { id:5, no:'22192892 INV-005', status:'Draft', jatuh:'7 Mar', klien:'Rudi', pekerjaan:'#2123702-Richard : Akuisisi', tanggal:'04 - 15 - 2024', saldo:0 },
            { id:6, no:'22192892 INV-006', status:'Belum Bayar', jatuh:'7 Mar', klien:'Kusno', pekerjaan:'#2223702-Kusno : Merger', tanggal:'04 - 15 - 2024', saldo:0 },
            { id:7, no:'22192892 INV-007', status:'Belum Lunas', jatuh:'7 Mar', klien:'Steven', pekerjaan:'#2233702-Steven Diva : Waris', tanggal:'04 - 15 - 2024', saldo:0 },
            { id:8, no:'22192892 INV-008', status:'Lunas', jatuh:'7 Mar', klien:'Dery', pekerjaan:'#2243702-Dery : Wanprestasi', tanggal:'04 - 15 - 2024', saldo:0 }
        ]
    }
}
</script>
</x-utama>
