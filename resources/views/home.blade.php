@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                分類sample
				<select name="sel_cate1">
				@foreach ($data as $id => $row)
				<option value='test'>{{$row->cate1_nm}}</option>
				@endforeach
				</select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
