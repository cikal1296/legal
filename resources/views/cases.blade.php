{{-- resources/views/cases/show.blade.php --}}

<div x-data="caseDetail()" class="p-4 space-y-6">

    <!-- ========================= -->
    <!-- HEADER ATAS (TAMPIL TIMBUL) -->
    <!-- ========================= -->
    <div class=" bg-white p-4 rounded-xl border shadow-sm">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <a href="/dfcase" class="text-gray-600 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>

            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-teal-600" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h6l2 3h10v11H3V7z" />
            </svg>

            <h1 class="text-2xl font-semibold">
                #Seri Angka - Nama Terkait : Pekerjaan
            </h1>
        </div>

        <div class="flex items-center space-x-3">
            <button @click="openEdit()" class="px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600">
                Edit Perkara
            </button>

            <!-- quick actions (optional) -->
            <button @click="toggleFavorite()" :class="favorite ? 'bg-yellow-400' : 'bg-gray-100'" class="px-3 py-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" :class="favorite ? 'text-white' : 'text-gray-600'" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.958a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.37 2.447a1 1 0 00-.364 1.118l1.287 3.957c.3.922-.755 1.688-1.54 1.118l-3.37-2.447a1 1 0 00-1.176 0L5.21 17.925c-.785.57-1.84-.196-1.54-1.118l1.287-3.957a1 1 0 00-.364-1.118L1.523 8.285c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.286-3.958z"/></svg>
            </button>
        </div>
    </div>

    <!-- ========================= -->
    <!-- NAVIGATION -->
    <!-- ========================= -->
    <div class="flex space-x-4 overflow-x-auto pb-1 pt-10">
        <button @click="active='semua'" :class="active==='semua' ? 'bg-teal-500 text-white' : 'bg-gray-100 text-gray-700'" class="px-4 py-1 rounded-lg">Semua</button>
        <button @click="active='transaksi'" :class="active==='transaksi' ? 'bg-teal-500 text-white' : 'bg-gray-100 text-gray-700'" class="px-4 py-1 rounded-lg">Transaksi</button>
        <button @click="active='dokumen'" :class="active==='dokumen' ? 'bg-teal-500 text-white' : 'bg-gray-100 text-gray-700'" class="px-4 py-1 rounded-lg">Dokumen</button>
        <button @click="active='jurnal'" :class="active==='jurnal' ? 'bg-teal-500 text-white' : 'bg-gray-100 text-gray-700'" class="px-4 py-1 rounded-lg">Jurnal biaya</button>
        <button @click="active='kalender'" :class="active==='kalender' ? 'bg-teal-500 text-white' : 'bg-gray-100 text-gray-700'" class="px-4 py-1 rounded-lg">Kalender</button>
        <button @click="active='tugas'" :class="active==='tugas' ? 'bg-teal-500 text-white' : 'bg-gray-100 text-gray-700'" class="px-4 py-1 rounded-lg">Tugas</button>
        <button @click="active='komunikasi'" :class="active==='komunikasi' ? 'bg-teal-500 text-white' : 'bg-gray-100 text-gray-700'" class="px-4 py-1 rounded-lg">Komunikasi</button>
    </div>
</div>

    <!-- ========================= -->
    <!-- CONTENT AREA (sections switch here) -->
    <!-- ========================= -->
    <div>

        <!-- ========================= -->
        <!-- SECTION: Semua (default) - keep original layout visible here -->
        <!-- ========================= -->
        <div x-show="active==='semua'">
            <!-- FINANSIAL PEKERJAAN (FIX) -->
            <div class="border p-4 rounded-xl bg-white shadow-sm mt-4">
                <h2 class="font-semibold text-lg mb-3 pb-2 border-b">Finansial Pekerjaan</h2>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    <div class="p-4 border rounded-lg bg-gray-50 text-center">
                        <p class="font-medium">Flat Fee :</p>
                        <p class="text-xl font-bold" x-text="formatCurrency(flatFee)"></p>
                    </div>

                    <div class="p-4 border rounded-lg bg-gray-50 text-center space-y-2">
                        <p>Total Biaya Waktu : <span class="font-bold" x-text="formatCurrency(totalTimeCost)"></span></p>
                        <button @click="openAddTime()" class="px-3 py-1 bg-teal-500 text-white rounded-lg w-full">+ Waktu</button>
                        <p>Total Pengeluaran : <span class="font-bold" x-text="formatCurrency(totalExpenses)"></span></p>
                        <button @click="openAddExpense()" class="px-3 py-1 bg-teal-500 text-white rounded-lg w-full">+ Pengeluaran</button>
                    </div>

                    <div class="p-4 border rounded-lg bg-gray-50 text-center">
                        <p class="font-medium">Total semua biaya</p>
                        <p class="text-xl font-bold" x-text="formatCurrency(totalAll)"></p>
                    </div>

                    <div class="p-4 border rounded-lg bg-gray-50 text-center space-y-3">
                        <p>Dana deposit : <span class="font-bold" x-text="formatCurrency(deposit)"></span></p>
                        <button @click="openRequestDeposit()" class="px-3 py-1 bg-teal-500 text-white rounded-lg w-full">Permintaan Dana</button>
                        <p>Sisa tagihan : <span class="font-bold" x-text="formatCurrency(outstanding)"></span></p>
                        <button @click="createInvoice()" class="px-3 py-1 bg-teal-600 text-white rounded-lg w-full">Invoice</button>
                    </div>

                </div>
            </div>

            <!-- GRID 3 KOLOM (SEMUA FIX) -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mt-4">

                <!-- 1. INFORMASI PEKERJAAN -->
                <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
                    <div class="bg-gray-100 px-4 py-2 border-b font-semibold">Informasi Pekerjaan</div>
                    <div class="p-4 space-y-3 text-sm">
                        <div><p><strong>Ranah Kasus :</strong> </p><hr class="mt-1 border-gray-200"></div>
                        <div><p><strong>Jenis Kasus :</strong> </p><hr class="mt-1 border-gray-200"></div>
                        <div><p><strong>Lokasi :</strong> </p><hr class="mt-1 border-gray-200"></div>
                        <div><p><strong>Pimpinan :</strong>  , , </p><hr class="mt-1 border-gray-200"></div>
                        <div><p><strong>Anggota :</strong>  </p><hr class="mt-1 border-gray-200"></div>
                        <div><p><strong> /   :</strong> , , </p><hr class="mt-1 border-gray-200"></div>
                        <div><p><strong>Status :</strong> </p><hr class="mt-1 border-gray-200"></div>
                        <div><p><strong>Deskripsi :</strong>    ...</p></div>
                    </div>
                </div>

                <!-- 2. TANGGAL -->
                <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
                    <div class="bg-gray-100 px-4 py-2 border-b font-semibold">Tanggal</div>
                    <div class="p-4 space-y-3 text-sm">
                        <div><p><strong>Tanggal Mulai :</strong> <span x-text="dates.start || '-----'"></span></p><hr class="mt-1 border-gray-200"></div>
                        <div><p><strong>Tanggal Tutup :</strong> <span x-text="dates.end || '-----'"></span></p><hr class="mt-1 border-gray-200"></div>
                        <div><p><strong>Tanggal Pending :</strong> <span x-text="dates.pending || '-----'"></span></p></div>
                    </div>
                        <!-- 3. INFORMASI KLIEN -->
                <div class="bg-white rounded-xl shadow-sm border overflow-hidden mt-12">
                    <div class="bg-gray-100 px-4 py-2 border-b font-semibold">Informasi Klien</div>
                    <div class="p-4 space-y-3 text-sm">
                        <div><p><strong>Nama :</strong>  </p><hr class="mt-1 border-gray-200"></div>
                        <div><p><strong>Tanggal Lahir :</strong> --</p><hr class="mt-1 border-gray-200"></div>
                        <div><p><strong>Jenis Kelamin :</strong> </p><hr class="mt-1 border-gray-200"></div>
                        <div><p><strong>NIK :</strong> </p></div>
                    </div>
                </div>
                </div>

                <!-- 4. RIWAYAT + KONTAK -->
                <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
                    <div class="bg-gray-100 px-4 py-2 border-b font-semibold">Riwayat Aktivitas Pekerjaan</div>
                    <div class="p-4 space-y-4 text-sm">
                        <template x-for="h in history" :key="h.date">
                            <div>
                                <p class="font-semibold mb-1" x-text="h.date"></p>
                                <ul class="space-y-1 text-gray-700">
                                    <template x-for="(it, idx) in h.items" :key="idx">
                                        <li x-text="it"></li>
                                    </template>
                                </ul>
                            </div>
                        </template>
                    </div>

                    <div class="border-t p-4">
                        <p class="font-semibold mb-1 text-lg">Kontak Terkait</p>
                        <ul class="space-y-1 text-sm text-gray-700">
                            <template x-for="c in contacts" :key="c.name">
                                <li x-text="c.name + ' — ' + c.phone"></li>
                            </template>
                        </ul>
                    </div>
                </div>

            

            </div>
        </div>

        <!-- ========================= -->
        <!-- SECTION: Transaksi -->
        <!-- ========================= -->
        <div x-show="active==='transaksi'">
            <div class="bg-white border rounded-xl p-4 shadow-sm mt-4">
                <h3 class="font-semibold mb-3">Transaksi - Ringkasan</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-3 border rounded">
                        <p class="text-xs text-gray-600">Total Invoice</p>
                        <p class="font-bold text-lg" x-text="formatCurrency(totalAll)"></p>
                    </div>
                    <div class="p-3 border rounded">
                        <p class="text-xs text-gray-600">Total Dibayar</p>
                        <p class="font-bold text-lg" x-text="formatCurrency(paid)"></p>
                    </div>
                    <div class="p-3 border rounded">
                        <p class="text-xs text-gray-600">Sisa Tagihan</p>
                        <p class="font-bold text-lg" x-text="formatCurrency(outstanding)"></p>
                    </div>
                </div>

                <div class="mt-4">
                    <h4 class="font-semibold mb-2">Daftar Transaksi</h4>
                    <table class="w-full text-sm">
                        <thead class="bg-gray-100 text-xs text-gray-600"><tr><th class="px-3 py-2">ID</th><th class="px-3 py-2">Tanggal</th><th class="px-3 py-2">Keterangan</th><th class="px-3 py-2">Jumlah</th></tr></thead>
                        <tbody class="divide-y">
                            <template x-for="t in transactions" :key="t.id">
                                <tr>
                                    <td class="px-3 py-2" x-text="t.id"></td>
                                    <td class="px-3 py-2" x-text="t.date"></td>
                                    <td class="px-3 py-2" x-text="t.note"></td>
                                    <td class="px-3 py-2" x-text="formatCurrency(t.amount)"></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ========================= -->
        <!-- SECTION: Dokumen -->
        <!-- ========================= -->
        <div x-show="active==='dokumen'">
            <div class="bg-white border rounded-xl p-4 shadow-sm mt-4">
                <h3 class="font-semibold mb-3">Dokumen Terkait</h3>
                <div class="space-y-2 text-sm">
                    <template x-for="doc in documents" :key="doc.name">
                        <div class="flex items-center justify-between border p-2 rounded">
                            <div>
                                <div class="font-medium" x-text="doc.name"></div>
                                <div class="text-xs text-gray-500" x-text="doc.type + ' · ' + formatBytes(doc.size)"></div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button @click="previewDocument(doc)" class="px-2 py-1 text-xs bg-gray-100 rounded">Lihat</button>
                                <button @click="downloadDocument(doc)" class="px-2 py-1 text-xs bg-gray-100 rounded">Download</button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- ========================= -->
        <!-- SECTION: Jurnal biaya -->
        <!-- ========================= -->
        <div x-show="active==='jurnal'">
            <div class="bg-white border rounded-xl p-4 shadow-sm mt-4">
                <h3 class="font-semibold mb-3">Jurnal Biaya</h3>
                <table class="w-full text-sm">
                    <thead class="bg-gray-100 text-xs text-gray-600"><tr><th class="px-3 py-2">Tanggal</th><th class="px-3 py-2">Kategori</th><th class="px-3 py-2">Deskripsi</th><th class="px-3 py-2">Nominal</th></tr></thead>
                    <tbody class="divide-y">
                        <template x-for="j in journal" :key="j.id">
                            <tr>
                                <td class="px-3 py-2" x-text="j.date"></td>
                                <td class="px-3 py-2" x-text="j.category"></td>
                                <td class="px-3 py-2" x-text="j.desc"></td>
                                <td class="px-3 py-2" x-text="formatCurrency(j.amount)"></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ========================= -->
        <!-- SECTION: Kalender -->
        <!-- ========================= -->
        <div x-show="active==='kalender'">
            <div class="bg-white border rounded-xl p-4 shadow-sm mt-4">
                <h3 class="font-semibold mb-3">Kalender Kegiatan</h3>
                <div class="text-sm text-gray-600">[Placeholder kalender — integrasi kalender eksternal nanti]</div>
                <ul class="mt-3 space-y-2 text-sm">
                    <template x-for="ev in events" :key="ev.id">
                        <li><strong x-text="ev.date"></strong> — <span x-text="ev.title"></span></li>
                    </template>
                </ul>
            </div>
        </div>

        <!-- ========================= -->
        <!-- SECTION: Tugas -->
        <!-- ========================= -->
        <div x-show="active==='tugas'">
            <div class="bg-white border rounded-xl p-4 shadow-sm mt-4">
                <h3 class="font-semibold mb-3">Tugas</h3>
                <ul class="space-y-2">
                    <template x-for="task in tasks" :key="task.id">
                        <li class="flex items-center justify-between border p-2 rounded">
                            <div>
                                <div class="font-medium" x-text="task.title"></div>
                                <div class="text-xs text-gray-500" x-text="task.due"></div>
                            </div>
                            <div>
                                <button @click="toggleTask(task)" :class="task.done ? 'bg-green-100 text-green-700' : 'bg-gray-100'" class="px-2 py-1 rounded text-xs" x-text="task.done ? 'Selesai' : 'Tandai Selesai'"></button>
                            </div>
                        </li>
                    </template>
                </ul>
            </div>
        </div>

        <!-- ========================= -->
        <!-- SECTION: Komunikasi -->
        <!-- ========================= -->
        <div x-show="active==='komunikasi'">
            <div class="bg-white border rounded-xl p-4 shadow-sm mt-4">
                <h3 class="font-semibold mb-3">Komunikasi</h3>
                <div class="space-y-3">
                    <template x-for="m in messages" :key="m.id">
                        <div class="border p-2 rounded text-sm">
                            <div class="text-xs text-gray-500" x-text="m.date + ' — ' + m.from"></div>
                            <div x-text="m.text"></div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

    </div>

    <!-- ========================= -->
    <!-- MODALS (Edit / Add Time / Add Expense / Request Deposit / Document Preview) -->
    <!-- ========================= -->
    <!-- Edit Perkara Modal -->
    <div x-show="modal.edit" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
        <div @click.away="modal.edit=false" class="bg-white rounded-lg w-full max-w-2xl p-4">
            <div class="flex justify-between items-center mb-3">
                <h4 class="font-semibold">Edit Perkara</h4>
                <button @click="modal.edit=false" class="text-xs bg-gray-100 px-2 py-1 rounded">Tutup</button>
            </div>
            <div class="space-y-2">
                <label class="text-xs">Judul Kasus</label>
                <input x-model="caseTitle" class="w-full border rounded p-2 text-sm" />
                <label class="text-xs">Deskripsi</label>
                <textarea x-model="caseDesc" class="w-full border rounded p-2 text-sm"></textarea>
                <div class="flex justify-end space-x-2 mt-2">
                    <button @click="saveCase()" class="px-3 py-1 bg-teal-600 text-white rounded text-xs">Simpan</button>
                    <button @click="modal.edit=false" class="px-3 py-1 bg-gray-100 rounded text-xs">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Time Modal -->
    <div x-show="modal.addTime" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
        <div @click.away="modal.addTime=false" class="bg-white rounded-lg w-full max-w-md p-4">
            <h4 class="font-semibold mb-2">Tambah Waktu</h4>
            <label class="text-xs">Deskripsi</label>
            <input x-model="newTime.note" class="w-full border rounded p-2 text-sm" />
            <label class="text-xs mt-2">Durasi (jam)</label>
            <input type="number" x-model.number="newTime.hours" class="w-full border rounded p-2 text-sm" />
            <label class="text-xs mt-2">Rate per jam (IDR)</label>
            <input type="number" x-model.number="newTime.rate" class="w-full border rounded p-2 text-sm" />
            <div class="flex justify-end space-x-2 mt-3">
                <button @click="addTime()" class="px-3 py-1 bg-teal-600 text-white rounded text-xs">Tambah</button>
                <button @click="modal.addTime=false" class="px-3 py-1 bg-gray-100 rounded text-xs">Batal</button>
            </div>
        </div>
    </div>

    <!-- Add Expense Modal -->
    <div x-show="modal.addExpense" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
        <div @click.away="modal.addExpense=false" class="bg-white rounded-lg w-full max-w-md p-4">
            <h4 class="font-semibold mb-2">Tambah Pengeluaran</h4>
            <label class="text-xs">Deskripsi</label>
            <input x-model="newExpense.note" class="w-full border rounded p-2 text-sm" />
            <label class="text-xs mt-2">Jumlah (IDR)</label>
            <input type="number" x-model.number="newExpense.amount" class="w-full border rounded p-2 text-sm" />
            <div class="flex justify-end space-x-2 mt-3">
                <button @click="addExpense()" class="px-3 py-1 bg-teal-600 text-white rounded text-xs">Tambah</button>
                <button @click="modal.addExpense=false" class="px-3 py-1 bg-gray-100 rounded text-xs">Batal</button>
            </div>
        </div>
    </div>

    <!-- Request Deposit Modal -->
    <div x-show="modal.requestDeposit" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
        <div @click.away="modal.requestDeposit=false" class="bg-white rounded-lg w-full max-w-md p-4">
            <h4 class="font-semibold mb-2">Permintaan Dana</h4>
            <label class="text-xs">Jumlah (IDR)</label>
            <input type="number" x-model.number="request.amount" class="w-full border rounded p-2 text-sm" />
            <label class="text-xs mt-2">Catatan</label>
            <textarea x-model="request.note" class="w-full border rounded p-2 text-sm"></textarea>
            <div class="flex justify-end space-x-2 mt-3">
                <button @click="sendRequest()" class="px-3 py-1 bg-teal-600 text-white rounded text-xs">Kirim</button>
                <button @click="modal.requestDeposit=false" class="px-3 py-1 bg-gray-100 rounded text-xs">Batal</button>
            </div>
        </div>
    </div>

    <!-- Document Preview Modal -->
    <div x-show="modal.docPreview" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
        <div @click.away="modal.docPreview=false" class="bg-white rounded-lg w-full max-w-3xl p-4">
            <div class="flex justify-between items-center mb-3">
                <h4 class="font-semibold" x-text="previewDoc.name"></h4>
                <button @click="modal.docPreview=false" class="text-xs bg-gray-100 px-2 py-1 rounded">Tutup</button>
            </div>
            <div class="max-h-[70vh] overflow-auto">
                <template x-if="previewDoc.type && previewDoc.type.includes('image')">
                    <img :src="previewDoc.src" class="w-full h-auto rounded" />
                </template>
                <template x-if="!previewDoc.type || !previewDoc.type.includes('image')">
                    <iframe :src="previewDoc.src" class="w-full h-[60vh]" frameborder="0"></iframe>
                </template>
            </div>
        </div>
    </div>

</div>

<script>
function caseDetail(){
    return {
        // UI state
        active: 'semua', // semua | transaksi | dokumen | jurnal | kalender | tugas | komunikasi
        favorite: false,

        // modals
        modal: {
            edit: false,
            addTime: false,
            addExpense: false,
            requestDeposit: false,
            docPreview: false
        },

        // case data (dummy)
        caseTitle: '#1823702 - Jordan Yudhistira : Finansial',
        caseDesc: 'Kasus ini melibatkan sengketa ...',
        dates: { start: '', end: '', pending: '' },

        // finansial
        flatFee: 000000000,
        timeEntries: [], // {hours, rate, note, total}
        expenses: [], // {amount, note}
        deposit: 0,
        invoices: [],

        // transactions & journal
        transactions: [
            { id: 'TRX-001', date: '2024-04-15', note: 'Pembayaran DP', amount: 000000 },
        ],
        journal: [
            { id:1, date:'2024-04-15', category:'Biaya Admin', desc:'Biaya materai', amount: 0000 },
        ],

        // documents
        documents: [
            // { name:'Surat Kuasa.pdf', type:'application/pdf', size: 452301, src:'' },
            // { name:'Bukti Transfer.jpg', type:'image/jpeg', size: 120450, src:'' }
        ],
        previewDoc: {},

        // history & contacts
        history: [
            // { date:'April 23 2023', items:['James Ardy : merekam waktu','Benjamin membuat deposit Rp 2.000.000','James Ardy : update progres','James Ardy : mengubah status'] },
            // { date:'April 22 2023', items:['James Ardy : membuat catatan','Jordan : mengunggah dokumen'] }
        ],
        contacts: [
            // { name:'James Ardy', phone:'08123456789' },
            // { name:'Gabriella', phone:'085267891234' },
            // { name:'Jordan', phone:'082198765432' },
        ],

        // tasks & messages & events
        tasks: [
            // { id:1, title:'Siapkan dokumen A', due:'2024-05-01', done:false },
            // { id:2, title:'Kirim invoice termin 1', due:'2024-05-03', done:false }
        ],
        messages: [
            // { id:1, date:'2024-04-20', from:'James', text:'Sudah upload bukti transfer.' }
        ],
        events: [
            // { id:1, date:'2024-05-01', title:'Sidang Pengadilan' }
        ],

        // simple derived values
        get totalTimeCost(){
            return this.timeEntries.reduce((s,e)=> s + (e.hours * e.rate), 0);
        },

        get totalExpenses(){
            return this.expenses.reduce((s,e)=> s + e.amount, 0);
        },

        get totalAll(){
            return this.flatFee + this.totalTimeCost + this.totalExpenses;
        },

        get paid(){
            return this.transactions.reduce((s,t)=> s + t.amount, 0) + this.deposit;
        },

        get outstanding(){
            return Math.max(0, this.totalAll - this.paid);
        },

        // utility
        formatCurrency(v){
            if(v === undefined || v === null) v = 0;
            return 'IDR ' + v.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        },

        formatBytes(bytes){
            if (!bytes) return '0 B';
            const k = 1024, sizes = ['B','KB','MB','GB'], i = Math.floor(Math.log(bytes)/Math.log(k));
            return parseFloat((bytes/Math.pow(k,i)).toFixed(2)) + ' ' + sizes[i];
        },

        // actions
        toggleFavorite(){ this.favorite = !this.favorite },

        // edit modal
        openEdit(){ this.modal.edit = true },
        saveCase(){
            // frontend-only save
            this.modal.edit = false;
            alert('Perubahan disimpan (frontend-only).');
        },

        // time
        openAddTime(){ this.newTime = { hours:1, rate:100000, note:'' }; this.modal.addTime = true },
        addTime(){
            if(!this.newTime || !this.newTime.hours || !this.newTime.rate) { alert('Isi jam dan rate.'); return;}
            this.timeEntries.push({ ...this.newTime, total: this.newTime.hours * this.newTime.rate });
            this.transactions.push({ id: 'TRX-' + (Math.random().toString(36).substr(2,5)).toUpperCase(), date: (new Date()).toLocaleDateString(), note: 'Rekam waktu: ' + this.newTime.note, amount: 0 });
            this.modal.addTime = false;
        },

        // expense
        openAddExpense(){ this.newExpense = { amount:0, note:'' }; this.modal.addExpense = true },
        addExpense(){
            if(!this.newExpense || !this.newExpense.amount) { alert('Isi jumlah.'); return; }
            this.expenses.push({ ...this.newExpense });
            this.journal.push({ id: this.journal.length + 1, date: (new Date()).toLocaleDateString(), category:'Pengeluaran', desc: this.newExpense.note, amount: this.newExpense.amount });
            this.modal.addExpense = false;
        },

        // deposit
        openRequestDeposit(){ this.request = { amount:0, note:'' }; this.modal.requestDeposit = true },
        sendRequest(){
            if(!this.request.amount) { alert('Masukkan jumlah.'); return; }
            // frontend-only: increase deposit and add transaction
            this.deposit += this.request.amount;
            this.transactions.push({ id: 'TRX-' + (Math.random().toString(36).substr(2,5)).toUpperCase(), date: (new Date()).toLocaleDateString(), note: 'Permintaan dana: ' + this.request.note, amount: this.request.amount });
            this.modal.requestDeposit = false;
            alert('Permintaan dana tercatat (frontend-only).');
        },

        // invoice
        createInvoice(){
            const inv = { id: 'INV-' + (Math.random().toString(36).substr(2,6)).toUpperCase(), date: (new Date()).toLocaleDateString(), amount: this.totalAll, status: 'Unpaid' };
            this.invoices.push(inv);
            alert('Invoice dibuat: ' + inv.id + ' (frontend-only).');
        },

        // documents
        previewDocument(doc){
            // if doc.src empty show alert, else open preview modal (src should be dataURL for real)
            if(!doc.src){
                alert('Preview belum tersedia untuk ' + doc.name);
                return;
            }
            this.previewDoc = doc;
            this.modal.docPreview = true;
        },
        downloadDocument(doc){
            // if src available, download, else inform user
            if(!doc.src){ alert('File tidak tersedia untuk di-download.'); return; }
            const a = document.createElement('a'); a.href = doc.src; a.download = doc.name; document.body.appendChild(a); a.click(); a.remove();
        },

        // tasks
        toggleTask(task){
            task.done = !task.done;
        },
    }
}
</script>

