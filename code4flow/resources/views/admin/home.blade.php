@extends('adminlte::page')

@section('title', 'Kezdőlap')

@section('content_header')
<h1>Üdvözlünk</h1>
@stop

@section('content')

<div class="row">

    @if(count($newUsers) > 0)
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
                        <a class="users-list-name"
                            href="{{route('admin:users.show',$user->id)}}">{{$user->getName()}}</a>
                        <span class="users-list-date">{{$user->getRegistrationDate()}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    @if(count($newPoems) > 0)

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Legújabb versek</h3>
                <br>
                <small class="text-muted">Új vers az, ami kevesebb mint 10 napja napja adtak hozzá</small>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="users-list clearfix">
                    @foreach ($newPoems as $poem)
                    <li class="item">
                        <div class="product-info ml-2">
                            <a href="{{route('admin:poems.edit',$poem->id)}}" class="product-title ml-0">
                                {{$poem->title}}
                            </a>
                            {!!$poem->getStatusTemplated()!!}
                            <span class="product-description">
                                {{$poem->user->getName()}}
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @endif
</div>

<div class="row">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{count($reports)}}</h3>

                <p>Bejelentések száma</p>
            </div>
            <a href="#" class="small-box-footer">Több információ <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{count($poems)}}</h3>

                <p>Versek száma</p>
            </div>
            <a href="#" class="small-box-footer">Több információ <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{count($users)}}</h3>

                <p>Regisztrált felhasználó</p>
            </div>
            <a href="#" class="small-box-footer">Több információ <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop