<?php
  
  require_once 'vendor/autoload.php';
  
  use Workerman\Worker;
  use PHPSocketIO\SocketIO;
  
  $io = new SocketIO(2021);
  
  $io->on('connection', function ($socket) use ($io) {
    $socket->on('print', function ($data) use ($io) {
      $io->emit('print device ' . $data['id'], $data);
    });
    
    $socket->on('emit', function ($data) use ($io) {
      $io->emit($data['namespace'], $data['data'] ?? []);
    });
  });
  
  Worker::runAll();