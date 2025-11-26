<x-utama>


        <!-- HEADER -->
        <div class="flex items-center space-x-3 w-full h-full mt-5 ml-5 mb-5 
            2xl:space-x-5 2xl:w-full 2xl:h-full 2xl:-mt-1 2xl:ml-7 2xl:mb-5">

            <svg class="w-12 h-12 text-teal-500 
                2xl:w-14 2xl:h-14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
            </svg>

            <!-- text-5xl → +2 level → text-7xl -->
            <h1 class="text-4xl font-semibold text-gray-800 
               2xl:text-5xl">Papan Informasi Personal</h1>
        </div>
<div class="p-5">

<div  style="border-top-left-radius: 200px; border-bottom-left-radius: 200px;" class="flex mb-10  gap-0 items-center bg-white p-0 rounded-2xl shadow-md border border-gray-200 overflow-hidden">

  <!-- CLOCK -->
<!-- CLOCK -->
<div class="p-6 bg-white z-10">
  <div class="w-64 h-64 rounded-full bg-black border border-gray-700 relative flex items-center justify-center">

    <svg id="clock" viewBox="0 0 100 100" class="w-[92%] h-[92%] relative">

      <!-- Lingkaran -->
      <circle cx="50" cy="50" r="48" stroke="#444" stroke-width="2" fill="transparent" />

      <!-- Angka 1–12 -->
      <g id="numbers" font-size="9" fill="white" text-anchor="middle"></g>

      <!-- Jarum Jam -->
      <line id="hourHand" x1="50" y1="50" x2="50" y2="30" 
            stroke="white" stroke-width="2.8" stroke-linecap="round" />

      <!-- Jarum Menit -->
      <line id="minuteHand" x1="50" y1="50" x2="50" y2="22"
            stroke="white" stroke-width="2" stroke-linecap="round" />

      <!-- Jarum Detik -->
      <line id="secondHand" x1="50" y1="50" x2="50" y2="18"
            stroke="red" stroke-width="1.4" stroke-linecap="round" />

    </svg>

  </div>
</div>

<script>
  // Tambah angka 1–12
  const numbers = document.getElementById("numbers");
  for (let i = 1; i <= 12; i++) {
    let angle = (i - 3) * 30;                                 // Rotasi
    let rad = (angle * Math.PI) / 180;
    let x = 50 + 38 * Math.cos(rad);                         // radius angka
    let y = 50 + 38 * Math.sin(rad);

    numbers.innerHTML += `<text x="${x}" y="${y}" dy="3">${i}</text>`;
  }

  // Biar jam bergerak
  function updateClock() {
    const now = new Date();

    const seconds = now.getSeconds();
    const minutes = now.getMinutes();
    const hours = now.getHours() % 12;

    // hitungan derajat
    const secondDeg = seconds * 6;
    const minuteDeg = minutes * 6 + seconds * 0.1;
    const hourDeg = hours * 30 + minutes * 0.5;

    document.getElementById("secondHand").setAttribute("transform", `rotate(${secondDeg} 50 50)`);
    document.getElementById("minuteHand").setAttribute("transform", `rotate(${minuteDeg} 50 50)`);
    document.getElementById("hourHand").setAttribute("transform", `rotate(${hourDeg} 50 50)`);
  }

  setInterval(updateClock, 1000);
  updateClock();
</script>


  <!-- CONTENT (Agenda + Tasks) with rounded-left following the clock -->
  <div class="flex-1 flex gap-4 bg-white p-6"
     >

    <!-- AGENDA -->
   <div class="flex-1 bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
  <div class="flex items-center  gap-2 mb-3">
      <span class="text-green-600">📅</span>
      <p class="font-semibold text-gray-800">Agenda</p>
  <span class="ml-[350px]"><        ></span>
</div>

  <div class="space-y-3">

    <!-- 1 -->
    <div class="flex gap-3 bg-gray-50 border border-gray-300 p-3 rounded-lg">
      <div class="w-1 bg-blue-400 rounded"></div>
      <div>
        <p class="text-sm text-gray-700">Rapat Sinkronisasi Legal x Tech — Integrasi Sistem e-Contract</p>
        <p class="text-xs text-gray-500">09:00 - 10:30</p>
      </div>
    </div>

    <!-- 2 -->
    <div class="flex gap-3 bg-gray-50 border border-gray-300 p-3 rounded-lg">
      <div class="w-1 bg-blue-400 rounded"></div>
      <div>
          <p class="text-sm text-gray-700">Review Draft Perjanjian Kerja Sama Vendor Teknologi</p>
          <p class="text-xs text-gray-500">11:00 - 12:00</p>
        </div>
    </div>

    <!-- 3 -->
    <div class="flex gap-3 bg-gray-50 border border-gray-300 p-3 rounded-lg">
      <div class="w-1 bg-blue-400 rounded"></div>
      <div>
        <p class="text-sm text-gray-700">Analisis Risiko dan Compliance untuk Fitur Otomatisasi Dokumen</p>
        <p class="text-xs text-gray-500">13:30 - 15:00</p>
      </div>
    </div>

  </div>
</div>


    <!-- TASKS -->
   <div class="flex-1 bg-white rounded-xl border border-gray-200 p-5 shadow-sm">
  <div class="flex items-center gap-2 mb-3">
    <span class="text-green-600">📝</span>
    <p class="font-semibold text-gray-800">Tasks</p>
        <input 
  type="text" 
  placeholder="Cari Task" 
  class="px-3 py-0.5 text-xs border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-300 w-32"
/>
  </div>

  <div class="space-y-3">

    <!-- 1 -->
    <div class="flex gap-3 bg-gray-50 border border-gray-300 p-3 rounded-lg">
      <div class="w-2 h-2 bg-green-500 rounded-full mt-1"></div>
      <div>
        <p class="text-sm text-gray-700">Verifikasi dokumen legal untuk onboarding vendor baru</p>
        <p class="text-xs text-gray-500">Due: Hari ini, 14:00</p>
      </div>
    </div>

    <!-- 2 -->
    <div class="flex gap-3 bg-gray-50 border border-gray-300 p-3 rounded-lg">
      <div class="w-2 h-2 bg-green-500 rounded-full mt-1"></div>
      <div>
        <p class="text-sm text-gray-700">Update template NDA sesuai perubahan regulasi terbaru</p>
        <p class="text-xs text-gray-500">Due: Besok</p>
      </div>
    </div>

    <!-- 3 -->
    <div class="flex gap-3 bg-gray-50 border border-gray-300 p-3 rounded-lg">
      <div class="w-2 h-2 bg-green-500 rounded-full mt-1"></div>
      <div>
        <p class="text-sm text-gray-700">Review hasil QA untuk modul e-Signature</p>
        <p class="text-xs text-gray-500">Due: 16:00</p>
      </div>
    </div>

  </div>
</div>


  </div>

</div>


            <!-- ================== ROW 2 — ID + INVOICE + PEKERJAAN + CALENDAR ================== -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 2xl:gap-7">

                <!-- ========== ID CARD ========== -->
                <div class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6 2xl:p-7">
                    <h3 class="text-xl 2xl:text-2xl font-semibold mb-3 2xl:mb-4">ID</h3>

                    <p class="text-gray-700 font-medium mb-3 2xl:mb-4 2xl:text-lg">Kantor Hukum JNP</p>

                    <div class="border-t-2 border-teal-500 w-full mb-4 2xl:mb-5"></div>

                    <div class="flex items-center gap-4 2xl:gap-5 mb-4 2xl:mb-5">
                        <img src="https://cmsassets.rgpub.io/sanity/images/dsfx7636/news/2c35cef9c38283f8478d1e808b1c129f371e50b3-616x822.png"
                            class="w-16 h-16 2xl:w-17 2xl:h-17 rounded-xl object-cover shadow" />

                        <div>
                            <p class="font-semibold text-gray-900 2xl:text-lg">Nicholas Suardi</p>
                            <p class="text-sm 2xl:text-base text-gray-500">Partner</p>
                        </div>
                    </div>

                    <p class="text-sm 2xl:text-base text-gray-700"><b>Permissions:</b> Administrator</p>
                    <p class="text-sm 2xl:text-base text-gray-700"><b>Email:</b> nicholassuardi@gmail.com</p>
                    <p class="text-sm 2xl:text-base text-gray-700"><b>No. Telp:</b> 081344557789</p>
                    <p class="text-sm 2xl:text-base text-gray-700"><b>Rate Per Jam:</b> Rp 5.000.000</p>
                    <div class="mt-3">
                        <label class="text-sm font-medium">Catatan :</label>
                        <textarea rows="3" class="w-full border rounded-lg mt-1"></textarea>
                    </div>
                </div>


                <!-- ========== INVOICE ========== -->
                <div class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6 2xl:p-7">
                    <h3 class="text-xl 2xl:text-2xl font-semibold mb-3 2xl:mb-4">Invoice</h3>

                    <div class="space-y-6 2xl:space-y-7">

                        <!-- Draft -->
                        <div class="pl-3 2xl:pl-4 border-l-4 border-blue-500">
                            <p class="text-gray-500 2xl:text-base">Draft</p>
                            <p class="text-2xl 2xl:text-3xl font-semibold text-blue-600">3</p>
                            <p class="text-gray-700 2xl:text-lg">Nilai Invoice <b>Rp 500.000.000</b></p>
                        </div>

                        <!-- Belum dibayar -->
                        <div class="pl-3 2xl:pl-4 border-l-4 border-red-500">
                            <p class="text-gray-500 2xl:text-base">Belum dibayar</p>
                            <p class="text-2xl 2xl:text-3xl font-semibold text-red-600">3</p>
                            <p class="text-gray-700 2xl:text-lg">Nilai Invoice <b>Rp 100.000.000</b></p>
                        </div>

                        <!-- Sudah dibayar -->
                        <div class="pl-3 2xl:pl-4 border-l-4 border-green-500">
                            <p class="text-gray-500 2xl:text-base">Sudah dibayar</p>
                            <p class="text-2xl 2xl:text-3xl font-semibold text-green-600">30</p>
                            <p class="text-gray-700 2xl:text-lg">Nilai Faktur <b>Rp 5.430.000.000</b></p>
                        </div>

                    </div>
                </div>

                <!-- ========== PEKERJAAN ========== -->
                <div class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6 2xl:p-7">
                    <h3 class="text-xl 2xl:text-2xl font-semibold mb-2 2xl:mb-3">Pekerjaan</h3>

                    <div class="pl-3 2xl:pl-4 border-l-4 border-cyan-400">
                        <p class="font-medium 2xl:text-lg">0001 – Benjamin : Wanprestasi</p>

                        <span
                            class="mt-2 2xl:mt-3 inline-block bg-green-100 text-green-700 text-xs 2xl:text-sm px-3 py-1 rounded-full">
                            Terbuka • Baru dibuat
                        </span>

                        <div class="mt-3 2xl:mt-4 space-y-1 2xl:space-y-2 text-sm 2xl:text-base">
                            <p>Dana deposit: <b>Rp 50.000.000</b></p>
                            <p>Sisa tagihan: <b>Rp 3.000.000</b></p>
                            <p>Total semua biaya: <b>Rp 20.000.000</b></p>
                        </div>
                    </div>

                    <div class="pl-3 2xl:pl-4 border-l-4 border-cyan-400">


                        <div class="mt-3 2xl:mt-4 space-y-1 2xl:space-y-2 text-sm 2xl:text-base">
                            <p>Dana deposit: <b>Rp 50.000.000</b></p>
                            <p>Sisa tagihan: <b>Rp 3.000.000</b></p>
                            <p>Total semua biaya: <b>Rp 20.000.000</b></p>
                        </div>
                    </div>
                </div>

                <!-- ========== CALENDAR ========== -->
                <div x-data="calendarComponent()" x-init="init()"
                    class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6 2xl:p-7">
                    <div class="flex justify-between items-center mb-3 2xl:mb-4">
                        <button type="button" @click="prevMonth()"
                            class="text-gray-600 hover:text-gray-800 2xl:text-lg">&lt;</button>

                        <h3 class="text-lg 2xl:text-xl font-semibold" x-text="title"></h3>

                        <button type="button" @click="nextMonth()"
                            class="text-gray-600 hover:text-gray-800 2xl:text-lg">&gt;</button>
                    </div>

                    <div
                        class="grid grid-cols-7 text-center text-gray-600 font-medium text-sm 2xl:text-base mb-2 2xl:mb-3">
                        <span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
                    </div>

                    <div class="grid grid-cols-7 gap-1 2xl:gap-2 text-center text-gray-700 2xl:text-lg">
                        <template x-for="d in leading" :key="'l'+d">
                            <span class="opacity-40" x-text="d"></span>
                        </template>

                        <template x-for="d in daysInMonth" :key="d">
                            <button :class="{
                      'bg-green-400 text-white rounded-full font-semibold': isSelectedDay(d),
                      'hover:bg-gray-100': !isSelectedDay(d)
                    }" class="p-0.9 2xl:p-1" type="button" @click="selectDay(d)" x-text="d"></button>
                        </template>

                        <template x-for="d in trailing" :key="'t'+d">
                            <span class="opacity-40" x-text="d"></span>
                        </template>
                    </div>
                    <!-- Container utama (masuk ke card calendar) -->
                    <div class=" bg-white space-y-4">

                        <!-- Header -->
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Matter</h3>
                            <button class="text-green-700 hover:text-green-800 text-sm font-medium">Show more</button>
                        </div>

                        <!-- Task item -->
                        <div class="flex items-start gap-3">
                            <!-- Icon task -->
                            <div class="flex-shrink-0">
                                <svg class="icon text-green-700 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 3v18m0-18l6 6m-6-6L6 9m9 12H9m9-9h-6m-6 0h6" />
                                </svg>
                            </div>
                            <!-- Deskripsi task -->
                            <p class="text-gray-700 text-sm">
                                Annisa Donna S.H telah menambahkan anda dalam <span class="font-medium">Pekerjaan
                                    25030002 - SMAN 1 Bandung</span>
                            </p>
                        </div>
                        <hr class=" border-gray-200">
                    </div>
                </div>

            </div>


        </div>
        <script>
            function calendarComponent() {
                const today = new Date(); // tanggal sekarang
                const currentDay = today.getDate();
                const currentMonth = today.getMonth();
                const currentYear = today.getFullYear();

                return {
                    title: '',
                    daysInMonth: [],
                    leading: [],
                    trailing: [],
                    selectedDay: null,
                    currentMonth,
                    currentYear,
                    init() {
                        this.updateCalendar(this.currentYear, this.currentMonth);
                        // otomatis pilih tanggal hari ini
                        this.selectedDay = currentDay;
                    },
                    updateCalendar(year, month) {
                        const date = new Date(year, month, 1);
                        this.title = date.toLocaleString('default', { month: 'long', year: 'numeric' });

                        const firstDay = date.getDay();
                        const lastDate = new Date(year, month + 1, 0).getDate();

                        this.leading = Array.from({ length: firstDay }, (_, i) => '');
                        this.daysInMonth = Array.from({ length: lastDate }, (_, i) => i + 1);
                        this.trailing = [];
                    },
                    prevMonth() {
                        let month = this.currentMonth - 1;
                        let year = this.currentYear;
                        if (month < 0) {
                            month = 11;
                            year -= 1;
                        }
                        this.currentMonth = month;
                        this.currentYear = year;
                        this.updateCalendar(year, month);
                    },
                    nextMonth() {
                        let month = this.currentMonth + 1;
                        let year = this.currentYear;
                        if (month > 11) {
                            month = 0;
                            year += 1;
                        }
                        this.currentMonth = month;
                        this.currentYear = year;
                        this.updateCalendar(year, month);
                    },
                    selectDay(d) { this.selectedDay = d; },
                    isSelectedDay(d) {
                        return (
                            d === this.selectedDay &&
                            this.currentMonth === today.getMonth() &&
                            this.currentYear === today.getFullYear()
                        );
                    }
                }
            }
        </script>

    </div>

    <!-- CHART.JS CDN -->
    
</div>
</x-utama>