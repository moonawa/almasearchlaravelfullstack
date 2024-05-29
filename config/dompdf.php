<?php

return [
    'show_warnings' => false,
    'orientation' => 'portrait',
    'defines' => [
        "DOMPDF_ENABLE_PHP" => true,
        "DOMPDF_ENABLE_REMOTE" => true,
        "DOMPDF_TEMP_DIR" => storage_path('app/dompdf'),
        "DOMPDF_FONT_DIR" => storage_path('fonts'),
        "DOMPDF_FONT_CACHE" => storage_path('fonts'),
        "DOMPDF_LOG_OUTPUT_FILE" => storage_path('logs/dompdf.html'),
        "DOMPDF_ENABLE_CSS_FLOAT" => true,
        "DOMPDF_ENABLE_HTML5PARSER" => true,
    ],
];
