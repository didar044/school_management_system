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
        margin: 30px 0 20px;
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

    input[type="submit"] {
        background-color: #2e8b57;
        color: white;
        border: none;
        padding: 12px 25px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
    }

    input[type="submit"]:hover {
        background-color: #256d46;
    }
</style>

<div class="divbi">   
<a class="buttonbi"  href="{{ url('employees') }}"><span>Back To List</span></a> 
</div>


<div class="form-container">
  <form action="{{ route('employees.update', $employees->id) }}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <h2>Teacher Information Update</h2>

    <div class="section-title">Academic Information</div>

    <div class="form-row">
      <div class="form-group">
        <label for="employeeshift_id">Employeeshift :</label>
         <select type="text" name="employeeshift_id">
            @foreach($employeeshifts as $employeeshift)
            <option value="{{$employeeshift->id}}" {{$employees->employeeshift_id==$employeeshift->id ? 'selected':'' }}>{{$employeeshift->name}}</option>
            @endforeach
        </select>        
      </div>
      <div class="form-group">
        <label for="employee_categorie_id">Employee Category:</label>
        <select type="text" name="employee_categorie_id">
            @foreach($categories as $categorie)
            <option value="{{$categorie->id}}" {{$employees->employee_categorie_id==$categorie->id ? 'selected':'' }}>{{$categorie->name}}</option>
            @endforeach
        </select>  
        
      </div>
      <div class="form-group">
      <label for="joining_date">Joining Date:</label>
  <input type="date" name="joining_date" value="{{ $employees->joining_date }}" required>
</div>
</div>

<div class="section-title">Personal Information</div>

<div class="form-row">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $employees->name }}">
  </div>
  <div class="form-group">
    <label for="father_name">Father's Name:</label>
    <input type="text" name="father_name" value="{{ $employees->father_name }}">
  </div>
  <div class="form-group">
    <label for="mother_name">Mother's Name:</label>
    <input type="text" name="mother_name" value="{{ $employees->mother_name }}">
  </div>
  <div class="form-group">
    <label for="nid">NID:</label>
    <input type="text" name="nid" value="{{ $employees->nid }}">
  </div>
  <div class="form-group">
    <label for="gender">Gender:</label>
    <select name="gender">
      <option value="">Select</option>
      <option value="Male" {{ $employees->gender == 'Male' ? 'selected' : '' }}>Male</option>
      <option value="Female" {{ $employees->gender == 'Female' ? 'selected' : '' }}>Female</option>
      <option value="Other" {{ $employees->gender == 'Other' ? 'selected' : '' }}>Other</option>
    </select>
  </div>
  <div class="form-group">
    <label for="dob">Date of Birth:</label>
    <input type="date" name="dob" value="{{ $employees->dob }}">
  </div>
  <div class="form-group">
    <label for="photo">Photo:</label>
     <!-- Optionally show current photo -->
     @if($employees->photo)
      <img src="{{ asset('image/employee_img/' . $employees->photo) }}" width="100" alt="Employee Photo">
     @endif
    <input type="file" name="photo">
   
  </div>
  <div class="form-group" style="flex: 1 1 100%;">
    <label for="qualification">Qualification:</label>
    <textarea name="qualification">{{ $employees->qualification }}</textarea>
  </div>
</div>

<div class="section-title">Contact Information</div>

<div class="form-row">
  <div class="form-group">
    <label for="phone_number">Phone Number:</label>
    <input type="text" name="phone_number" value="{{ $employees->phone_number }}">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $employees->email }}">
  </div>
  <div class="form-group" style="flex: 1 1 100%;">
    <label for="address">Address:</label>
    <textarea name="address">{{ $employees->address }}</textarea>
  </div>
</div>

    <button type="submit" class="buttonbis" value="save"><span>Update</span></button>
  </form>
</div>
@endsection
