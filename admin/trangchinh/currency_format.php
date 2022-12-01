<?php
// chuyển đơn vị tiền tệ vnd
// currentcy_format(1000000) // 1.000.000đ
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}
