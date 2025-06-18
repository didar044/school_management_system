@extends('layouts.master')
@section('page')
<style>
  
    .form-container {
        max-width: 1000px;
        margin: auto;
        background: white;
        padding: 40px;
        border: 1px solid #000;
        border-radius: 4px;
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

@media print {
        @page {
            size: A4;
            margin: 1cm;
        }

        body * {
            visibility: hidden;
        }

        .form-container, .form-container * {
            visibility: visible;
        }

        .form-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            page-break-inside: avoid;
        }

        .divbi {
            display: none;
        }
    }
</style>
        <div class="divbi">
        <a class="buttonbi" href="{{ url('applications') }}">
            <span>Application List</span>
        </a>
        <button onclick="window.print()" class="buttonbis"><span> Print Page </span></button>
        </div>

<div class="form-container">
    <div class="school-header">
        <div class="school-logo">
            <img src="{{ url('/image/school.png') }}" alt="School Logo" style="height: 150px;">
        </div>
        <div class="school-name">
            <h1>Fatehabad International School</h1>
            <p>123 Education Lane, Cityville, ST 45678</p>
            <p>Email: admin@sunriseschool.edu</p>
        </div>
        <div class="school-slogan">
            "Empowering Young Minds<br>for a Brighter Future"
        </div>
    </div>
    <div>
        <div style="display: flex;align-items: center;justify-content: center; margin-top: -30px;"><h2>Addmition Form</h2></div>
        
     <div class="top-info">
        
        <div class="top-text-info">
            <div class="info-item"><strong>Application ID:</strong> {{ $applications->id }}</div>
            <div class="info-item"><strong>Name:</strong> {{ $applications->name }}</div>
            <div class="info-item"><strong>Father's Name:</strong> {{ $applications->father_name }}</div>
            <div class="info-item"><strong>Mother's Name:</strong> {{ $applications->mother_name }}</div>
        </div>
        <div class="info-photo">
            <img src='{{ url("/image/appplication_img/$applications->photo") }}' alt="Student Photo">
        </div>
     </div>
   </div>


    <div class="info-grid">
        <div class="info-item"><strong>Mobile:</strong> {{ $applications->mobile_number }}</div>
        <div class="info-item"><strong>Email:</strong> {{ $applications->email }}</div>
        <div class="info-item"><strong>Address:</strong> {{ $applications->address }}</div>
        <div class="info-item"><strong>Date of Form:</strong> {{ $applications->dof }}</div>
        <div class="info-item"><strong>Date of Birth:</strong> {{ $applications->dob_reg }}</div>
        <div class="info-item"><strong>Blood Group:</strong> {{ $applications->blood_group }}</div>
        <div class="info-item"><strong>Religion:</strong> {{ $applications->religion }}</div>
        <div class="info-item"><strong>Gender:</strong> {{ $applications->gender }}</div>
        <div class="info-item"><strong>Class:</strong> {{ $applications->classe->name }}</div>
        <div class="info-item"><strong>Shift:</strong> {{ $applications->shift->name }}</div>
        <div class="info-item"><strong>Section:</strong> {{ $applications->section->name }}</div>
        <div class="info-item"><strong>Application Date:</strong> {{ $applications->date }}</div>
        <div class="info-item"><strong>Session:</strong> {{ $applications->session }}</div>
    </div>

    <!-- Signature Section -->
    <div class="signature-section">
        <div class="signature-box">Student's Signature</div>
        <div class="signature-box">Guardian's Signature</div>
        <div class="signature-box">Principal's Signature</div>
    </div>
</div>






@endsection