@extends('layouts.app')
@section('header','Data Atribut')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="float-right">
                        <div class="btn-group dropdown mr-1 ml-1 mb-1">
                            <a href="{{route('load-atribut')}}" class="btn btn-primary btn-sm" ><i class="fa fa-file-excel-o"></i> Load Atribut</a>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered zero-configuration" style="width: 100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kolom Atribut</th>
                            <th>Kode Item</th>
                            <th>Item</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($atribut as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$value->atribut_kolom}}</td>
                                <td>{{$value->atribut_kode}}</td>
                                <td>{{$value->atribut_item}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

