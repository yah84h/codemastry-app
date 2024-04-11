@extends('layouts.base')
@section('content')
   <div class="container">
    <div class="row mt-5">
        <div class="col">
           
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            إضافة مواصفات برنامج
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">مواصفات برنامج</h5>   
                </div>
                <div class="modal-body">
                    
                    <form action="{{route('create_program_details')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">اسم البرنامج</label>
                            <select class="form-select" name="program_id" required>
                                <option selected disabled>اختر</option>
                                @foreach ($programs as $items)
                                <option value="{{$items->id}}">{{$items->program_name}}</option>
                                @endforeach
                            </select>
                            <label class="form-label mt-3">اسم القسم</label>
                            <select class="form-select" name="section_id" required>
                                <option selected disabled>اختر</option>
                                @foreach ($sections as $items)
                                <option value="{{$items->id}}">{{$items->section_name}}</option>
                                @endforeach
                            </select>
                            <label class="form-label mt-3">وصف البرنامج</label>
                            <textarea class="form-control" rows="3" name="description" required></textarea>
                            <label class="form-label mt-3">عدد الدروس</label>
                            <input class="form-control" type="number" name="lesson" required>
                            <label class="form-label mt-3">مدة البرنامج</label>
                            <input class="form-control" type="text" placeholder="مثال: 3h 15m" name="duration" required>
                            <label class="form-label mt-3">سعر البرنامج</label>
                            <input class="form-control" type="text" name="price" required>
                            @error('price')
                                <span class="invalid-feedback" role="alert">{{$message}}</span>
                            @enderror
                            <label class="form-label mt-3">صورة البرنامج</label>
                            <input type="file" class="form-control" name="url_image" id='url_image' required/>
                          </div>
                          <div class=" mt-3">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                          </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    
    <div class="row mt-5">       
            <div class="col">
                <form action="{{route('search_program_details')}}" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control">
                    <button type="submit" class=" form-control btn btn-primary w-auto">بحث</button>
                </form>
            </div>
         
    </div>
    <div class="row">
        <div class="col">
            <form action="{{route('program_details')}}" method="GET">
                @csrf
                <button name="program" type="submit" class=" form-control btn btn-primary w-auto mt-5">عرض الكل</button>
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
                    <table class="table table-bordered text-center align-middle">
                        <thead>
                          <tr>
                                <th class="">#</th>
                                <th class="col-sm-2">اسم البرنامج</th>
                                <th class="col-sm-2">اسم القسم</th>
                                <th class="col-sm-5">وصف البرنامج</th>
                                <th class="col-sm-1">عدد الدروس</th>
                                <th class="col-sm-1">مدة البرنامج</th>
                                <th class="col-sm-1">سعر البرنامج</th>
                                <th class="col-sm-1">صورة البرنامج</th>
                                <td class="fs-4" colspan="2" >خيارات</td>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rowCount = 1;
                            ?>
                            @foreach ($program_details as $items)
                            <tr>
                                <th>{{$loop->index+1}}</th>
                                <td>{{$items->program_name}}</td>
                                <td>{{$items->section_name}}</td>
                                <td>{{$items->description}}</td>
                                <td>{{$items->lesson}}</td>
                                <td>{{$items->duration}}</td>
                                <td>{{$items->price}} ريال</td>
                                <td><img src="{{ asset('storage/images/' . $items->url_image) }}" width="48"/></td>
                                <td><a href="{{route('editprogramsdetails',['id'=>$items->program_details_id])}}"><i class="fa fa-edit text-success" aria-hidden="true"></i></a></td>
                                <td><a href="{{route('del_program_details',['id'=>$items->program_details_id])}}"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
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

