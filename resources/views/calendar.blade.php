<x-utama>
  
<div class="max-w-5xl mx-auto mt-8 p-4">
    <div class="bg-white border border-gray-200 shadow-lg rounded-xl p-6">
  <div x-data="calendarApp()" class="p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
        <button @click="prevMonth" class="px-3 py-1 bg-gray-200 rounded-md hover:bg-gray-300">&lt;</button>
        <h1 class="text-xl font-semibold" x-text="monthNames[currentMonth] + ' ' + currentYear"></h1>
        <button @click="nextMonth" class="px-3 py-1 bg-gray-200 rounded-md hover:bg-gray-300">&gt;</button>
    </div>

    <!-- Compact Calendar Grid -->
    <div class="grid grid-cols-7 text-center font-medium text-gray-600 mb-2">
        <div>Ming</div>
        <div>Sen</div>
        <div>Sel</div>
        <div>Rab</div>
        <div>Kam</div>
        <div>Jum</div>
        <div>Sab</div>
    </div>

    <div class="grid grid-cols-7 gap-1">
        <template x-for="blank in firstDayOfMonth" :key="'blank'+blank">
            <div class="border h-24 rounded-lg bg-gray-50"></div>
        </template>

        <!-- Dates -->
        <template x-for="day in daysInMonth" :key="day">
       <div 
    :class="{
        'border h-24 rounded-lg p-1 hover:bg-gray-100 cursor-pointer flex flex-col': true,
        'bg-red-50': isSunday(day), 
    }"
    @click="openDay(day)"
>
   

                <div class="text-sm font-semibold" x-text="day"></div>

                <!-- Events List -->
                <template 
                    x-for="(event, index) in eventsFor(day)" 
                    :key="index"
                >
                    <div class="mt-1 text-xs px-1 py-0.5 rounded bg-teal-100 text-teal-700 truncate">
                        <span x-text="event.title"></span>
                    </div>
                </template>
            </div>
        </template>
    </div>

    <!-- Bottom Sheet (Detail Hari) -->
    <div 
        x-show="showSheet" 
        x-transition 
        class="fixed bottom-0 left-0 right-0 bg-white shadow-2xl rounded-t-2xl p-5"
        style="display:none"
    >
        <div class="flex justify-between items-center mb-3">
            <h2 class="text-lg font-semibold" x-text="'Tanggal ' + selectedDay"></h2>
            <button @click="showSheet = false" class="text-gray-500 text-xl">&times;</button>
        </div>

        <div class="space-y-3">
            <template x-for="(event, index) in eventsFor(selectedDay)" :key="'evt'+index">
                <div class="border rounded-md p-3">
                    <h3 class="font-semibold" x-text="event.title"></h3>
                    <div class="text-sm text-gray-500" x-text="event.time"></div>
                    <p class="text-sm mt-1" x-text="event.desc"></p>
                </div>
            </template>

            <div x-show="eventsFor(selectedDay).length == 0" class="text-gray-500">
                Tidak ada jadwal.
            </div>
        </div>

        <button 
            @click="openAddForm"
            class="mt-5 px-4 py-2 bg-teal-600 text-white rounded-md w-full hover:bg-teal-700"
        >
            Tambah Jadwal
        </button>
    </div>

    <!-- Modal Tambah Jadwal -->
    <div 
        x-show="openForm" 
        x-transition 
        class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center"
        style="display:none"
    >
        <div class="bg-white p-5 rounded-lg w-80">
            <h2 class="text-lg font-semibold mb-3">Tambah Jadwal</h2>

            <input type="text" placeholder="Judul" class="w-full border px-3 py-2 rounded mb-2"
                x-model="form.title">

            <input type="text" placeholder="Waktu (contoh: 10.00)" class="w-full border px-3 py-2 rounded mb-2"
                x-model="form.time">

            <textarea class="w-full border px-3 py-2 rounded mb-2" placeholder="Deskripsi"
                x-model="form.desc"></textarea>

            <button class="px-4 py-2 bg-teal-600 text-white rounded-md w-full hover:bg-teal-700"
                @click="saveEvent">
                Simpan
            </button>

            <button class="mt-2 text-gray-500 w-full" @click="openForm = false">Batal</button>
        </div>
    </div>

</div>
</div>
</div>

<script>
function calendarApp() {
    return {
isSunday(day) {
    const date = new Date(this.currentYear, this.currentMonth, day);
    return date.getDay() === 0; // 0 = Sunday / Minggu
},


        // Calendar base
        currentMonth: new Date().getMonth(),
        currentYear: new Date().getFullYear(),

        monthNames: [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ],

        // UI States
        showSheet: false,
        openForm: false,
        selectedDay: null,

        // Temp events (bisa nanti diganti dari database)
        events: {
            // Format: "YYYY-MM-DD": [ {title, time, desc} ]
            "2025-11-15": [
                { title:"Meeting Klien", time:"10.00", desc:"Diskusi kontrak terbaru" },
                { title:"Review Dokumen", time:"13.00", desc:"Perjanjian kerjasama" }
            ],
            "2025-11-20": [
                { title:"Drafting", time:"09.00", desc:"Menyusun draft gugatan" }
            ]
        },

        // Form data
        form: { title:"", time:"", desc:"" },

        // Calendar computed
        get firstDayOfMonth() {
            return new Date(this.currentYear, this.currentMonth, 1).getDay();
        },

        get daysInMonth() {
            return new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
        },

        // Tools
        eventsFor(day) {
            const dateKey = `${this.currentYear}-${String(this.currentMonth+1).padStart(2,"0")}-${String(day).padStart(2,"0")}`;
            return this.events[dateKey] || [];
        },

        openDay(day) {
            this.selectedDay = day;
            this.showSheet = true;
        },

        openAddForm() {
            this.openForm = true;
        },

        saveEvent() {
            const dateKey = `${this.currentYear}-${String(this.currentMonth+1).padStart(2,"0")}-${String(this.selectedDay).padStart(2,"0")}`;

            if (!this.events[dateKey]) this.events[dateKey] = [];

            this.events[dateKey].push({
                title: this.form.title,
                time: this.form.time,
                desc: this.form.desc
            });

            this.form = { title:"", time:"", desc:"" };
            this.openForm = false;
        },

        prevMonth() {
            if (this.currentMonth === 0) {
                this.currentMonth = 11;
                this.currentYear--;
            } else {
                this.currentMonth--;
            }
        },

        nextMonth() {
            if (this.currentMonth === 11) {
                this.currentMonth = 0;
                this.currentYear++;
            } else {
                this.currentMonth++;
            }
        }
    }
}
</script>

</x-utama>