<?php

namespace App\core\ValidatorRules;

use PDO;
use Rakit\Validation\Validator;
use Rakit\Validation\Rule;

class UniqueRule extends Rule
{

    protected $message = ":attribute :value has been used";

    protected $fillableParams = ['table', 'column', 'except'];

    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $validator = new Validator();
        $validator->addValidator('unique', new UniqueRule($pdo));
    }

    public function check($value): bool
    {
        $this->requireParameters(['table', 'column']);

        $column = $this->parameter('column');
        $table = $this->parameter('table');
        $except = $this->parameter('except');

        if ($except and $except == $value) {
            return true;
        }

        $stmt = $this->pdo->prepare("select count(*) as count from `{$table}` where `{$column}` = :value");
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return intval($data['count']) === 0;
    }



}