<x-utama>

<!-- HEADER -->
<div class="flex items-center space-x-3 w-full h-full -mt-10 ml-5 mb-10">
    <svg class="w-12 h-12 text-teal-500" fill="none" stroke="currentColor" stroke-width="2"
        viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8z"/>
    </svg>
    <h1 class="text-5xl font-semibold text-gray-800">Papan Informasi Personal</h1>
</div>

<div class="p-6 bg-gray-50 min-h-screen">

    <!-- ================== ROW 1 — AGENDA + TUGAS ================== -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <!-- ===== AGENDA ===== -->
        <div class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6">
            <h2 class="text-xl font-semibold mb-4">Agenda</h2>

            <div class="space-y-5">

                <!-- hijau -->
                <div class="flex gap-3 items-start">
                    <div class="w-1.5 h-10 rounded-full bg-green-500"></div>
                    <div>
                        <p class="font-medium">Meeting dengan klien</p>
                        <p class="text-gray-500 text-sm">10:30 - 11:30</p>
                    </div>
                </div>

                <!-- biru -->
                <div class="flex gap-3 items-start">
                    <div class="w-1.5 h-10 rounded-full bg-blue-500"></div>
                    <div>
                        <p class="font-medium">Meeting dengan partner</p>
                        <p class="text-gray-500 text-sm">10:30 - 11:30</p>
                    </div>
                </div>

                <!-- merah -->
                <div class="flex gap-3 items-start">
                    <div class="w-1.5 h-10 rounded-full bg-red-500"></div>
                    <div>
                        <p class="font-medium">Zoom Meeting Online</p>
                        <p class="text-gray-500 text-sm">10:30 - 11:30</p>
                    </div>
                </div>

                <!-- hijau lagi -->
                <div class="flex gap-3 items-start">
                    <div class="w-1.5 h-10 rounded-full bg-green-500"></div>
                    <div>
                        <p class="font-medium">Gmeet dengan klien</p>
                        <p class="text-gray-500 text-sm">10:30 - 11:30</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- ===== TUGAS ===== -->
        <div class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6">
            <h2 class="text-xl font-semibold mb-4">Tugas</h2>

            <div class="space-y-5">

                <div class="flex gap-3 items-start">
                    <div class="w-1.5 rounded-full mt-2 h-2 bg-green-500"></div>
                    <div>
                        <p class="font-medium text-green-600">Buat draft investasi</p>
                        <p class="text-gray-500 text-sm">10:30 - 11:30</p>
                    </div>
                </div>

                <div class="flex gap-3 items-start">
                    <div class="w-1.5 h-2 mt-2 rounded-full bg-blue-500"></div>
                    <div>
                        <p class="font-medium text-blue-600">Buat draft perjanjian</p>
                        <p class="text-gray-500 text-sm">10:30 - 11:30</p>
                    </div>
                </div>

                <div class="flex gap-3 items-start">
                    <div class="w-1.5 h-2 mt-2 rounded-full bg-red-500"></div>
                    <div>
                        <p class="font-medium text-red-600">Buat kasus posisi</p>
                        <p class="text-gray-500 text-sm">10:30 - 11:30</p>
                    </div>
                </div>

                <div class="flex gap-3 items-start">
                    <div class="w-1.5 h-2 mt-2 rounded-full bg-yellow-500"></div>
                    <div>
                        <p class="font-medium text-yellow-600">Teliti dasar hukum</p>
                        <p class="text-gray-500 text-sm">10:30 - 11:30</p>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <!-- ================== ROW 2 — ID + INVOICE + PEKERJAAN + CALENDAR ================== -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        <!-- ========== ID CARD ========== -->
        <div class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6">
            <h3 class="text-xl font-semibold mb-3">ID</h3>

            <p class="text-gray-700 font-medium mb-3">Kantor Hukum JNP</p>

            <div class="border-t-2 border-teal-500 w-1/1 mb-4"></div>

            <div class="flex items-center gap-4 mb-4">
                <img src="https://cmsassets.rgpub.io/sanity/images/dsfx7636/news/2c35cef9c38283f8478d1e808b1c129f371e50b3-616x822.png"
                     class="w-16 h-16 rounded-xl object-cover shadow" />

                <div>
                    <p class="font-semibold text-gray-900">Nicholas Suardi</p>
                    <p class="text-sm text-gray-500">Partner</p>
                </div>
            </div>

            <p class="text-sm text-gray-700"><b>Permissions:</b> Administrator</p>
            <p class="text-sm text-gray-700"><b>Email:</b> nicholassuardi@gmail.com</p>
            <p class="text-sm text-gray-700"><b>No. Telp:</b> 081344557789</p>
            <p class="text-sm text-gray-700"><b>Rate Per Jam:</b> Rp 5.000.000</p>
        </div>


        <!-- ========== INVOICE ========== -->
        <div class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6">
            <h3 class="text-xl font-semibold mb-3">Invoice</h3>

            <div class="space-y-6">

                <!-- Draft -->
                <div class="pl-3 border-l-4 border-blue-500">
                    <p class="text-gray-500">Draft</p>
                    <p class="text-2xl font-semibold text-blue-600">3</p>
                    <p class="text-gray-700">Nilai Invoice <b>Rp 500.000.000</b></p>
                </div>

                <!-- Belum dibayar -->
                <div class="pl-3 border-l-4 border-red-500">
                    <p class="text-gray-500">Belum dibayar</p>
                    <p class="text-2xl font-semibold text-red-600">3</p>
                    <p class="text-gray-700">Nilai Invoice <b>Rp 100.000.000</b></p>
                </div>

                <!-- Sudah dibayar -->
                <div class="pl-3 border-l-4 border-green-500">
                    <p class="text-gray-500">Sudah dibayar</p>
                    <p class="text-2xl font-semibold text-green-600">30</p>
                    <p class="text-gray-700">Nilai Faktur <b>Rp 5.430.000.000</b></p>
                </div>

            </div>
        </div>


        <!-- ========== PEKERJAAN ========== -->
        <div class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6">
            <h3 class="text-xl font-semibold mb-2">Pekerjaan</h3>

            <div class="pl-3 border-l-4 border-cyan-400">
                <p class="font-medium">0001 – Benjamin : Wanprestasi</p>

                <span class="mt-2 inline-block bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">
                    Terbuka • Baru dibuat
                </span>

                <div class="mt-3 space-y-1 text-sm">
                    <p>Dana deposit: <b>Rp 50.000.000</b></p>
                    <p>Sisa tagihan: <b>Rp 3.000.000</b></p>
                    <p>Total semua biaya: <b>Rp 20.000.000</b></p>
                </div>
            </div>
        </div>


    <!-- Add Alpine (CDN) once in your layout (head or before </body>): -->


<!-- ========== CALENDAR (dynamic with Alpine.js) ========== -->
<div
  x-data="calendarComponent()"
  x-init="init()"
  class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6"
>
  <div class="flex justify-between items-center mb-3">
    <button
      type="button"
      @click="prevMonth()"
      class="text-gray-600 hover:text-gray-800"
      aria-label="Previous month"
    >&lt;</button>

    <h3 class="text-lg font-semibold" x-text="title"></h3>

    <button
      type="button"
      @click="nextMonth()"
      class="text-gray-600 hover:text-gray-800"
      aria-label="Next month"
    >&gt;</button>
  </div>

  <div class="grid grid-cols-7 text-center text-gray-600 font-medium text-sm mb-2">
    <span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
  </div>

  <div class="grid grid-cols-7 gap-1 text-center text-gray-700">
    <!-- previous month days -->
    <template x-for="d in leading" :key="'l'+d">
      <span class="opacity-40" x-text="d"></span>
    </template>

    <!-- current month days -->
    <template x-for="d in daysInMonth" :key="d">
      <button
        :class="{
          'bg-red-500 text-white rounded-full font-semibold': isSelectedDay(d),
          'hover:bg-gray-100': !isSelectedDay(d)
        }"
        class="p-2"
        type="button"
        @click="selectDay(d)"
        x-text="d"
      ></button>
    </template>

    <!-- trailing days from next month (to fill last week) -->
    <template x-for="d in trailing" :key="'t'+d">
      <span class="opacity-40" x-text="d"></span>
    </template>
  </div>
</div>

<script>
  function calendarComponent() {
    return {
      // initial selected date: 10 May 2023
      selected: new Date(),
      // current displayed month/year (start from selected)
      current: null,
      title: '',
      daysInMonth: [],
      leading: [],
      trailing: [],

      init() {
        // set current to first day of selected month
        this.current = new Date(this.selected.getFullYear(), this.selected.getMonth(), 1);
        this.render();
      },

      render() {
        const year = this.current.getFullYear();
        const month = this.current.getMonth();

        // Title in Indonesian (nama bulan)
        const monthNames = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        this.title = `${monthNames[month]} ${year}`;

        // Days in current month
        const days = new Date(year, month + 1, 0).getDate();
        this.daysInMonth = Array.from({length: days}, (_, i) => i + 1);

        // Day of week of first day (0 = Sunday)
        const firstDow = new Date(year, month, 1).getDay();

        // Leading days (from previous month) to fill first week
        const prevMonthDays = new Date(year, month, 0).getDate(); // last day previous month
        this.leading = [];
        for (let i = firstDow - 1; i >= 0; i--) {
          this.leading.push(prevMonthDays - i);
        }

        // Trailing days (from next month) to fill remaining cells to multiples of 7
        const totalCells = this.leading.length + this.daysInMonth.length;
        const remaining = (7 - (totalCells % 7)) % 7;
        this.trailing = [];
        for (let i = 1; i <= remaining; i++) {
          this.trailing.push(i);
        }
      },

      isSameDate(d, dt) {
        return d.getFullYear() === dt.getFullYear() &&
               d.getMonth() === dt.getMonth() &&
               d.getDate() === dt.getDate();
      },

      isSelectedDay(day) {
        const sel = this.selected;
        return sel.getFullYear() === this.current.getFullYear()
          && sel.getMonth() === this.current.getMonth()
          && sel.getDate() === day;
      },

      selectDay(day) {
        // set selected date in current month
        this.selected = new Date(this.current.getFullYear(), this.current.getMonth(), day);
      },

      prevMonth() {
        this.current = new Date(this.current.getFullYear(), this.current.getMonth() - 1, 1);
        this.render();
      },

      nextMonth() {
        this.current = new Date(this.current.getFullYear(), this.current.getMonth() + 1, 1);
        this.render();
      }
    }
  }
</script>

    </div>

</div>

</x-utama>
