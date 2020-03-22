@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row text-center d-flex justify-content-center flex-row-reverse">
            @foreach($category as $cat)
                <div class="col-lg-5 bg-white mt-3" style="border-radius: 30px;margin: 0 20px 0 20px">
                    <img src="{{asset('').$cat->img_url}}" class="mx-auto d-block p-2" height="300px" width="300px">
                    <div class="text-center">
                        <strong> {{__('layout.courses')}} {{$cat->name}}</strong>
                        <div class="mt-1">عدد الكتب المتاحة<span> 20 </span></div>
                        <a href="{{route('library.index' , [ 'id' => $cat->pivot->categorie_id])}}" class="btn btn-{{$cat->btn_color}} text-white mt-2 mb-3">عرض الكتب المتاحة</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection