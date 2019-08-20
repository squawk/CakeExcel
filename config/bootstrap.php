<?php
use Cake\Event\EventManager;
use Cake\Event\Event;
use Cake\Network\Request;

EventManager::instance()->on('Controller.initialize', function (Event $event) {
    $controller = $event->getSubject();
    if ($controller->components()->has('RequestHandler')) {
        $controller->RequestHandler->setConfig('viewClassMap.xlsx', 'CakeExcel.Excel');
    }
});

Request::addDetector('xlsx', [
    'accept' => ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'],
    'param' => '_ext',
    'value' => 'xlsx'
]);
