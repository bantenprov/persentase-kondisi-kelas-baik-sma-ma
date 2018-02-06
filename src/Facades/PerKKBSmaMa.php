<?php namespace Bantenprov\PerKKBSmaMa\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The PerKKBSmaMa facade.
 *
 * @package Bantenprov\PerKKBSmaMa
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PerKKBSmaMa extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'persentase-kondisi-kelas-baik-sma-ma';
    }
}
