@extends('layouts.base')
@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <form method="post" action="{{route('update-sections')}}">
                @csrf
                    <div class="row mt-3">
                        <input type="hidden" name="id" value="{{$sections['id']}}">
                        <div class="col">
                            <label class="form-label">اسم التصنيف</label>
                            <input type="text" name="section_name" class="form-control" value="{{$sections['section_name']}}">
                        </div>
                      
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button class="btn btn-primary" type="submit">حفظ التعديل</button>
                        </div>
                    </div>                  
            </form>
        </div>
    </div>   
</div>
       
@endsection

