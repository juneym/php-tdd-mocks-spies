<?php
namespace Tdd;

class AppCore
{

    public function run(AppRequest $req)
    {
        return array(
            $req->getParam('op', ''),
            $req->getParam('format', 'json')
        );

    }

}

class AppRequest
{

    public function getParam($name, $default=null)
    {
        $values = array(
            'op' => 'index',
            'format' => 'print_r'
        );

        return isset($values[$name]) ? $values[$name] : $default;
    }
}


