@extends('layouts.app')

@section('content')
    <div class="container">
        <form>
            @csrf

            <div class="row">
                <div class="form-group row">

                    <div class = "row">
                        <h1 class="text text-danger">Jeste li sigurni da želite otkazati ovaj termin?</h1>
                    </div>
                    <br><br><br>

                    <div class="row">

                        <div class="form-group">
                            <label for="datum_termina">Datum termina</label>
                            <input type="date"
                                   class="form-control @error('datum_termina') is-invalid @enderror"
                                   name="datum_termina" id="datum_termina"
                                   value="{{ old('datum_termina') ?? $termin->datum_termina }}">

                            @error('datum_termina')
                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="vrijeme_termina">Vrijeme termina</label>
                            <input type="time" class="form-control @error('vrijeme_termina') is-invalid @enderror"
                                   name="vrijeme_termina" id="vrijeme_termina"
                                   value="{{ old('vrijeme_termina') ?? $termin->vrijeme_termina }}">


                            @error('vrijeme_termina')
                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="kontakt">Kontakt</label>
                            <input type="kontakt" class="form-control @error('kontakt') is-invalid @enderror"
                                   name="kontakt" id="kontakt"
                                   value="{{ old('kontakt') ?? $termin->kontakt }}">

                            @error('kontakt')
                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                            @enderror

                        </div>



                    <!-- <div class="form-group">
                        <label for="service_type_id">Tip servisa</label>
                        <select
                            class="form-control" name="service_type_id" id="service_type_id">
@foreach($types as $t)
                        <option value="{{$t->id}}">
                                        {{$t->naziv}}
                            </option>
@endforeach

                        </select>
                    </div>-->
                    </div>

                    <br>
                    <div class="pt-4">

                        <br>

                        <a href="{{ route("termins.change", $termin->id) }}" class = "btn btn-danger">Otkaži</a>

                        <a href="/termini" class="btn btn-secondary"> Odustani </a>
                    </div>

                </div>
            </div>
        </form>
    </div>


@endsection

<style>
    #slika {

        border-radius: 15px;
    }
</style>
