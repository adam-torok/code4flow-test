@extends('layouts.website.app')

@section('content')
<style>
    main{
        height: 100vh;
    }
</style>
<div class="row h-100 d-flex align-items-center justify-content-center col-12">
    <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_kcsr6fcp.json"  background="transparent"  speed="1"  style="width: 100%; height: 300px;"  loop  autoplay></lottie-player>
    <a href="{{route('landing')}}" class="m-0 text-center">Vissza</a>
</div>
@endsection