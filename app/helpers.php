<?php

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

if (!function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param string $path
     *
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('generate_otp')) {
    /**
     * Generate random OTP
     *
     * @param int $length
     *
     * @return string
     */
    function generate_otp(int $length = 6)
    {
        $pool = '0123456789';

        do {
            $code = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
        } while (strlen((string)((int)$code)) < $length);

        return $code;
    }
}

// if (!function_exists('generate_qrCode')) {
//    /**
//     * Generate random OTP
//     *
//     * @param string $code
//     * @return string
//     */
//    function generate_qrCode(string $code): string
//    {
//        $imagePath = "qrcodes/" . $code . "/" . $code . Carbon::now() . ".png";
//        QrCode::format('png')
// //            ->merge('path-to-image.png')
//            ->generate($code, public_path($imagePath));
//        return $imagePath;
//    }
// }
if (!function_exists('success')) {
    /**
     * Return successful response from the application.
     *
     * @param string $message
     * @param null $object
     * @param int $status
     *
     * @return JsonResponse
     */
    function success(string $message = '', $object = null, int $status = 200)
    {
        return response()->json(['success' => true, 'message' => $message, 'data' => $object], $status);
    }
}

if (!function_exists('failed')) {
    /**
     * Return failed response from the application.
     *
     * @param string $message
     * @param int $status
     *
     * @return JsonResponse
     */
    function failed(string $message = '', int $status = 500)
    {
        return response()->json(['success' => false, 'message' => $message, 'statusCode' => $status], $status);
    }
}

if (!function_exists('uploadFile')) {
    /**
     * Return failed response from the application.
     *
     *
     * @param \Illuminate\Filesystem\Filesystem $filesystem
     * @param null $folder
     * @return string
     */
    function uploadFile(\Illuminate\Filesystem\Filesystem $filesystem, $folder = null)
    {
        $upload = request()->file('file');
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $date = $year . '-' . $month . '-' . $day;
        if ($folder != null)
            $filePath = "/upload/files/{$folder}/{$date}";
        else
            $filePath = "/upload/files/{$date}";

        File::makeDirectory(public_path($filePath), 0755, true, true);
        $filename = $upload->getClientOriginalName();
        if ($filesystem->exists(public_path("{$filePath}/{$filename}"))) {
            $filename = Carbon::now()->timestamp . "-{$filename}";
        }
        $upload->move(public_path($filePath), $filename);
        return "{$filePath}/{$filename}";
    }
}


if (!function_exists('uploadFileBase64')) {
    /**
     * Return failed response from the application.
     *
     *
     * @param string|null $folder
     * @return string
     */
    function uploadFileBase64(string $folder = null): string
    {
        $image = request()->input('file');
        $now = Carbon::now();
        $year = $now->year;
        $month = $now->month;
        $day = $now->day;
        $date = $year . '-' . $month . '-' . $day;
        if ($folder != null) {
            $filePath = "/upload/files/{$folder}/{$date}";
            $filename = Str::random(12) . '.' . 'png';
            $image = str_replace('data:image/jpg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
        } else {
            $filePath = "/upload/files/{$date}";
            $filename = Str::random(12) . '.' . 'png';
            $image = str_replace('data:image/jpg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
        }

        File::makeDirectory(public_path($filePath), 0755, true, true);
        if (File::exists(public_path("{$filePath}/{$filename}"))) {
            $filename = Carbon::now()->timestamp . "-{$filename}";
        }
        File::put(public_path("{$filePath}/{$filename}"), base64_decode($image));
        return "{$filePath}/{$filename}";
    }

}

