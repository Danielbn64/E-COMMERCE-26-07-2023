<?php

class pagination
{
    private static $total_pagination;

    public function get_page()
    {
        $page = 1;
        $currentUrl = $_SERVER['REQUEST_URI'];
        if (strpos($currentUrl, "page") !== false) {
            $parts = explode("=", $currentUrl);
            $page = end($parts);
            return  $page;
        } else {
            return $page;
        }
    }

    public function paginationPolicy($num_rows)
    {
        self::$total_pagination = ceil($num_rows / records_per_page);
    }

    public static function render()
    {
        for ($i = 1; $i <= self::$total_pagination; $i++) {
            echo "<a class='pagination-numbers' href = '?page=$i' >$i</a> ";
        }
    }
}
