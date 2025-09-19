<!-- Add Negative Skill Modal -->
<div class="modal fade" id="addNegativeSkill" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header negative">
                <h5 class="modal-title text-white">
                    <i class="fas fa-minus-circle"></i> إضافة سلوك سلبي جديد
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('addNegativeSkill') }}" method="POST">
                @csrf
                <input type="hidden" name="classroom" value="{{ $classroom }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="negative_name">
                            <i class="fas fa-exclamation-triangle text-danger"></i> اسم السلوك السلبي
                        </label>
                        <input type="text" 
                               class="form-control" 
                               id="negative_name" 
                               name="name" 
                               placeholder="مثال: عدم أداء الواجب، إزعاج الفصل، عدم الانتباه"
                               required
                               maxlength="255">
                    </div>
                    
                    <div class="form-group">
                        <label for="negative_grade">
                            <i class="fas fa-minus-square text-danger"></i> عدد النقاط المخصومة
                        </label>
                        <input type="number" 
                               class="form-control" 
                               id="negative_grade" 
                               name="grade" 
                               min="1" 
                               max="100" 
                               value="3"
                               required>
                        <small class="form-text text-muted">النقاط التي ستُخصم من الطالب (من 1 إلى 100)</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="negative_description">
                            <i class="fas fa-info-circle text-info"></i> الوصف (اختياري)
                        </label>
                        <textarea class="form-control" 
                                  id="negative_description" 
                                  name="description" 
                                  rows="3" 
                                  placeholder="وصف مختصر عن هذا السلوك وأسباب خصم النقاط..."
                                  maxlength="500"></textarea>
                        <small class="form-text text-muted">حد أقصى 500 حرف</small>
                    </div>
                    
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>تنبيه:</strong> استخدم السلوكيات السلبية بحكمة لتعزيز السلوك الإيجابي
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> إلغاء
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-minus"></i> إضافة السلوك
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>