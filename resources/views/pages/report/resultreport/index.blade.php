@extends('layouts.master')
@section('page')
    <style>
        .result-sheet {
            background: #fff;
            width: 1200px;
            margin: auto;
            padding: 30px;
            font-family: 'Segoe UI', sans-serif;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }

        h2,
        h3,
        h4 {
            text-align: center;
            color: #1d3557;
            margin-bottom: 10px;



        }

        .student-info,
        .summary {
            margin: 20px 0;
            display: flex;
            flex-wrap: wrap;
            gap: 12px 30px;
        }

        .info-item {
            flex: 1 1 45%;
        }

        .info-item label {
            font-weight: bold;
            color: #333;
        }



        .exam-section {
            display: flex;
            gap: 40px;
            margin-bottom: 30px;
        }

        .exam-column {
            flex: 1;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            padding: 0 50px;
        }

        .signatures .line {
            border-top: 1px solid #000;
            width: 200px;
            text-align: center;
            padding-top: 6px;
            font-weight: 500;
        }

        .cs {
            font-size: 19px;
            font-weight: 600
        }

        .cs span {
            color: gray;
            font-weight: 500;
            font-size: 15px;
        }


        @media print {
            @page {
                margin: 0;
            }

            body,
            html {
                margin: 0;
                padding: 0;

            }

            .result-sheet {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
                max-width: 800px;
                margin: 0;
                padding: 0;
                border: none;
                box-shadow: none;
                page-break-inside: avoid;
            }

            .divbi {
                display: none;
            }

            html,
            body {
                height: 100%;
                background: #fff;
            }
        }
    </style>

    <div class="divbi">
        <form method="GET" action="{{ route('resultreports.index') }}">
            <input type="text" name="search" placeholder="Enter Student ID..." value="{{ request('search') }}"
                style="width: 200px; height: 40px; border-radius: 8px;">
            <input type="text" name="exam_year" placeholder="Enter Exam Year..." value="{{ request('exam_year') }}"
                style="width: 200px; height: 40px; border-radius: 8px; margin-left: 10px;">
            <button type="submit" class="buttonbis"><span> Search </span> </button>
        </form>
        <button onclick="window.print()" class="buttonbis"><span>Print Page</span></button>
        <a class="buttonbi" href="{{ url('/') }}"><span>Home</span></a>
    </div>



    @if(!request()->has('search') || !request()->has('exam_year'))

        <h2 style=" margin: auto;  border-radius: 5px; width: 600px; color: white; background: #2e8b57;">
            Please enter a Student ID to view the result.
        </h2>
        <div class="result-sheet">

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

            <h3>Student Annual Result Sheet </h3>
            <div>



                <h4> Examination</h4>
                <div class="table-responsive ">
                    <table>
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Written</th>
                                <th>MCQ</th>
                                <th>Total</th>
                                <th>GPA</th>
                                <th>Grade</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="summary">
                    <div class="info-item"><label>Total Marks:</label> </div>
                    <div class="info-item"><label>Average:</label></div>
                    <div class="info-item"><label>GPA:</label> </div>
                    <div class="info-item"><label>Grade:</label> </div>
                    <div class="info-item" style="flex: 1 1 100%;"><label>Remark:</label> </div>
                </div>

            </div>
            <div class="signatures">
                <div class="line">Teacher's Signature</div>
                <div class="line">Headmaster's Signature</div>
            </div>

        </div>




    @elseif ((request()->filled('search') || request()->filled('exam_year')) && !$student)



        <div
            style="padding: 20px; background-color: #ffe5e5; border: 1px solid #ffcccc; border-radius: 8px; text-align: center; color: #a94442; margin-top: 20px;">
            <h3 style="margin-bottom: 10px;">No Student Found</h3>
            <p>The Student ID you entered does not match any records.</p>
            <p>Please check the ID and try again.</p>
        </div>


    @else




        <div class="result-sheet">

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


            <h3>Student Annual Result Sheet - {{ $student->examResults->first()->exam_year ?? '-' }}</h3>

            <div class="student-info" style="display: flex; justify-content: space-between; margin: 20px 20px; ">
                <div>
                    <div class="cs"><span>Name:</span> {{ $student->name ?? '-' }}</div>
                    <div class="cs"><span>Student ID:</span> {{ $student->id ?? '-' }}</div>
                    <div class="cs"><span>Father Name:</span> {{ $student->father_name ?? '-' }}</div>
                    <div class="cs"><span>Contact Number:</span> {{ $student->mobile_number ?? '-' }}</div>
                </div>
                <div>
                    <div class="cs"><span>Class:</span> {{ $student->class->name ?? '-' }}</div>
                    <div class="cs"><span>Roll:</span> {{ $student->roll_number ?? '-' }}</div>
                    <div class="cs"><span>Shift:</span> {{ $student->shift->name ?? '-' }}</div>
                    <div class="cs"><span>Section:</span> {{ $student->section->name ?? '-' }}</div>
                </div>
            </div>

            @if ($student->examResults->isEmpty())
                <div
                    style="padding: 20px; background-color: #ffe5e5; border: 1px solid #ffcccc; border-radius: 8px; text-align: center; color: #a94442; margin-top: 20px;">
                    <h3 style="margin-bottom: 10px;">No Result Found</h3>
                    <p>Exam records for this student are not yet available. Marks entry is in progress. </p>
                    <p> Please check back later.</p>
                </div>

            @else


                <div style="display: flex; gap: 40px;">
                    <div>
                        @foreach($student->examResults as $exam)

                            @if ($exam->examType->id == 1)
                                <h4>{{ $exam->examType->name }} Examination</h4>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Written</th>
                                            <th>MCQ</th>
                                            <th>Total</th>
                                            <th>GPA</th>
                                            <th>Grade</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($exam->markDetails as $detail)
                                            <tr>
                                                <td>{{ $detail->subject->name }}</td>
                                                <td>{{ $detail->written_marks }}</td>
                                                <td>{{ $detail->mcq_marks }}</td>
                                                <td>{{ $detail->w_m_marks }}</td>
                                                <td>{{ $detail->gpa }}</td>
                                                <td>{{ $detail->grade }}</td>
                                                <td>{{ $detail->remark }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="summary">
                                    <div class="info-item"><label>Total Marks:</label> {{ $exam->total_marks }}</div>
                                    <div class="info-item"><label>Average:</label> {{ $exam->average_marks }}</div>
                                    <div class="info-item"><label>GPA:</label> {{ $exam->gpa }}</div>
                                    <div class="info-item"><label>Grade:</label> {{ $exam->grade }}</div>
                                    <div class="info-item" style="flex: 1 1 100%;"><label>Remark:</label> {{ $exam->remark }}</div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div>
                        @foreach($student->examResults as $exam)

                            @if ($exam->examType->id == 2)



                                <h4>{{ $exam->examType->name }} Examination</h4>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Written</th>
                                            <th>MCQ</th>
                                            <th>Total</th>
                                            <th>GPA</th>
                                            <th>Grade</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($exam->markDetails as $detail)
                                            <tr>
                                                <td>{{ $detail->subject->name }}</td>
                                                <td>{{ $detail->written_marks }}</td>
                                                <td>{{ $detail->mcq_marks }}</td>
                                                <td>{{ $detail->w_m_marks }}</td>
                                                <td>{{ $detail->gpa }}</td>
                                                <td>{{ $detail->grade }}</td>
                                                <td>{{ $detail->remark }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="summary">
                                    <div class="info-item"><label>Total Marks:</label> {{ $exam->total_marks }}</div>
                                    <div class="info-item"><label>Average:</label> {{ $exam->average_marks }}</div>
                                    <div class="info-item"><label>GPA:</label> {{ $exam->gpa }}</div>
                                    <div class="info-item"><label>Grade:</label> {{ $exam->grade }}</div>
                                    <div class="info-item" style="flex: 1 1 100%;"><label>Remark:</label> {{ $exam->remark }}</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div style="display: flex ; gap:10; gap: 40px;">
                    <div>
                        @foreach($student->examResults as $exam)
                            @if ($exam->examType->id == 3)
                                <h4>{{ $exam->examType->name }} Examination</h4>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Written</th>
                                            <th>MCQ</th>
                                            <th>Total</th>
                                            <th>GPA</th>
                                            <th>Grade</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($exam->markDetails as $detail)
                                            <tr>
                                                <td>{{ $detail->subject->name }}</td>
                                                <td>{{ $detail->written_marks }}</td>
                                                <td>{{ $detail->mcq_marks }}</td>
                                                <td>{{ $detail->w_m_marks }}</td>
                                                <td>{{ $detail->gpa }}</td>
                                                <td>{{ $detail->grade }}</td>
                                                <td>{{ $detail->remark }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="summary">
                                    <div class="info-item"><label>Total Marks:</label> {{ $exam->total_marks }}</div>
                                    <div class="info-item"><label>Average:</label> {{ $exam->average_marks }}</div>
                                    <div class="info-item"><label>GPA:</label> {{ $exam->gpa }}</div>
                                    <div class="info-item"><label>Grade:</label> {{ $exam->grade }}</div>
                                    <div class="info-item" style="flex: 1 1 100%;"><label>Remark:</label> {{ $exam->remark }}</div>
                                </div>

                            @endif
                        @endforeach
                    </div>
                    <div>
                        @foreach($student->examResults as $exam)
                            @if($exam->examType->id == 4)

                                <h4>{{ $exam->examType->name }} Examination</h4>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Written</th>
                                            <th>MCQ</th>
                                            <th>Total</th>
                                            <th>GPA</th>
                                            <th>Grade</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($exam->markDetails as $detail)
                                            <tr>
                                                <td>{{ $detail->subject->name }}</td>
                                                <td>{{ $detail->written_marks }}</td>
                                                <td>{{ $detail->mcq_marks }}</td>
                                                <td>{{ $detail->w_m_marks }}</td>
                                                <td>{{ $detail->gpa }}</td>
                                                <td>{{ $detail->grade }}</td>
                                                <td>{{ $detail->remark }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="summary">
                                    <div class="info-item"><label>Total Marks:</label> {{ $exam->total_marks }}</div>
                                    <div class="info-item"><label>Average:</label> {{ $exam->average_marks }}</div>
                                    <div class="info-item"><label>GPA:</label> {{ $exam->gpa }}</div>
                                    <div class="info-item"><label>Grade:</label> {{ $exam->grade }}</div>
                                    <div class="info-item" style="flex: 1 1 100%;"><label>Remark:</label> {{ $exam->remark }}</div>
                                </div>

                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="signatures">
                <div class="line">Teacher's Signature</div>
                <div class="line">Headmaster's Signature</div>
            </div>


        </div>

    @endif

@endsection