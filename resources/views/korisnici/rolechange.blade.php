@extends('layouts.app')

@section('content')
    <div class="container" id="visina">
        <div id="slika" class="p-3">
            <form action="{{ url('user/update/'.$user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group row">

                        <div class = "row">
                            <h1 class="text text-primary">Promijeni ulogu za {{ $user->name }}</h1>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="form-group col">
                                <label for="role" class="col-md-4 col-form-label">Uloga</label>

                                <select id="role" class="form-control @error('role') is-invalid @enderror"
                                        name="role" value="{{ $user->role }}"
                                        autocomplete="name" autofocus>
                                    <option value="{{ $user->role }}">Izaberi ulogu korisnika</option>
                                    <option>
                                        Superadmin
                                    </option>
                                    <option>
                                        Vlasnik
                                    </option>
                                    <option>
                                        User
                                    </option>
                                </select>

                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <small class="text-danger"> Pažljivo! Ako promijenite ulogu korisnika
                                iz user u ulogu admina, svi oglasi koje ima će biti obrisani!
                            </small>
                            <br>
                        </div>

                        <br>
                        <div class="pt-4">
                            <button class="btn btn-primary" type="submit">
                                Promijeni ulogu
                            </button>
                            <a href="/korisnici" class="btn btn-secondary">
                                Odustani
                            </a>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

<style>
    #slika{
        background-image: linear-gradient(whitesmoke, pink);
        border-radius: 15px;
    }
    #visina {
        min-height: 100%;
    }
</style>
