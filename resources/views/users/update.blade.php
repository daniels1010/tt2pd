@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::model($user, [
		'method' => 'PATCH',
		'route' => ['users.update', $user->id]
	]) !!}

	<table>
		<tr>
			<td>{!! Form::label('first_name', 'Vārds', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('first_name', null, ['class' => 'form-control', 'size' => 50, ]) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('last_name', 'Uzvārds', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('last_name', null, ['class' => 'form-control', 'size' => 50, ]) !!}</td>
		</tr>
        <tr>
			<td>{!! Form::label('email', 'E-pasts', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('email', null, ['class' => 'form-control', 'size' => 50, ]) !!}</td>
		</tr>	
		<tr>
			<td></td>
			<td>{!! Form::submit('Submit', ['class' => 'btn btn-submit']) !!}</td>
		</tr>
	</table>		
	
	{!! Form::close() !!}
</div>
@endsection
