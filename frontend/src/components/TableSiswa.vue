<template>
    <div class="rounded-lg border border-gray-200">
        <div class="flex justify-between mb-4">
            <input type="text" v-model="searchTerm" placeholder="Search by name..."
                class="border-2 border-gray-200 rounded-lg p-1 ml-4 mt-4" />
            <!-- Any other elements you want on the right side, e.g., a button -->
        </div>
        <div class="overflow-x-auto rounded-t-lg">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">NIPD</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama Rombel</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr v-for="student in paginatedStudents" :key="student.nipd">
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ student.nipd }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ student.nama }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ student.nama_rombel }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ student.tanggal_lahir }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination might need to dbe dynamic as well, based on the data or response from the API -->

    </div>
    <div>
        <ol class="flex justify-start gap-1 text-xs font-medium mt-5 ml-4">
            <li>
                <a aria-label="prev" @click.prevent="currentPage > 1 && currentPage--"
                    :class="currentPage > 1 ? 'inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180' : 'inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-gray-200 text-gray-400 cursor-not-allowed rtl:rotate-180'"
                    >
                    <!-- Prev Page Icon -->
                    <span class="sr-only">Prev Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>


            <li v-for="page in paginationRange" :key="page">
                <a @click.prevent="changePage(page)"
                    :class="{ 'block size-8 rounded border border-gray-100 bg-blue-700 text-center leading-8 text-white': page === currentPage, 'block size-8 rounded border border-gray-100 text-center leading-8 text-gray-900': true }">
                    {{ page }}
                </a>
            </li>

            <li>
                <a aria-label="next" @click.prevent="currentPage < totalPages && currentPage++"
                    :class="currentPage < totalPages ? 'inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900' : 'inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-gray-200 text-gray-400 cursor-not-allowed'"
                    >
                    <!-- Next Page Icon -->
                    <span class="sr-only">Next Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
        </ol>

    </div>
</template>

<script>
import axiosInstance from '../axiosConfig'; // Adjust the path as necessary

export default {
    name: "TableSiswa",
    data() {
        return {
            students: [],
            currentPage: 1,
            perPage: 10,
            searchTerm: '', // Add this 
        };
    },
    computed: {
        filteredStudents() {
            if (!this.searchTerm) {
                return this.students;
            }
            const isNumericSearch = !isNaN(parseFloat(this.searchTerm)) && isFinite(this.searchTerm);
            return this.students.filter(student => {
                if (isNumericSearch) {
                    return student.nipd.includes(this.searchTerm);
                }

                const nameMatch = student.nama.toLowerCase().includes(this.searchTerm.toLowerCase());
                const rombelMatch = student.nama_rombel.toLowerCase().includes(this.searchTerm.toLowerCase());

                return nameMatch || rombelMatch;
            });
        },
        paginatedStudents() {
            const start = (this.currentPage - 1) * this.perPage;
            const end = start + this.perPage;
            return this.filteredStudents.slice(start, end);
        },
        /*totalPages() {
            return Math.ceil(this.students.length / this.perPage);
        },*/
        totalPages() {
        return Math.ceil(this.filteredStudents.length / this.perPage);
    },
        paginationRange() {
            if (this.totalPages <= 5 || this.currentPage < 5) {
                return this.totalPages < 5 ? Array.from({ length: this.totalPages }, (_, i) => i + 1) : [1, 2, 3, 4, 5];
            } else {
                let start = Math.max(this.currentPage - 4, 1);
                let end = Math.min(start + 4, this.totalPages);
                return Array.from({ length: (end - start) + 1 }, (_, i) => start + i);
            }
        }
    },

    mounted() {
        this.fetchStudents();
    },
    methods: {
        fetchStudents() {
            axiosInstance.get('/siswa')
                .then(response => {
                    this.students = response.data;
                })
                .catch(error => {
                    console.error('There was an error fetching the students:', error);
                });
        },
        changePage(page) {
            this.currentPage = page;
            // No need to call fetchStudents here if you're using client-side pagination
            // as the students data won't change when changing pages
        },
    },
};
</script>
