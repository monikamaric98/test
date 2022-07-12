@extends('layouts.app')

@section('content')
    <div class="container" id="visina">
        <div class="row justify-content-center">
            <div class="col-md-12" id="visina">
                <div class="card">
                    <div class="card-header text-primary">Administracija korisnika</div>
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
                                    Dodaj novog korisnika
                                </button>

                                <!-- Modal -->

                            </div>
                        </div>
                            <br><br><br>

                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title text-primary">Korisnici

                                    </h3> <p>Broj korisnika: {{ $number }}</p>
                                    <!--<div class="card-tools">
                                        <a href="#" class="btn btn-tool btn-sm">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="btn btn-tool btn-sm">
                                            <i class="fas fa-bars"></i>
                                        </a>
                                    </div>-->
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                        <tr>
                                            <th>Ime</th>
                                            <th>E-mail</th>
                                            <th>Uloga</th>
                                            <th>Registracija</th>
                                            <th>Salon</th>
                                            <th>Akcije</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>

                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    {{ $user->role }}
                                                </td>
                                                <td>
                                                    {{ Carbon\Carbon::parse($user->created_at)->format('d.m.Y.') }}
                                                </td>
                                                <td>
                                                    @foreach($salons as $s)
                                                        @if($user->salon_id == $s->id)
                                                            {{ $s->naziv }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="/user{{ $user->id }}edit" type="btn btn-success" class="btn btn-success mb-2">
                                                        Uloga
                                                    </a>

                                                        <a href="/userdelete{{ $user->id }}" class="btn btn-danger mb-2">
                                                            Obriši
                                                        </a>


                                                </td>


                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {{$users->links('pagination::bootstrap-4')}}
                                    </div>

                                </div>
                            </div>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form method="POST" action="{{ route('users.add') }}">
                                    @csrf

                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Dodavanje korisnika</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Ime korisnika</label>
                                                <input type="text" maxlength="30"
                                                       class="form-control @error('name') is-invalid @enderror" name="name" id="name2" value="{{ old('name') }}" placeholder="Unesite ime korisnika">

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email adresa</label>
                                                <input type="email" maxlength="191" class="form-control @error('email') is-invalid @enderror" name="email" id="email2" aria-describedby="emailHelp" placeholder="Unesite e-mail">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="password">Lozinka</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password2" placeholder="Unesite lozinku">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Ponovite lozinku</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Ponovno unesite lozinku">

                                                @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
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
