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
                                    <p class="mt-5 pt-4">
                                        Pilihlah masalah yang anda hadapi pada kendaraan anda!
                                    </p>
                                </div>
                            </div>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="">
                        <div class="card-body pt-5">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('kirim-diagnose')}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col">
                                          <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                                        </div>
                                        <div class="col">
                                          <input type="text" class="form-control" name="plat_nomer" placeholder="Plat Motor" required>
                                        </div>
                                    </div>
                                    <hr>
                                    @forelse($gejalas as $key => $g)
                                      <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="staticEmail" class="col-form-label">Kerusakan Karena <b>{{$g->nama}}</b> ?</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group mt-2 ml-5">
                                                <label class="check-box">
                                                <input type="checkbox" name="idv[]" value="{{$g->id}}"/>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                          <select id="inputState" name="bobot[]" class="form-control" style="padding: 0rem 1rem !important;" required="true">
                                            <option selected disabled value="-1">Pilihan</option>
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

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript">
            
        </script>
    </body>
</html>
