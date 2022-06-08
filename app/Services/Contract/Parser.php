<?php

namespace App\Services\Contract;

interface Parser
{
    /**
     * @param string $link
     * @return Parser
     */
    public function setLink(string $link): Parser;
    public function parse(): array;
}
