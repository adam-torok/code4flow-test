@extends('layouts.website.app')

@section('content')

@push('styles')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dattable').DataTable({
                language:{
                    "emptyTable":     "Jelenleg nincsenek",
                    "lengthMenu":     "Mutass _MENU_ bejelentést",
                    "loadingRecords": "Töltés...",
                    "processing":     "Feldolgozás...",
                    "search":         "Keresés:",
                    "zeroRecords":    "Nincs találat",
                    "paginate": {
                        "first":      "Első",
                        "last":       "Utolsó",
                        "next":       "Következő",
                        "previous":   "Előző"
                    },
                }
            });
        } );

    $(function() {
        $('tr[data-route]').on('click', function(e) {
            console.log(e);

            if ($(e.target).is('input') || $(e.target).is('label') || $(e.target).hasClass('btn')) {
                return;
            }

            window.location = $(this).data('route');
        });
    });
    </script>
@endpush

<div class="row p-md-5 mt-md-5">
    <div class="col-md-8 col-12 shadow-sm border-0 card p-5 offset-md-2">
        @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif


        <div class="row text-center mb-4">
            <div class="d-flex mb-4 justify-content-between">
                <h1>Bejelentéseid</h1>
                <a href="{{route('reports.create')}}" class="btn btn-dark">Bejelentés létrehozása</a>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <table id="dattable" class="display stripe table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Bejelentés azonosító</th>
                            <th>Cím</th>
                            <th>Bejelentés dátuma</th>
                        </tr>
                    </thead>
                    <tbody class="mt-4">
                        @foreach ($reports as $report)
                            <tr role="button" data-route="{{route('reports.edit',$report)}}">
                                <td>{{$report->id}}</td>
                                <td>{{$report->title}}</td>
                                <td>{{$report->created_at}}</td>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection