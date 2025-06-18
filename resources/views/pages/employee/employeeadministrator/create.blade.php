@extends('layouts.master')

@section('page')

<div class="divbi">   
    <a class="buttonbi" href="{{ url('employeeadministrators') }}">
        <span>Back TO List</span>
    </a> 
</div>

<form action="{{ url('employeeadministrators') }}" method="post" class="product-form" enctype="multipart/form-data">
    @csrf

    <label for="employeeSelect">Name</label><br>
    <select name="name" id="employeeSelect">
        <option value="">-- Select Employee --</option>
        @foreach ($employees as $employee)
            @if ($employee->employee_categorie_id == 5)
                <option 
                    value="{{ $employee->name }}"
                    data-employee-id="{{ $employee->id }}"
                    data-categorie-name="{{ $employee->employee_categorie->name ?? '' }}"
                >
                    {{ $employee->name }}
                </option>
            @endif
        @endforeach
    </select> 
    <br><br>

    <label for="employee_id">Employee ID</label><br>
    <input type="text" name="employee_id" id="employee_id" readonly> 
    <br><br>

    <label for="categorie">Category</label><br>
    <input type="text" name="categorie" id="categorie" readonly> 
    <br><br>

    <label for="role">Role</label><br>
    <select name="role" id="role">
        <option value="HR">HR</option>
        <option value="Clerks">Clerks</option>
        <option value="Accountants">Accountants</option>
    </select> 
    <br><br>

    <button type="submit" class="buttonbis" value="save">
        <span>Submit</span>
    </button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const employeeSelect = document.getElementById('employeeSelect');
        const employeeIdInput = document.getElementById('employee_id');
        const categorieInput = document.getElementById('categorie');

        employeeSelect.addEventListener('change', function () {
            const selected = this.options[this.selectedIndex];
            const employeeId = selected.getAttribute('data-employee-id');
            const categoryName = selected.getAttribute('data-categorie-name');

            employeeIdInput.value = employeeId || '';
            categorieInput.value = categoryName || '';
        });
    });
</script>

@endsection
