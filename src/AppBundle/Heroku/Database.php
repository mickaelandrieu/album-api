<?php

namespace AppBundle\Heroku;

/**
 * Setup database configuration from environment variables (Heroku deployment)
 */
class Database
{
    /**
     * Creates parameters.
     */
    public static function createParameters()
    {
        $databaseUrl = getenv('DATABASE_URL');

        if (!empty($databaseUrl)) {
            $database = parse_url($databaseUrl);

            putenv(sprintf('SYMFONY__DATABASE_HOST=%s', $database['host']));
            putenv(sprintf('SYMFONY__DATABASE_PORT=%s', $database['port']));
            putenv(sprintf('SYMFONY__DATABASE_USER=%s', $database['user']));
            putenv(sprintf('SYMFONY__DATABASE_PASSWORD=%s', $database['pass']));
            putenv(sprintf('SYMFONY__DATABASE_NAME=%s', ltrim($database['path'], '/')));
        }
    }
}