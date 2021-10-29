@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
          @include('backend.pages._partials.nav')
        </div>
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
                            Menu <br> Bobot Nilai
                        </div>
                        <div class="float-right">
                            <a href="{{route('home')}}">Kembali</a>
                        </div>
                    </div>
                    </p>
                    <div class="row">
                        <div class="col-12">
                            <nav class="nav">
                              <a class="nav-link active" href="{{route('bobot.create')}}">Tambah Data</a>
                            </nav>
                            <div class="card">
                              <div class="card-body">
                                <table class="table table-bordered table-sm">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th class="text-center" scope="col">KODE</th>
                                      <th class="text-center" scope="col">NAMA</th>
                                      <th class="text-center" scope="col">NILAI</th>
                                      <th class="text-right" scope="col">OPSI</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @forelse($bobots as $key => $v)
                                    <tr>
                                      <th scope="row">{{$key+1}}</th>
                                      <td class="text-center"><kbd>{{$v->kode_bobot}}</kbd></td>
                                      <td class="text-center">{{$v->nama}}</td>
                                      <td class="text-center">{{$v->nilai}}</td>
                                      <td class="text-right">
                                        <div class="btn-group">
                                          <button class="btn btn-dark btn-sm" type="button">
                                            Aksi
                                          </button>
                                          <button type="button" class="btn btn-sm btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('bobot.show', $v->id) }}">Lihat</a>
                                            <a class="dropdown-item" href="{{ route('bobot.edit', $v->id) }}">Ubah</a>
                                            <a class="dropdown-item" href="{{ route('bobot.destroy', $v->id) }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('delete-form').submit();">
                                              Hapus
                                            </a>
                                            <form id="delete-form" action="{{ route('bobot.destroy', $v->id) }}" method="POST" onsubmit="return confirm('Yakin, mau dihapus ?');" 
                                            style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                    @empty
                                    <tr>
                                      <td>Empty</td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                                    @endforelse
                                  </tbody>
                                </table>
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
