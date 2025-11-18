<x-utama>

<div x-data="documentApp()" class="p-6">

    <!-- Header -->
    <div class="flex items-center space-x-4 mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h6l2 3h10v11H3V7z" />
        </svg>
        <h1 class="text-4xl font-semibold text-gray-800">Dokumen</h1>
    </div>

    <div class="bg-white shadow-md rounded-lg p-4">

        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-500 mb-4 space-x-2">
            <span class="hover:text-gray-700 cursor-pointer">Folder A</span>
            <span>/</span>
            <span class="hover:text-gray-700 cursor-pointer font-medium">Folder A-b</span>
        </div>

        <!-- Header Buttons -->
        <div class="flex justify-between mb-4">
            <div class="flex space-x-2">
                <button class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600">Tambah Folder</button>

                <!-- Tombol Tambah File -->
                <button @click="openForm = true" 
                        class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600">
                    Tambah File
                </button>
            </div>

            <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Sampah</button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 border-b text-xs uppercase">
                    <tr>
                        <th class="px-4 py-3"><input type="checkbox" /></th>
                        <th class="px-4 py-3">Short Cut</th>
                        <th class="px-4 py-3">Tipe</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Pekerjaan</th>
                        <th class="px-4 py-3">Terakhir di edit</th>
                        <th class="px-4 py-3">Lokasi penyimpanan fisik</th>
                        <th class="px-4 py-3">Tanggal Unggahan</th>
                    </tr>
                </thead>

                <tbody>

                    <!-- LIST DOKUMEN / LOOP -->
                    <template x-for="(doc, index) in documents" :key="'doc'+index">
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3"><input type="checkbox"></td>
                            <td class="px-4 py-3" x-text="doc.shortcut"></td>
                            <td class="px-4 py-3" x-text="doc.type"></td>
                            <td class="px-4 py-3 font-medium" x-text="doc.name"></td>
                            <td class="px-4 py-3" x-text="doc.case"></td>
                            <td class="px-4 py-3" x-text="doc.last_edit"></td>
                            <td class="px-4 py-3" x-text="doc.storage"></td>
                            <td class="px-4 py-3" x-text="doc.upload_date"></td>
                        </tr>
                    </template>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah File -->
    <div x-show="openForm" 
         x-transition 
         class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center"
         style="display:none">

        <div class="bg-white p-5 rounded-lg w-80">

            <h2 class="text-lg font-semibold mb-3">Tambah Dokumen</h2>

            <input x-model="form.name"     type="text" placeholder="Nama Dokumen" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="form.type"     type="text" placeholder="Tipe (PDF/Folder/JPEG)" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="form.case"     type="text" placeholder="Pekerjaan" class="w-full border px-3 py-2 rounded mb-2">
            <input x-model="form.storage"  type="text" placeholder="Lokasi Penyimpanan" class="w-full border px-3 py-2 rounded mb-2">

            <button @click="saveDocument" 
                    class="px-4 py-2 bg-teal-600 text-white rounded-md w-full hover:bg-teal-700">
                Simpan
            </button>

            <button @click="openForm = false" class="mt-2 text-gray-500 w-full">Batal</button>

        </div>
    </div>

</div>



<script>
function documentApp() {
    return {

        /* ===== DATA DOKUMEN DUMMY + INPUT BARU ===== */
        documents: [
            { shortcut:"PDF", type:"PDF", name:"Notulen_Rapat", case:"#1923702 - Jordan", last_edit:"04-12-2024", storage:"Kabinet A", upload_date:"04-12-2024" },
            { shortcut:"Folder", type:"Folder", name:"Identitas_Klien", case:"#1923702 - Faudha", last_edit:"04-12-2024", storage:"Kabinet B", upload_date:"04-12-2024" },
        ],

        /* Modal State */
        openForm: false,

        /* Form Data */
        form: {
            name:"",
            type:"",
            case:"",
            storage:""
        },

        /* SAVE NEW DOC */
        saveDocument() {

            const now = new Date();
            const today = now.toLocaleDateString("id-ID");

            this.documents.push({
                shortcut: this.form.type,
                type: this.form.type,
                name: this.form.name,
                case: this.form.case,
                last_edit: today,
                storage: this.form.storage,
                upload_date: today
            });

            this.form = { name:"", type:"", case:"", storage:"" };
            this.openForm = false;
        }
    }
}
</script>

</x-utama>
