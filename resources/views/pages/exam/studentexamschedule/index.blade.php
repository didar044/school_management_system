@extends('layouts.master')
@section('page')

<style>



.filter-form-container form {
  display: flex;
  flex-wrap: wrap;
  gap: 15px 20px;
  align-items: center;
  justify-content: flex-start;
}

.filter-form-container label,
.filter-form-container select,
.filter-form-container input[type="number"],
.filter-form-container button {
  margin: 0;
  padding: 8px 10px;
  font-size: 14px;
  font-family: inherit;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.filter-form-container label {
  flex: 0 0 auto;
  white-space: nowrap;
  font-weight: 600;
  color: #2e8b57;
  margin-right: 5px;
}

.filter-form-container select,
.filter-form-container input[type="number"] {
  flex: 1 1 150px;
  border: 1px solid #ccc;
}




@media (max-width: 600px) {
  .filter-form-container form {
    flex-direction: column;
    align-items: stretch;
  }

  .filter-form-container label,
  .filter-form-container select,
  .filter-form-container input[type="number"],
  .filter-form-container button {
    flex: none;
    width: 100%;
    margin-bottom: 10px;
  }

  .filter-form-container label {
    margin-bottom: 4px;
  }
}


.filter-form-container button.buttonc {
  background-color: #2e8b57;
  border: none;
  padding: 10px 25px;
  font-weight: 600;

}



</style>
<div class="divbi">
   <span style="color: white;background-color: green; font-size: 1.8em; font-weight: bold; padding: 2px 4px; border: 1px solid green; border-radius: 5px;">Exam Schedule Information</span>
   <!-- Don't place <button> inside <a>, use only one. Here, use <a> styled like a button -->
    <a class="buttonbi" href="{{ url('studentexamschedules/create') }}">
        <span>Add Exam Schedule</span>
    </a>
</div>

<div class="filter-form-container">
  <form method="GET" action="{{ route('studentexamschedules.index') }}">
    <label for="classe_id">Class</label>
    <select name="classe_id" id="classe_id" required>
      @foreach ($classes as $classe)
        <option value="{{ $classe->id }}">{{ $classe->name }}</option>
      @endforeach
    </select>
    <label for="student_exam_type_id">Exam Type</label>
    <select name="student_exam_type_id" id="student_exam_type_id" required>
      @foreach ($studentexamtypes as $studentexamtype)
        <option value="{{ $studentexamtype->id }}">{{ $studentexamtype->name }}</option>
      @endforeach
    </select>

    <label for="exam_year">Exam Year</label>
    <input type="number" name="exam_year" id="exam_year" min="2000" max="2099" required>

    

    <button type="submit" class="buttonc"><i>Filter</i></button>
  </form>
</div>

<table>
    <tr>
             <th>ID</th>
            <th>Exam Type</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Room</th>
            <th>Exam Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Shift</th>
            <th>Section</th>
            <th>Exam Year</th>
        <th>Acttion</th>
    </tr>
    @forelse($studentexamschedules as $studentexamschedule)
    <tr>
            <td>{{ $studentexamschedule->id }}</td>
            <td>{{ $studentexamschedule->studentexamtype->name ?? 'N/A' }}</td>
            <td>{{ $studentexamschedule->classe->name }}</td> {{-- You can join to get name --}}
            <td>{{ $studentexamschedule->subject->name }}</td>
            <td>{{ $studentexamschedule->room_id }}</td>
            <td>{{ $studentexamschedule->exam_date }}</td>
            <td>{{ $studentexamschedule->start_time }}</td>
            <td>{{ $studentexamschedule->end_time }}</td>
            <td>{{ $studentexamschedule->shift->name }}</td>
            <td>{{ $studentexamschedule->section->name }}</td>
            <td>{{ $studentexamschedule->exam_year }}</td>
        <td>
            <div class="divc">
               <a href='{{url("studentexamschedules/$studentexamschedule->id/edit")}}'> <button class="buttonc"><i class='bx bx-edit'></i></button></a>
                <!-- <a href='{{url("studentexamschedules/$studentexamschedule->id")}}'><button class="buttonc"><i class="bi bi-eye-fill"></i></button></a> -->

                <form action="{{route('studentexamschedules.destroy',$studentexamschedule->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                  <button class="buttonc"><i class='bx bxs-trash'></i></button>
                </form> 
                 
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="12">No studentexamschedules available.</td>
    </tr>
    @endforelse
</table>
<div style="margin-top:10px;">
{{ $studentexamschedules ->links('pagination::bootstrap-5') }}
</div>

@endsection