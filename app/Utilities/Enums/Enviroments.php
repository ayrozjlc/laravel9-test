<?php

namespace App\Utilities\enums;

use Exception;

enum Enviroments
{
    case local;
    case develop;
    case prod;
    case staging;

    public function validEnv($args)
    {
        $env = (isset($args['env']) && !empty($args['env'])) ? $args['env'] : self::local->name;
        $min = $this->minEnv($env);
        $list = $this->listEnv();
        if (in_array($min, $list)) {
            $args['env'] = $min;
        } else {
            throw new Exception("Enviroment no valid.", 1);
        }

        return $args['env'];
    }

    public function minEnv($text)
    {
        return mb_convert_case($text, MB_CASE_LOWER);
    }

    public function listEnv()
    {
        $list = [];
        $names = self::cases();

        foreach ($names as $n) {
            $list[] = $n->name;
        }

        return $list;
    }

    public function noDev($env)
    {
        if (empty($env)) {
            throw new Exception("var env no exist.", 1);
        }
        $listNoDev = [self::prod, self::staging, self::develop];

        return in_array($env, $listNoDev);
    }
}
