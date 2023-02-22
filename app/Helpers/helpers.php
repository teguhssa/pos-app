<?php
    if (!function_exists('rupiah_format')) {
        function rupiah_format($value)
        {
            $result = "Rp " . number_format($value, 2, ',', '.');
            return $result;
        }
    }
