<!-- Add Positive Skill Modal -->
<div class="modal fade" id="addPositiveSkill" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header positive">
                <h5 class="modal-title text-white">
                    <i class="fas fa-plus-circle"></i> إضافة مهارة إيجابية جديدة
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('addPositiveSkill') }}" method="POST">
                @csrf
                <input type="hidden" name="classroom" value="{{ $classroom }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="positive_name">
                            <i class="fas fa-star text-success"></i> اسم المهارة
                        </label>
                        <input type="text" 
                               class="form-control" 
                               id="positive_name" 
                               name="name" 
                               placeholder="مثال: مشاركة فعالة، أداء الواجب، مساعدة الزملاء"
                               required
                               maxlength="255">
                    </div>
                    
                    <div class="form-group">
                        <label for="positive_grade">
                            <i class="fas fa-trophy text-warning"></i> عدد النقاط
                        </label>
                        <input type="number" 
                               class="form-control" 
                               id="positive_grade" 
                               name="grade" 
                               min="1" 
                               max="100" 
                               value="5"
                               required>
                        <small class="form-text text-muted">النقاط التي ستُضاف للطالب (من 1 إلى 100)</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="positive_description">
                            <i class="fas fa-info-circle text-info"></i> الوصف (اختياري)
                        </label>
                        <textarea class="form-control" 
                                  id="positive_description" 
                                  name="description" 
                                  rows="3" 
                                  placeholder="وصف مختصر عن هذه المهارة وأهميتها..."
                                  maxlength="500"></textarea>
                        <small class="form-text text-muted">حد أقصى 500 حرف</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> إلغاء
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-plus"></i> إضافة المهارة
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>