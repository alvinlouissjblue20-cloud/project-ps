<x-app-layout>

<div class="py-10">

    <div class="max-w-3xl mx-auto">

        <div class="bg-white shadow rounded-2xl p-8">

            <h1 class="text-3xl font-bold text-gray-800 mb-8">

                Tambah Menu Makanan

            </h1>

            <form action="/foods" method="POST">

                @csrf

                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">

                        Nama Makanan

                    </label>

                    <input
                        type="text"
                        name="nama"

                        class="w-full border-gray-300 rounded-xl shadow-sm">

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">

                        Harga

                    </label>

                    <input
                        type="number"
                        name="harga"

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