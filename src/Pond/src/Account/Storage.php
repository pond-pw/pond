<?php

namespace Pond\Account;

class Storage
{
    private \SQLite3 $db;

    public function __construct(\SQLite3 $SQLite3)
    {
        $this->db = $SQLite3;
    }

    public function save(Account $account) : void
    {
        $sql = <<<EOD
            INSERT INTO accounts 
                (id,username,password) 
            VALUES(:id,:username,:password);
        EOD;

        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $account->getId());
        $statement->bindValue(':username', $account->getCredentials()->getUsername());
        $statement->bindValue(':password', $account->getCredentials()->getPassword());

        $sucessfullyAddded = $this->db->exec($statement);
        if($sucessfullyAddded) {
            return;
        }

    }


}
