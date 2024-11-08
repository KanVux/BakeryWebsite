<?php
if (!function_exists('PDO')) {
    function PDO(): PDO
    {
        global $PDO;
        return $PDO;
    }
}