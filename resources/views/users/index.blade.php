<x-app-layout>

<div class="p-8">

    <h1 class="text-3xl font-bold mb-5">
        Data User
    </h1>

    <table class="w-full border">

        <tr>
            <th class="border p-3">Nama</th>
            <th class="border p-3">Email</th>
            <th class="border p-3">Aksi</th>
        </tr>

        @foreach($users as $user)

        <tr>

            <td class="border p-3">
                {{ $user->name }}
            </td>

            <td class="border p-3">
                {{ $user->email }}
            </td>

            <td class="border p-3">

                <a href="/users/{{ $user->id }}"
                   class="bg-blue-500 text-white px-3 py-1 rounded">

                    Detail

                </a>

            </td>

        </tr>

        @endforeach

    </table>

</div>

</x-app-layout>