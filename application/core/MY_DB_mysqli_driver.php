<?php
class MY_DB_mysqli_driver extends CI_DB_mysqli_driver
{
    public function __construct($params)
    {
        parent::__construct($params);
    }

    public function db_connect($persistent = FALSE)
    {
        $this->hostname = '127.0.0.1';
        $this->port     = 3306;
        $this->socket   = '';
        $max_retries = 3;
        $retry_delay = 2; // seconds

        mysqli_report(MYSQLI_REPORT_OFF); // avoid fatal error

        for ($attempt = 1; $attempt <= $max_retries; $attempt++) {
            $conn = @parent::db_connect($persistent);

            if ($conn !== FALSE && $this->conn_id) {
                // Prevent early disconnects
                @$this->simple_query("SET SESSION wait_timeout = 28800");
                return $conn;
            }

            log_message('error', "MySQL Connection Attempt {$attempt} failed.");
            if ($attempt < $max_retries) {
                sleep($retry_delay);
            }
        }

        log_message('error', "Failed to connect to MySQL after {$max_retries} attempts.");

        if (is_cli()) {
            echo "Database connection error. Please try again later.\n";
            exit(1);
        } else {
            show_error('Database connection error. Please try again later.');
        }
    }
}
