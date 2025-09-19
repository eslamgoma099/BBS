@extends('layouts.master')

@section('css')
<style>
.skill-card {
    background: #fff;
    border-radius: 15px;
    padding: 20px;
    margin: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    border: 2px solid #dee2e6;
    transition: all 0.3s ease;
}

.skill-card:hover {
    border-color: #087b8d;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.skill-card.positive {
    border-left: 5px solid #28a745;
}

.skill-card.negative {
    border-left: 5px solid #dc3545;
}

.skill-header {
    display: flex;
    justify-content: between;
    align-items: center;
    margin-bottom: 15px;
}

.skill-name {
    font-weight: bold;
    font-size: 16px;
    margin: 0;
}

.skill-grade {
    background: #087b8d;
    color: white;
    padding: 5px 15px;
    border-radius: 25px;
    font-weight: bold;
}

.skill-actions {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 15px;
}

.btn-edit {
    background: #ffc107;
    color: #212529;
    border: none;
    border-radius: 20px;
    padding: 5px 15px;
    font-size: 12px;
}

.btn-edit:hover {
    background: #e0a800;
    color: #212529;
}

.btn-delete {
    background: #dc3545;
    color: white;
    border: none;
    border-radius: 20px;
    padding: 5px 15px;
    font-size: 12px;
}

.btn-delete:hover {
    background: #c82333;
    color: white;
}

.add-skill-card {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    border: 2px dashed #28a745;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 200px;
    cursor: pointer;
    text-decoration: none;
}

.add-skill-card:hover {
    background: linear-gradient(135deg, #1e7e34 0%, #138496 100%);
    color: white;
    text-decoration: none;
    border-color: #1e7e34;
}

.section-header {
    background: linear-gradient(135deg, #087b8d 0%, #2f99aa 100%);
    color: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
}

.skills-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.form-group label {
    font-weight: bold;
    color: #087b8d;
}

.form-control {
    border-radius: 10px;
    border: 2px solid #dee2e6;
}

.form-control:focus {
    border-color: #087b8d;
    box-shadow: 0 0 0 0.2rem rgba(8, 123, 141, 0.25);
}

.modal-header.positive {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
}

.modal-header.negative {
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
}

.empty-skills {
    text-align: center;
    padding: 50px;
    color: #6c757d;
}

.empty-skills i {
    font-size: 4rem;
    margin-bottom: 20px;
}

.nav-pills .nav-link {
    border-radius: 25px;
    margin: 0 5px;
    padding: 10px 20px;
}

.nav-pills .nav-link.active {
    background: linear-gradient(135deg, #087b8d 0%, #2f99aa 100%);
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
                    <a class="nav-link" href="{{ route('selectClassPoint', $classroom) }}">
                        <i class="fas fa-plus-circle"></i> إضافة النقاط
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reportPoint', $classroom) }}">
                        <i class="fas fa-chart-bar"></i> تقرير النقاط
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('skillPoint', $classroom) }}">
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

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Positive Skills Section -->
    <div class="section-header">
        <h4><i class="fas fa-thumbs-up"></i> المهارات الإيجابية</h4>
        <p class="mb-0">المهارات التي تضيف نقاط إيجابية للطلاب</p>
    </div>

    <div class="skills-grid">
        <!-- Add New Positive Skill Card -->
        <div class="skill-card add-skill-card" data-toggle="modal" data-target="#addPositiveSkill">
            <i class="fas fa-plus" style="font-size: 3rem; margin-bottom: 15px;"></i>
            <h5>إضافة مهارة إيجابية جديدة</h5>
        </div>

        @if($plus && count($plus) > 0)
            @foreach($plus as $positive)
                <div class="skill-card positive">
                    <div class="skill-header">
                        <h5 class="skill-name">{{ $positive->name }}</h5>
                        <span class="skill-grade">+{{ $positive->grade }}</span>
                    </div>
                    @if($positive->description)
                        <p class="text-muted mb-0">{{ $positive->description }}</p>
                    @endif
                    <div class="skill-actions">
                        <button class="btn-edit" data-toggle="modal" data-target="#editPositive{{ $positive->id }}">
                            <i class="fas fa-edit"></i> تعديل
                        </button>
                        <button class="btn-delete" onclick="confirmDelete('{{ route('deleteSkill', $positive->id) }}')">
                            <i class="fas fa-trash"></i> حذف
                        </button>
                    </div>
                </div>

                <!-- Edit Positive Skill Modal -->
                @include('tools.modals.editPositiveSkill', ['skill' => $positive])
            @endforeach
        @else
            <div class="col-12">
                <div class="empty-skills">
                    <i class="fas fa-star text-muted"></i>
                    <h5>لا توجد مهارات إيجابية</h5>
                    <p>ابدأ بإضافة مهارات إيجابية لتحفيز الطلاب</p>
                </div>
            </div>
        @endif
    </div>

    <!-- Negative Skills Section -->
    <div class="section-header">
        <h4><i class="fas fa-thumbs-down"></i> المهارات السلبية</h4>
        <p class="mb-0">السلوكيات التي تخصم نقاط من الطلاب</p>
    </div>

    <div class="skills-grid">
        <!-- Add New Negative Skill Card -->
        <div class="skill-card add-skill-card" data-toggle="modal" data-target="#addNegativeSkill">
            <i class="fas fa-minus" style="font-size: 3rem; margin-bottom: 15px;"></i>
            <h5>إضافة سلوك سلبي جديد</h5>
        </div>

        @if($minus && count($minus) > 0)
            @foreach($minus as $negative)
                <div class="skill-card negative">
                    <div class="skill-header">
                        <h5 class="skill-name">{{ $negative->name }}</h5>
                        <span class="skill-grade" style="background: #dc3545;">-{{ $negative->grade }}</span>
                    </div>
                    @if($negative->description)
                        <p class="text-muted mb-0">{{ $negative->description }}</p>
                    @endif
                    <div class="skill-actions">
                        <button class="btn-edit" data-toggle="modal" data-target="#editNegative{{ $negative->id }}">
                            <i class="fas fa-edit"></i> تعديل
                        </button>
                        <button class="btn-delete" onclick="confirmDelete('{{ route('deleteSkill', $negative->id) }}')">
                            <i class="fas fa-trash"></i> حذف
                        </button>
                    </div>
                </div>

                <!-- Edit Negative Skill Modal -->
                @include('tools.modals.editNegativeSkill', ['skill' => $negative])
            @endforeach
        @else
            <div class="col-12">
                <div class="empty-skills">
                    <i class="fas fa-exclamation-triangle text-muted"></i>
                    <h5>لا توجد سلوكيات سلبية</h5>
                    <p>أضف السلوكيات التي تستحق خصم النقاط</p>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Add Positive Skill Modal -->
@include('tools.modals.addPositiveSkill')

<!-- Add Negative Skill Modal -->
@include('tools.modals.addNegativeSkill')

@endsection

@section('scripts')
<script>
function confirmDelete(url) {
    if (confirm('هل أنت متأكد من حذف هذه المهارة؟ سيتم حذف جميع النقاط المرتبطة بها.')) {
        window.location.href = url;
    }
}

$(document).ready(function() {
    // Auto hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
});
</script>
@endsection