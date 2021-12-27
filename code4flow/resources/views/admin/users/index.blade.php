@section('plugins.Datatables', true)

@extends('adminlte::page')
@section('title', 'Felhasználók')

@section('content_header')
<h1>Felhasználók kezelése</h1>
@stop

@section('content')
@if(count($newUsers) > 0)
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Legújabb tagok</h3>
                <br>
                <small class="text-muted">Új tag az, aki kevesebb mint 10 napja regisztrált</small>
                <div class="card-tools">
                    <span class="badge badge-danger">{{count($newUsers)}} új tag</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="users-list clearfix">
                    @foreach ($newUsers as $user)
                    <li>
                        <a class="users-list-name" href="{{route('admin:users.show',$user->id)}}">{{$user->getName()}}</a>
                        <span class="users-list-date">{{$user->getRegistrationDate()}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="card col-12 p-md-4">
        <div class="table-responsive">
            <table id="table" class="table mb-0 table-hover">
                <thead>
                    <tr>
                        <th>Azonosító</th>
                        <th>Regisztráció dátuma</th>
                        <th>Név</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr data-route="{{route('admin:users.show', $user)}}" style="cursor: pointer;">
                        <td>
                            {{$user->id}}
                        </td>
                        <td>{{$user->created_at->format('Y-m-d H:i')}}</td>
                        <td>
                            <div>
                                <strong>{{$user->first_name}} {{$user->second_name}}</strong>
                            </div>
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if(count($users) > 10)
        <div class="card-footer d-flex justify-content-center">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>
@stop

@push('js')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script>
    $(document).ready(function() {
            $('#table').dataTable();
        } );

        $(function () {
            $('tr[data-route]').on('click', function (e) {

                if ($(e.target).is('input') || $(e.target).is('label') || $(e.target).hasClass('btn')) {
                    return;
                }

                window.location = $(this).data('route');
            });
        });
</script>
@endpush