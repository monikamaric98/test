@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12" id="visina">
                <div class="card" id="prozirno">
                    <div class="card-header">Saloni</div>
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


                            <div class="col">


                                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Dodaj novi salon
                                </button>

                            </div>
                        </div>

                        <br>

                        @foreach($salons as $salon)

                            <div class="card mb-3" id="oglasikartice">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <a href="/saloni{{ $salon->id }}" style="text-decoration: none">

                                        <img class="ms-4"
                                             src="/storage/{{ $salon->image }}" id="imgshadow" style="height: 300px; width: 300px; padding: 5px">
                                        </a>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a href="/saloni{{ $salon->id }}" style="text-decoration: none">
                                                <h5 class="card-title text-primary">{{ $salon->naziv }}</h5>
                                            </a>
                                            <hr>
                                            <h5 class="card-text">Kontakt: {{ $salon->kontakt }}</h5>

                                            <p class="card-text">Lokacija: {{ $salon->lokacija }} </p>

                                            <br>
                                            <small>
                                                Dodano {{ $salon->created_at->diffForHumans() }}
                                            </small>
                                            <a href="/saloni{{ $salon->id }}" style="text-decoration: none">
                                                <p class="card-text"><small>
                                                        <br>Više...
                                                    </small></p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    @endforeach
                    <!--<div class="d-flex justify-content-center"></div>-->
                    {{$salons->links('pagination::bootstrap-4')}}


                    <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form method="POST" action="{{ route('salons.add') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Dodavanje salona</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="naziv">Ime salona</label>
                                                    <input type="text"
                                                           class="form-control @error('naziv') is-invalid @enderror" name="naziv" id="naziv" value="{{ old('naziv') }}" placeholder="Unesite naziv salona">

                                                    @error('naziv')
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
                                                    <label for="lokacija">Lokacija</label>
                                                    <input type="lokacija" class="form-control @error('lokacija') is-invalid @enderror" name="lokacija" id="lokacija" placeholder="Unesite lokaciju salona">

                                                    @error('lokacija')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                                                    @enderror

                                                </div>
                                                <label for="image" class="col-md-4 col-form-label">Dodajte sliku</label>

                                                <input type="file" class="form-control-file" id = "image" name="image">

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

@endsection

<style>
    #broj{
        background-color: rgba(0,0,0,0.9);
        border: 1px solid white;
        border-radius: 15px;
        font-family: "Roboto", sans-serif;
    }
</style>
