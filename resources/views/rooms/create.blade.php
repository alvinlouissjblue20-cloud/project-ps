<x-app-layout>

<div class="py-10">

    <div class="max-w-3xl mx-auto">

        <div class="bg-white shadow rounded-2xl p-8">

            <h1 class="text-3xl font-bold text-gray-800 mb-8">

                Tambah Ruangan

            </h1>

            <form action="/rooms" method="POST">

                @csrf

                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">

                        Nama Ruangan

                    </label>

                    <input
                        type="text"
                        name="nama_ruangan"

                        class="w-full border-gray-300 rounded-xl shadow-sm">

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">

                        Tipe PS

                    </label>

                    <select
                        name="tipe_ps"

                        class="w-full border-gray-300 rounded-xl shadow-sm">

                        <option>PS3</option>
                        <option>PS4</option>
                        <option>PS5</option>

                    </select>

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">

                        Harga per Jam

                    </label>

                    <input
                        type="number"
                        name="harga_per_jam"

                        class="w-full border-gray-300 rounded-xl shadow-sm">

                </div>

                <button
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl">

                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>