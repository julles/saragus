@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">News Form</div>

                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-12">
                            @if($errors->any())
                                <div class="alert alert-danger"> 
                                    <ul>    
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                    		 {!! Form::model($model,['enctype'=>'multipart/form-data','route'=>$formRoute,'method'=>$formMethod]) !!}
                              
                              <div class="form-group">
                                <label>Judul</label>
                                {!! Form::text('judul',null,['class'=>'form-control']) !!}
                                {!! $errors->first('judul') !!}
                              </div>

                              <div class="form-group">
                                <label>Deskripsi</label>
                                {!! Form::textarea('deskripsi',null,['class'=>'form-control']) !!}
                                {!! $errors->first('deskripsi') !!}
                              </div>
                              <div class="form-group">
                                <label>Gambar</label>
                                {!! Form::file('gambar',['class'=>'form-control']) !!}
                                {!! $errors->first('gambar') !!}
                              </div>
                              <button type="submit" class="btn btn-default">Submit</button>
                            {!! Form::close() !!}
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
