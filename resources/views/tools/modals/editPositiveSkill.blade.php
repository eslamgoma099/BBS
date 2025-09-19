<!-- Edit Positive Skill Modal -->
<div class="modal fade" id="editPositive{{ $skill->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header positive">
                <h5 class="modal-title text-white">
                    <i class="fas fa-edit"></i> تعديل المهارة الإيجابية
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('editPositiveSkill', $skill->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="classroom" value="{{ $classroom }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_positive_name_{{ $skill->id }}">
                            <i class="fas fa-star text-success"></i> اسم المهارة
                        </label>
                        <input type="text" 
                               class="form-control" 
                               id="edit_positive_name_{{ $skill->id }}" 
                               name="name" 
                               value="{{ $skill->name }}"
                               required
                               maxlength="255">
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_positive_grade_{{ $skill->id }}">
                            <i class="fas fa-trophy text-warning"></i> عدد النقاط
                        </label>
                        <input type="number" 
                               class="form-control" 
                               id="edit_positive_grade_{{ $skill->id }}" 
                               name="grade" 
                               value="{{ $skill->grade }}"
                               min="1" 
                               max="100" 
                               required>
                        <small class="form-text text-muted">النقاط التي ستُضاف للطالب (من 1 إلى 100)</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_positive_description_{{ $skill->id }}">
                            <i class="fas fa-info-circle text-info"></i> الوصف (اختياري)
                        </label>
                        <textarea class="form-control" 
                                  id="edit_positive_description_{{ $skill->id }}" 
                                  name="description" 
                                  rows="3" 
                                  maxlength="500">{{ $skill->description }}</textarea>
                        <small class="form-text text-muted">حد أقصى 500 حرف</small>
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <strong>ملاحظة:</strong> تعديل المهارة سيؤثر على النقاط المستقبلية فقط
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> إلغاء
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> حفظ التعديلات
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>