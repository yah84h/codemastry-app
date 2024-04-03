@extends('layouts.base')
@section('content')

<div class="container">
    <h1 class="mt-5 text-center">تعديل بيانات برنامج </h1>
    <div class="card mt-3">
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">اسم البرنامج</label>
                    <input class="form-control" type="text" name="program_name" placeholder="اسم البرنامج" disabled>
                    <label class="form-label mt-3">اسم القسم</label>
                    <select class="form-select" name="section_id">
                        <option selected disabled>اختر</option>
                      
                        <option value=""></option>
                        
                    </select>
                    <label class="form-label mt-3">وصف البرنامج</label>
                    <textarea class="form-control" rows="3" name="description"></textarea>
                    <label class="form-label mt-3">عدد الدروس</label>
                    <input class="form-control" type="number" name="lesson">
                    <label class="form-label mt-3">مدة البرنامج</label>
                    <input class="form-control" type="text" placeholder="مثال: 3h 15m" name="duration">
                    <label class="form-label mt-3">سعر البرنامج</label>
                    <input class="form-control" type="text" name="price">
                    <label class="form-label mt-3">صورة البرنامج</label>
                    <input type="file" class="form-control" name="url_image" id='url_image' />
                  </div>
                  <div class=" mt-3">
                <button type="submit" class="btn btn-primary">حفظ</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                  </div>
            </form>
        </div>
    </div>   
</div>
       
@endsection

