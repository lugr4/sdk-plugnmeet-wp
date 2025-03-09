<?php

/*
*
*
*/
class DisplayExternalLinkFeaturesParameters
{
    /**
     * @var bool
     */
    protected $isAllow = true;

    public function __construct()
    {
    }

    /**
     * @return bool
     */
    public function isAllow(): bool
    {
        return $this->isAllow;
    }

    /**
     * @param bool $isAllow
     */
    public function setIsAllow(bool $isAllow): void
    {
        $this->isAllow = filter_var($isAllow, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        return array(
            "is_allow" => $this->isAllow(),
        );
    }
}
