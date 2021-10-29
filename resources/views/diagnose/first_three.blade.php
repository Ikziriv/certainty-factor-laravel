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
                            <form action="{{route('kirim-analisis')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    @php
                                    $kode_analisis = request()->session()->get('kode_analisis');
                                    $analisis = App\Analisis::where('kode_analisis', $kode_analisis)->first();
                                    @endphp
                                    <div class="clearfix">
                                      <h6 class="float-left">{{$analisis->nama}} </h6>
                                      <div class="float-right">
                                        <input type="text" name="kode_analisis[]" value="{{$analisis->kode_analisis}}" readonly>
                                        {{$analisis->plat_nomer}} 
                                      </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-12">
                                    Pilihan :
                                    <hr>
                                </div>
                                <div class="col-12">
                                    @php
                                    $analisis = App\Analisis::where('kode_analisis', $kode_analisis)->get();
                                    @endphp
                                    @foreach($analisis as $key => $v)
                                        @php
                                        $bobot = App\BobotNilai::where('nilai', $v['bobot'])->get();
                                        @endphp
                                        <div class="clearfix">
                                          <h6 class="float-left 
                                            @if($v['bobot'] == 0) text-danger @endif
                                            @if($v['bobot'] == 1) text-success @endif
                                          ">{{$v->gejala->nama}} </h6>
                                          <input type="text" name="gejala_id[]" value="{{$v->gejala_id}}" readonly>
                                          <div class="float-right">
                                            @foreach($bobot as $b)
                                            {{$b->nama}} =
                                            <span class="badge badge-secondary ">{{$v['bobot']}}</span>
                                            @endforeach
                                          </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-12"><hr>
                                    Kemungkinan :
                                    <hr>
                                    @php
                                    $gejala_id_grup = request()->session()->get('gejala_id_grup');
                                    // dd($integerIDs);
                                    
                                        $gesol1 = App\GejalaSolusi::where('solusi_id', 1)->first();
                                        $gesol2 = App\GejalaSolusi::where('solusi_id', 2)->first();

                                        $gesol11 = App\GejalaSolusi::whereIn('gejala_id', array($gejala_id_grup))->where('solusi_id', 1)->get();
                                        $gesol22 = App\GejalaSolusi::whereIn('gejala_id', array($gejala_id_grup))->where('solusi_id', 2)->get();
                                    @endphp
                                    <div class="clearfix">
                                        <p class="float-left">
                                            {{$gesol1->solusi->nama}} <br>
                                            @foreach($gesol11 as $g1)
                                            <a href="#">{{$g1->gejala->nama}}</a> = {{$g1->nilai}}<br>
                                            @endforeach
                                        </p>
                                        <p class="float-right">
                                            {{$gesol2->solusi->nama}} <br>
                                            @foreach($gesol22 as $g2)
                                            <a href="#">{{$g1->gejala->nama}}</a> = {{$g2->nilai}}<br>
                                            @endforeach
                                        </p>
                                    </div>
                                    @php
                                    $gesol = DB::table('solusis as s')
                                                ->select(['gs.gejala_id as id_g', 'gs.solusi_id as id_s', 'gs.nilai as nilai', 's.nama as nama'])
                                                ->join('gejala_solusis as gs', 'gs.solusi_id', '=', 's.id')
                                                ->whereIn('gs.gejala_id', array($gejala_id_grup))
                                                ->distinct()
                                                ->get(['id_s']);
                                    @endphp
                                    <hr>
                                    <div class="clearfix">
                                          <button type="submit" class="btn btn-success float-left">Process</button>
                                          <a href="{{route('welcome')}}" class="btn btn-danger float-right">Batal</a>
                                    </div>
                                </div>
                            </div>
                            </form>
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
