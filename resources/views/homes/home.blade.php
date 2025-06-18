@extends('layouts.master') 
@section('page')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Application Summary Widget</title>
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            padding: 20px;
        }

        .card1, .card2, .card3, .card4 {
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
            flex: 1 1 1 300px;
        }

        .card-header1 {
            background-color: orange;
            padding: 8px;
            color: white;
        }

        .card-header1 h5 {
            font-weight: bold;
        }

        .card-body1 {
            background-color: #003366;
            color: white;
        }

        .row1 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 10px;
        }

        .icon1 {
            font-size: 20px;
        }

        .value1 {
            font-weight: bold;
            font-size: 20px;
        }

        @media (min-width: 577px) and (max-width: 768px) {
            .card-container {
                flex-direction: column;
                align-items: center;
            }

            .card1, .card2, .card3, .card4 {
                width: 90%;
            }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            .card-container {
                justify-content: center;
                gap: 20px;
            }

            .card1, .card2, .card3, .card4 {
                width: 45%;
            }
        }

        @media (min-width: 993px) and (max-width: 1200px) {
            .card-container {
                justify-content: center;
                gap: 20px;
            }

            .card1, .card2, .card3, .card4 {
                width: 300px;
            }
        }

        @media (min-width: 1201px) {
            .card-container {
                justify-content: space-between;
            }

            .card1, .card2, .card3, .card4 {
                width: 350px;
            }
        }
    </style>
</head>

<body>
    <div class="card-container">
        <div class="card1">
            <div class="card-header1">
                <h5 style="margin: 0">Application Summary</h5>
            </div>
            <div class="card-body1">
                <div class="row1"><span class="icon1"><i class="bi bi-people-fill"></i> Total:</span>
                    <div class="value1 count-up" data-target="{{ $data['applicationsCount'] }}">0</div>
                </div>
                <div class="row1"><span class="icon1"><i class="bi bi-gender-male"></i> Male:</span>
                    <div class="value1 count-up" data-target="{{ $data['applicationboyesCount'] }}">0</div>
                </div>
                <div class="row1"><span class="icon1"><i class="bi bi-gender-female"></i> Female:</span>
                    <div class="value1 count-up" data-target="{{ $data['applicationgirlsCount'] }}">0</div>
                </div>
                <div class="row1"><span class="icon1">⚧ Other:</span>
                    <div class="value1 count-up" data-target="{{ $data['applicationothersCount'] }}">0</div>
                </div>
            </div>
        </div>

        <div class="card2">
            <div class="card-header1">
                <h5 style="margin: 0">Employee Summary</h5>
            </div>
            <div class="card-body1">
                <div class="row1"><span class="icon1"><i class="bi bi-people-fill"></i> Total:</span>
                    <div class="value1 count-up" data-target="{{ $data['employeescount'] }}">0</div>
                </div>
                <div class="row1"><span class="icon1"><i class="fas fa-chalkboard-teacher"></i> Teachers</span>
                    <div class="value1 count-up" data-target="{{ $data['teachercount'] }}">0</div>
                </div>
                <div class="row1"><span class="icon1"><i class="fas fa-wrench"></i> Support Staff</span>
                    <div class="value1 count-up" data-target="{{ $data['soupportstafcount'] }}">0</div>
                </div>
                <div class="row1"><span class="icon1"><i class="fas fa-user-cog"></i> Maintenance</span>
                    <div class="value1 count-up" data-target="{{ $data['maintenancestaffcount'] }}">0</div>
                </div>
            </div>
        </div>

        <div class="card3">
            <div class="card-header1">
                <h5 style="margin: 0">Student Summary</h5>
            </div>
            <div class="card-body1">
                <div class="row1"><span class="icon1"><i class="bi bi-people-fill"></i> Total:</span>
                    <div class="value1 count-up" data-target="{{ $data['studentsCount'] }}">0</div>
                </div>
                <div class="row1"><span class="icon1"><i class="bi bi-gender-male"></i> Male</span>
                    <div class="value1 count-up" data-target="{{ $data['studentboyesCount'] }}">0</div>
                </div>
                <div class="row1"><span class="icon1"><i class="bi bi-gender-female"></i> Female</span>
                    <div class="value1 count-up" data-target="{{ $data['studentgirlsCount'] }}">0</div>
                </div>
                <div class="row1"><span class="icon1">⚧ Others</span>
                    <div class="value1 count-up" data-target="{{ $data['studentothersCount'] }}">0</div>
                </div>
            </div>
        </div>

        <div class="card4">
            <div class="card-header1">
                <h5 style="margin: 0">Fees Collection Summary</h5>
            </div>
            <div class="card-body1">
                <div class="row1"><span class="icon1"><i class="fas fa-coins"></i> Total Collection</span>
                    <div class="value1 count-up" data-target="{{ $data['totalcollection'] }}">0</div>
                </div>
                <div class="row1"><span class="icon1"><i class="fas fa-check-circle"></i> Full Paid</span>
                    <div class="value1 count-up" data-target="{{ $data['fullPaidCount'] }}">0</div>
                </div>
                <div class="row1"><span class="icon1"><i class="fas fa-adjust"></i> Partial Paid</span>
                    <div class="value1 count-up" data-target="{{ $data['partialPaidCount'] }}">0</div>
                </div>
                <div class="row1"><span class="icon1"><i class="fas fa-wallet"></i> Total Due</span>
                    <div class="value1 count-up" data-target="{{ $data['totalDue'] }}">0</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="bi bi-cash-stack"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category" style="font-size: 20px;">Salary Paid</p>
                                <h4 class="card-title count-up" data-target="{{ $data['totalsalarypaid'] }}">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="bi bi-cash-coin"></i> 
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category" style="font-size: 20px;">Tax</p>
                                <h4 class="card-title count-up" data-target="{{ $data['tax'] }}">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="bi bi-bank"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category" style="font-size: 20px;">PF Amount</p>
                                <h4 class="card-title count-up" data-target="{{ $data['provident_fund'] }}">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="far fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category" style="font-size: 20px;">Others</p>
                                <h4 class="card-title count-up" data-target="500">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Count-up Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const counters = document.querySelectorAll('.count-up');
            const speed = 150;

            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                let count = 0;

                const updateCount = () => {
                    const increment = Math.ceil(target / speed);
                    count += increment;

                    if (count < target) {
                        counter.textContent = count.toLocaleString();
                        requestAnimationFrame(updateCount);
                    } else {
                        counter.textContent = target.toLocaleString();
                    }
                };

                updateCount();
            });
        });
    </script>
</body>

</html>
@endsection
