<?php
/**
 * User Controller
 *
 * @author Faiuk Kostiantyn
 * @global object $CORE->model
 * @package Model\Main
 */
namespace Model;
class Main
{
	use \Library\Shared;

    public function questionget(array $data):?array{
        
        // $questions = json_decode(file_get_contents('data'. DIRECTORY_SEPARATOR .'QuestionsFile.txt'), true);

        // foreach ($questions as $q) 
        //     (new Entities\Question( $q['question'], $q['answers']))->save();
        
        $id = $data['id'];

        $result = Entities\Question::search($id);

        return [$result];
    }

	public function lecturersearch(array $data):?array {
        // decide search name or guid
        

        $result = [
            'ass'=> 4
        ];

	    return $result;
    }

	public function __construct() {
        $this->db = new \Library\MySQL('questions',
            \Library\MySQL::connect(
                $this->getVar('DB_HOST', 'e'),
                $this->getVar('DB_USER', 'e'),
                $this->getVar('DB_PASS', 'e')
            ) );
        $this->setDB($this->db);
	}
}