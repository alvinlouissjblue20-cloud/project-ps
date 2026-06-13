<x-app-layout>

<div class="py-10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center mb-8">

            <h1 class="text-3xl font-bold text-gray-800">

                Menu Makanan

            </h1>

            <a href="/foods/create"

                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl">

                + Tambah Menu

            </a>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($foods as $food)

            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-2xl font-bold text-gray-800">

                    {{ $food->nama }}

                </h2>

                <p class="text-indigo-600 text-xl font-bold mt-4">

                    Rp {{ number_format($food->harga) }}

                </p>

            </div>

            @endforeach

        </div>

    </div>

</div>

</x-app-layout>