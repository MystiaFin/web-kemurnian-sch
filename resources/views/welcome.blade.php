<?php
$headerStyle = 'text-md text-text-primary font-black tracking-widest text-center';
$schoolImageStyle = 'w-72';
$schoolInfo = 'flex flex-col items-center text-center';
$schoolTitle = 'tracking-tight font-black mt-8 mb-4 text-lg';
$schoolAddress = "max-w-72 mb-6 font-[var(--font-family-merriweather)] text-lg";
$paragraph = "max-w-4xl mt-10 font-[var(--font-family-merriweather)] font-light text-xl text-center";
?>

<x-layout>
    <x-hero-sliders />
    <h1 class="font-[Merriweather]">font</h1>
    <main class="mt-28 flex flex-col items-center justify-center">
        <article class="flex flex-col">
            <div>
                <h1 class="{{ $headerStyle }}">LOKASI SEKOLAH</h1>
                <hr
                    class="clear-both mx-auto my-5 h-0 w-[90px] border-0 border-t-[3px] border-solid border-[#8b0000] text-center">
            </div>
            <section class="mx-5 mt-6 mb-34 flex flex-row gap-8">
                <div class="{{ $schoolInfo }}">
                    <img src="{{ Vite::asset('resources/images/sekolah/kemurnian_i.avif') }}"
                        class="{{ $schoolImageStyle }}" />
                    <h2 class="{{ $schoolTitle }}">Sekolah Kemurnian I</h2>
                    <p class="{{ $schoolAddress }}">Jl. Kemurnian V No. 209 Glodok, Taman sari Jakarta Barat 11120</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.8820921547413!2d106.81105261396955!3d-6.146534761961614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f608a1000aab%3A0x92f0ffb2c218f403!2sSekolah%20Kemurnian%20I!5e0!3m2!1sid!2sid!4v1660379395894!5m2!1sid!2sid"
                        title="kemurnian 1 location" width="200" height="200" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="iframe1">
                    </iframe>

                </div>
                <div class="{{ $schoolInfo }}">
                    <img src="{{ Vite::asset('resources/images/sekolah/kemurnian_ii.avif') }}"
                        class="{{ $schoolImageStyle }}" />
                    <h2 class="{{ $schoolTitle }}">Sekolah Kemurnian II</h2>
                    <p class="{{ $schoolAddress }}">Komplek Green Ville Blok Q No. 209, Duri Kepa, Kec. Kb. Jeruk, Kota
                        Jakarta Barat, Daerah Khusus Ibukota Jakarta 11510</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63467.48240572489!2d106.71308693124999!3d-6.168550499999991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f651cef9a1c9%3A0xeff64c79506e34c2!2sSekolah%20Kemurnian%20II!5e0!3m2!1sid!2sid!4v1660379724754!5m2!1sid!2sid"
                        title="kemurnian 1 location" width="200" height="200" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="iframe2"></iframe>

                </div>
                <div class="{{ $schoolInfo }}">
                    <img src="{{ Vite::asset('resources/images/sekolah/kemurnian_iii.avif') }}"
                        class="{{ $schoolImageStyle }}" />
                    <h2 class="{{ $schoolTitle }}">Sekolah Kemurnian III</h2>
                    <p class="{{ $schoolAddress }}">Jl. Perumahan Citra 2 Jl. Keharmonisan No.Blok A3, RT.1/RW.19,
                        Pegadungan, Kec. Kalideres, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11830</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.9522476009074!2d106.70160087360107!3d-6.1371182938497455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a03362119f0c5%3A0x7d52db1e3186ceb0!2sSekolah%20Kemurnian%20III!5e0!3m2!1sid!2sid!4v1733725394023!5m2!1sid!2sid"
                        width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </section>
        </article>
        <article>
            <h1 class="{{ $headerStyle }}">TENTANG KAMI</h1>
            <hr
                class="clear-both mx-auto my-5 h-0 w-[90px] border-0 border-t-[3px] border-solid border-[#8b0000] text-center">
            <p class="{{ $paragraph }}">
                Sekolah Kemurnian pertama didirikan dengan nama TK Kemurnian, pada tanggal 2 Januari 1978 di Jalan
                Kemurnian V No. 209, Jakarta Barat. Sampai saat ini, Sekolah Kemurnian telah berkembang sehingga
                mendirikan jenjang pendidikan dari Sekolah Dasar (SD), Sekolah Menengah Pertama (SMP), sampai pada
                Sekolah Menengah Atas (SMA) dan berekspansi hingga mendirikan 2 unit cabang sekolah, yaitu Sekolah
                Kemurnian II di Greenville dan Sekolah Kemurnian III di Citra.
            </p>
        </article>
    </main>
</x-layout>
