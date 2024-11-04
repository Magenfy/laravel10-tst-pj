<?php

use App\Models\Product;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


//override or add env file or key
function overWriteEnvFile( $type, $val ) {
    $path = base_path( '.env' ); // get file ENV path
    if ( file_exists( $path ) ) {
        $val = '' . trim( $val ) . '';
        if ( is_numeric( strpos( file_get_contents( $path ), $type ) ) && strpos( file_get_contents( $path ), $type ) >= 0 ) {
            file_put_contents( $path, str_replace( $type . '=' . env( $type ) . '', $type . '=' . $val, file_get_contents( $path ) ) );
        } else {
            file_put_contents( $path, file_get_contents( $path ) . "\r\n" . $type . '=' . $val );
        }
    }
}

if (! function_exists('base_path')) {
    /**
     * Get the path to the base of the install.
     *
     * @param  string  $path
     * @return string
     */
    function base_path($path = '')
    {
        return app()->basePath($path);
    }
}

if (! function_exists('storage_path')) {
    /**
     * Get the path to the storage folder.
     *
     * @param  string  $path
     * @return string
     */
    function storage_path($path = '')
    {
        return app('path.storage').($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}