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
                                    <img src="{{ asset('img/scooter.png') }}" width="300px" class="text-center">
                                    <p class="mt-5 pt-4">
                                        Pilihlah masalah yang anda hadapi pada kendaraan anda!
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
                                    <form action="{{route('kirim-diagnose')}}" method="POST">
                                    @csrf
                                    @forelse($gejalas as $key => $g)
                                      <div class="form-group row">
                                        <div class="col-sm-8">
                                            <label for="staticEmail" class="col-form-label">Kerusakan Karena <b>{{$g->nama}}</b> ?</label>
                                            <input type="hidden" name="idv_{{$g->id}}" value="{{$g->kode_gejala}}" readonly>
                                            <input type="hidden" name="cf_{{$g->id}}" value="{{$g->nilai}}" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                          <select id="inputState" name="b_{{$g->id}}" class="form-control" style="padding: 0rem 1rem !important;" required="true">
                                            <option selected disabled value="">Pilihan</option>
                                            @forelse($bobots as $b)
                                            <option value="{{$b->nilai}}">{{$b->nama}}</option>
                                            @empty
                                            <option>...</option>
                                            @endforelse
                                          </select>
                                        </div>
                                      </div>
                                    @empty
                                      Empty
                                    @endforelse
                                      <hr class="pt-3">
                                      <button type="submit" class="btn btn-sm btn-block btn-primary">Diagnosis</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
