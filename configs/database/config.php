<?php

# Configure For Database
# Define Connection Constants

$data = parse_url(getenv("CLEARDB_DATABASE_URL"));

define("DBNAME", substr($data["path"], 1));
define("DBHOST", $data["host"]);
define("DBUSER", $data["user"]);
define("DBPASS", $data["pass"]);
define("DBTYPE", "mysql");

?>