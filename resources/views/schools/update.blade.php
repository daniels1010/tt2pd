@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::model($school, [
		'method' => 'PATCH',
		'route' => ['schools.update', $school->id]
	]) !!}

	<table>
		<tr>
			<td>{!! Form::label('instrument', 'Vārds', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('instrument', null, ['class' => 'form-control', 'size' => 50, ]) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('logo', 'Logo', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('logo', null, ['class' => 'form-control', 'size' => 255, ]) !!}</td>
		</tr>
        <tr>
			<td>{!! Form::label('email', 'E-pasts', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('email', null, ['class' => 'form-control', 'size' => 50, ]) !!}</td>
		</tr>	
		<tr>
			<td></td>
			<td>{!! Form::submit('Saglabāt', ['class' => 'btn btn-primary']) !!}</td>
		</tr>
	</table>		
	
	{!! Form::close() !!}
</div>
@endsection
