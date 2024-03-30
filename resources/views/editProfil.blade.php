<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profil</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-gray-100 flex flex-row-reverse justify-center items-center  h-screen">
        <div class="w-20 hidden lg:flex bg-white "></div>
        <div class="items-center justify-center text-center w-1/3 h-screen hidden lg:flex flex-col bg-blue-900 gap-8">
            <img src="img/edit.png">
        </div>
        <!-- Right: Form -->
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-2/3">
            <h1 class="mb-8 text-4xl text-center text-blue-900 font-bold">Edit Profil</h1>
            <form action="{{ route('profile.edit') }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Email Input -->
                @error('name')
                    error bro
                @enderror
                <div class="mb-8 flex">
                    <div><label for="email" class="font-semibold">Nama</label></div>
                    <div class="flex-grow"></div>
                    <input type="text" id="name" name="name"
                        class="w-96 border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off" value="{{ Auth::user()->name }}">
                </div>
                <!-- Password Input -->
                @error('username')
                    error bro
                @enderror
                <div class="mb-8 flex">
                    <div><label for="email" class="font-semibold">Username</label></div>
                    <div class="flex-grow"></div>
                    <input type="text" id="username" name="username" value="{{ Auth::user()->username }}"
                        class="w-96 border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off">
                </div>
                @error('email')
                    error bro
                @enderror
                <div class="mb-8 flex">
                    <div><label for="email" class="font-semibold">Email</label></div>
                    <div class="flex-grow"></div>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                        class="w-96 border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off">
                </div>
                <!-- Button -->
                <div class="flex gap-5">
                    <button type="submit"
                        class="bg-blue-900 hover:bg-blue-800 text-1xl text-white font-semibold rounded-md py-2 px-4 w-full">Simpan</button>
                    <a href="/dashboard" class="text-center bg-white border-2 border-blue-800 text-1xl text-blue-800 font-semibold rounded-md py-2 px-4 w-full">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
