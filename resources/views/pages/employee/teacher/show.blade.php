@extends('layouts.master')
@section('page')
<style>
  
    .form-container {
        max-width: 1000px;
        margin: auto;
        background: white;
        padding: 20px;
        border: 1px solid #000;
        border-radius: 4px;
        
    }

    .school-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid #000;
        padding-bottom: 15px;
        margin-bottom: 30px;
        margin-top: -20px;
    }

    .school-logo img {
        height: 80px;
    }

    .school-name {
        text-align: center;
        flex-grow: 1;
    }

    .school-name h1 {
        margin: 0;
        font-size: 24px;
        color: #000; /* Original black color */
        font-weight: bold;
    }

    .school-name p {
        margin: 4px 0;
        font-size: 14px;
        color: #000; /* Original black color */
    }

    .school-slogan {
        text-align: right;
        font-style: italic;
        font-size: 13px;
        color: #000; /* Original black color */
        max-width: 150px;
    }

    .top-info {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .top-text-info {
        flex: 1;
        
    }

    .top-text-info .info-item {
        margin-bottom: 10px;
        font-size: 14px;
        width: 400px;
    }

    .top-text-info .info-item strong {
        font-weight: 600;
        display: inline-block;
        width: 140px;
    }

    .info-photo {
        margin-left: 20px;
    }

    .info-photo img {
        width: 200px;
        height: 200px;
        border-radius: 4px;
        border: 1px solid #000;
        object-fit: cover;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }

    .info-item {
        background: #fff;
        padding: 10px 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .info-item strong {
        color: #000;
        display: block;
        margin-bottom: 4px;
        font-weight: 600;
    }

    
    .signature-section {
        margin-top: 50px;
        display: flex;
        justify-content: space-between;
        font-size: 14px;
    }

    .signature-box {
        width: 30%;
        border-top: 1px solid #000;
        text-align: center;
        padding-top: 10px;
    }
</style>
        <div class="divbi">
        <a class="buttonbi" href="{{ url('teachers') }}">
            <span>teachers List</span>
        </a>
        <button onclick="window.print()" class="buttonbis"><span> Print Page </span></button>
        </div>

<div class="form-container">
    <div class="school-header">
        <div class="school-logo">
        <img src="{{ asset('image/school.png') }}" alt="School Logo" style="height: 150px;">
        </div>
        <div class="school-name">
            <h1>Sunrise Model School</h1>
            <p>123 Education Road, Knowledge City, 45678</p>
        </div>
        <div class="school-slogan">
            "Empowering Young Minds<br>for a Brighter Future"
        </div>
    </div>
    <div>
        <div style="display: flex;align-items: center;justify-content: center; margin-top: -30px;"><h2>Teachers Details</h2></div>
        
     <div class="top-info">
        
        <div class="top-text-info">
            <div class="info-item"><strong>Application ID:</strong> {{ $teachers->id }}</div>
            <div class="info-item"><strong>Name:</strong> {{ $teachers->name }}</div>
            <div class="info-item"><strong>Father's Name:</strong> {{ $teachers->father_name }}</div>
            <div class="info-item"><strong>Mother's Name:</strong> {{ $teachers->mother_name }}</div>
        </div>
        <div class="info-photo">
            <img src='{{ url("/image/employee_img/$teachers->photo") }}' alt="Student Photo">
        </div>
     </div>
   </div>


    <div class="info-grid">
        <div class="info-item"><strong>Mobile:</strong> {{ $teachers->phone_number }}</div>
        <div class="info-item"><strong>Email:</strong> {{ $teachers->email }}</div>
        <div class="info-item"><strong>Address:</strong> {{ $teachers->address }}</div>
        <div class="info-item"><strong>Joining Date:</strong> {{ $teachers->joining_date }}</div>
        <div class="info-item"><strong>Date of Birth:</strong> {{ $teachers->dob }}</div>
        <div class="info-item"><strong>Blood Group:</strong> {{ $teachers->blood_group }}</div>
        <div class="info-item"><strong>NID:</strong> {{ $teachers->nid }}</div>
        <div class="info-item"><strong>Gender:</strong> {{ $teachers->gender }}</div>
        <div class="info-item"><strong>Position</strong> {{ $teachers->employee_categorie->name }}</div>
        <div class="info-item"><strong>Teacher Shift:</strong> {{ $teachers->employeeshift->name }}</div>
        
       
    </div>
    <div> <br>
    <div class="info-item"><strong>Education Qualification</strong> {{ $teachers->qualification }}</div>
    </div>

    <!-- Signature Section -->
    <div class="signature-section">
        
        <div class="signature-box">Principal's Signature</div>
    </div>
</div>






@endsection