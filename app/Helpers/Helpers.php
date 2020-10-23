<?php
/**
 * Format route action
 *
 * @param string $controller
 * @param string $method
 *
 * @return string
 */
// function formatAction(string $controller, string $method = 'index'): string
// {
//     return "${controller}@${method}";
// }

/**
 * Set mime types for file
 *
 * @param string $filename
 *
 * @return mixed|string
 */
function mime_type(string $filename)
{
    $mime_types = [

        'txt' => 'text/plain',
        'htm' => 'text/html',
        'html' => 'text/html',
        'php' => 'text/html',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'xml' => 'application/xml',
        'swf' => 'application/x-shockwave-flash',
        'flv' => 'video/x-flv',

        // images
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',

        // archives
        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
        'exe' => 'application/x-msdownload',
        'msi' => 'application/x-msdownload',
        'cab' => 'application/vnd.ms-cab-compressed',

        // audio/video
        'mp3' => 'audio/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',

        // adobe
        'pdf' => 'application/pdf',
        'psd' => 'image/vnd.adobe.photoshop',
        'ai' => 'application/postscript',
        'eps' => 'application/postscript',
        'ps' => 'application/postscript',

        // ms office
        'doc' => 'application/msword',
        'rtf' => 'application/rtf',
        'xls' => 'application/vnd.ms-excel',
        'ppt' => 'application/vnd.ms-powerpoint',

        // open office
        'odt' => 'application/vnd.oasis.opendocument.text',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
    ];

    $type = explode('.', $filename);
    $ext = strtolower(array_pop($type));

    if (array_key_exists($ext, $mime_types)) {
        return $mime_types[$ext];
    }

    if (function_exists('finfo_open')) {
        $finfo = finfo_open(FILEINFO_MIME);
        $mimetype = finfo_file($finfo, $filename);
        finfo_close($finfo);

        return $mimetype;
    }

    return 'application/octet-stream';
}

/**
 * Convert megabytes to bytes
 *
 * @param float $megabytes
 *
 * @return int
 */
function megabytesToBytes(float $megabytes): int
{
    return $megabytes * 1048576;
}

/**
 * Convert bytes to megabytes
 *
 * @param float $megabytes
 * @param int   $decimals
 *
 * @return int
 */
function bytesToMegabyte(float $megabytes, int $decimals = 2): int
{
    return number_format($megabytes / 1048576, $decimals);
}

function formatSizeUnits($bytes): string
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' Gb';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' Mb';
        // $bytes = number_format($bytes, 0) . ' Mb';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' Kb';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }

    return $bytes;
}

/**
 * Convert date from model format to sql date format
 *
 * @param string $date
 *
 * @param string $fromFormat
 *
 * @param string $toFormat
 *
 * @return string
 */
function convertDateFormat(string $date, string $fromFormat = 'd-m-Y', string $toFormat = 'Y-m-d'): string
{
    return \Carbon\Carbon::hasFormat($date, $fromFormat) ?
        \Carbon\Carbon::createFromFormat($fromFormat, $date)->format($toFormat) : $date;
}
