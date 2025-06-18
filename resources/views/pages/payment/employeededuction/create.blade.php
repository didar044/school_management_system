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
        number-align: center;
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
    numberarea {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    numberarea {
        resize: vertical;
        min-height: 60px;
    }

 
</style>

<div class="divbi">   
<a class="buttonbi" href="{{ url('employeedeductions') }}"><span>Back To List</span></a> 
</div>

<div class="form-container">
    <h2 style="text-align:center">Employee Deduction Details</h2>

    <form action="{{ route('employeedeductions.store') }}" method="POST">
        @csrf

        <div class="section-title" style="text-align:center">Deduction Components</div>

        <div class="form-row">
            <div class="form-group">
                <label for="employee_categorie_id">Employee Category</label>
                <select name="employee_categorie_id" id="employee_categorie_id" required>
                    <option value="">-- Select Category --</option>
                    @foreach($employee_categories as $employee_categorie)
                        <option value="{{ $employee_categorie->id }}">{{ $employee_categorie->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="basic_salary">Basic Salary</label>
                <input type="number" name="basic_salary" id="basic_salary" step="0.01" readonly required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="tax">Tax Deducation</label>
                <input type="number" name="tax" id="tax" step="0.01">
            </div>

            <div class="form-group">
                <label for="absence">Absence Deducation</label>
                <input type="number" name="absence" id="absence" step="0.01">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="fine">Fine Deducation</label>
                <input type="number" name="fine" id="fine" step="0.01">
            </div>

            <div class="form-group">
                <label for="provident_fund">Provident Fund Deducation</label>
                <input type="number" name="provident_fund" id="provident_fund" step="0.01">
            </div>
        </div>

      

        
       

        <div style="number-align:center; margin-top: 30px;">
           <button type="submit" class="buttonbis" value="save"><span>Submit</span></button>
        </div>
    </form>
</div>
 <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categorySelect = document.getElementById('employee_categorie_id');
            const salaryInput = document.getElementById('basic_salary');

            categorySelect.addEventListener('change', function () {
                const categoryId = this.value;

                if (categoryId) {
                    fetch(`/get-category-salary/${categoryId}`)
                        .then(response => response.json())
                        .then(data => {
                            salaryInput.value = data.salary || 0;
                        })
                        .catch(error => {
                            console.error('Error fetching salary:', error);
                            salaryInput.value = 0;
                        });
                } else {
                    salaryInput.value = 0;
                }
            });
        });

</script> 
@endsection