<?php

namespace Ml\DpdApi\DPDDataStructures;

class AuthDataV1
{
    public string $login;
    public string $password;
    public int $masterFid;

    public function __construct(string $Login, string $Password, int $MasterFID)
    {
        $this->login = $Login;
        $this->password = $Password;
        $this->masterFid = $MasterFID;
    }
}
