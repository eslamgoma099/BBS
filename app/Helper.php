<?php

use Illuminate\Support\Arr;

/**
 * تنسيق مبلغ مع رمز عملة المستخدم الحالي (لو متاح).
 */
if (! function_exists('amt')) {
    function amt($value): string
    {
        $sign = optional(optional(auth()->user())->currency)->sign ?? '';
        $num  = is_numeric($value) ? (float) $value : 0.0;

        return $sign . number_format($num, 2);
    }
}

/**
 * تحويل أرقام بصيغة علمية إلى نص عادي.
 */
if (! function_exists('convertFloat')) {
    function convertFloat($floatAsString): string
    {
        $norm = (string) (float) $floatAsString;

        if (($e = strrchr($norm, 'E')) === false) {
            return $norm;
        }

        return number_format($norm, - (int) substr($e, 1));
    }
}

/**
 * فحص صلاحية/أكثر من صلاحية للمستخدم الحالي.
 * يقبل اسم/أسماء صلاحيات مفصولة بفواصل أو Array.
 * يرجّع true لو عنده أي واحدة منها.
 */
if (! function_exists('check_permission')) {
    function check_permission($keys): bool
    {
        $user = auth()->user();
        if (! $user) {
            return false;
        }

        // حوّل الإدخال إلى Array من أسماء الصلاحيات المطلوبة
        $required = is_array($keys)
            ? array_values(array_filter(array_map('trim', $keys)))
            : array_values(array_filter(array_map('trim', explode(',', (string) $keys))));

        if (empty($required)) {
            return false;
        }

        // لو المشروع بيستخدم spatie/permission استعملها مباشرة (أدق وأسرع)
        if (method_exists($user, 'getAllPermissions')) {
            return $user->hasAnyPermission($required);
        }

        // بديل عام: اجمع كل صلاحيات المستخدم من أدواره
        $userPermissions = $user->roles()
            ->with('permissions:id,name')
            ->get()
            ->pluck('permissions.*.name')
            ->flatten()
            ->unique()
            ->values();

        // هل يملك أي صلاحية مطلوبة؟
        foreach ($required as $perm) {
            if ($userPermissions->contains($perm)) {
                return true;
            }
        }

        return false;
    }
}

/**
 * نفس check_permission لكن ليوزر معيّن مُمرَّر كـ parameter.
 */
if (! function_exists('check_permission_user')) {
    function check_permission_user($keys, $user): bool
    {
        if (! $user) {
            return false;
        }

        $required = is_array($keys)
            ? array_values(array_filter(array_map('trim', $keys)))
            : array_values(array_filter(array_map('trim', explode(',', (string) $keys))));

        if (empty($required)) {
            return false;
        }

        if (method_exists($user, 'getAllPermissions')) {
            return $user->hasAnyPermission($required);
        }

        $userPermissions = $user->roles()
            ->with('permissions:id,name')
            ->get()
            ->pluck('permissions.*.name')
            ->flatten()
            ->unique()
            ->values();

        foreach ($required as $perm) {
            if ($userPermissions->contains($perm)) {
                return true;
            }
        }

        return false;
    }
}
