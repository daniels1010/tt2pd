@extends('layouts.app')

@section('content')
    @if($type == 2)
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
        <h5>Lai skolēni piereģistrētos jāizmanto šī saite: http://127.0.0.1:8000/register?s={{ $school_id }}</h5>
    </div>
    @elseif ($type == 1)
    <div class="container">
        <x-main-title></x-main-title>
        <?php
        $headers = [
            'Vārds',
            'Uzvārds',
            'E-pasts',
            'Lietotāja tips',
            'Skolas id',
        ];
        $properties = [
            'first_name',
            'last_name',
            'email',
            ['method', 'userTypeName'],
            'school_id'
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
    
    @endif
@endsection
