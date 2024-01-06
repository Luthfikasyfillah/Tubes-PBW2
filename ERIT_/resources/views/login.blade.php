<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-gray-100 flex flex-row-reverse justify-center items-center  h-screen">
        <div class="w-20 hidden lg:flex bg-white "></div>
        <div class="items-center justify-center text-center w-1/2 h-screen hidden lg:flex flex-col bg-blue-900 gap-8">
            <div><img src="img/segi.svg" class="absolute top-0 right-0"></div>
            <div><img src="img/Logo2.svg" class="absolute top-5 right-24"></div>
            <div class="text-4xl text-white font-semibold">HELLO DEAR!</div>
            <div class="mx-28 text-2xl text-white font-light">Masukkan detail pribadi Anda dan mari melakukan perjalanan
                bersama kami</div>
            <!-- Sign up  Link -->
            <div class="text-2xl text-white border-2 rounded-md pt-1 pb-2 px-6 border-white">
                <a href="#" class="hover:underline">Sign Up</a>
            </div>
        </div>
        <!-- Right: Login Form -->
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-2/3">
            <h1 class="mb-10 text-4xl text-center text-blue-900 font-bold">Sign In</h1>
            <form action="#" method="POST">
                <!-- Username Input -->
                <div class="mb-4">
                    <input type="text" id="username" name="username" placeholder="Username"
                        class="w-full border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off">
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <input type="password" id="password" name="password" placeholder="Password"
                        class="w-full border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off">
                </div>
                <!-- Forgot Password -->
                <div class="mb-6 text-gray-500">
                    <a href="#" class="hover:underline">Lupa Password?</a>
                </div>
                <!-- Login Button -->
                <button type="submit"
                    class="bg-blue-900 hover:bg-blue-800 text-1xl text-white font-semibold rounded-md py-2 px-4 w-full">SIGN
                    IN</button>
            </form>

        </div>
    </div>
</body>

</html>
