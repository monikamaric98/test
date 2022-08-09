@extends('layouts.app')

@section('content')
    <div class="container" id="slika">
        <form>
            @csrf

            <div class="row">
                <div class="form-group row">

                    <div class = "row">
                        <h1 class="text text-danger">Jeste li sigurni da želite obrisati ovog korisnika?</h1>
                    </div>
                    <br><br><br>

                    <div class="row">

                        <div class="form-group col">
                            <label for="name" class="col-md-4 col-form-label">Korisničko ime</label>

                            <input id="name2" disabled type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') ?? $user->name }}"
                                   autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col">
                            <label for="email" class="col-md-4 col-form-label">Email</label>

                            <input id="email2" disabled type="text" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') ?? $user->email }}"
                                   autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <br>
                    <div class="pt-4">

                        <br>

                        <a href="{{ route("user.delete", $user->id) }}" class = "btn btn-danger">Obriši ovog korisnika</a>

                        <a href="/korisnici" class="btn btn-secondary"> Odustani </a>
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
