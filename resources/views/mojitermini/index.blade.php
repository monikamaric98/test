@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" id="visina">
                <div class="card">
                    <div class="card-header text-primary">Moji termini <br>
                    Salon: {{ $naziv->naziv }}
                    </div>
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
                                        <th>Datum</th>
                                        <th>Vrijeme</th>
                                        <th>Kontakt</th>
                                        <th>Tip servisa</th>
                                        <th>Klijent</th>

                                        <th>Brisanje</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($termins as $termin)
                                        <tr>
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
                                            <td>
                                                @if(auth()->user()->id == $termin->user_id
                                                || auth()->user()->role == "Superadmin"
                                                || auth()->user()->role == "Vlasnik")
                                                    <a href="/termindelete{{$termin->id}}" class="btn btn-danger">Obriši</a>
                                                @endif
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
