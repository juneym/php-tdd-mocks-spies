<?php
namespace Tdd;

class AppCore
{

    public function run(AppRequest $req)
    {
        $values = array(
            $req->getParam('op', ''),
            $req->getParam('format', 'json')
        );

        return $this->format($values, $req);

    }


    public function format(array $result, AppRequest $req)
    {
        $result[] = $req->getParam('client_ip');
        return $result;
    }

}

class AppRequest
{

    public function getParam($name, $default=null)
    {
        $values = array(
            'op' => 'index',
            'format' => 'print_r',
            'client_ip' => '127.0.0.1'
        );

        return isset($values[$name]) ? $values[$name] : $default;
    }
}


