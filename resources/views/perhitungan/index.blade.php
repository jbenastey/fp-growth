@extends('layouts.app')
@section('header','Data Atribut')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('hitung')}}" method="post">
                        {{ csrf_field() }}
                        <table style="width: 100%">
                            <tr>
                                <td>
                                    <p>Min. Support</p>
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="support" required>
                                </td>
                                <td>%</td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Min. Confidence</p>
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="confidence" required>
                                </td>
                                <td>%</td>
                                <td rowspan="2"> <button type="submit" class="btn btn-primary">Ok</button></td>
                            </tr>
                        </table>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" style="width: 100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Support Item</th>
                                <th>Confidence</th>
                                <th>NC</th>
                                <th>BC</th>
                                <th>Lift Ratio</th>
                                <th>Interpretasi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($hasil as $value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->hasil_rule}}</td>
                                        <td>{{number_format($value->hasil_confidence*100,2)}} %</td>
                                        <td>{{$value->hasil_nc}}</td>
                                        <td>{{$value->hasil_bc}}</td>
                                        <td>{{$value->hasil_lift_ratio}}</td>
                                        <td>{{$value->hasil_interpretasi}}</td>
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

