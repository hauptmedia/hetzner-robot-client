<?php
require 'RobotClient.class.php';

$robot = new RobotClient('https://robot-ws.your-server.de', 'login', 'password');

// retrieve all failover ips
$results = $robot->failoverGet();

foreach ($results as $result)
{
  echo $result->failover->ip . "\n";
  echo $result->failover->server_ip . "\n";
  echo $result->failover->active_server_ip . "\n";
}

// retrieve a specific failover ip
$result = $robot->failoverGet('123.123.123.123');

echo $result->failover->ip . "\n";
echo $result->failover->server_ip . "\n";
echo $result->failover->active_server_ip . "\n";

// switch routing
try
{
  $robot->failoverRoute('123.123.123.123', '213.133.104.190');
}
catch (RobotClientException $e)
{
  echo $e->getMessage() . "\n";
}


