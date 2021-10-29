@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                    <h5>Dashboard</h5> <small>SISTEM PAKAR BENGKEL</small> <hr>
                    <div class="clearfix">
                        <div class="float-left">
                            Menu <br> Lihat Bobot Nilai
                        </div>
                        <div class="float-right">
                            <a href="{{route('bobot.index')}}">Kembali</a>
                        </div>
                    </div>
                    </p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><kbd>{{$bobot->kode_bobot}}</kbd></h5>
                                <p class="card-text"><b><h5>{{$bobot->nama}}</h5></b> - <small>{{$bobot->nilai}}</small></p>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
