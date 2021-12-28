@section('plugins.Datatables', true)

@extends('adminlte::page')
@section('title', 'Versek')

@section('content_header')
<h1>Versek kezelése</h1>
@stop

@section('content')
@if(count($newPoems) > 0)
<div class="row">
    <div class="col-md-12">
        <div class="card card-collapsed collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Új versek</h3>
                <br>
                <small class="text-muted">Új vers az, amit kevesebb mint 10 napja adtak hozzá</small>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0" style="display: block;">
                <ul class="products-list product-list-in-card pl-2 pr-2">
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
</div>
@endif
<div class="row col">
    <div class="card col-12 p-md-4">
        <div class="table-responsive">
            <table id="table" class="table mb-0 table-hover">
                <thead>
                    <tr>
                        <th>Azonosító</th>
                        <th>Vers címe</th>
                        <th>Kategória</th>
                        <th>Státusz</th>
                        <th>Létrehozó</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($poems as $poem)
                    <tr data-route="{{route('admin:poems.edit', $poem)}}" style="cursor: pointer;">
                        <td>
                            {{$poem->id}}
                        </td>
                        <td>
                            {{$poem->title}}
                        </td>
                        <td>
                            {{$poem->category->name}}
                        </td>
                        <td>
                            {!!$poem->getStatusTemplated()!!}
                        </td>
                        <td>
                            {{$poem->user->getName()}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop