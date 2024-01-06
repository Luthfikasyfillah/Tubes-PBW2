<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-gray-100 flex justify-center items-center  h-screen">
        <div class="w-20 hidden lg:flex bg-white "></div>
        <div class="items-center justify-center text-center w-1/2 h-screen hidden lg:flex flex-col bg-blue-900 gap-8">
            <img src="img/padlock.png" class="bg-auto">
        </div>
        <!-- Right: Form -->
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-2/3">
            <h1 class="mb-5 text-4xl text-blue-900 font-bold">Reset Password</h1>
            <form action="#" method="POST">
                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email" class="font-semibold">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off">
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <label for="email" class="font-semibold">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off">
                </div>
                <div class="mb-4">
                    <label for="email" class="font-semibold">Konfirmasi Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off">
                </div>
                <!-- Button -->
                <div class="flex gap-5">
                    <button type="submit"
                        class="bg-blue-900 hover:bg-blue-800 text-1xl text-white font-semibold rounded-md py-2 px-4 w-full">Reset
                        Password</button>
                    <button type="submit"
                        class="bg-white border-2 border-blue-800 text-1xl text-blue-800 font-semibold rounded-md py-2 px-4 w-full">Batal</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
