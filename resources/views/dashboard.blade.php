<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <!-- Tambahkan data atau fitur yang relevan untuk wali kelas -->
            <div class="mt-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold">Daftar Siswa Anda:</h3>
                        <ul class="list-disc ml-6">
                            @foreach ($walikelas->siswa as $siswa)
                                <li>{{ $siswa->user->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold">Laporan Tabungan Kelas:</h3>
                        <p>Pemasukan: Rp {{ number_format($walikelas->pemasukan, 0, ',', '.') }}</p>
                        <p>Pengeluaran: Rp {{ number_format($walikelas->pengeluaran, 0, ',', '.') }}</p>
                        <p>Saldo: Rp {{ number_format($walikelas->saldo, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
