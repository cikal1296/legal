<x-utama>
<div x-data="contactApp()" x-init="init()" class="p-6">

    <!-- Header -->
<div class="flex items-center space-x-4 mb-2">
    <!-- SVG Icon -->
    <svg 
        class="flex-shrink-0 w-16 h-16 text-green-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8z"/>
    </svg>

    <!-- Judul Kontak -->
    <h1 class="text-4xl font-bold text-gray-800 mb-1">Daftar Kontak</h1>
</div>


    <div class="bg-white shadow-md rounded-lg p-4">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 border-b text-xs uppercase">
                    <tr>
                  
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Pekerjaan</th>
                        <th class="px-4 py-3">Telepon</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Detail</th>
                    </tr>
                </thead>

                <tbody>
                    <template x-for="(contact, index) in contacts" :key="index">
                        <tr class="border-b hover:bg-gray-50">
                          

                            <!-- Nama dengan icon orang -->
                            <td class="px-4 py-3 flex items-center space-x-2">
                                <button @click="showDetail(contact)" class="text-gray-500 hover:text-teal-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                             <a href="/detail">   <span x-text="contact.name" class="font-medium cursor-pointer text-blue-600"></span></a>
                            </td>

                            <td class="px-4 py-3" x-text="contact.job || '-'"></td>
                            <td class="px-4 py-3" x-text="contact.phone || '-'"></td>
                            <td class="px-4 py-3" x-text="contact.email || '-'"></td>

                            <td class="px-4 py-3">
                                <button @click="showDetail(contact)" class="px-3 py-1 bg-teal-500 text-white rounded-md hover:bg-teal-600 text-xs">Detail</button>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Detail -->
    <div x-show="openDetail" 
         x-transition 
         class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-50"
         style="display:none">
        <div class="bg-white p-5 rounded-lg w-80">
            <h2 class="text-lg font-semibold mb-3">Detail Kontak</h2>

            <p><strong>Nama:</strong> <span x-text="detail.name"></span></p>
            <p><strong>Pekerjaan:</strong> <span x-text="detail.job"></span></p>
            <p><strong>Telepon:</strong> <span x-text="detail.phone"></span></p>
            <p><strong>Email:</strong> <span x-text="detail.email"></span></p>

            <button @click="openDetail = false" class="mt-4 text-gray-500 w-full">Tutup</button>
        </div>
    </div>

</div>

<script>
function contactApp() {
    return {
        contacts: [],
        openDetail: false,
        detail: {},
        init() {
            this.contacts = [
                { name: "Paudra Sanjaya", job: "Pengacara", phone: "081234567890", email: "jordan@example.com" },
                { name: "Alice Johnson", job: "Dokter", phone: "081298765432", email: "alice@example.com" },
                { name: "Michael Lee", job: "Insinyur", phone: "081223344556", email: "michael@example.com" },
                { name: "Sophia Brown", job: "Guru", phone: "081212345678", email: "sophia@example.com" },
                { name: "William Davis", job: "Arsitek", phone: "081276543210", email: "william@example.com" },
                { name: "Olivia Martinez", job: "Desainer", phone: "081234567891", email: "olivia@example.com" },
           
                { name: "Noah Anderson", job: "Dokumentator", phone: "081212345679", email: "noah@example.com" },
                { name: "Ava Thomas", job: "Marketing", phone: "081276543211", email: "ava@example.com" }
            ];
        },
        showDetail(contact) {
            this.detail = contact;
            this.openDetail = true;
        }
    }
}
</script>
</x-utama>
