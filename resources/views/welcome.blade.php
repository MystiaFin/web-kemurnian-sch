<?php
$headerStyle = 'text-md text-text-primary font-extrabold tracking-[0.2em] text-center';
$paragraph = 'max-w-4xl mt-10 font-merriweather font-[100] leading-loose tracking-wider text-lg text-center';
$buttonPrimary = 'w-36 my-12 p-3 py-3 bg-btn-primary text-white font-bold tracking-wider rounded-full cursor-pointer shadow-xl hover:bg-btn-hover ease-out';
?>

<x-layout>
    <x-hero-sliders />
    <main class="mt-28 flex flex-col items-center justify-center">

        <article class="flex flex-col">
            <x-title title="LOKASI SEKOLAH"></x-title>
            <x-lokasi-sekolah />
        </article>

        <article class="flex flex-col items-center justify-center">
            <x-title title="TENTANG KAMI"></x-title>
            <p class="{{ $paragraph }}">
                Sekolah Kemurnian pertama didirikan dengan nama TK Kemurnian, pada tanggal 2 Januari 1978 di Jalan
                Kemurnian V No. 209, Jakarta Barat. Sampai saat ini, Sekolah Kemurnian telah berkembang sehingga
                mendirikan jenjang pendidikan dari Sekolah Dasar (SD), Sekolah Menengah Pertama (SMP), sampai pada
                Sekolah Menengah Atas (SMA) dan berekspansi hingga mendirikan 2 unit cabang sekolah, yaitu Sekolah
                Kemurnian II di Greenville dan Sekolah Kemurnian III di Citra.
            </p>
            <x-button href="/about" text="READ ON"/>
        </article>

        <article class="w-full bg-[#e6e6e6] pt-32">
            <x-title title="KURIKULUM"></x-title>
            <x-kurikulum-preview />
        </article>
    </main>
</x-layout>
