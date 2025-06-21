<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="{{ url('/') }}" class="logo">
        <img src="{{asset('assets/img/kaiadmin/logo_light.png')}}" alt="navbar brand" class="navbar-brand" height="20"
          style="height: 170px; margin-left:-30px" />
      </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
    <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item active">
          <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
            <i class='bx bx-home' style="font-size: 25px; "></i>
            <p>Dashboard</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="dashboard">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ url('/das') }}">
                  <span class="sub-item">Dashboard 1</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Components</h4>
        </li>

           
        <li class="nav-item">
          <a href="{{ url('/table-data') }}">
            <i class="bi bi-table"></i>
            <p>All Data</p>
            <span class="badge badge-success"></span>
          </a>
        </li>

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#base">

            <i class="bi bi-person-plus" style="font-size: 25px; "></i>
            <p>Enrollment Process</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="base">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ url('/applications') }}">
                  <span class="sub-item">Application</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/studentpayments') }}">
                  <span class="sub-item">Admission</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/expenses') }}">
                  <span class="sub-item"> Expense List</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/frequences') }}">
                  <span class="sub-item"> Frequency</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#map14ee">
            <i class="bi bi-mortarboard" style="font-size: 25px; "></i>
            <p>Student</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="map14ee">

            <ul class="nav nav-collapse">

              <li>
                <a href="{{ url('/students') }}">
                  <span class="sub-item"> Student </span>
                </a>
              </li>

            </ul>
            
          
          </div>
        </li>


        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#map14eee">
            <i class="bi bi-book"  style="font-size: 25px; "></i>
            <p>Library</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="map14eee">
            <ul class="nav nav-collapse">

              <li>
                <a href="{{ url('/bookissues') }}">
                  <span class="sub-item"> Book Issue </span>
                </a>
              </li>

              <li>
                <a href="{{ url('/books') }}">
                  <span class="sub-item"> Book</span>
                </a>
              </li>

            </ul>
          </div>
        </li>


        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#sidebarLayouts">
            <i class='bx bx-list-ul' style="font-size: 25px; "></i>
            <p>Batch</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="sidebarLayouts">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ url('/classes') }}">
                  <span class="sub-item">Class</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/shifts') }}">
                  <span class="sub-item">Shift</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/sections') }}">
                  <span class="sub-item">Section</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#tables">
            <i class="bi bi-clipboard2-data"></i>
            <p>Schedule</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="tables">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ url('/routines') }}">
                  <span class="sub-item">Class Schedule</span></span>
                </a>
              </li>
              <li>
                <a href="{{ url('/schedulemanages') }}">
                  <span class="sub-item">Manage Schedule </span></span>
                </a>
              </li>
              <li>
                <a href="{{ url('/subjects') }}">
                  <span class="sub-item">Subject</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/rooms') }}">
                  <span class="sub-item">Room</span></span>
                </a>
              </li>
              <li>
                <a href="{{ url('/periods') }}">
                  <span class="sub-item">Period</span></span>
                </a>
              </li>


            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#map1">
            <i class="bx bx-book-alt" style="font-size: 25px; "></i>
            <p>Exam</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="map1">
            <ul class="nav nav-collapse">

              <li>
                <a href="{{ url('/studentexamschedules') }}">
                  <span class="sub-item">Exam Schedule Manage</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/studentexamtypes') }}">
                  <span class="sub-item">Exam Types</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        
         <li class="nav-item">
          <a data-bs-toggle="collapse" href="#map12">
            <i class="bi bi-patch-check" style="font-size: 25px; "></i>
            <p>Result</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="map12">
            <ul class="nav nav-collapse">

              <li>
                <a href="{{ url('/studentexamresults') }}">
                  <span class="sub-item">Result Manage</span>
                </a>
              </li>

            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#map123">
            <i class="bi bi-journal-text" style="font-size: 25px; "></i>
            <p>Report</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="map123">
            <ul class="nav nav-collapse">

              <li>
                <a href="{{ url('/resultreports') }}">
                  <span class="sub-item">Result Report</span>
                </a>
              </li>

                <li>
                <a href="{{ url('/table-data') }}">
                  <span class="sub-item">All Data</span>
                </a>
              </li>

            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#forms">
            <!-- <i ><img src="/assets/img/employee.png" alt="" width="30px"></i> -->
            <i class='bx bx-group' style="font-size: 25px; "></i>
            <p>Employee</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="forms">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ url('/employees') }}">
                  <span class="sub-item">Employee</span>
                </a>
              </li>
               <li>
                <a href="{{ url('/teachers') }}">
                  <span class="sub-item">Teacher</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/categories') }}">
                  <span class="sub-item">Category</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/employeeshifts') }}">
                  <span class="sub-item">Employee Shift</span>
                </a>
              </li>

              <li>
                <a href="{{ url('/employeeadministrators') }}">
                  <span class="sub-item">Administrative</span>
                </a>
              </li>
            </ul>

          </div>
        </li>
        
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#map">
            <i class="bi bi-person-check" style="font-size: 25px; "></i>
            <p>Atendances</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="map">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ url('/employeeattendances') }}">
                  <span class="sub-item">Employee Attendances</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/studentattendances') }}">
                  <span class="sub-item">Student Attendances</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#maps">
            <i class="bi bi-person-x" style="font-size: 25px; "></i>
            <p>Leave</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="maps">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ url('/leaveapplications') }}">
                  <span class="sub-item">Leave Application</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/leavetransactions') }}">
                  <span class="sub-item"> Leave Transactions</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/leavecategories') }}">
                  <span class="sub-item">Leave Categorie</span>
                </a>
              </li>


            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#charts">
            <i class='bx bx-credit-card' style="font-size: 25px; "></i>
            <p>Payment</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="charts">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ url('/employeesalarypayments') }}">
                  <span class="sub-item">Employee Salary Payment</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/paymentmethods') }}">
                  <span class="sub-item">Payment Method</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/employeesalaries') }}">
                  <span class="sub-item">Employee Salary Allowances</span>
                </a>
              </li>

              <li>
                <a href="{{ url('/employeefestivalbonuses') }}">
                  <span class="sub-item">Employee Festival Bonus</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/employeedeductions') }}">
                  <span class="sub-item">Employee Deductions</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#charts1">
            <i class='bi bi-cash-stack' style="font-size: 25px; "></i>
            <p>Provident Fund</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="charts1">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ url('/employeeprovidentfunds') }}">
                  <span class="sub-item">Employee Provident Fund</span>
                </a>
              </li>

            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#map14e">
            <i class="bi bi-coin" style="font-size: 25px; "></i>
            <p>Fees</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="map14e">
            <ul class="nav nav-collapse">

              <li>
                <a href="{{ url('/feecollections') }}">
                  <span class="sub-item">Fee Collection </span>
                </a>
              </li>

            </ul>
          </div>
        </li>

        
       
        
        <!-- Single Menue -->
        {{-- <li class="nav-item">
          <a href="widgets.html">
            <i class="fas fa-desktop"></i>
            <p>Widgets</p>
            <span class="badge badge-success">4</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="../../documentation/index.html">
            <i class="fas fa-file"></i>
            <p>Documentation</p>
            <span class="badge badge-secondary">1</span>
          </a>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#submenu">
            <i class="fas fa-bars"></i>
            <p>Menu Levels</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="submenu">
            <ul class="nav nav-collapse">
              <li>
                <a data-bs-toggle="collapse" href="#subnav1">
                  <span class="sub-item">Level 1</span>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="subnav1">
                  <ul class="nav nav-collapse subnav">
                    <li>
                      <a href="#">
                        <span class="sub-item">Level 2</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <span class="sub-item">Level 2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <a data-bs-toggle="collapse" href="#subnav2">
                  <span class="sub-item">Level 1</span>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="subnav2">
                  <ul class="nav nav-collapse subnav">
                    <li>
                      <a href="#">
                        <span class="sub-item">Level 2</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="#">
                  <span class="sub-item">Level 1</span>
                </a>
              </li>
            </ul>
          </div>
        </li> --}}

         
      </ul>
    </div>
  </div>
</div>