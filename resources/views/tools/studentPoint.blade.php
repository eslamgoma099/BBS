@extends('layouts.master')

@section('css')
<style>
.student-card {
    background: linear-gradient(135deg, #b7d5da 0%, #87ceeb 100%);
    border-radius: 15px;
    padding: 15px;
    margin: 10px;
    width: 180px;
    height: 200px;
    text-decoration: none;
    color: #087b8d;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    border: none;
    cursor: pointer;
    position: relative;
}

.student-card:hover {
    background: linear-gradient(135deg, #2f99aa 0%, #087b8d 100%);
    color: white;
    text-decoration: none;
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.student-card img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.student-card h5 {
    text-align: center;
    font-weight: bold;
    margin: 0;
    font-size: 14px;
}

.point-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #dc3545;
    color: white;
    border-radius: 50%;
    padding: 5px 8px;
    font-size: 12px;
    font-weight: bold;
    min-width: 25px;
    text-align: center;
}

.point-badge.positive {
    background: #28a745;
}

.add-all-card {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    margin: 20px auto;
    width: 300px;
    height: 80px;
}

.add-all-card:hover {
    background: linear-gradient(135deg, #1e7e34 0%, #138496 100%);
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

.point-item {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 15px;
    margin: 10px;
    width: 160px;
    height: 160px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border: 2px solid #dee2e6;
    transition: all 0.3s ease;
    cursor: pointer;
}

.point-item:hover {
    border-color: #087b8d;
    transform: scale(1.05);
}

.point-item img {
    width: 50px;
    height: 50px;
    margin-bottom: 10px;
}

.point-item .badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #007bff;
    color: white;
    border-radius: 50%;
    padding: 5px 8px;
    font-size: 12px;
}

.modal-header {
    background: linear-gradient(135deg, #087b8d 0%, #2f99aa 100%);
    color: white;
    border-radius: 10px 10px 0 0;
}

.student-info {
    border-right: 2px solid #b7d9df;
    padding: 20px;
    text-align: center;
}

.student-info img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 15px;
}

.student-info .point-badge {
    position: relative;
    top: auto;
    right: auto;
    display: inline-block;
    margin-top: 10px;
    font-size: 16px;
    padding: 8px 15px;
}

.tab-content {
    padding: 20px;
}

.points-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.btn-manage {
    background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%);
    color: white;
    border: none;
    border-radius: 25px;
    padding: 8px 15px;
    margin: 5px;
    text-decoration: none;
}

.btn-manage:hover {
    background: linear-gradient(135deg, #5a6268 0%, #bd2130 100%);
    color: white;
    text-decoration: none;
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
                    <a class="nav-link active" href="{{ route('selectClassPoint', $classroom) }}">
                        <i class="fas fa-plus-circle"></i> إضافة النقاط
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reportPoint', $classroom) }}">
                        <i class="fas fa-chart-bar"></i> تقرير النقاط
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('skillPoint', $classroom) }}">
                        <i class="fas fa-cogs"></i> إدارة المهارات
                    </a>
                </li>
            </ul>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    <!-- Add Points for All Students -->
    <div class="row mt-3">
        <div class="col-md-12">
            <a data-toggle="modal" href="#add_point_class{{ $classroom }}" class="student-card add-all-card">
                <i class="fas fa-users" style="font-size: 2rem; margin-bottom: 10px;"></i>
                <h5>إضافة نقاط لجميع الطلاب</h5>
            </a>
        </div>
    </div>

    <!-- Students Grid -->
    <div class="row">
        <div class="col-md-12">
            <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                @foreach($students as $student)
                    @php
                        $minus_score = 0;
                        $plus_score = 0;
                        $studentPoint = \App\Models\StudentPoint::where('student_id', $student->id)->get();
                        foreach($studentPoint as $point_record){
                            $point = \App\Models\Points::where('id', $point_record->point_id)->first();
                            if($point && $point->type == 'plus'){
                                $plus_score += $point->grade;
                            } elseif($point && $point->type == 'minus'){
                                $minus_score += $point->grade;
                            }
                        }
                        $totalPoint = $plus_score - $minus_score;
                    @endphp

                    <a data-toggle="modal" href="#add_point{{ $student->id }}" class="student-card">
                        <img src="{{ asset('public/assets/images/child-icon.png') }}" alt="طالب">
                        <span class="point-badge {{ $totalPoint >= 0 ? 'positive' : '' }}">
                            {{ $totalPoint }}
                        </span>
                        <h5>{{ ucfirst($student->firstname) . ' ' . ucfirst(explode(" ", trim($student->lastname))[0]) }}</h5>
                    </a>

                    <!-- Student Modal -->
                    <div id="add_point{{ $student->id }}" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="fas fa-star"></i> إدارة نقاط {{ $student->firstname . ' ' . $student->lastname }}
                                    </h5>
                                    <button type="button" class="close text-white" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-3 student-info">
                                            <img src="{{ asset('public/assets/images/child-icon.png') }}" alt="طالب">
                                            <h5>{{ $student->firstname . ' ' . $student->lastname }}</h5>
                                            <div class="point-badge {{ $totalPoint >= 0 ? 'positive' : '' }}">
                                                المجموع: {{ $totalPoint }}
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#plus{{ $student->id }}" data-toggle="tab">
                                                        <i class="fas fa-thumbs-up"></i> النقاط الإيجابية
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#minus{{ $student->id }}" data-toggle="tab">
                                                        <i class="fas fa-thumbs-down"></i> النقاط السلبية
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div class="active tab-pane" id="plus{{ $student->id }}">
                                                    <div class="points-grid">
                                                        @foreach($plus as $positive)
                                                            <form action="{{ route('plusPoint') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="point_id" value="{{ $positive->id }}">
                                                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                                <input type="hidden" name="classroom_id" value="{{ $classroom }}">

                                                                <button type="submit" class="point-item">
                                                                    <img src="{{ asset('public/assets/images/positive-icon.png') }}" alt="إيجابي">
                                                                    <span class="badge">+{{ $positive->grade }}</span>
                                                                    <h6>{{ $positive->name }}</h6>
                                                                </button>
                                                            </form>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="minus{{ $student->id }}">
                                                    <div class="points-grid">
                                                        @foreach($minus as $negative)
                                                            <form action="{{ route('minusPoint') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="point_id" value="{{ $negative->id }}">
                                                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                                <input type="hidden" name="classroom_id" value="{{ $classroom }}">

                                                                <button type="submit" class="point-item">
                                                                    <img src="{{ asset('public/assets/images/negative-icon.png') }}" alt="سلبي">
                                                                    <span class="badge bg-danger">-{{ $negative->grade }}</span>
                                                                    <h6>{{ $negative->name }}</h6>
                                                                </button>
                                                            </form>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('skillPoint', $classroom) }}" class="btn-manage">
                                        <i class="fas fa-plus"></i> إدارة المهارات
                                    </a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Add Points for All Modal -->
@include('tools.pointForAll')

@endsection