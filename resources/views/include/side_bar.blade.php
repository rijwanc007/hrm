<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset('assets/images/user/15640848.png')}}" alt="profile">
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{'Rijwan Chowdhury'}}</span>
                    <span class="text-secondary text-small">{{'Software Engineer'}}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#hr_policy-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">HR Policies</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-human-male menu-icon"></i>
            </a>
            <div class="collapse" id="hr_policy-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('hr_policy.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('hr_policy.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="user-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.create')}}">Create User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.index')}}">User Info</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.resigned')}}">Resigned User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.terminated')}}">Terminate User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.group_create')}}">Create User Group</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.group_info')}}">User Group Info</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#grade-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Grade</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-human-male menu-icon"></i>
            </a>
            <div class="collapse" id="grade-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('grade.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('grade.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#accommodation-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Accommodation</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-human-male menu-icon"></i>
            </a>
            <div class="collapse" id="accommodation-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('accommodation.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('accommodation.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ta-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">TA/DA</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-human-male menu-icon"></i>
            </a>
            <div class="collapse" id="ta-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('ta.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('ta.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#employees-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Employees</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-human-male menu-icon"></i>
            </a>
            <div class="collapse" id="employees-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('employees.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('employees.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#card-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Card</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-card menu-icon"></i>
            </a>
            <div class="collapse" id="card-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('id.create')}}">ID Card</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('visiting.create')}}">Visiting Card</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#resign-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Resigned Employee</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cancel menu-icon"></i>
            </a>
            <div class="collapse" id="resign-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('resign.create')}}">Apply</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('resign.index')}}">Index</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('resign.ratio')}}">Employee Ratio</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#department-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Department</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-office menu-icon"></i>
            </a>
            <div class="collapse" id="department-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('department.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('department.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#designtion-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Designation</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-office menu-icon"></i>
            </a>
            <div class="collapse" id="designtion-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('designation.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('designation.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bank-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Bank</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-bank menu-icon"></i>
            </a>
            <div class="collapse" id="bank-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('bank.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('bank.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#attendance-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Attendance</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-percent menu-icon"></i>
            </a>
            <div class="collapse" id="attendance-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('attendance.attendance_create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('attendance.attendance_info')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#asset-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Asset</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-box menu-icon"></i>
            </a>
            <div class="collapse" id="asset-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('asset.create')}}">Assign</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('asset.index')}}">Index</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('asset.create_requisition')}}">Requisition Form</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('asset.index_requisition')}}">Requisition List</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#hr_budget-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">HR Budget</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cash-usd menu-icon"></i>
            </a>
            <div class="collapse" id="hr_budget-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('hr_budget.assign')}}">Budget Assign</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('hr_budget.assign_index')}}">Budget Assign_index</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('hr_budget.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('hr_budget.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#letter-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Letter</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-email menu-icon"></i>
            </a>
            <div class="collapse" id="letter-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('letter.appointment')}}">Appointment Letter</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('letter.show_cause')}}">Show Cause Letter</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('letter.transfer')}}">Transfer Letter</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('letter.joining')}}">Joining Letter</a></li>
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('letter.promotion')}}">Promotion Letter</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('letter.increment')}}">Increment Letter</a></li>--}}
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#employee_move-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Movement Register</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-book-open menu-icon"></i>
            </a>
            <div class="collapse" id="employee_move-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('employee_movement_register.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('employee_movement_register.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#guest-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Guest Register</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-book-open menu-icon"></i>
            </a>
            <div class="collapse" id="guest-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('guest.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('guest.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#activities-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Task Assign</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-table menu-icon"></i>
            </a>
            <div class="collapse" id="activities-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('task.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('task.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#loan-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Loan</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-billiards menu-icon"></i>
            </a>
            <div class="collapse" id="loan-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('loan.create')}}">Create Loan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('loan.index')}}">Loan Index</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('loan_period.create')}}">Create Loan Period</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('loan_period.index')}}">Loan Period Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#claim-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Claim</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-billiards menu-icon"></i>
            </a>
            <div class="collapse" id="claim-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('claim.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('claim.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#re_claim-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Re-Claim</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-billiards menu-icon"></i>
            </a>
            <div class="collapse" id="re_claim-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('re_claim.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('re_claim.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#client-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Leave</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-arrange-send-to-back menu-icon"></i>
            </a>
            <div class="collapse" id="client-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('leave.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('leave.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#eos-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">End Of Service</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-arrange-send-to-back menu-icon"></i>
            </a>
            <div class="collapse" id="eos-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('end_of_service.employees')}}">Employees</a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#schedule-basic" aria-expanded="false" aria-controls="ui-basic">--}}
{{--                <span class="menu-title">Overtime</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-clock menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="schedule-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('overtime.create')}}">Create</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('overtime.index')}}">Index</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#kpi-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">KPI</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-currency-usd menu-icon"></i>
            </a>
            <div class="collapse" id="kpi-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('kpi.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('kpi.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#payroll-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Payroll</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cash menu-icon"></i>
            </a>
            <div class="collapse" id="payroll-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('payroll.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('payroll.index')}}">Index</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('payroll.report')}}">Report</a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{route('provident.index')}}">--}}
{{--                <span class="menu-title">Provident Fund</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-cash-usd"></i>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#annoncement-basic" aria-expanded="false" aria-controls="ui-basic">--}}
{{--                <span class="menu-title">Announcement</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-microphone menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="annoncement-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('announcement.create')}}">Create</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('announcement.index')}}">Index</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#role-basic" aria-expanded="false" aria-controls="ui-basic">--}}
{{--                <span class="menu-title">Role</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--                <i class="mdi mdi-chef-hat menu-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="role-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('role.create')}}">Create</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="{{route('role.index')}}">Index</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#role-pdf_bank" aria-expanded="false" aria-controls="ui-pdf_bank">
                <span class="menu-title">PDF Bank</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-book-lock-open menu-icon"></i>
            </a>
            <div class="collapse" id="role-pdf_bank">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('pdf.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('pdf.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
