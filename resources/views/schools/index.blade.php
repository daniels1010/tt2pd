@extends('layouts.app')

@section('content')
<div class="container">
    <x-main-title></x-main-title>
    <?php
    $headers = [
        'Instruments',
        'E-pasts',
    ];
    $properties = [
        'instrument',
        'email',
    ];
    ?>
    <x-table 
        title="Skolas"
        createText="Jauna skola" 
        baseUrl="schools" 
        :headers="$headers"
        :models="$schools" 
        :properties="$properties">
    </x-table> 
</div>
@endsection
