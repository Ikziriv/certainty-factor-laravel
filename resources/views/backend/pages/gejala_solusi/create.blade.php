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
                            Menu <br> Tambah Hubungan
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
                                <form method="POST" action="{{route('perbaikan.store')}}">
                                  @csrf
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Masalah</label>
                                    <select name="gejala_id" id="gejala_id" class="form-control" style="padding: 0rem 1rem !important;">
                                      <option selected disabled>Pilihan</option>
                                      @forelse($gejala as $key => $v)
                                      <option value="{{$v->id}}">{{$v->nama}}</option>
                                      @empty
                                      <option selected disabled>Empty</option>
                                      @endforelse
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Perbaikan</label>
                                    <select name="solusi_id" id="solusi_id" class="form-control" style="padding: 0rem 1rem !important;">
                                      <option selected disabled>Pilihan</option>
                                      @forelse($solusi as $key => $v)
                                      <option value="{{$v->id}}">{{$v->nama}}</option>
                                      @empty
                                      <option selected disabled>Empty</option>
                                      @endforelse
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nilai</label>
                                    <input type="text" class="form-control" name="nilai" placeholder="Enter nilai">
                                  </div>
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
