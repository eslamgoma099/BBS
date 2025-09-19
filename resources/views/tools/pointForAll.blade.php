<!-- Modal for adding points to all students -->
<div id="add_point_class{{ $classroom }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #087b8d 0%, #2f99aa 100%); color: white;">
                <h5 class="modal-title">
                    <i class="fas fa-users"></i> إضافة نقاط لجميع طلاب الفصل
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-center mb-3"><i class="fas fa-thumbs-up text-success"></i> النقاط الإيجابية</h6>
                        <div style="max-height: 400px; overflow-y: auto;">
                            @if($plus && count($plus) > 0)
                                @foreach($plus as $positive)
                                    <form action="{{ route('plusPointClass') }}" method="POST" class="mb-2">
                                        @csrf
                                        <input type="hidden" name="point_id" value="{{ $positive->id }}">
                                        <input type="hidden" name="classroom_id" value="{{ $classroom }}">
                                        
                                        <button type="submit" class="btn btn-outline-success btn-block d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('public/assets/images/positive-icon.png') }}" 
                                                     style="width: 30px; height: 30px; margin-left: 10px;" alt="إيجابي">
                                                <span>{{ $positive->name }}</span>
                                            </div>
                                            <span class="badge badge-success">+{{ $positive->grade }}</span>
                                        </button>
                                    </form>
                                @endforeach
                            @else
                                <div class="text-center p-3">
                                    <i class="fas fa-info-circle text-muted"></i>
                                    <p class="text-muted">لا توجد مهارات إيجابية</p>
                                    <a href="{{ route('skillPoint', $classroom) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i> إضافة مهارات
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <h6 class="text-center mb-3"><i class="fas fa-thumbs-down text-danger"></i> النقاط السلبية</h6>
                        <div style="max-height: 400px; overflow-y: auto;">
                            @if($minus && count($minus) > 0)
                                @foreach($minus as $negative)
                                    <form action="{{ route('minusPointClass') }}" method="POST" class="mb-2">
                                        @csrf
                                        <input type="hidden" name="point_id" value="{{ $negative->id }}">
                                        <input type="hidden" name="classroom_id" value="{{ $classroom }}">
                                        
                                        <button type="submit" class="btn btn-outline-danger btn-block d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('public/assets/images/negative-icon.png') }}" 
                                                     style="width: 30px; height: 30px; margin-left: 10px;" alt="سلبي">
                                                <span>{{ $negative->name }}</span>
                                            </div>
                                            <span class="badge badge-danger">-{{ $negative->grade }}</span>
                                        </button>
                                    </form>
                                @endforeach
                            @else
                                <div class="text-center p-3">
                                    <i class="fas fa-info-circle text-muted"></i>
                                    <p class="text-muted">لا توجد مهارات سلبية</p>
                                    <a href="{{ route('skillPoint', $classroom) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i> إضافة مهارات
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                @if((!$plus || count($plus) == 0) && (!$minus || count($minus) == 0))
                    <div class="text-center mt-4 p-4" style="background: #f8f9fa; border-radius: 10px;">
                        <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem; margin-bottom: 15px;"></i>
                        <h5>لا توجد مهارات محددة</h5>
                        <p class="text-muted">يجب إنشاء مهارات أولاً قبل إضافة النقاط</p>
                        <a href="{{ route('skillPoint', $classroom) }}" class="btn btn-primary">
                            <i class="fas fa-cogs"></i> إدارة المهارات
                        </a>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> إغلاق
                </button>
            </div>
        </div>
    </div>
</div>