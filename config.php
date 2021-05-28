<?php
/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.0.0
 * ---------------------------------------------------------------------------- */

/**
 * Easy!Appointments Configuration File
 *
 * Set your installation BASE_URL * without the trailing slash * and the database
 * credentials in order to connect to the database. You can enable the DEBUG_MODE
 * while developing the application.
 *
 * Set the default language by changing the LANGUAGE constant. For a full list of
 * available languages look at the /application/config/config.php file.
 *
 * IMPORTANT:
 * If you are updating from version 1.0 you will have to create a new "config.php"
 * file because the old "configuration.php" is not used anymore.
 */
class Config {

    // ------------------------------------------------------------------------
    // GENERAL SETTINGS
    // ------------------------------------------------------------------------

    public static function getBaseUrl() {
        return $_ENV['BASE_URL'];
    }

    const LANGUAGE      = 'english';
    const DEBUG_MODE    = TRUE;

    // ------------------------------------------------------------------------
    // DATABASE SETTINGS
    // ------------------------------------------------------------------------

    public static function getDbHost() {
        return $_ENV['DB_HOST'];
    }

    public static function getDbName() {
        return $_ENV['DB_NAME'];
    }

    public static function getDbUsername() {
        return $_ENV['DB_USERNAME'];
    }

    public static function getDbPassword() {
        return $_ENV['DB_PASSWORD'];
    }

    // ------------------------------------------------------------------------
    // GOOGLE CALENDAR SYNC
    // ------------------------------------------------------------------------

    const GOOGLE_SYNC_FEATURE   = TRUE; // You can optionally enable the Google Sync feature.
    const GOOGLE_PRODUCT_NAME   = 'Coachyard-GCal';
    const GOOGLE_CLIENT_ID      = '28761441816-9pqn9jfc0890vv13t0g0ddrhcro22cgo.apps.googleusercontent.com';
    const GOOGLE_CLIENT_SECRET  = 'TGLYu3c6Lpescg7hsf3hiEwn';
    const GOOGLE_API_KEY        = 'AIzaSyDfXWXJcFb3ENBAKgDTHBum4XQJmi9G8sI';
}

/* End of file config.php */
/* Location: ./config.php */
