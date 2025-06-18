@extends('layouts.master')
@section('page')

<style>
   
    .form-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        max-width: 1000px;
        margin: auto;
        background: white;
        padding: 40px;
        border-radius: 10px;
        border: 1px solid #ccc;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        font-size: 24px;
        color: #2e8b57;
        margin-bottom: 40px;
    }

    .section-title {
        font-size: 18px;
        font-weight: bold;
        padding: 10px 15px;
        margin-bottom: 20px;
        background-color: #e0f7e9;
        border-left: 5px solid #2e8b57;
        color: #2e8b57;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        flex: 1 1 45%;
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
    }

    input,
    select,
    textarea {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    textarea {
        resize: vertical;
        min-height: 60px;
    }

 
</style>

<div class="divbi">   
<a class="buttonbi" href="{{ url('expenses') }}"><span>Back To List</span></a> 
</div>


<div class="form-container">
    <h2>Class Fee Submission Form</h2>
    
    <div class="section-title">Edit Information</div>

    <form action="{{ url('expenses/'.$expenses->id) }}"enctype="multipart/form-data" method="POST"> 
          
        @csrf
        @method("PUT")
        <div class="form-row">
            <div class="form-group">
                <label for="class_id">Class</label>

                <select name="class_id" id="">
                    @foreach($classes as $class)
                     <option value="{{$class->id}}"{{$expenses->classe_id ==$class->id ?'selected':'' }}>{{$class->name}}</option>
                     @endforeach
                </select>
                
            </div>

            <div class="form-group">
                <label for="admission_fee" >Admission Fee</label>
                <input type="number" name="admission_fee" min="0"  value="{{$expenses->admission_fee}}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="monthly_fee">Monthly Fee</label>
                <input type="number" name="monthly_fee" min="0" value="{{$expenses->monthly_fee}}">
            </div>

            <div class="form-group">
                <label for="uniform_fee">Uniform Fee</label>
                <input type="number" name="uniform_fee" min="0" value="{{$expenses->uniform_fee}}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="books_fee">Books Fee</label>
                <input type="number" name="books_fee" min="0" value="{{$expenses->books_fee}}">
            </div>

            <div class="form-group">
                <label for="exam_fee">Exam Fee</label>
                <input type="number" name="exam_fee" min="0" value="{{$expenses->exam_fee}}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="library_fee">Library Fee</label>
                <input type="number" name="library_fee" min="0" value="{{$expenses->library_fee}}">
            </div>

            <div class="form-group">
                <label for="lab_fee">Lab Fee</label>
                <input type="number" name="lab_fee" min="0" value="{{$expenses->lab_fee}}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="id_card_fee">ID Card Fee</label>
                <input type="number" name="id_card_fee" min="0" value="{{$expenses->id_card_fee}}">
            </div>

            <div class="form-group">
                <label for="development_fee">Development Fee</label>
                <input type="number" name="development_fee" min="0" value="{{$expenses->development_fee}}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="sports_fee">Sports Fee</label>
                <input type="number" name="sports_fee" min="0" value="{{$expenses->sports_fee}}">
            </div>

            <div class="form-group">
                <label for="art_craft_fee">Art & Craft Fee</label>
                <input type="number" name="art_craft_fee" min="0" value="{{$expenses->art_craft_fee}}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="report_card_fee">Report Card Fee</label>
                <input type="number" name="report_card_fee" min="0" value="{{$expenses->report_card_fee}}">
            </div>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button class="buttonbis" type="submit" value="save"> <span>Submit</span></button>
        </div>
    </form>
</div>

@endsection