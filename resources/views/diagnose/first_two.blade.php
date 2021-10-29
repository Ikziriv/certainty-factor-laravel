<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-4 mt-4">
                    <div class="">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h5 class="text-center">SISTEM PAKAR BENGKEL</h5><br>
                                    <img src="{{ asset('img/logo.jpg') }}" width="300px" class="text-center">
                                    <p class="mt-3 pt-3 text-center">
                                        Hasil diagnosis pada kendaraan anda!
                                        Dengan menggunakan <br>Metode Certainty Factory <br>
                                        <a class="pt-3" href="{{route('welcome')}}">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-right">
                                    @if (Route::has('login'))
                                        <div class="top-right links">
                                            @auth
                                                <a href="{{ url('/home') }}">Home</a>
                                            @else
                                                <a href="{{ route('login') }}">Login</a>

                                                {{-- @if (Route::has('register'))
                                                    <a href="{{ route('register') }}">Register</a>
                                                @endif --}}
                                            @endauth
                                        </div>
                                    @endif
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col-12">
                                    Pilihan yang anda berikan :
                                    <hr>
                                </div>
                                <div class="col-12">
                                    @foreach($rows as $key => $v)
                                        @php
                                        $gejala = App\Gejala::where('id', $v['id'])->get();
                                        $bobot = App\BobotNilai::where('nilai', $v['bobot'])->get();
                                        @endphp
                                        @foreach($gejala as $g)
                                        <div class="clearfix">
                                          <h6 class="float-left">{{$g->nama}} </h6>
                                          <div class="float-right">
                                            @foreach($bobot as $b)
                                            {{$b->nama}}
                                            @endforeach
                                          </div>
                                        </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="col-12"><hr>
                                    Hasil Diagnosis :
                                    <hr>
                                    Berdasarkan hasil solusi analisis pada sistem : <br>
                                    @foreach($data_list_solusi as $key => $v)
                                        <div class="clearfix">
                                          <h6 class="float-left">{{$v['kode']}} - {{$v['nama']}}</h6>
                                          <div class="float-right">
                                            {{$v['kepercayaan']}} 
                                          </div>
                                        </div>
                                    @endforeach <hr>
                                    <div class="clearfix">
                                          <button type="submit" class="btn btn-default float-left">SIMPAN</button>
                                          <button type="submit" class="btn btn-default float-right">CETAK</button>
                                    </div>
                                    {{-- <table class="table table-bordered table-sm">
                                      <thead>
                                        <tr>
                                          <th scope="col">Gejala</th>
                                          <th scope="col">Solusi</th>
                                          <th scope="col">CF</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($rows as $key => $v)
                                        @php
                                        $gesol = App\GejalaSolusi::where('gejala_id', $v['id'])->take(1)->get();
                                        @endphp
                                            @foreach($gesol as $key => $g)
                                            <tr>
                                              <td>{{$g->gejala->nama}}</td>
                                              <td>{{$g->solusi->nama}}</td>
                                              <td>{{$g->nilai}}</td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                      </tbody>
                                    </table><hr> --}}
                                    {{-- <table class="table table-bordered table-sm">
                                      <thead>
                                        <tr>
                                          <th scope="col">CF Pakar</th>
                                          <th scope="col"></th>
                                          <th scope="col">CF User</th>
                                          <th scope="col">CF (H,E)</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($rows as $key => $v)
                                        @php
                                        $gesol = App\GejalaSolusi::where('gejala_id', $v['id'])->take(1)->get();
                                        @endphp
                                            @foreach($gesol as $key => $g)
                                            <tr>
                                              <td>{{$g->nilai}}</td>
                                              <td>x</td>
                                              <td>{{$v['bobot']}}</td>
                                              @php
                                              $total = $g->nilai * $v['bobot'];
                                              @endphp
                                              <td>{{$total}}</td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                      </tbody>
                                    </table><hr>
                                    Perhitungan :
                                    <hr>
                                    <div class="card">
                                        <div class="card-body">
                                            @php 
                                            @endphp
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
