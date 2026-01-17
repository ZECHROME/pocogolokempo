<?php
if (!isset($_SESSION['admin'])) {
    http_response_code(403);
    exit("Access denied");
}