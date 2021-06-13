<?php

namespace Model\Entities;

class Question {
    use \Library\Entity;
    use \Library\Shared;

    public function __construct(public string $question, public array $answers, public int $id = 0) {
    }


    public static function search(int $id):self|null {
        $request = self::getDB()->select(['question' => [] ])->where(['question' => ['id' => $id ] ])->many(1);
        
        if ($request)
            $obj = new (__CLASS__)($request[0]['question'], json_decode($request[0]['answers']), $request[0]['id']);

        return $obj ?? null;
    }

    public function save():self {
        if(!$this->id){
            $this->id = self::getDB()->insert(['question' => [
                    'question' => $this->question,
                    'answers' => json_encode($this->answers, JSON_UNESCAPED_UNICODE)
                ]])->run(true)->storage['inserted'];
        }
        return $this;
    }

}