<?php

namespace App\Lib\SxGeo;

class SypexGeo
{
    private SxGeo $sypex;
    public string $ip = '';
    public int $ipAsLong = 0;
    public array $city = [];
    public array $region = [];
    public array $country = [];

    public function __construct(SxGeo $object) {
        $this->sypex = $object;
    }

    public function get($ip='')
    {
        if (empty($ip)) {
            $this->getIP();
        } else if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return false;
        } else {
            $this->ip = $ip;
            $this->ipAsLong = sprintf('%u', ip2long($ip));
        }

        $data = $this->sypex->getCityFull($this->ip);
        if (isset($data['city'])) {
            $this->city = $data['city'];
        }
        if (isset($data['region'])) {
            $this->region = $data['region'];
        }
        if (isset($data['country'])) {
            $this->country = $data['country'];
        }
        return $data ?? [];
    }

    public function getIP()
    {
        if(getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif(getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif(getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } elseif(getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } elseif(getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } else {
            $ip = getenv('REMOTE_ADDR');
        }

        $this->ip = $ip;
        $this->ipAsLong = sprintf('%u', ip2long($ip));
        return $ip;
    }

}
