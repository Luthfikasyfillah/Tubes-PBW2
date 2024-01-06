@vite('resources/css/app.css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
<div class="sticky top-0 w-full">
    <nav class="flex items-center bg-blue-800  h-16">
        <div class="flex-grow">
        </div>
        <div class="flex-none items-center">
            <div class="relative group">
                <button class="mr-8 font-medium text-white focus:outline-none" onclick="toggleDropdown()">User</button>
                <div id="userDropdown" class="hidden absolute right-0 w-72 bg-white border rounded-md shadow-lg p-3">
                    <div class="flex flex-col p-3">
                        <h1 class="font-bold">Rayyanza Malik Ahmad</h1>
                        <h3 class="text-sm">Cipung</h3>
                        <h3 class="text-sm">Abubu@gmail.com</h3>
                    </div>
                    <div class="flex flex-col gap-4 items-center">
                        <div class="flex gap-2">
                            <a href="#"
                                class="px-4 py-2 font-semibold text-sm text-white bg-cyan-600 hover:bg-cyan-900 border rounded-md text-center"
                                onclick="editProfile()">Edit Profile</a>
                            <a href="#"
                                class="px-4 py-2 font-semibold text-sm text-white bg-cyan-600 hover:bg-cyan-900 border rounded-md text-center"
                                onclick="resetPassword()">Reset Password</a>
                        </div>
                        <div class="pb-2">
                            <a href="#">
                                <button
                                    class="px-4 py-2 font-semibold text-sm text-white bg-blue-800 hover:bg-blue-900 border rounded-md text-center"
                                    onclick="logout()">Logout
                                </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script>
        function toggleDropdown() {
            // Toggle the display of the dropdown content
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        function showProfile() {
            // Logic to display user profile information
            console.log('Show Profile');
            // You can replace this with your own implementation
        }

        function editProfile() {
            // Logic to handle edit profile action
            console.log('Edit Profile');
            // You can replace this with your own implementation
        }

        function resetPassword() {
            // Logic to handle reset password action
            console.log('Reset Password');
            // You can replace this with your own implementation
        }

        function logout() {
            // Logic to handle logout action
            console.log('Logout');
            // You can replace this with your own implementation
        }
    </script>
</div>
