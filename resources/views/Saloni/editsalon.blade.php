@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('saloni/update/'.$salon->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">

                <div class = "row">
                    <h1 class="text text-primary">Uredi informacije o salonu</h1>
                </div>
                <br><br><br>

                <div class="row">

                    <div class="form-group col-6">
                        <label for="naziv" class="col-md-4 col-form-label">Naziv</label>

                        <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror"
                               name="naziv" value="{{ old('naziv') ?? $salon->naziv }}"
                               autocomplete="naziv" autofocus maxlength="60">

                        @error('naziv')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-6">
                        <label for="kontakt" class="col-md-4 col-form-label">Kontakt</label>

                        <input id="kontakt" type="text" class="form-control @error('kontakt') is-invalid @enderror"
                               name="kontakt" value="{{ old('kontakt') ?? $salon->kontakt }}"
                               autocomplete="kontakt" autofocus maxlength="100">

                        @error('kontakt')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-6">
                        <label for="lokacija" class="col-md-4 col-form-label">Lokacija</label>

                        <input id="lokacija" type="text" class="form-control @error('lokacija') is-invalid @enderror"
                               name="lokacija" value="{{ old('lokacija') ?? $salon->lokacija }}"
                               autocomplete="lokacija" autofocus maxlength="100">

                        @error('lokacija')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Slika salona</label>

                        <input type="file" class="form-control-file" id = "image" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="pt-4">
                        <button class="btn btn-primary" type="submit">
                            Spremi promjene
                        </button>
                        <a href="/saloni{{ $salon->id }}}" class="btn btn-secondary">
                            Odustani
                        </a>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>

                </div>
            </div>
        </form>
    </div>

@endsection
