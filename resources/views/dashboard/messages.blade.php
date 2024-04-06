@extends('layouts.base')
@section('content')
   <div class="container">
    <div class="row mt-5">
        <div class="row mt-5">       
            <div class="col">
                <form action="{{route('search-messages')}}" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control">
                    <button name="" type="submit" class=" form-control btn btn-primary w-auto">بحث</button>
                </form>
            </div>
         
    </div>
    <div class="row">
        <div class="col">
            <form action="{{route('messages')}}" method="GET">
                @csrf
                <button name="messages" type="submit" class=" form-control btn btn-primary w-auto mt-5">عرض الكل</button>
            </form>
        </div>
    </div>

    <div class="row">    
        <div class="col">
            <div class="card">
                <div class=" card-header text-center">
                    <h1 class="title">جدول رسائل الزوار</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>عنوان الرسالة</th>
                            <th>نص الرسالة</th>
                            <th>اسم المرسل</th>
                            <th>البريد الالكتروني</th>
                            <th>حذف</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $items)
                            <tr>
                              <th>{{$items->id}}</th>
                              <td>{{$items->msg_title}}</td>
                              <td>{{$items->msg_content}}</td>
                              <td>{{$items->sender_name}}</td>
                              <td>{{$items->sender_email}}</td>
                             
                              <td><a href="{{route('del_messages',['id'=>$items['id']])}}"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
                            </tr>
                            @endforeach
                          <tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection
