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
                            Menu <br> Tambah Solusi
                        </div>
                        <div class="float-right">
                            <a href="{{route('solusi.index')}}">Kembali</a>
                        </div>
                    </div>
                    </p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                <form method="POST" action="{{route('solusi.store')}}">
                                  @csrf
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-9">
                                      <h4><kbd>Kode</kbd></h4>
                                      </div>
                                      <div class="col-3">
                                      <input type="text" class="border-0 text-success text-center" value="{{$sku_code}}" name="kode_solusi" readonly="true">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Enter nama">
                                  </div>
                                  {{-- <div class="form-group">
                                    <label for="exampleInputEmail1">Nilai</label>
                                    <input type="text" class="form-control" name="nilai" placeholder="Enter nilai">
                                  </div> --}}
                                  <hr class="pt-3">
                                  <button type="submit" class="btn btn-sm btn-block btn-primary">Submit</button>
                                </form>
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
