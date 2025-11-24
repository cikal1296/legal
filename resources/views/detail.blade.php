<x-utama>
<div x-data="clientDetail()" class="p-6 2xl:p-8 space-y-6 2xl:space-y-8">

  <!-- HEADER ATAS (fix: badge Klien nempel ke nama, bukan jauh di kanan) -->
  <div class="flex items-start gap-3 2xl:gap-5">

    <!-- Avatar bulat -->
   
      <a href="/statistik" class="text-5xl -mt-1 text-blue-700">&lt;</a>

    <div class="w-10 h-10 2xl:w-12 2xl:h-12 rounded-full bg-blue-600 flex items-center justify-center text-white text-lg 2xl:text-xl font-semibold">
      PS
    </div>

    <div class="flex flex-col">

      <!-- Nama + Badge Klien (sejajar & rapet) -->
      <div class="flex items-center gap-2 2xl:gap-4">
        <h1 class="text-2xl 2xl:text-3xl font-semibold text-gray-800">Paudra Sanjaya</h1>

        <!-- BADGE KLIEN (ovall biru, nempel ke nama) -->
        <span class="px-2 2xl:px-2 py-0.5 2xl:py-1 rounded-full bg-blue-600 text-white text-xs 2xl:text-sm font-medium">
          client
        </span>
      </div>

      <!-- Tabs di bawahnya -->
      <div class="flex gap-4 2xl:gap-6 mt-1 2xl:mt-3 text-sm 2xl:text-base">
        <button
          :class="activeTab==='all' ? 'text-blue-600 font-medium border-b-2 border-blue-600 pb-1 2xl:pb-3' : 'text-gray-500 hover:text-black'"
          @click="activeTab='all'">Semua</button>

        <button
          :class="activeTab==='komunikasi' ? 'text-blue-600 font-medium border-b-2 border-blue-600 pb-1 2xl:pb-3' : 'text-gray-500 hover:text-black'"
          @click="activeTab='komunikasi'">Komunikasi</button>

        <button
          :class="activeTab==='tagihan' ? 'text-blue-600 font-medium border-b-2 border-blue-600 pb-1 2xl:pb-3' : 'text-gray-500 hover:text-black'"
          @click="activeTab='tagihan'">Tagihan</button>

        <button
          :class="activeTab==='transaksi' ? 'text-blue-600 font-medium border-b-2 border-blue-600 pb-1 2xl:pb-3' : 'text-gray-500 hover:text-black'"
          @click="activeTab='transaksi'">Transaksi</button>

        <button
          :class="activeTab==='dokumen' ? 'text-blue-600 font-medium border-b-2 border-blue-600 pb-1 2xl:pb-3' : 'text-gray-500 hover:text-black'"
          @click="activeTab='dokumen'">Dokumen</button>
      </div>

    </div>
  </div>

  <!-- ====================== GRID UTAMA ====================== -->
  <div class="grid grid-cols-1 xl:grid-cols-4 gap-6 2xl:gap-8">

    <!-- INFORMASI KONTAK -->
    <div class="xl:col-span-1">
      <div class="bg-white border rounded-xl p-4 2xl:p-6 shadow-sm space-y-3 2xl:space-y-5">
        <h2 class="font-semibold text-gray-700">Informasi Kontak</h2>

        <div class="text-sm 2xl:text-base space-y-1 2xl:space-y-2">
          <p><span class="font-medium">Nama:</span> Paudra Sanjaya</p>
          <p><span class="font-medium">Tanggal Lahir:</span> 04-08-1990</p>
          <p><span class="font-medium">Jenis Kelamin:</span> Pria</p>
          <p><span class="font-medium">NIK:</span> 0868651151718</p>
          <p><span class="font-medium">No.Telp:</span> 081635282289</p>
          <p><span class="font-medium">Email:</span> PaudraSanjaya@gmail.com</p>
          <p><span class="font-medium">Alamat:</span> Jl Cimahi, Bandung</p>
        </div>

        <div class="mt-3 2xl:mt-5">
          <label class="text-sm 2xl:text-base font-medium">Catatan :</label>
          <textarea rows="3" class="w-full border rounded-lg mt-1 2xl:mt-3" x-model="note"></textarea>
        </div>
      </div>
    </div>

    <!-- DETAIL PERKARA -->
    <div class="xl:col-span-3 space-y-6 2xl:space-y-8">
      <div class="bg-white border rounded-xl p-4 2xl:p-6 shadow-sm">

        <!-- Title + dropdown + button -->
        <div class="flex justify-between items-center">

          <div class="flex items-center gap-3 2xl:gap-5">
            <h2 class="font-semibold text-gray-700">Paudra Sanjayi - #1923702</h2>

            <!-- dropdown arrow -->
            <button @click="detailOpen = !detailOpen" class="text-gray-600 hover:text-black">
              <svg xmlns="http://www.w3.org/2000/svg" :class="detailOpen ? 'transform rotate-180' : ''" class="w-4 2xl:w-6 h-4 2xl:h-6" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
          </div>

          <div class="flex items-center gap-3">
            <button @click="showAddJob=true" class="px-3 2xl:px-5 py-1.5 2xl:py-3 bg-blue-600 text-white text-sm 2xl:text-base rounded-lg hover:bg-blue-700">
              Tambah Pekerjaan
            </button>

            <!-- note: tombol tambah pengeluaran ditempatkan di bagian detail (agar layout sama) -->
          </div>
        </div>

        <!-- Status -->
        <div class="mt-4 2xl:mt-6">
          <span class="px-3 2xl:px-3 py-1 2xl:py-1 bg-green-100 text-green-700 rounded-full text-xs 2xl:text-sm font-medium">
            Status: Open
          </span>
        </div>

        <!-- Info Row -->
        <div x-show="detailOpen" class="grid grid-cols-1 md:grid-cols-3 gap-4 2xl:gap-4 mt-4 2xl:mt-6" x-transition>
          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Sisa tagihan</p>
            <p class="font-semibold text-lg 2xl:text-xl">IDR <span x-text="formatNumber(remaining)"></span></p>
          </div>

          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Dana amanat klien</p>
            <p class="font-semibold text-lg 2xl:text-xl">IDR <span x-text="formatNumber(escrow)"></span></p>
          </div>

          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Kategori</p>
            <p class="font-semibold text-lg 2xl:text-xl">Finansial</p>
          </div>
        </div>

        <!-- Detail Biaya -->
        <div x-show="detailOpen" class="grid grid-cols-1 md:grid-cols-3 gap-4 2xl:gap-6 mt-6 2xl:mt-8" x-transition>
          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Flat fee</p>
            <p class="font-semibold text-lg 2xl:text-xl">IDR <span x-text="formatNumber(flatFee)"></span></p>
          </div>

          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Total biaya waktu</p>
            <p class="font-semibold text-lg 2xl:text-xl">IDR <span x-text="formatNumber(timeCost)"></span></p>
          </div>

          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Total semua biaya</p>
            <p class="font-semibold text-lg 2xl:text-xl">IDR <span x-text="formatNumber(totalCost)"></span></p>
          </div>

          <div class="p-3 2xl:p-5 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-sm 2xl:text-base">Total Pengeluaran</p>
            <p class="font-semibold text-lg 2xl:text-xl">IDR <span x-text="formatNumber(totalExpenses)"></span></p>

            <!-- TOMBOL TAMBAH PENGELUARAN -->
            <button @click="openExpenseModal()" 
              class="mt-3 w-full border border-blue-600 text-blue-600 rounded-lg py-1.5 hover:bg-blue-600 hover:text-white transition">
              Tambah Pengeluaran
            </button>
          </div>
        </div>

      </div>
      <!-- INFO KHUSUS + PEMBAYARAN -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 2xl:gap-8">
        <div class="bg-white border rounded-xl p-4 2xl:p-6 shadow-sm">
          <h2 class="font-semibold text-gray-700 mb-2 2xl:mb-3">Informasi Khusus</h2>
          <p class="text-sm 2xl:text-base"><span class="font-medium">Tanggungan Anak:</span> 5</p>
          <p class="text-sm 2xl:text-base"><span class="font-medium">Pajak yang harus dibayar:</span> IDR 5.000.000</p>
        </div>

        <div class="bg-white border rounded-xl p-4 2xl:p-6 shadow-sm">
          <h2 class="font-semibold text-gray-700 mb-2 2xl:mb-3">Informasi Pembayaran</h2>
          <p class="text-sm 2xl:text-base"><span class="font-medium">No. Rekening BCA:</span> 013xxxxxxx</p>
          <p class="text-sm 2xl:text-base"><span class="font-medium">No. Rekening BNI:</span> 00xxxxxxx</p>
        </div>
      </div>

      <!-- ====================== AREA KATEGORI / LIST (DI SINI ISI SESUAI TAB) ====================== -->
      <div class="bg-white border rounded-xl p-4 2xl:p-6 shadow-sm mt-3">
        <h2 class="font-semibold text-gray-700 mb-3">Konten</h2>

        <!-- Empty state -->
        <div x-show="filteredItems.length===0" class="text-sm text-gray-500">
          Tidak ada data untuk kategori <span class="font-medium" x-text="tabLabel(activeTab)"></span>.
        </div>

        <!-- LIST / TABEL -->
        <template x-if="filteredItems.length>0">
          <div class="space-y-3">
            <!-- Semua / Tagihan / Transaksi / Komunikasi / Dokumen mempunyai tampilan yang mirip tapi disesuaikan -->
            <template x-for="(item, idx) in filteredItems" :key="item.id">
              <div class="border rounded-lg p-3 flex justify-between items-center">
                <div>
                  <p class="font-semibold" x-text="item.title"></p>
                  <p class="text-xs text-gray-500" x-text="item.subtitle"></p>
                </div>

                <div class="text-right">
                  <template x-if="item.type==='tagihan' || item.type==='transaksi'">
                    <p class="font-semibold" x-text="item.amount ? 'IDR ' + formatNumber(item.amount) : ''"></p>
                  </template>

                  <template x-if="item.type==='komunikasi'">
                    <p class="text-xs text-gray-500" x-text="item.date"></p>
                  </template>

                  <template x-if="item.type==='dokumen'">
                    <a :href="item.fileUrl || '#'" class="text-sm text-blue-600 hover:underline">Download</a>
                  </template>

                  <div class="mt-2 flex items-center gap-2">
                    <button @click="editItem(item)" class="px-2 py-1 border rounded text-sm">Edit</button>
                    <button @click="deleteItem(item.id)" class="px-2 py-1 border rounded text-sm text-red-600">Hapus</button>
                  </div>
                </div>
              </div>
            </template>
          </div>
        </template>

      </div>
    </div>
  </div>

  <!-- ====================== MODAL TAMBAH PEKERJAAN ====================== -->
  <div x-show="showAddJob" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center p-4" x-transition>
    <div class="bg-white rounded-xl p-6 w-full max-w-md space-y-4">
      <h2 class="text-lg font-semibold">Tambah Pekerjaan / Item</h2>

      <input type="text" x-model="newItem.title" placeholder="Judul" class="w-full border rounded-lg p-2">
      <input type="text" x-model="newItem.subtitle" placeholder="Deskripsi singkat" class="w-full border rounded-lg p-2">

      <div class="flex gap-2">
        <select x-model="newItem.type" class="border rounded-lg p-2 w-full">
          <option value="komunikasi">Komunikasi</option>
          <option value="tagihan">Tagihan</option>
          <option value="transaksi">Transaksi</option>
          <option value="dokumen">Dokumen</option>
        </select>

        <input x-show="newItem.type==='tagihan' || newItem.type==='transaksi'" type="number" x-model.number="newItem.amount" placeholder="Jumlah (IDR)" class="border rounded-lg p-2 w-1/2">
      </div>

      <div class="flex justify-end gap-2">
        <button @click="closeAddJob()" class="px-3 py-1.5 border rounded-lg">Batal</button>
        <button @click="addItem()" class="px-3 py-1.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Tambah</button>
      </div>
    </div>
  </div>

  <!-- ====================== MODAL TAMBAH PENGELUARAN ====================== -->
  <div x-show="showExpense" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center p-4" x-transition>
    <div class="bg-white rounded-xl p-6 w-full max-w-md space-y-4">
      <h2 class="text-lg font-semibold">Tambah Pengeluaran (Transaksi)</h2>

      <input type="text" x-model="expenseForm.title" placeholder="Nama pengeluaran" class="w-full border rounded-lg p-2">
      <input type="number" x-model.number="expenseForm.amount" placeholder="Jumlah (IDR)" class="w-full border rounded-lg p-2">
      <input type="date" x-model="expenseForm.date" class="w-full border rounded-lg p-2">

      <div class="flex justify-end gap-2">
        <button @click="closeExpense()" class="px-3 py-1.5 border rounded-lg">Batal</button>
        <button @click="addExpense()" class="px-3 py-1.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Tambah</button>
      </div>
    </div>
  </div>

</div>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
function clientDetail(){
  return {
    // UI state
    activeTab: 'all', // all | komunikasi | tagihan | transaksi | dokumen
    detailOpen: true,
    showAddJob: false,
    showExpense: false,

    // data / initial sample
    note: '',
    flatFee: 100000000,
    timeCost: 10000000,
    totalCost: 140000000,
    remaining: 30000000,
    escrow: 20000000,

    // lists (sample items)
    items: [
      // komunikasi
      { id: 1, type: 'komunikasi', title: 'Chat: Tanya progres', subtitle: 'Pesan singkat dari klien', date: '2025-11-10' },

      // tagihan
      { id: 2, type: 'tagihan', title: 'Invoice #1001', subtitle: 'Pembayaran bulan Sept', amount: 5000000, date: '2025-10-01' },

      // transaksi (pengeluaran)
      { id: 3, type: 'transaksi', title: 'Beli Materai', subtitle: 'Keperluan dokumen', amount: 10000, date: '2025-09-12' },

      // dokumen
      { id: 4, type: 'dokumen', title: 'Kontrak Kerja', subtitle: 'File PDF kontrak', fileUrl: '#', date: '2025-08-01' },
    ],

    // temp models
    newItem: { title:'', subtitle:'', type:'komunikasi', amount: null },
    expenseForm: { title:'', amount:null, date: null },

    // computed: filtered items according to activeTab
    get filteredItems(){
      if(this.activeTab === 'all') return this.items.slice().reverse();
      return this.items.filter(i => i.type === this.activeTab).slice().reverse();
    },

    // helper
    tabLabel(tab){
      const map = { all: 'Semua', komunikasi: 'Komunikasi', tagihan: 'Tagihan', transaksi: 'Transaksi', dokumen: 'Dokumen' };
      return map[tab] || tab;
    },

    formatNumber(num){
      if(num===null || num===undefined) return '0';
      return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },

    // CRUD actions
    addItem(){
      // validation
      if(!this.newItem.title.trim()) { alert('Isi judul dulu!'); return; }
      const id = Date.now();
      const payload = {
        id,
        type: this.newItem.type,
        title: this.newItem.title,
        subtitle: this.newItem.subtitle || '',
        amount: this.newItem.amount ? Number(this.newItem.amount) : null,
        date: new Date().toISOString().slice(0,10),
      };
      this.items.push(payload);

      // update totals if transaksi added
      if(payload.type === 'transaksi' && payload.amount){
        this.totalExpensesCalc();
      }

      this.newItem = { title:'', subtitle:'', type:'komunikasi', amount: null };
      this.showAddJob = false;
      this.activeTab = payload.type; // langsung tunjukin kategori yang bersangkutan
    },

    closeAddJob(){
      this.showAddJob = false;
      this.newItem = { title:'', subtitle:'', type:'komunikasi', amount: null };
    },

    openExpenseModal(){
      this.showExpense = true;
      // prefill with sensible default
      this.expenseForm = { title:'', amount:null, date: new Date().toISOString().slice(0,10) };
    },

    closeExpense(){
      this.showExpense = false;
      this.expenseForm = { title:'', amount:null, date: null };
    },

    addExpense(){
      if(!this.expenseForm.title.trim() || !this.expenseForm.amount){
        alert('Lengkapi nama dan jumlah pengeluaran!');
        return;
      }
      const id = Date.now();
      const payload = {
        id,
        type: 'transaksi',
        title: this.expenseForm.title,
        subtitle: 'Pengeluaran',
        amount: Number(this.expenseForm.amount),
        date: this.expenseForm.date || new Date().toISOString().slice(0,10)
      };
      this.items.push(payload);

      // adjust totals
      this.totalExpensesCalc();

      this.closeExpense();
      this.activeTab = 'transaksi';
    },

    // delete / edit
    deleteItem(id){
      if(!confirm('Hapus item ini?')) return;
      this.items = this.items.filter(i => i.id !== id);
      this.totalExpensesCalc();
    },

    editItem(item){
      // simple edit flow: open modal with prefilled data for items except dokumen
      this.newItem = { title: item.title, subtitle: item.subtitle || '', type: item.type, amount: item.amount || null };
      this.showAddJob = true;

      // after editing and pressing "Tambah", logic will create a new item — for simplicity we don't mutate existing one
      // NOTE: if you want full in-place edit, we can add that later.
    },

    // totals calculation helper
    totalExpensesCalc(){
      const total = this.items.filter(i=>i.type==='transaksi').reduce((s, it)=> s + (it.amount? Number(it.amount) : 0), 0);
      this.totalExpenses = total;
      // also recalc remaining if desired
      this.remaining = Math.max(0, (this.flatFee + this.timeCost) - total);
    },

    // init
    init(){
      // compute totals initially
      this.totalExpenses = this.items.filter(i=>i.type==='transaksi').reduce((s, it)=> s + (it.amount? Number(it.amount) : 0), 0);
      this.totalExpensesCalc();
    }
  }
}
</script>

</x-utama>
