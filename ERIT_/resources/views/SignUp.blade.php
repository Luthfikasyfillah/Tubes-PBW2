<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-gray-100 flex justify-center items-center h-screen">
        <div class="w-20 hidden lg:flex bg-white"></div>
        <div class="items-center justify-center w-1/2 h-screen hidden lg:flex flex-col bg-blue-900 gap-8">
            <img src="img/Ellipse.svg" class="absolute bottom-0 left-0">
            <img src="img/Logo2.svg" class="absolute top-5 left-24">
            <div class="text-4xl text-white font-semibold">WELLCOME BACK!</div>
            <div class="mx-28 text-center text-2xl text-white font-light">Untuk tetap terhubung dengan kami masuk dengan
                informasi pribadi Anda</div>
            <!-- Sign up  Link -->
            <div class="text-2xl text-white border-2 rounded-md pt-1 pb-2 px-6 border-white">
                <a href="#" class="hover:underline">Sign In</a>
            </div>
        </div>
        <!-- Right: Login Form -->
        <div class="lg:p-24 md:p-36 p-8 w-full lg:w-2/3 h-screen">
            <h1 class="mb-10 text-4xl text-center text-blue-900 font-bold">Create Account</h1>
            <form action="#" method="POST">
                <!-- Name Input -->
                <div class="mb-4">
                    <input type="text" id="Name" name="Name" placeholder="Nama"
                        class="w-full border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off">
                </div>
                <!-- Username Input -->
                <div class="mb-4">
                    <input type="text" id="username" name="username" placeholder="Username"
                        class="w-full border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off">
                </div>
                <!-- Username Input -->
                <div class="mb-4">
                    <input type="email" id="email" name="email" placeholder="Email"
                        class="w-full border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off">
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <input type="password" id="password" name="password" placeholder="Password"
                        class="w-full border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off">
                </div>
                <!-- Confirm Password Input -->
                <div class="mb-4">
                    <input type="password" id="cPassword" name="cpassword" placeholder="Konfirmasi password"
                        class="w-full border bg-gray-200 border-gray-200 rounded-md py-2 px-3 focus:outline-none focus:border-gray-400"
                        autocomplete="off">
                </div>
                <!-- Login Button -->
                <button type="submit"
                    class="bg-blue-900 hover:bg-blue-800 text-1xl text-white font-semibold rounded-md py-2 px-4 w-full">SIGN
                    UP</button>
            </form>

        </div>
    </div>
</body>

</html>
