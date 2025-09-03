@extends('layouts.kurikulum')

@section('title', $data->title)

@section('k-title', $data->title)

@section('content')
<?php
$paragraph = 'font-merriweather font-[100] leading-loose tracking-wider text-center';
?>
<section class="flex justify-center">
    <div class="w-full px-4 max-w-3xl">
        <div class="text-justify {{ $paragraph }} list-disc list-inside space-y-2">
            {!! $data->body !!}
        </div>
    </div>
</section>
@endsection