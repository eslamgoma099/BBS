@extends('admin.layouts.admin-app')

@section('content')
<div class="content-wrap">
    <main class="content-body">
        <!-- Breadcrumb -->
        <div class="content-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/admin') }}">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                            </svg>
                            الرئيسية
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">إدارة الأدوار</li>
                </ol>
            </nav>
        </div>

        <!-- Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">إدارة الأدوار</h5>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="me-1">
                                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                            </svg>
                            إضافة دور جديد
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="rolesTable" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الدور</th>
                                        <th>الوصف</th>
                                        <th>عدد المستخدمين</th>
                                        <th>تاريخ الإنشاء</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>
                                            <span class="badge bg-primary">{{ $role->name }}</span>
                                        </td>
                                        <td>{{ $role->description ?? 'لا يوجد وصف' }}</td>
                                        <td>
                                            <span class="badge bg-info">{{ $role->users_count ?? 0 }}</span>
                                        </td>
                                        <td>{{ $role->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-primary"
                                                        onclick="viewRole({{ $role->id }})"
                                                        title="عرض التفاصيل">
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                                    </svg>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-success"
                                                        onclick="editRole({{ $role->id }})"
                                                        title="تعديل">
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                                    </svg>
                                                </button>
                                                @if($role->id !== 1) <!-- منع حذف دور المدير الرئيسي -->
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                        onclick="deleteRole({{ $role->id }})"
                                                        title="حذف">
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                                    </svg>
                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Role Modal -->
        <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addRoleModalLabel">إضافة دور جديد</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="addRoleForm">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="roleName" class="form-label">اسم الدور</label>
                                <input type="text" class="form-control" id="roleName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="roleDescription" class="form-label">الوصف</label>
                                <textarea class="form-control" id="roleDescription" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">الصلاحيات</label>
                                <div class="row">
                                    @if(isset($permissions))
                                        @foreach($permissions as $permission)
                                        <div class="col-md-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                       name="permissions[]" value="{{ $permission->id }}"
                                                       id="permission_{{ $permission->id }}">
                                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                    {{ $permission->display_name ?? $permission->name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="me-1">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                                حفظ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Role Modal -->
        <div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRoleModalLabel">تعديل الدور</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editRoleForm">
                        <input type="hidden" id="editRoleId" name="id">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="editRoleName" class="form-label">اسم الدور</label>
                                <input type="text" class="form-control" id="editRoleName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="editRoleDescription" class="form-label">الوصف</label>
                                <textarea class="form-control" id="editRoleDescription" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">الصلاحيات</label>
                                <div class="row" id="editPermissions">
                                    <!-- سيتم تحميل الصلاحيات عبر JavaScript -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="me-1">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                                تحديث
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- View Role Modal -->
        <div class="modal fade" id="viewRoleModal" tabindex="-1" aria-labelledby="viewRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewRoleModalLabel">تفاصيل الدور</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="roleDetails">
                            <!-- سيتم تحميل التفاصيل عبر JavaScript -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<style>
    .content-wrap {
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .content-body {
        padding: 2rem;
    }

    .content-header {
        margin-bottom: 2rem;
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
        margin: 0;
    }

    .breadcrumb-item a {
        text-decoration: none;
        color: #6c757d;
        display: flex;
        align-items: center;
    }

    .breadcrumb-item a svg {
        margin-left: 0.25rem;
    }

    .card {
        border: none;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        border-radius: 0.5rem;
    }

    .card-header {
        background-color: #fff;
        border-bottom: 1px solid #dee2e6;
        padding: 1.25rem;
    }

    .btn-group .btn {
        margin-left: 0.25rem;
    }

    .btn-group .btn:first-child {
        margin-left: 0;
    }

    .table th {
        border-top: none;
        font-weight: 600;
        color: #495057;
        background-color: #f8f9fa;
    }

    .badge {
        font-size: 0.75em;
    }

    .modal-content {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .form-check-input:checked {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#rolesTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/ar.json'
        },
        responsive: true,
        pageLength: 25,
        order: [[0, 'desc']],
        columnDefs: [
            { orderable: false, targets: [-1] } // Disable sorting for actions column
        ]
    });

    // Add Role Form Submission
    $('#addRoleForm').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const permissions = [];
        $('input[name="permissions[]"]:checked').each(function() {
            permissions.push(this.value);
        });
        formData.append('permissions', JSON.stringify(permissions));

        $.ajax({
            url: '{{ route("admin.roles.store") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#addRoleModal').modal('hide');
                    location.reload();
                    showNotification('تم إضافة الدور بنجاح', 'success');
                }
            },
            error: function(xhr) {
                const errors = xhr.responseJSON.errors;
                showValidationErrors(errors);
            }
        });
    });

    // Edit Role Form Submission
    $('#editRoleForm').on('submit', function(e) {
        e.preventDefault();

        const roleId = $('#editRoleId').val();
        const formData = new FormData(this);
        const permissions = [];
        $('#editPermissions input[type="checkbox"]:checked').each(function() {
            permissions.push(this.value);
        });
        formData.append('permissions', JSON.stringify(permissions));
        formData.append('_method', 'PUT');

        $.ajax({
            url: `{{ url('/admin/roles') }}/${roleId}`,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#editRoleModal').modal('hide');
                    location.reload();
                    showNotification('تم تحديث الدور بنجاح', 'success');
                }
            },
            error: function(xhr) {
                const errors = xhr.responseJSON.errors;
                showValidationErrors(errors);
            }
        });
    });
});

// View Role Function
function viewRole(roleId) {
    $.ajax({
        url: `{{ url('/admin/roles') }}/${roleId}`,
        method: 'GET',
        success: function(response) {
            const role = response.role;
            const permissions = response.permissions;

            let permissionsHtml = '<div class="row">';
            permissions.forEach(permission => {
                permissionsHtml += `
                    <div class="col-md-6 mb-2">
                        <span class="badge bg-primary">${permission.display_name || permission.name}</span>
                    </div>
                `;
            });
            permissionsHtml += '</div>';

            $('#roleDetails').html(`
                <div class="row">
                    <div class="col-md-6">
                        <h6>اسم الدور:</h6>
                        <p class="text-muted">${role.name}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>عدد المستخدمين:</h6>
                        <p class="text-muted">${role.users_count || 0}</p>
                    </div>
                    <div class="col-12">
                        <h6>الوصف:</h6>
                        <p class="text-muted">${role.description || 'لا يوجد وصف'}</p>
                    </div>
                    <div class="col-12">
                        <h6>الصلاحيات:</h6>
                        ${permissionsHtml}
                    </div>
                    <div class="col-md-6">
                        <h6>تاريخ الإنشاء:</h6>
                        <p class="text-muted">${new Date(role.created_at).toLocaleDateString('ar')}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>آخر تحديث:</h6>
                        <p class="text-muted">${new Date(role.updated_at).toLocaleDateString('ar')}</p>
                    </div>
                </div>
            `);

            $('#viewRoleModal').modal('show');
        },
        error: function() {
            showNotification('حدث خطأ في تحميل البيانات', 'error');
        }
    });
}

// Edit Role Function
function editRole(roleId) {
    $.ajax({
        url: `{{ url('/admin/roles') }}/${roleId}/edit`,
        method: 'GET',
        success: function(response) {
            const role = response.role;
            const permissions = response.permissions;
            const allPermissions = response.all_permissions;

            $('#editRoleId').val(role.id);
            $('#editRoleName').val(role.name);
            $('#editRoleDescription').val(role.description);

            let permissionsHtml = '';
            allPermissions.forEach(permission => {
                const isChecked = permissions.some(p => p.id === permission.id) ? 'checked' : '';
                permissionsHtml += `
                    <div class="col-md-6 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                   name="permissions[]" value="${permission.id}"
                                   id="edit_permission_${permission.id}" ${isChecked}>
                            <label class="form-check-label" for="edit_permission_${permission.id}">
                                ${permission.display_name || permission.name}
                            </label>
                        </div>
                    </div>
                `;
            });

            $('#editPermissions').html(permissionsHtml);
            $('#editRoleModal').modal('show');
        },
        error: function() {
            showNotification('حدث خطأ في تحميل البيانات', 'error');
        }
    });
}

// Delete Role Function
function deleteRole(roleId) {
    if (confirm('هل أنت متأكد من حذف هذا الدور؟')) {
        $.ajax({
            url: `{{ url('/admin/roles') }}/${roleId}`,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                    showNotification('تم حذف الدور بنجاح', 'success');
                }
            },
            error: function(xhr) {
                const message = xhr.responseJSON?.message || 'حدث خطأ في حذف الدور';
                showNotification(message, 'error');
            }
        });
    }
}

// Show Notification Function
function showNotification(message, type) {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const icon = type === 'success' ?
        '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>' :
        '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>';

    const alert = $(`
        <div class="alert ${alertClass} alert-dismissible fade show position-fixed"
             style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
            <div class="d-flex align-items-center">
                ${icon}
                <span class="ms-2">${message}</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `);

    $('body').append(alert);

    setTimeout(() => {
        alert.alert('close');
    }, 5000);
}

// Show Validation Errors Function
function showValidationErrors(errors) {
    let errorMessage = 'يرجى تصحيح الأخطاء التالية:\n';
    for (let field in errors) {
        errorMessage += `- ${errors[field][0]}\n`;
    }
    showNotification(errorMessage, 'error');
}
</script>
@endpush
@endsection
