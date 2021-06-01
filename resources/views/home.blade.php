@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin: 0; padding: 0; width: 100%;">
    <div class="welcome-box">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top: 150px;">

                <div class="card-body">
                   
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="welcome-heading">Sveicināti TMIS!</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
