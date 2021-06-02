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
        title="Sarežģītības"
        baseUrl="difficulties"
        createText="Jauna sarežģītība"
        :headers="$headers"
        :models="$difficulties"
        :properties="$properties">
    </x-table>
</div>
@endsection
