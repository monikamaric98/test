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
                            <div class="col-9">

                            </div>


                            <div class="col-3">


                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Dodaj novi termin
                                </button>

                                <!-- Modal -->

                            </div>
                        </div>
                        <br><br><br>

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title text-primary">Termini</h3>

                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>Vrijeme</th>
                                        <th>Datum</th>
                                        <th>Kontakt</th>
                                        <th>Tip servisa</th>
                                        <th>Salon</th>
                                        <th>Klijent</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($termins as $termin)
                                        <tr>
                                            <td>

                                                {{ $termin->vrijeme_termina }}
                                            </td>
                                            <td>
                                                {{  Carbon\Carbon::parse($termin->datum_termina)->format('d.m.Y.') }}
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
                                                @foreach($salons as $s)
                                                    @if($termin->salon_id == $s->id)
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

                                            <div class="form-group">
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
                                            </div>

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
