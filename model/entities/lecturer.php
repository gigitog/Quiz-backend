<?php


namespace Model\Entities;


class Lecturer {
    use \Library\Entity;
    use \Library\Shared;


    public function __construct(public string $id, public string $name, public string $position, private string $guid = '') {
    }


    // Todo: дописать
    public static function search(int $id, string $name, int $limit = 0):self|array|null {
        $result = [];

        $class = __CLASS__;
        $result[] = new $class($id, 'Микола', 'Годовиченко', 'Анатолієвич', 'стример');


        return $limit == 1 ? ($result[0] ?? null) : $result;
    }

}