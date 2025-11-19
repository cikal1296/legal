<x-utama>

<!-- HEADER -->
<div class="flex items-center space-x-3 w-full h-full -mt-5 ml-5 mb-10 
            2xl:space-x-5 2xl:w-full 2xl:h-full 2xl:-mt-1 2xl:ml-7 2xl:mb-10">

    <svg class="w-12 h-12 text-teal-500 
                2xl:w-14 2xl:h-14" 
         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8z"/>
    </svg>

    <!-- text-5xl → +2 level → text-7xl -->
    <h1 class="text-4xl font-semibold text-gray-800 
               2xl:text-5xl">Papan Informasi Personal</h1>
</div>


<div class="p-6 bg-gray-50 min-h-screen 
            2xl:p-8 2xl:min-h-[102vh]">

    <!-- ================== ROW 1 — AGENDA + TUGAS ================== -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 
                2xl:gap-8 2xl:mb-10">

        <!-- ===== AGENDA ===== -->
        <div class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-8
                    2xl:p-8">
            
            <!-- text-xl → +2 → text-3xl -->
            <h2 class="text-xl font-semibold mb-4 
                       2xl:text-3xl 2xl:mb-6">Agenda</h2>

            <div class="space-y-5 2xl:space-y-7">

                <!-- hijau -->
                <div class="flex gap-3 items-start 2xl:gap-5">
                    <!-- w-2 → w-[calc(1.5+2)] ≈ w-3.5 → pakai w-4 -->
                    <div class="w-1.5 h-10 rounded-full bg-green-500 
                                2xl:w-2 2xl:h-12"></div>

                    <div>
                        <!-- text-base → +2 → text-xl -->
                        <p class="font-medium 2xl:text-xl">Meeting dengan klien</p>

                        <!-- text-sm → +2 → text-lg -->
                        <p class="text-gray-500 text-sm 2xl:text-lg">10:30 - 11:30</p>
                    </div>
                </div>

                <!-- biru -->
                <div class="flex gap-3 items-start 2xl:gap-5">
                    <div class="w-1.5 h-10 rounded-full bg-blue-500 
                                2xl:w-2 2xl:h-12"></div>
                    <div>
                        <p class="font-medium 2xl:text-xl">Meeting dengan partner</p>
                        <p class="text-gray-500 text-sm 2xl:text-lg">10:30 - 11:30</p>
                    </div>
                </div>

                <!-- merah -->
                <div class="flex gap-3 items-start 2xl:gap-5">
                    <div class="w-1.5 h-10 rounded-full bg-red-500 
                                2xl:w-2 2xl:h-12"></div>
                    <div>
                        <p class="font-medium 2xl:text-xl">Zoom Meeting Online</p>
                        <p class="text-gray-500 text-sm 2xl:text-lg">10:30 - 11:30</p>
                    </div>
                </div>

                <!-- hijau lagi -->
                <div class="flex gap-3 items-start 2xl:gap-5">
                    <div class="w-1.5 h-10 rounded-full bg-green-500 
                                2xl:w-2 2xl:h-12"></div>
                    <div>
                        <p class="font-medium 2xl:text-xl">Gmeet dengan klien</p>
                        <p class="text-gray-500 text-sm 2xl:text-lg">10:30 - 11:30</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- ===== TUGAS ===== -->
        <div class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6 
                    2xl:p-8">

            <h2 class="text-xl font-semibold mb-4 
                       2xl:text-3xl 2xl:mb-6">Tugas</h2>

            <div class="space-y-5 2xl:space-y-7">

                <!-- item 1 -->
                <div class="flex gap-3 items-start 2xl:gap-5">
                    <div class="w-2 h-2 mt-2 rounded-full bg-green-500
                                2xl:w-4 2xl:h-4 2xl:mt-2"></div>
                    <div>
                        <p class="font-medium text-green-600 2xl:text-xl">Buat draft investasi</p>
                        <p class="text-gray-500 text-sm 2xl:text-lg">10:30 - 11:30</p>
                    </div>
                </div>

                <!-- item 2 -->
                <div class="flex gap-3 items-start 2xl:gap-5">
                    <div class="w-2 h-2 mt-2 rounded-full bg-blue-500
                                2xl:w-4 2xl:h-4 2xl:mt-2"></div>
                    <div>
                        <p class="font-medium text-blue-600 2xl:text-xl">Buat draft perjanjian</p>
                        <p class="text-gray-500 text-sm 2xl:text-lg">10:30 - 11:30</p>
                    </div>
                </div>

                <!-- item 3 -->
                <div class="flex gap-3 items-start 2xl:gap-5">
                    <div class="w-2 h-2 mt-2 rounded-full bg-red-500
                                2xl:w-4 2xl:h-4 2xl:mt-2"></div>
                    <div>
                        <p class="font-medium text-red-600 2xl:text-xl">Buat kasus posisi</p>
                        <p class="text-gray-500 text-sm 2xl:text-lg">10:30 - 11:30</p>
                    </div>
                </div>

                <!-- item 4 -->
                <div class="flex gap-3 items-start 2xl:gap-5">
                    <div class="w-2 h-2 mt-2 rounded-full bg-yellow-500
                                2xl:w-4 2xl:h-4 2xl:mt-2"></div>
                    <div>
                        <p class="font-medium text-yellow-600 2xl:text-xl">Teliti dasar hukum</p>
                        <p class="text-gray-500 text-sm 2xl:text-lg">10:30 - 11:30</p>
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

            <span class="mt-2 2xl:mt-3 inline-block bg-green-100 text-green-700 text-xs 2xl:text-sm px-3 py-1 rounded-full">
                Terbuka • Baru dibuat
            </span>

            <div class="mt-3 2xl:mt-4 space-y-1 2xl:space-y-2 text-sm 2xl:text-base">
                <p>Dana deposit: <b>Rp 50.000.000</b></p>
                <p>Sisa tagihan: <b>Rp 3.000.000</b></p>
                <p>Total semua biaya: <b>Rp 20.000.000</b></p>
            </div>
        </div>
    </div>

    <!-- ========== CALENDAR ========== -->
    <div
        x-data="calendarComponent()"
        x-init="init()"
        class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6 2xl:p-7"
    >
        <div class="flex justify-between items-center mb-3 2xl:mb-4">
            <button type="button" @click="prevMonth()" class="text-gray-600 hover:text-gray-800 2xl:text-lg">&lt;</button>

            <h3 class="text-lg 2xl:text-xl font-semibold" x-text="title"></h3>

            <button type="button" @click="nextMonth()" class="text-gray-600 hover:text-gray-800 2xl:text-lg">&gt;</button>
        </div>

        <div class="grid grid-cols-7 text-center text-gray-600 font-medium text-sm 2xl:text-base mb-2 2xl:mb-3">
            <span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
        </div>

        <div class="grid grid-cols-7 gap-1 2xl:gap-2 text-center text-gray-700 2xl:text-lg">
            <template x-for="d in leading" :key="'l'+d">
                <span class="opacity-40" x-text="d"></span>
            </template>

            <template x-for="d in daysInMonth" :key="d">
                <button
                    :class="{
                      'bg-green-400 text-white rounded-full font-semibold': isSelectedDay(d),
                      'hover:bg-gray-100': !isSelectedDay(d)
                    }"
                    class="p-0.9 2xl:p-1"
                    type="button"
                    @click="selectDay(d)"
                    x-text="d"
                ></button>
            </template>

            <template x-for="d in trailing" :key="'t'+d">
                <span class="opacity-40" x-text="d"></span>
            </template>
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


</x-utama>
