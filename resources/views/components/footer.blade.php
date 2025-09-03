<footer class="bg-black-primary flex w-full flex-col items-center justify-center p-2 py-4 text-center text-white">
    <div class="mb-4 mt-2 flex gap-6">
        <img src="{{ Vite::asset('resources/images/cambridge.webp') }}" class="w-54" />
        <div class="flex flex-col">
            <h3 class="font-raleway font-bold">FOLLOW US</h3>
            <div class="flex gap-3">
                <!-- Facebook -->
                <a href="#"
                    class="group inline-block rounded-lg bg-white p-2 shadow-md transition-colors duration-300 ease-out hover:bg-red-600">
                    <img src="{{ Vite::asset('resources/images/facebook.svg') }}" alt="Facebook"
                        class="w-7 transition duration-300 ease-out group-hover:brightness-0 group-hover:invert">
                </a>

                <!-- Instagram -->
                <a href="#"
                    class="group inline-block rounded-lg bg-white p-2 shadow-md transition-colors duration-300 ease-out hover:bg-red-600">
                    <img src="{{ Vite::asset('resources/images/instagram.svg') }}" alt="Instagram"
                        class="w-7 transition duration-300 ease-out group-hover:brightness-0 group-hover:invert">
                </a>

                <!-- YouTube -->
                <a href="#"
                    class="group inline-block rounded-lg bg-white p-2 shadow-md transition-colors duration-300 ease-out hover:bg-red-600">
                    <img src="{{ Vite::asset('resources/images/youtube.svg') }}" alt="YouTube"
                        class="w-7 transition duration-300 ease-out group-hover:brightness-0 group-hover:invert">
                </a>
            </div>

        </div>
    </div>
    <span class="font-merriweather text-sm text-[#808080]">
        Copyright © <?php echo date('Y'); ?> Sekolah Kemurnian. All rights reserved.
    </span>
</footer>
