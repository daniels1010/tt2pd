<div>
    <table class="tabula">
        <tr>
            @foreach($headers as $header) 
                <th class="tabula-header">{{ $header }}</th>               
            @endforeach
             <th class="tabula-header">Opcijas</th>
        </tr>

        <?php foreach ($models as $model) { ?>
            <tr>
                @foreach($properties as $prop) 
                    @if(is_string($prop))
                        <td class="tabula-data">{{ $model[$prop] }}</td>
                    @elseif(is_array($prop))
                        @if($prop[0] === 'method')
                            <td class="tabula-data">{{ $model->{$prop[1]}() }}</td>
                        @endif
                    @endif
                @endforeach

                <td class="tabula-data">
                    <a href="{{ url($baseUrl . '/' . $model->id) }}" class="btn btn-primary fa fa-eye"></a>
                    <a href="{{ url($baseUrl . '/' . $model->id . '/edit') }}" class="btn btn-warning fa fa-edit"></a>                
                    <form style="display:unset" action="{{ url('/' . $baseUrl, ['id' => $model->id]) }}" method="post">
                        @csrf
                        <button value="Dzēst" class="btn btn-danger fa fa-trash" />
                        <input type="hidden" name="_method" value="delete" />
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    @if($displayCreateBtn)
        <div class="col-12 text-center">
            <a href="{{ url($baseUrl . '/create') }}" class="p-2 m-2 btn btn-success">{{ $createText }}</a>
        </div>    
    @endif
</div>