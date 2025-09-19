<!-- Edit Negative Skill Modal -->
<div class="modal fade" id="editNegative{{ $skill->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header negative">
                <h5 class="modal-title text-white">
                    <i class="fas fa-edit"></i> تعديل السلوك السلبي
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('editNegativeSkill', $skill->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="classroom" value="{{ $classroom }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_negative_name_{{ $skill->id }}">
                            <i class="fas fa-exclamation-triangle text-danger"></i> اسم السلوك السلبي
                        </label>
                        <input type="text" 
                               class="form-control" 
                               id="edit_negative_name_{{ $skill->id }}" 
                               name="name" 
                               value="{{ $skill->name }}"
                               required
                               maxlength="255">
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_negative_grade_{{ $skill->id }}">
                            <i class="fas fa-minus-square text-danger"></i> عدد النقاط المخصومة
                        </label>
                        <input type="number" 
                               class="form-control" 
                               id="edit_negative_grade_{{ $skill->id }}" 
                               name="grade" 
                               value="{{ $skill->grade }}"
                               min="1" 
                               max="100" 
                               required>
                        <small class="form-text text-muted">النقاط التي ستُخصم من الطالب (من 1 إلى 100)</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_negative_description_{{ $skill->id }}">
                            <i class="fas fa-info-circle text-info"></i> الوصف (اختياري)
                        </label>
                        <textarea class="form-control" 
                                  id="edit_negative_description_{{ $skill->id }}" 
                                  name="description" 
                                  rows="3" 
                                  maxlength="500">{{ $skill->description }}</textarea>
                        <small class="form-text text-muted">حد أقصى 500 حرف</small>
                    </div>
                    
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-circle"></i>
                        <strong>تنبيه:</strong> تعديل السلوك السلبي سيؤثر على النقاط المستقبلية فقط
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> إلغاء
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-save"></i> حفظ التعديلات
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>