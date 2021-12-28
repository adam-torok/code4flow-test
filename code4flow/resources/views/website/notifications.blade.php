@extends('layouts.website.app')
@push('styles')
<style>
    .dropdown-list-image {
        position: relative;
        height: 2.5rem;
        width: 2.5rem;
    }

    .dropdown-list-image img {
        height: 2.5rem;
        width: 2.5rem;
    }
</style>
@endpush
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="box shadow-sm rounded bg-white mb-3">
                <div class="box-title border-bottom d-flex justify-content-between align-items-center p-3">
                    <h6 class="m-0">Értesítéseid</h6>
                    @if(count($notifications) > 0)
                    <a class="text-black float-left ml-auto" href="{{route('notifications.delete')}}">Összes törlése</a>
                    @endif
                </div>
                <div class="box-body p-0">
                    @if(count($notifications) > 0)
                    @foreach($notifications as $notification)
                    @if($notification->type === 'App\Notifications\PoemStatusChange')
                    <div class="p-3 d-flex align-items-center border-bottom">
                        <div class="font-weight-bold mr-3">
                            <div>
                                <b>Verseid - állapotváltozás</b>
                                <a
                                    href="{{route('user-poems.edit',$notification->data['id'])}}">{{$notification->data['title']}}</a>
                                című költeményed új állapota:
                                @if($notification->data['status'] === 'APPROVED')
                                <b>ELFOGADVA</b>
                                <i class="fa fa-check-circle text-success"></i>
                                @elseif($notification->data['status'] === 'DECLINED')
                                <b>ELUTASITVA</b>
                                <i class="fa fa-times text-danger"></i>
                                @else
                                <b>VÁRAKOZIK</b>
                                <i class="fa fa-times text-warning"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($notification->type === 'App\Notifications\ReportStatusChange')
                    <div class="p-3 d-flex align-items-center border-bottom">
                        <div class="font-weight-bold mr-3 ">
                            <div>
                                <span class="font-weight-normal">
                                    <b>Hibajelentés - állapotváltozás</b>
                                    <a
                                        href="{{route('reports.edit',$notification->data['id'])}}">{{$notification->data['title']}}</a>
                                    című jelentésed új állapota:
                                    @if($notification->data['status'] === 'RESOLVED')
                                    <b>MEGODLVA</b>
                                    <i class="fa fa-check-circle text-success"></i>
                                    @elseif($notification->data['status'] === 'DECLINED')
                                    <b>ELUTASITVA</b>
                                    <i class="fa fa-times text-danger"></i>
                                    @else
                                    <b>VÁRAKOZIK</b>
                                    <i class="fa fa-times text-warning"></i>
                                    @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection