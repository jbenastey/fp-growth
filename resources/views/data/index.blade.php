@extends('layouts.app')
@section('header','Data')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="float-right">
                            <div class="btn-group dropdown mr-1 ml-1 mb-1">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#import"><i class="fa fa-file-excel-o"></i> Import Excel</button>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered zero-configuration table-responsive">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th>Semester</th>
                                <th>Jenis Kelamin</th>
                                <th>Solusi Jadwal Kuliah Padat</th>
                                <th>Makanan Pokok</th>
                                <th>Makanan Ringan</th>
                                <th>Mie Instan</th>
                                <th>Fast Food</th>
                                <th>Makanan Pedas</th>
                                <th>Minuman Berkafein</th>
                                <th>Minuman Bersoda</th>
                                <th>Jajanan / Gorengan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value->data_fakultas}}</td>
                                    <td>{{$value->data_jurusan}}</td>
                                    <td>{{$value->data_semester}}</td>
                                    <td>{{$value->data_jk}}</td>
                                    <td>{{$value->data_sjkp}}</td>
                                    <td>{{$value->data_mp}}</td>
                                    <td>{{$value->data_mr}}</td>
                                    <td>{{$value->data_mi}}</td>
                                    <td>{{$value->data_ff}}</td>
                                    <td>{{$value->data_mps}}</td>
                                    <td>{{$value->data_mk}}</td>
                                    <td>{{$value->data_ms}}</td>
                                    <td>{{$value->data_jg}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Import Excel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                    </button>
                </div>
                <form action="{{route('import-excel')}}" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <fieldset class="form-group">
                            <a href="{{url('/excel/format/Data Asli dan Transformasi.xlsx')}}" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Unduh Format Excel</a>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="basicInput">Import</label><br>
                            <input type="file" name="import_file" required>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-light-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

