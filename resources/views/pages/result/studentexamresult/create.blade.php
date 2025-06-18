@extends('layouts.master')
@section('page')
<style>
    .hidden { display: none; }
    .invoice-box {
        background-color: #fff;
        padding: 20px;
        max-width: 1400px;
        margin: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #2e8b57;
        margin-bottom: 5px;
    }

    .subtitle {
        text-align: center;
        margin: 0 0 30px 0;
        font-size: 16px;
        color: #666;
    }

    .invoice-details {
        width: 100%;
        margin-bottom: 30px;
        display: flex;
        flex-wrap: wrap;
        gap: 0px 20px;
    }

    .field-group {
        flex: 1 1 45%;
        min-width: 250px;
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        
    }

    .invoice-details label {
        font-weight: 600;
        width: 200px;
    }

    .invoice-details input ,select {
        flex: 1;
        border: 1px solid #cecccc;
        padding: 4px 8px;
        font-size: 14px;
        font-weight: 600;
        color: #333;
        border-radius: 5px;
    }

    .salary-breakdown {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 40px;
    }

    .salary-breakdown th {
        height: 50px;
        background-color: #e0f7e9;
        color: #2e8b57;
        text-align: center;
    }

    .salary-breakdown td {
        border: 1px solid #ccc;
        padding: 4px;
        font-size: 14px;
        text-align: center;
        vertical-align: middle;
    }
   
    .salary-breakdown input {
        border: none;
        background: transparent;
        width: 100%;
        text-align: center;
        height: 35px;
    }

    .signatures {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
       
    }

 

    .buttonbi {
        margin: 10px;  
    }

    .buttonbi.active {
        background-color: #003366;
    }

    .text-end {
        text-align: end;
    }
</style>

<div class="divbi">
    <a class="buttonbis" href="{{ url('studentexamresults') }}"><span>Back To List</span></a>
</div>

<div class="text-center">
    @foreach($studentexamtypes as $examType)
        <button class="buttonbi {{ $loop->first ? 'active' : '' }}" onclick="showForm('exam_{{ $examType->id }}')">
            <i>{{ $examType->name }}</i>
        </button>
    @endforeach
</div>

@foreach($studentexamtypes as $examType)
    <div id="exam_{{ $examType->id }}" class="invoice-box {{ $loop->first ? '' : 'hidden' }}">
        <h2>Student Exam Mark Entry - {{ $examType->name }}</h2>
        <p class="subtitle">Fill in student details and subject-wise marks</p>

        <form action="{{ url('studentexamresults') }}" method="POST">
            @csrf
                 @php
                    // Prepare a student lookup map for JS
                    $studentMap = [];
                    foreach ($students as $student) {
                        $studentMap[$student->id] = $student->name;
                    }
                @endphp
                 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


            <div class="invoice-details">
               <div class="field-group">
                    <label>Student Name</label>
                    <select name="student_name" id="student_name" required>
                        <option value="">-- Select --</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field-group">
                    <label>Student ID</label>
                    <input type="text" name="student_id" id="student_id" required>
                </div>
                <div class="field-group">
                    <label>Exam Type</label>
                    <input type="hidden" name="student_exam_type_id" value="{{ $examType->id }}">
                            <p style="flex: 1; border: 1px solid #cecccc; padding: 4px 8px; font-size: 14px; font-weight: 600; color: #333; border-radius: 5px; height: 33px; line-height: 25px; display: flex; align-items: center;">
                                {{ $examType->name }}
                            </p>
                </div>
                <div class="field-group">
                    <label>Exam Year</label>
                    <input type="text" name="exam_year" required>
                </div>
            </div>

            <div class="invoice-details">
                <div class="field-group">
                    <label>Total Marks</label>
                    <input type="number" step="0.01" name="total_marks" readonly>
                </div>
                <div class="field-group">
                    <label>Average</label>
                    <input type="number" step="0.01" name="average_marks" readonly>
                </div>
                <div class="field-group">
                    <label>GPA</label>
                    <input type="number" step="0.01" name="gpa" readonly>
                </div>
                <div class="field-group">
                    <label>Grade</label>
                    <input type="text" name="grade" readonly>
                </div>
                <div class="field-group" style="flex: 1 1 100%;">
                    <label>Remark</label>
                    <input type="text" name="remark" style="width: 100%;" required>
                </div>
            </div>

            <h2 style="text-align: center;">Subject-wise Marks Table</h2>
            <table class="salary-breakdown">
                <thead>
                    <tr>
                        <th>Subject Name</th>
                        @if($examType->id == 1 || $examType->id == 3)
                            <th>Marks</th>
                        @else
                            <th>Written</th>
                            <th>MCQ</th>
                            <th>Total Marks</th>
                        @endif
                        <th>GPA</th>
                        <th>Grade</th>
                        <th>Remark</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $index => $subject)
                        <tr>
                            <td>
                                <input type="hidden" name="subjects[{{ $index }}][subject_id]" value="{{ $subject->id }}">
                                <input type="text" value="{{ $subject->name }}" readonly>
                                
                                 
                            </td>
                            @if($examType->id == 1 || $examType->id == 3)
                                <td><input type="number" name="subjects[{{ $index }}][written_marks]"  min="0" max="50" style="border:1px solid #ccc; border-radius: 5px; margin-bottom: -3px; " ></td>
                            @else
                                <td><input type="number" name="subjects[{{ $index }}][written_marks]" min="0" max="70" style="border:1px solid #ccc; border-radius: 5px; margin-bottom: -3px; " ></td>
                                <td><input type="number" name="subjects[{{ $index }}][mcq_marks]" min="0" max="30" style="border:1px solid #ccc; border-radius: 5px; margin-bottom: -3px; " ></td>
                                <td><input type="number" name="subjects[{{ $index }}][w_m_marks]" readonly></td>
                            @endif
                            <td><input type="text" name="subjects[{{ $index }}][sgpa]" readonly></td>
                            <td><input type="text" name="subjects[{{ $index }}][sgrade]" readonly></td>
                            <td><input type="text" name="subjects[{{ $index }}][remarks]"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-end">
                <button type="submit" class="buttonbis" value="save"><span>Submit</span></button>
            </div>

            <div class="signatures">
                <div class="line">Teacher's Signature</div>
                <div class="line">Headmaster's Signature</div>
            </div>
        </form>
    </div>
@endforeach

<script>
    function showForm(formId) {
        document.querySelectorAll('.invoice-box').forEach(form => form.classList.add('hidden'));
        document.getElementById(formId).classList.remove('hidden');

        document.querySelectorAll('.buttonbi').forEach(btn => btn.classList.remove('active'));
        const button = Array.from(document.querySelectorAll('.buttonbi')).find(btn => btn.getAttribute('onclick')?.includes(formId));
        if (button) button.classList.add('active');
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[id^="exam_"]').forEach(form => {
            const examId = parseInt(form.id.split('_')[1]);
            const isSimpleExam = (examId === 1 || examId === 3);

            form.querySelectorAll('tbody tr').forEach((row, index) => {
                const writtenInput = row.querySelector(`[name="subjects[${index}][written_marks]"]`);
                const mcqInput = row.querySelector(`[name="subjects[${index}][mcq_marks]"]`);
                const totalInput = row.querySelector(`[name="subjects[${index}][w_m_marks]"]`);
                const gpaInput = row.querySelector(`[name="subjects[${index}][sgpa]"]`);
                const gradeInput = row.querySelector(`[name="subjects[${index}][sgrade]"]`);

                const getGradeAndGPA = (marks) => {
                    if (isSimpleExam) {
                        if (marks >= 40) return { grade: 'A+', gpa: 5.00 };
                        if (marks >= 35) return { grade: 'A', gpa: 4.00 };
                        if (marks >= 30) return { grade: 'A-', gpa: 3.50 };
                        if (marks >= 25) return { grade: 'B', gpa: 3.00 };
                        if (marks >= 20) return { grade: 'C', gpa: 2.00 };
                        if (marks >= 17) return { grade: 'D', gpa: 1.00 };
                        return { grade: 'F', gpa: 0.00 };
                    } else {
                        if (marks >= 80) return { grade: 'A+', gpa: 5.00 };
                        if (marks >= 70) return { grade: 'A', gpa: 4.00 };
                        if (marks >= 60) return { grade: 'A-', gpa: 3.50 };
                        if (marks >= 50) return { grade: 'B', gpa: 3.00 };
                        if (marks >= 40) return { grade: 'C', gpa: 2.00 };
                        if (marks >= 33) return { grade: 'D', gpa: 1.00 };
                        return { grade: 'F', gpa: 0.00 };
                    }
                };

                const calculate = () => {
                    let total = 0;

                    if (isSimpleExam) {
                        total = parseFloat(writtenInput.value) || 0;
                    } else {
                        const written = parseFloat(writtenInput.value) || 0;
                        const mcq = parseFloat(mcqInput?.value) || 0;
                        total = written + mcq;

                        if (totalInput) totalInput.value = total;
                    }

                    const { grade, gpa } = getGradeAndGPA(total);
                    if (gpaInput) gpaInput.value = gpa.toFixed(2);
                    if (gradeInput) gradeInput.value = grade;
                };

                writtenInput?.addEventListener('input', calculate);
                mcqInput?.addEventListener('input', calculate);
            });
        });
    });
</script>
<script>
    // Student ID-to-name mapping passed from Laravel
    const studentData = @json($studentMap);

    // Show form and rebind student field sync
    function showForm(formId) {
        // Hide all exam forms
        document.querySelectorAll('.invoice-box').forEach(form => form.classList.add('hidden'));

        // Show selected form
        const selectedForm = document.getElementById(formId);
        selectedForm.classList.remove('hidden');

        // Update active button styling
        document.querySelectorAll('.buttonbi').forEach(btn => btn.classList.remove('active'));
        const activeBtn = [...document.querySelectorAll('.buttonbi')].find(btn => btn.getAttribute('onclick')?.includes(formId));
        if (activeBtn) activeBtn.classList.add('active');

        // Bind name-ID sync logic inside the visible form
        bindStudentSync(selectedForm);
    }

    // Sync logic between student name select and ID input inside a given form
    function bindStudentSync(form) {
        const studentSelect = form.querySelector('select[name="student_name"]');
        const studentIdInput = form.querySelector('input[name="student_id"]');

        if (!studentSelect || !studentIdInput) return;

        // Remove previous listeners by cloning the elements
        const newSelect = studentSelect.cloneNode(true);
        const newInput = studentIdInput.cloneNode(true);

        studentSelect.replaceWith(newSelect);
        studentIdInput.replaceWith(newInput);

        // When student name changes, update ID
        newSelect.addEventListener('change', function () {
            newInput.value = this.value;
        });

        // When student ID is typed, update name selection
        newInput.addEventListener('input', function () {
            const id = this.value;
            const option = [...newSelect.options].find(opt => opt.value === id);
            newSelect.value = option ? id : '';
        });
    }

    // On page load, bind the sync logic to the initially visible form
    document.addEventListener('DOMContentLoaded', () => {
        const initialForm = document.querySelector('.invoice-box:not(.hidden)');
        if (initialForm) {
            bindStudentSync(initialForm);
        }
    });
</script>

<script>
  function calculateFinalTotals(form) {
    const rows = form.querySelectorAll('tbody tr');
    let totalMarks = 0;
    let totalGPA = 0;
    let subjectCount = 0;

    rows.forEach((row, index) => {
        const written = parseFloat(row.querySelector(`[name="subjects[${index}][written_marks]"]`)?.value) || 0;
        const mcq = parseFloat(row.querySelector(`[name="subjects[${index}][mcq_marks]"]`)?.value) || 0;
        const total = written + mcq;

        const gpa = parseFloat(row.querySelector(`[name="subjects[${index}][sgpa]"]`)?.value) || 0;

        totalMarks += total;
        totalGPA += gpa;
        subjectCount++;
    });

    const avg = subjectCount ? totalMarks / (subjectCount-2) : 0;
    const avgGPA = subjectCount ? totalGPA / (subjectCount-2 ): 0;

    form.querySelector('[name="total_marks"]').value = totalMarks.toFixed(2);
    form.querySelector('[name="average_marks"]').value = avg.toFixed(2);
    form.querySelector('[name="gpa"]').value = avgGPA.toFixed(2);
    form.querySelector('[name="grade"]').value = getFinalGrade(avgGPA);
}

function getFinalGrade(gpa) {
    if (gpa === 5.00) return "A+";
    if (gpa >= 4.00) return "A";
    if (gpa >= 3.50) return "A-";
    if (gpa >= 3.00) return "B";
    if (gpa >= 2.00) return "C";
    if (gpa >= 1.00) return "D";
    return "F";
}

document.addEventListener('DOMContentLoaded', () => {
  // For each form on the page
  document.querySelectorAll('form').forEach(form => {

    // Recalculate totals whenever any marks input changes
    form.querySelectorAll('input[type="number"]').forEach(input => {
      input.addEventListener('input', () => {
        calculateFinalTotals(form);
      });
    });

  });
});
</script>
@endsection