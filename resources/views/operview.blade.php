<x-utama>

    <div class="p-5">
        <!-- HEADER -->
        <div class="mb-7">
            <div class="flex items-start space-x-3 mt-7 ml-5 
      2xl:space-x-5 2xl:ml-7 2xl:-mt-1">

                <!-- ICON -->
                <svg class="w-12 h-12 text-teal-500 
                2xl:w-14 2xl:h-14" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 10l9-7 9 7M5 10v10a1 1 0 001 1h4a1 1 0 001-1v-4h2v4a1 1 0 001 1h4a1 1 0 001-1V10" />
                </svg>

                <!-- TEXT BLOCK (judul + welcome) -->
                <div class="flex flex-col">
                    <h1 class="text-4xl font-semibold text-gray-800 2xl:text-5xl">
                        Papan Informasi Personal
                    </h1>

                    <p class="text-2xl text-gray-600">
                        Welcome, cikal muhamad fazri
                       



                    </p>
                </div>

            </div>
        </div>

        <p class="pl-[87%] text-green-700 ">Personal  </p>
        <div class="w-[100%] flex items-center justify-center">
       <div class="relative w-[90%] mb-5">
    <div class="border-t border-gray-400"></div>
    <div class="absolute top-0 right-0 h-[2px] bg-green-600 w-[160px]"></div>
</div>

        </div>
        <div class="flex flex-col lg:flex-row gap-6">
            <div class="w-full lg:w-[75%]">

                <div style="border-top-left-radius: 200px; border-bottom-left-radius: 200px;"
                    class="flex flex-col md:flex-row mb-4 gap-0 items-center bg-white p-0 rounded-2xl shadow-md border border-gray-200 overflow-hidden">

                    <!-- CLOCK (diperkecil & lebih compact) -->
                    <div class="p-5 bg-white z-10 flex justify-center md:block w-full md:w-auto">
                        <div
                            class="w-[200px] h-[200px] rounded-full bg-black border border-gray-700 relative flex items-center justify-center">

                            <svg id="clock" viewBox="0 0 100 100" class="w-[88%] h-[88%] relative">
                                <circle cx="50" cy="50" r="47" stroke="#444" stroke-width="2"
                                    fill="transparent"></circle>
                                <g id="numbers" font-size="7" fill="white" text-anchor="middle"></g>

                                <line id="hourHand" x1="50" y1="50" x2="50" y2="33"
                                    stroke="white" stroke-width="2.5" stroke-linecap="round"></line>

                                <line id="minuteHand" x1="50" y1="50" x2="50" y2="26"
                                    stroke="white" stroke-width="1.8" stroke-linecap="round"></line>

                                <line id="secondHand" x1="50" y1="50" x2="50" y2="22"
                                    stroke="red" stroke-width="1.2" stroke-linecap="round"></line>
                            </svg>
                        </div>
                    </div>

                    <script>
                        const numbers = document.getElementById("numbers");
                        for (let i = 1; i <= 12; i++) {
                            let angle = (i - 3) * 30;
                            let rad = (angle * Math.PI) / 180;
                            let x = 50 + 33 * Math.cos(rad);
                            let y = 50 + 33 * Math.sin(rad);
                            numbers.innerHTML += `<text x="${x}" y="${y}" dy="2">${i}</text>`;
                        }

                        function updateClock() {
                            const now = new Date();
                            const seconds = now.getSeconds();
                            const minutes = now.getMinutes();
                            const hours = now.getHours() % 12;

                            document.getElementById("secondHand").setAttribute("transform", `rotate(${seconds * 6} 50 50)`);
                            document.getElementById("minuteHand").setAttribute("transform", `rotate(${minutes * 6 + seconds * 0.1} 50 50)`);
                            document.getElementById("hourHand").setAttribute("transform", `rotate(${hours * 30 + minutes * 0.5} 50 50)`);
                        }

                        setInterval(updateClock, 1000);
                        updateClock();
                    </script>

                    <!-- CONTENT -->
                    <div class="flex-1 flex flex-col lg:flex-row gap-4 bg-white p-3 w-full">

                        <!-- AGENDA -->
                        <div class="flex-1">

                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-green-600">📅</span>
                                <p class="font-semibold text-gray-800">Agenda</p>
                                <span class=" text-gray-500 text-sm">&lt;&gt;</span>
                            </div>

                            <div class="space-y-2">

                                <div class="flex gap-2">
                                    
                                    <div class="w-1 bg-blue-400 rounded"></div>
                                    <div>
                                        x

                                        <p class="text-xs text-gray-500">00:00 - 09:00</p>
                                   
                                    </div>
                                </div>
                                <hr>
                                <div class="flex gap-2">
                                    <div class="w-1 bg-blue-400 rounded"></div>
                                    <div>
                                        <p class="text-sm text-gray-700"></p>
                                        <p class="text-xs text-gray-500">00:00 - 00:00</p>
                                    </div>
                                </div>

                                <hr>
                                <div class="flex gap-2">
                                    <div class="w-1 bg-blue-400 rounded"></div>
                                    <div>
                                        <p class="text-sm text-gray-700"></p>
                                        <p class="text-xs text-gray-500">00:00 - 00:00</p>
                                    </div>
                                </div>

                                <hr>
                                <div class="flex gap-2">
                                    <div class="w-1 bg-blue-400 rounded"></div>
                                    <div>
                                        <p class="text-sm text-gray-700"></p>
                                        <p class="text-xs text-gray-500">00:00 - 00:00</p>
                                    </div>
                                </div>

                                <hr>
                            </div>
                        </div>

                        <!-- GARIS TENGAH -->
                        <div class="hidden lg:block border-l-4 h-[220px] top-15 bottom-10  border-green-500"></div>

                        <!-- TASKS -->
                        <div class="flex-1">

                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-green-600">📝</span>
                                <p class="font-semibold text-gray-800">Tasks</p>

                                <input type="text" placeholder="Cari Task"
                                    class="px-2 py-1 text-xs border border-gray-300 rounded-sm bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-300 w-28 md:w-32">
                            </div>

                            <div class="space-y-2">

                                <div class="flex gap-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mt-1"></div>
                                    <div>
                                        <p class="text-sm text-gray-700"></p>
                                        <p class="text-xs text-gray-500">00:00 - 00:00</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="flex gap-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mt-1"></div>
                                    <div>
                                        <p class="text-sm text-gray-700">
                                        </p>
                                        <p class="text-xs text-gray-500">00:00 - 00:00</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="flex gap-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mt-1"></div>
                                    <div>
                                        <p class="text-sm text-gray-700"></p>
                                        <p class="text-xs text-gray-500">00:00 - 00:00</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="flex gap-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mt-1"></div>
                                    <div>
                                        <p class="text-sm text-gray-700">
                                        </p>
                                        <p class="text-xs text-gray-500">00:00 - 00:00</p>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>

                    </div>

                </div>
    <!-- ================== ROW 2 — ID + INVOICE + PEKERJAAN + CALENDAR ================== -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 2xl:gap-7">

                    <!-- ========== ID CARD ========== -->
                    <div class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6 2xl:p-7">
                        <h3 class="text-xl 2xl:text-2xl font-semibold mb-3 2xl:mb-4">ID</h3>

                        <p class="text-gray-700 font-medium mb-3 2xl:mb-4 2xl:text-lg">Kantor Hukum JNP</p>

                        <div class="border-t-2 border-teal-500 w-full mb-4 2xl:mb-5"></div>

                        <div class="flex items-center gap-4 2xl:gap-5 mb-4 2xl:mb-5">
                            <img src="
https://cmsassets.rgpub.io/sanity/images/dsfx7636/news/05e1a996814dd10d7179efee327d29a7be00e912-616x822.png?auto=format&fit=fill&q=80&w=290                            "
                                class="w-16 h-16 2xl:w-17 2xl:h-17 rounded-xl object-cover shadow" />

                            <div>
                                <p class="font-semibold text-gray-900 2xl:text-lg"></p>
                                <p class="text-sm 2xl:text-base text-gray-500"></p>
                            </div>
                        </div>
                        
                        <p class="text-sm pb-1 2xl:text-base text-gray-700"><b>Permissions:</b> Administrator</p>
                        <hr class="pb-1">
                        <p class="text-sm pb-1 2xl:text-base text-gray-700"><b>Email:</b> xxxxxx@gmail.com</p>
                        <hr class="pb-1">
                        <p class="text-sm pb-1 2xl:text-base text-gray-700"><b>No. Telp:</b> 081344557789</p>
                        <hr class="pb-1">
                        <p class="text-sm pb-1 2xl:text-base text-gray-700"><b>Rate Per Jam:</b> Rp 0.000.000</p>
                        <hr class="pb-1">
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
                                <p class="text-2xl 2xl:text-3xl font-semibold text-blue-600">0</p>
                                <p class="text-gray-700 2xl:text-lg">Nilai Invoice <b>Rp 000.000.000</b></p>
                            </div>

                            <!-- Belum dibayar -->
                            <div class="pl-3 2xl:pl-4 border-l-4 border-red-500">
                                <p class="text-gray-500 2xl:text-base">Belum dibayar</p>
                                <p class="text-2xl 2xl:text-3xl font-semibold text-red-600">0</p>
                                <p class="text-gray-700 2xl:text-lg">Nilai Invoice <b>Rp 000.000.000</b></p>
                            </div>

                            <!-- Sudah dibayar -->
                            <div class="pl-3 2xl:pl-4 border-l-4 border-green-500">
                                <p class="text-gray-500 2xl:text-base">Sudah dibayar</p>
                                <p class="text-2xl 2xl:text-3xl font-semibold text-green-600">0</p>
                                <p class="text-gray-700 2xl:text-lg">Nilai Faktur <b>Rp 0.000.000.000</b></p>
                            </div>

                        </div>
                    </div>

                    <!-- ========== PEKERJAAN ========== -->
                    <div class="bg-white rounded-2xl shadow-lg shadow-black/10 border border-gray-100 p-6 2xl:p-7">
                        <h3 class="text-xl 2xl:text-2xl font-semibold mb-2 2xl:mb-3">Pekerjaan</h3>

                        <div class="pl-3 2xl:pl-4 border-l-4 border-cyan-400">
                            <p class="font-medium 2xl:text-lg">0000 – --- : ---</p>

                            <span
                                class="mt-2 2xl:mt-3 inline-block bg-green-100 text-green-700 text-xs 2xl:text-sm px-3 py-1 rounded-full">
                                Terbuka • Baru dibuat
                            </span>

                            <div class="mt-3 2xl:mt-4 space-y-1 2xl:space-y-2 text-sm 2xl:text-base">
                                <p>Dana deposit: <b>Rp 00.000.000</b></p>
                                <p>Sisa tagihan: <b>Rp 0.000.000</b></p>
                                <p>Total semua biaya: <b>Rp00.000.000</b></p>
                            </div>
                        </div>

                        <div class="pl-3 2xl:pl-4 border-l-4 border-cyan-400">


                            <div class="mt-3 2xl:mt-4 space-y-1 2xl:space-y-2 text-sm 2xl:text-base">
                                <p>Dana deposit: <b>Rp 00.000.000</b></p>
                                <p>Sisa tagihan: <b>Rp 0.000.000</b></p>
                                <p>Total semua biaya: <b>Rp 00.000.000</b></p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="w-full lg:w-[25%]">
                <!-- ========== CALENDAR ========== -->
                <div x-data="calendarComponent()" x-init="init()"
                    class="bg-white rounded-2xl h-full shadow-lg shadow-black/10 border w-full max-w-[330px] border-gray-100 p-4 mx-auto text-[clamp(13px,1.4vw,17px)]
">

                    <!-- Header navigasi -->
                    <div class="flex justify-between items-center mb-4">
                        <button type="button" @click="prevMonth()"
                            class="text-gray-600 hover:text-gray-800 text-inherit">&lt;</button>

                        <h3 class="font-semibold text-inherit" x-text="title"></h3>

                        <button type="button" @click="nextMonth()"
                            class="text-gray-600 hover:text-gray-800 text-inherit">&gt;</button>
                    </div>

                    <!-- Hari dalam seminggu -->
                    <div class="grid grid-cols-7 text-center text-gray-600 font-medium text-inherit mb-3">
                        <span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
                    </div>

                    <!-- Angka tanggal -->
                    <div class="grid grid-cols-7 gap-1 text-center text-gray-700 text-inherit">
                        <template x-for="d in leading" :key="'l' + d">
                            <span class="opacity-40 text-inherit" x-text="d"></span>
                        </template>

                        <template x-for="d in daysInMonth" :key="d">
                            <button
                                :class="{
                                    'bg-green-400 text-white rounded-full font-semibold': isSelectedDay(d),
                                    'hover:bg-gray-100': !isSelectedDay(d)
                                }"
                                class="p-1 text-inherit" type="button" @click="selectDay(d)"
                                x-text="d"></button>
                        </template>

                        <template x-for="d in trailing" :key="'t' + d">
                            <span class="opacity-40 text-inherit" x-text="d"></span>
                        </template>
                    </div>


                    <!-- Container utama task -->
                    <div class="bg-white space-y-4 pt-10  ">

                        <!-- Header task -->
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold text-gray-800 text-inherit">Task</h3>
                            <button class="text-green-700 hover:text-green-800 font-medium text-inherit">Show
                                more</button>
                        </div>

                        <!-- Task item -->
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 pt-6">
                          
                            </div>
                            <p class="text-gray-700 text-inherit">
                                <span class="font-medium"></span>
                            </p>
                        </div>


                        <!-- Duplikat task -->
                        <div class="flex justify-between items-center pt-24">
                            <h3 class="font-semibold text-gray-800 text-inherit">Matter</h3>
                            <button class="text-green-700 hover:text-green-800 font-medium text-inherit">Show
                                more</button>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 pt-6">
                                
                            </div>
                            <p class="text-gray-700 text-inherit">
                                <span class="font-medium"></span>
                            </p>
                        </div>

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
                        this.title = date.toLocaleString('default', {
                            month: 'long',
                            year: 'numeric'
                        });

                        const firstDay = date.getDay();
                        const lastDate = new Date(year, month + 1, 0).getDate();

                        this.leading = Array.from({
                            length: firstDay
                        }, (_, i) => '');
                        this.daysInMonth = Array.from({
                            length: lastDate
                        }, (_, i) => i + 1);
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
                    selectDay(d) {
                        this.selectedDay = d;
                    },
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
