@extends('layouts.app')

@section('content')

    <div class="container" id="slika">
        <div class="row">
            <div class="col-4">

                <img class="ms-4"
                     src="/storage/{{ $salon->image }}" id="imgshadow" style="height: 300px; width: 300px;">

                <br><br><br>



                @if(auth()->user()->id == $salon->user_id || auth()->user()->role == "Superadmin")
                    <a href="/salon{{ $salon->id }}edit" class = "btn btn-primary mb-2">
                        Uredi
                    </a>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalForDelete">
                        Obriši
                    </button>
                @endif

                <a href="/saloni" class="btn btn-outline-primary mb-2 ">Svi saloni</a>


            </div>
            <img id="eh" src="https://commons.wikimedia.org/wiki/File:HD_transparent_picture.png">

            <div class="col">
                <h1 class="text text-primary">
                    {{ $salon->naziv }}
                </h1>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <th>
                                Lokacija:
                            </th>
                            <td>
                                {{ $salon->lokacija }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Kontakt:
                            </th>
                            <td>
                                {{ $salon->kontakt }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Dodan:
                            </th>
                            <td>
                                {{ $salon->created_at->diffForHumans() }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Vlasnik oglasa:
                            </th>
                            @foreach($user as $u)
                                @if(auth()->user()->id == $salon->user_id)
                                <td class="text text-success">
                                    <b>{{ $u->name }}</b>
                                </td>
                                @else
                                <td class="text text-primary">
                                    <b>{{ $u->name }}</b>
                                </td>
                                @endif
                            @endforeach
                        </tr>

                    </table>
                </div>
            </div>

        </div>

        <!-- MODAL ZA DELETE -->
        <div class="modal fade" id="modalForDelete" tabindex="-1" aria-labelledby="modalForDelete" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">
                            Jeste li sigurni da želite obrisati ovaj oglas?
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body align-center">
                        <table>
                            <tr>
                                <td>
                                    <img src="https://static.thenounproject.com/png/358467-200.png">
                                </td>
                                <td>
                                    <p class="text-danger"> Pažljivo! Ako ga obrišete, ne možete ga vratiti!</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                        <a href="{{ route("salons.delete", $salon->id) }}" class = "btn btn-danger">Obriši</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>

@endsection

<style>
    @media (max-width: 990px) {
        #eh {
            height: 2px;
            width: 300px;
        }
    }
    @media (min-width: 990px) {
        #eh {
            width: 1px;
        }
    }
    .table{
        background-color: white;
    }
    #slika{
        border-radius: 15px;
    }
</style>
