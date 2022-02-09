<?php

class VarBucket {

    private static $data = [];

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function setData($key, $value)
    {
        static::$data[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function getData($key)
    {
        return static::$data[$key] ?? null;
    }
}
