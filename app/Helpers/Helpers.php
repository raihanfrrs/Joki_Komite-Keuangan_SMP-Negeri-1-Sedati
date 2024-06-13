<?php

namespace App\Helpers;

class Helpers
{
    public static function generateAvatar($name, $type = null)
    {
        $stateNum = rand(0, 5);
        $states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'];
        $state = $states[$stateNum];
        preg_match_all('/\b\w/', $name, $matches);
        $initials = strtoupper(($matches[0][0] ?? '') . ($matches[0][count($matches[0]) - 1] ?? ''));

        if ($type == 'profile') {
            $output = '<span class="d-block h-100 ms-0 ms-sm-4 rounded user-profile-img bg-label-'. $state .' d-flex justify-content-center align-items-center" style="font-size: 32px;">'. $initials .'</span>';
        } elseif ($type == 'settings') {
            $output = '<span class="d-block w-px-100 h-px-100 rounded bg-label-'. $state .' d-flex justify-content-center align-items-center" style="font-size: 32px;">'. $initials .'</span>';
        } else {
            $output = '<span class="avatar-initial rounded-circle bg-label-' . $state . '">' . $initials . '</span>';
        }

        return $output;
    }
}