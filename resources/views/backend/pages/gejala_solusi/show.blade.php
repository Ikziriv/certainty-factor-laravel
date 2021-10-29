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
                            Menu <br> Lihat Gejala
                        </div>
                        <div class="float-right">
                            <a href="{{route('perbaikan.index')}}">Kembali</a>
                        </div>
                    </div>
                    </p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title"><kbd>{{$perbaikan->kode_gejala}}</kbd> | <kbd>{{$perbaikan->kode_solusi}}</kbd></h5>
                                <p class="card-text"><small>{{$perbaikan->nilai}}</small></p>
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
