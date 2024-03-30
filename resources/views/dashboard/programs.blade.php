@extends('layouts.base')
@section('content')
   <div class="container">
    <div class="row mt-5">
        <div class="col">
           
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            إضافة برنامج جديد
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">برنامج جديد</h5>   
                </div>
                <div class="modal-body">
                    <form action="{{route('create-programs')}}" method="POST">
                        @csrf
                        <input type="text" class=" form-control form-text mb-3" name="program_name">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="row">
                <div class="col">
                    <form action="{{route('search-programs')}}" method="POST">
                        @csrf
                        <input type="text" name="name" class="form-control">
                        <button name="" type="submit" class=" form-control btn btn-primary w-auto">بحث</button>
                    </form>
                </div>
            </div>  
                    <form action="{{route('programs')}}" method="GET">
                        <button name="programe" type="submit" class=" form-control btn btn-primary w-auto mt-5">عرض الكل</button>
                    </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class=" card-header text-center">
                    <h1 class="title">جدول البرامج التدريبية</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>اسم البرنامج</th>
                            <td class="fs-4" colspan="2" >خيارات</td>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($programs as $items)
                            <tr>
                              <th>{{$items->id}}</th>
                              <td>{{$items->program_name}}</td>
                              <td><a href="{{route('edit',['id'=>$items['id']])}}"><i class="fa fa-edit text-success" aria-hidden="true"></i></a></td>
                              <td><a href="{{route('del',['id'=>$items['id']])}}"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
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

