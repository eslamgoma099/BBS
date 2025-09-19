@extends('layouts.master')

@section('css')
<style>
.report-header {
    background: linear-gradient(135deg, #087b8d 0%, #2f99aa 100%);
    color: white;
    padding: 30px;
    border-radius: 10px;
    margin-bottom: 30px;
    text-align: center;
}

.stats-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    margin-bottom: 20px;
    text-align: center;
    border-left: 5px solid #087b8d;
}

.stats-number {
    font-size: 3rem;
    font-weight: bold;
    color: #087b8d;
    margin-bottom: 10px;
}

.stats-label {
    color: #6c757d;
    font-size: 14px;
    text-transform: uppercase;
}

.report-table {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.report-table .table thead th {
    background: linear-gradient(135deg, #087b8d 0%, #2f99aa 100%);
    color: white;
    border: none;
    padding: 15px;
    font-weight: bold;
}

.report-table .table tbody tr:hover {
    background-color: #f8f9fa;
}

.report-table .table td {
    padding: 15px;
    vertical-align: middle;
    border-color: #dee2e6;
}

.student-info {
    display: flex;
    align-items: center;
}

.student-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-left: 10px;
}

.point-positive {
    background: #d4edda;
    color: #155724;
    padding: 5px 10px;
    border-radius: 15px;
    font-weight: bold;
}

.point-negative {
    background: #f8d7da;
    color: #721c24;
    padding: 5px 10px;
    border-radius: 15px;
    font-weight: bold;
}

.point-neutral {
    background: #d1ecf1;
    color: #0c5460;
    padding: 5px 10px;
    border-radius: 15px;
    font-weight: bold;
}

.skill-name {
    font-weight: bold;
    margin-bottom: 5px;
}

.skill-description {
    color: #6c757d;
    font-size: 12px;
}

.action-buttons {
    display: flex;
    gap: 5px;
}

.btn-delete-small {
    background: #dc3545;
    color: white;
    border: none;
    border-radius: 15px;
    padding: 5px 10px;
    font-size: 12px;
}

.btn-delete-small:hover {
    background: #c82333;
    color: white;
}

.nav-pills .nav-link {
    border-radius: 25px;
    margin: 0 5px;
    padding: 10px 20px;
}

.nav-pills .nav-link.active {
    background: linear-gradient(135deg, #087b8d 0%, #2f99aa 100%);
}

.filter-section {
    background: white;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.empty-report {
    text-align: center;
    padding: 60px;
    color: #6c757d;
}

.empty-report i {
    font-size: 4rem;
    margin-bottom: 20px;
}

.date-badge {
    background: #e9ecef;
    color: #495057;
    padding: 3px 8px;
    border-radius: 10px;
    font-size: 11px;
}

.teacher-badge {
    background: #fff3cd;
    color: #856404;
    padding: 3px 8px;
    border-radius: 10px;
    font-size: 11px;
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Navigation Tabs -->
    <div class="row pt-3">
        <div class="col-md-12">
            <ul class="nav nav-pills justify-content-center" style="font-size: large;">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('selectClassPoint', $class_id) }}">
                        <i class="fas fa-plus-circle"></i> إضافة النقاط
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('reportPoint', $class_id) }}">
                        <i class="fas fa-chart-bar"></i> تقرير النقاط
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('skillPoint', $class_id) }}">
                        <i class="fas fa-cogs"></i> إدارة المهارات
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="report-header">
        <h3><i class="fas fa-chart-line"></i> تقرير النقاط التفصيلي</h3>
        <p class="mb-0">عرض جميع النقاط الممنوحة والمخصومة من الطلاب</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number text-success">{{ $reports->where('point', '>', 0)->count() }}</div>
                <div class="stats-label">النقاط الإيجابية</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number text-danger">{{ $reports->where('point', '<', 0)->count() }}</div>
                <div class="stats-label">النقاط السلبية</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number text-info">{{ $reports->sum('point') }}</div>
                <div class="stats-label">إجمالي النقاط</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number text-primary">{{ $reports->pluck('student_id')->unique()->count() }}</div>
                <div class="stats-label">عدد الطلاب</div>
            </div>
        </div>
    </div>

    <!-- Reports Table -->
    <div class="report-table">
        @if($reports && count($reports) > 0)
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th><i class="fas fa-user"></i> الطالب</th>
                        <th><i class="fas fa-star"></i> المهارة/السلوك</th>
                        <th><i class="fas fa-calculator"></i> النقاط</th>
                        <th><i class="fas fa-calendar"></i> التاريخ</th>
                        <th><i class="fas fa-user-tie"></i> المدرس</th>
                        <th><i class="fas fa-cog"></i> الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports->sortByDesc('date_awarded') as $report)
                        <tr>
                            <td>
                                <div class="student-info">
                                    <img src="{{ asset('public/assets/images/child-icon.png') }}" 
                                         alt="طالب" 
                                         class="student-avatar">
                                    <div>
                                        <div class="font-weight-bold">
                                            {{ $report->student->firstname ?? 'غير محدد' }} 
                                            {{ $report->student->lastname ?? '' }}
                                        </div>
                                        <small class="text-muted">
                                            UID: {{ $report->student->id ?? 'N/A' }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="skill-name">{{ $report->point->name ?? 'مهارة محذوفة' }}</div>
                                @if($report->point && $report->point->description)
                                    <div class="skill-description">{{ $report->point->description }}</div>
                                @endif
                            </td>
                            <td>
                                @if($report->point > 0)
                                    <span class="point-positive">+{{ $report->point }}</span>
                                @elseif($report->point < 0)
                                    <span class="point-negative">{{ $report->point }}</span>
                                @else
                                    <span class="point-neutral">{{ $report->point }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="date-badge">
                                    {{ $report->date_awarded ? $report->date_awarded->format('Y-m-d') : $report->created_at->format('Y-m-d') }}
                                </div>
                                <small class="d-block text-muted mt-1">
                                    {{ $report->date_awarded ? $report->date_awarded->format('H:i') : $report->created_at->format('H:i') }}
                                </small>
                            </td>
                            <td>
                                <div class="teacher-badge">
                                    {{ $report->teacher->firstname ?? 'غير محدد' }} 
                                    {{ $report->teacher->lastname ?? '' }}
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    @if($report->teacher_id == auth()->user()->id)
                                        <button class="btn-delete-small" 
                                                onclick="confirmDeletePoint('{{ route('deletePoint', $report->id) }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-report">
                <i class="fas fa-chart-bar text-muted"></i>
                <h5>لا توجد نقاط مسجلة</h5>
                <p>لم يتم منح أو خصم أي نقاط للطلاب بعد</p>
                <a href="{{ route('selectClassPoint', $class_id) }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> ابدأ بإضافة النقاط
                </a>
            </div>
        @endif
    </div>

    <!-- Export and Print Options -->
    @if($reports && count($reports) > 0)
        <div class="text-center mt-4">
            <button class="btn btn-success" onclick="exportToExcel()">
                <i class="fas fa-file-excel"></i> تصدير Excel
            </button>
            <button class="btn btn-info" onclick="printReport()">
                <i class="fas fa-print"></i> طباعة التقرير
            </button>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
function confirmDeletePoint(url) {
    if (confirm('هل أنت متأكد من حذف هذه النقطة؟ هذا الإجراء لا يمكن التراجع عنه.')) {
        window.location.href = url;
    }
}

function exportToExcel() {
    // Implement Excel export functionality
    alert('سيتم تطبيق وظيفة التصدير قريباً');
}

function printReport() {
    window.print();
}

$(document).ready(function() {
    // Auto hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);

    // Add animation to stats cards
    $('.stats-card').hover(
        function() {
            $(this).addClass('animated pulse');
        },
        function() {
            $(this).removeClass('animated pulse');
        }
    );
});
</script>

<style>
@media print {
    .nav-pills, .btn, .action-buttons {
        display: none !important;
    }
    
    .report-table {
        box-shadow: none;
    }
    
    body {
        background: white !important;
    }
}
</style>
@endsection