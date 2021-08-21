<?php

declare(strict_types=1);

namespace Pond\Account;

class Repository
{
    private \SQLite3 $db;

    public function __construct(\SQLite3 $db)
    {
        $this->db = $db;
    }

    public function isAccountNameAvailable(Username $username) : bool
    {
        $query = $this->db->prepare("SELECT count(*) FROM accounts WHERE username = :username");
        $query->bindValue(':username',$username->__toString());
        $sql = $query->getSql();
        return intval($this->db->querySingle($sql)) == 0;
    }
}
