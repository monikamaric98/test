@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" id="visina">
                <div class="card">
                    <div class="card-header text-primary">Termini</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <div class="row">


                                <!-- Button trigger modal
                                @if(auth()->user()->role == "Vlasnik")
                                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Dodaj novi termin
                                </button>
                                @endif

                                 -->
                                    <div class="col">
                                        <form action="{{ route('search') }}" method="GET" role="search">

                                            <div class="input-group">
                                                <div class="form-outline">
                                                    <input type="text" name="search" placeholder="Pretraži..." class="form-control" />
                                                </div>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                            <p><small class="text-muted">Pretraži po nazivu salona...</small></p>
                                        </form>
                                    </div>
                        <br><br>

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title text-primary">Termini</h3>

                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>Salon</th>
                                        <th>Datum</th>
                                        <th>Vrijeme</th>
                                        <th>Kontakt</th>
                                        <th>Tip servisa</th>
                                        <th>Klijent</th>
                                        <th>Dostupnost</th>
                                        @if(auth()->user()->role == "User")
                                        <th>Zauzmi termin</th>
                                        @endif
                                        @if(auth()->user()->role == "Vlasnik")
                                        <th>Brisanje</th>
                                        @endif


                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($termins as $termin)
                                        <tr>
                                            <td class="text text-primary">
                                                @foreach($salons as $s)
                                                    @if($termin->salon_id == $s->id)
                                                        <a href="/saloni{{$s->id}}">
                                                        {{ $s->naziv }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                {{  Carbon\Carbon::parse($termin->datum_termina)->format('d.m.Y.') }}
                                            </td>
                                            <td>
                                                {{ $termin->vrijeme_termina }}
                                            </td>
                                            <td>
                                                {{ $termin->kontakt }}
                                            </td>
                                            <td>
                                                @foreach($types as $s)
                                                    @if($termin->service_type_id == $s->id)
                                                        {{ $s->naziv }}
                                                    @endif
                                                @endforeach
                                            </td>


                                            <td>
                                                @foreach($users as $s)
                                                    @if($termin->user_id == $s->id)
                                                        {{ $s->name}}
                                                    @endif
                                                @endforeach
                                            </td>

                                                @if( $termin->isAvailable === 0 )
                                                    <td class="text text-success">
                                                        <i class="fa-solid fa-circle-check"></i>
                                                        Dostupno
                                                    </td>

                                                    @if(auth()->user()->role == "User")
                                                    <td>
                                                    <a href="/taketermin{{$termin->id}}" class="btn btn-success">
                                                        Zauzmi
                                                    </a>
                                                    </td>
                                                        @endif
                                                @else
                                                    <td class="text text-danger">
                                                        <i class="fa-solid fa-circle-xmark"></i>
                                                        Zauzeto
                                                    </td>

                                                    @if(auth()->user()->id == $termin->user_id)
                                                    <td>
                                                    <a href="/otkazitermin{{$termin->id}}" class="btn btn-danger">
                                                        Otkaži
                                                    </a>
                                                    </td>
                                                        @endif

                                                @endif


                                                @if(auth()->user()->id == $termin->salons->user_id
                                                && auth()->user()->role == "Vlasnik")
                                                <td>
                                                    <a href="/termindelete{{$termin->id}}" class="btn btn-danger">Obriši</a>
                                                </td>
                                            @else
                                                    <td>
                                                        <p hidden>no</p>
                                                    </td>

                                                @endif


                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{$termins->links('pagination::bootstrap-4')}}
                                </div>

                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form method="POST" action="{{ route('termins.add') }}">
                                @csrf

                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Dodavanje termina</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="datum_termina">Datum termina</label>
                                                <input type="date"
                                                       class="form-control @error('datum_termina') is-invalid @enderror" name="datum_termina" id="datum_termina" value="{{ old('datum_termina') }}">

                                                @error('datum_termina')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="vrijeme_termina">Vrijeme termina</label>
                                                <input type="time" class="form-control @error('vrijeme_termina') is-invalid @enderror" name="vrijeme_termina" id="vrijeme_termina">

                                                @error('vrijeme_termina')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                                                @enderror

                                            </div>

                                            <!--<div class="form-group">
                                                <label for="kontakt">Kontakt</label>
                                                <input type="kontakt" class="form-control @error('kontakt') is-invalid @enderror" name="kontakt" id="kontakt" placeholder="Unesite nacin na koji vas mogu korisnici kontaktirati">

                                                @error('kontakt')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                                                @enderror

                                            </div>

                                            <div class="form-group">
                                                <label for="salon_id">Salon</label>
                                                <select
                                                    class="form-control" name="salon_id" id="salon_id">
                                                    @foreach($salons as $t)
                                                        <option value="{{$t->id}}">
                                                            {{$t->naziv}}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>-->

                                            <div class="form-group">
                                                <label for="service_type_id">Tip servisa</label>
                                                <select
                                                    class="form-control" name="service_type_id" id="service_type_id">
                                                    @foreach($types as $t)
                                                        <option value="{{$t->id}}">
                                                            {{$t->naziv}}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
                                            <button type="submit" class="btn btn-primary">Spremi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

<style>
    #visina{
        min-height: 100%;
    }
</style>
