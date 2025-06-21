@extends('layouts.master')

@section('page')
<style>
    .form-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        max-width: 1200px;
        margin: auto;
        background: white;
        padding: 40px;
        border-radius: 10px;
        border: 1px solid #ccc;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center; /* ✅ corrected */
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

    .submit-btn {
        text-align: center;
        margin-top: 30px;
    }

    .submit-btn button {
        background-color: #2e8b57;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
    }

    .submit-btn button:hover {
        background-color: #256f48;
    }
</style>

<div class="form-container">
    <h2>Employee Salary Details</h2>

    <form action="{{ url('employeedeductions/' . $employeededuction->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="section-title">Salary Components</div>

        <div class="form-row">
            <div class="form-group">
                <label for="employee_categorie_id">Employee Category</label>
                <select name="employee_categorie_id" id="employee_categorie_id" required>
                    <option value="">-- Select Category --</option>
                    @foreach($employee_categories as $employee_categorie)
                        <option value="{{ $employee_categorie->id }}"
                            {{ $employeededuction->employee_categorie_id == $employee_categorie->id ? 'selected' : '' }}>
                            {{ $employee_categorie->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="basic_salary">Basic Salary</label>
                <input type="number" name="basic_salary" id="basic_salary" step="0.01" value="{{ $employeededuction->basic_salary }}" readonly required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="tax">Tax D.</label>
                <input type="number" name="tax" id="tax" value="{{ $employeededuction->tax }}">
            </div>

            <div class="form-group">
                <label for="absence">Absences D.</label>
                <input type="number" name="absence" id="absence" value="{{ $employeededuction->absence }}" step="0.01">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="fine">Fine D.</label>
                <input type="number" name="fine" id="fine" value="{{ $employeededuction->fine }}" step="0.01">
            </div>

            <div class="form-group">
                <label for="education_allowance">Provindent D.</label>
                <input type="number" name="provident_fund" id="provident_fund" value="{{ $employeededuction->provident_fund }}" step="0.01">
            </div>
        </div>

       

     

        <div class="submit-btn">
            <button type="submit">Submit</button>
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
                fetch(`{{ url('get-category-salary') }}/${categoryId}`)
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
