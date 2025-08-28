<?php
$linkStyle = 'block w-full py-4 pl-6 hover:bg-btn-hover cursor-pointer text-left border-b border-red-800';
?>
<nav class="w-64 bg-btn-primary h-screen text-white flex-shrink-0">
    <img src="{{ Vite::asset('resources/images/nav_logo.webp') }}" 
         alt="Logo" 
         class="my-8 mx-4 h-12 object-contain">

    <ul class="flex flex-col">
        <li><a href="{{ route('admin.dashboard') }}" class="{{ $linkStyle }} border-t">Dashboard</a></li>
        <li><a href="{{ route('admin.hero-section') }}" class="{{ $linkStyle }}">Hero Section</a></li>
        <li><a href="{{ route('admin.kurikulum-section') }}" class="{{ $linkStyle }}">Kurikulum Section</a></li>
        <li><a href="{{ route('admin.news-approval') }}" class="{{ $linkStyle }}">News Approval</a></li>
        <li><a href="{{ route('admin.news-section') }}" class="{{ $linkStyle }}">News Section</a></li>
    </ul>
</nav>
