@extends('layouts.master')

@section('page')

<div class="divbi">   
    <a class="buttonbi" href="{{ url('employeeadministrators') }}">
        <span>Class List</span>
    </a> 
</div>

<form action="{{ url('employeeadministrators/' . $employeeadministrators->id) }}" method="post" class="product-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="employeeSelect">Name</label><br>
    <select name="name" id="employeeSelect">
        <option value="">-- Select Employee --</option>
        @foreach ($employees as $employee)
            @if ($employee->employee_categorie_id == 5)
                <option 
                    value="{{ $employee->name }}"
                    data-employee-id="{{ $employee->id }}"
                    data-categorie-name="{{ $employee->employee_categorie->name ?? '' }}"
                    {{ $employee->name == $employeeadministrators->name ? 'selected' : '' }}
                >
                    {{ $employee->name }}
                </option>
            @endif
        @endforeach
    </select> 
    <br><br>

    <label for="employee_id">Employee ID</label><br>
    <input type="text" name="employee_id" id="employee_id" value="{{ $employeeadministrators->employee_id }}" readonly> 
    <br><br>

    <label for="categorie">Category</label><br>
    <input type="text" name="categorie" id="categorie" value="{{ $employeeadministrators->employee_categorie }}" readonly> 
    <br><br>

    <label for="role">Role</label><br>
    <select name="role" id="role">
        <option value="">-- Select Role --</option>
        <option value="HR" {{ $employeeadministrators->role == 'HR' ? 'selected' : '' }}>HR</option>
        <option value="Clerks" {{ $employeeadministrators->role == 'Clerks' ? 'selected' : '' }}>Clerks</option>
        <option value="Accountants" {{ $employeeadministrators->role == 'Accountants' ? 'selected' : '' }}>Accountants</option>
    </select> 
    <br><br>

    <button type="submit" class="buttonbis">
        <span>Update</span>
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
