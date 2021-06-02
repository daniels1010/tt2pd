@extends('layouts.app')

@section('content')
<div class="container">
    <?php
    $headers = [
        'Nosaukums',
        'Izveidošanas datums',
    ];
    $properties = [
        'name',
        'created_at',
    ];
    ?>
    <x-table 
        title="Faili"
        createText="Jauns fails" 
        baseUrl="filess" 
        :headers="$headers"
        :models="$files" 
        :properties="$properties">
    </x-table> 
</div>
@endsection
