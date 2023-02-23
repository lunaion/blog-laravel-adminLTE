<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('status', 'Estado') !!}
            {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
        
            @error('status')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('city_id', 'Ciudad') !!}
            {!! Form::select('city_id', $cities, null, ['class' => 'form-control']) !!}
        
            @error('city_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('site_id', 'Sede') !!}
            {!! Form::select('site_id', $sites, null, ['class' => 'form-control']) !!}
        
            @error('site_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>