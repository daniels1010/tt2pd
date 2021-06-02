@extends('layouts.app')

@section('content')
<div class="container">
    <x-main-title></x-main-title>
    <?php
    $headers = [
        'Vārds',
        'Uzvārds',
        'E-pasts',
    ];
    $properties = [
        'first_name',
        'last_name',
        'email',
    ];
    ?>
    <x-table 
        title="Skolēni"
        :displayCreateBtn="false" 
        baseUrl="users" 
        :headers="$headers"
        :models="$students" 
        :properties="$properties">
    </x-table>
</div>
@endsection
