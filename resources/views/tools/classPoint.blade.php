@extends('layouts.master')

@section('css')
<style>
.class-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 15px;
    padding: 25px;
    margin: 15px;
    width: 280px;
    height: 200px;
    text-decoration: none;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    border: none;
}

.class-card:hover {
    background: linear-gradient(135deg, #2f99aa 0%, #087b8d 100%);
    color: white;
    text-decoration: none;
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.class-card img {
    width: 80px;
    height: 80px;
    margin-bottom: 15px;
}

.class-card h4 {
    text-align: center;
    font-weight: bold;
    margin: 0;
    font-size: 16px;
}

.page-header {
    background: linear-gradient(135deg, #087b8d 0%, #2f99aa 100%);
    color: white;
    padding: 30px 0;
    margin-bottom: 30px;
    border-radius: 10px;
}

.page-header h2 {
    margin: 0;
    font-weight: bold;
}

.class-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.no-classes {
    text-align: center;
    padding: 50px;
    color: #6c757d;
}

.no-classes i {
    font-size: 4rem;
    margin-bottom: 20px;
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-header text-center">
        <h2><i class="fas fa-star"></i> إدارة نقاط الفصل</h2>
        <p class="mb-0">اختر الفصل لإدارة نقاط الطلاب</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    @if($classes && count($classes) > 0)
        <div class="class-grid">
            @foreach($classes as $class)
                <a href="{{ route('selectClassPoint', $class->id) }}" class="class-card">
                    <img src="{{ asset('public/assets/images/class(2).png') }}" alt="فصل">
                    <h4>{{ $class->gradeName . ' - ' . $class->name }}</h4>
                </a>
            @endforeach
        </div>
    @else
        <div class="no-classes">
            <i class="fas fa-chalkboard-teacher text-muted"></i>
            <h4>لا توجد فصول متاحة</h4>
            <p>يرجى التواصل مع الإدارة لتعيين فصول لك</p>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Add hover effects and animations
    $('.class-card').hover(
        function() {
            $(this).find('img').addClass('animated pulse');
        },
        function() {
            $(this).find('img').removeClass('animated pulse');
        }
    );
});
</script>
@endsection