<?php

/**
 *
 */
class SharedNotePadFeaturesParameters
{
    /**
     * @var bool
     */
    protected $allowedSharedNotePad = true;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return bool
     */
    public function isAllowedSharedNotePad(): bool
    {
        return $this->allowedSharedNotePad;
    }

    /**
     * @param bool $allowedSharedNotePad
     */
    public function setAllowedSharedNotePad(bool $allowedSharedNotePad): void
    {
        $this->allowedSharedNotePad = filter_var($allowedSharedNotePad, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        return array(
            "allowed_shared_note_pad" => $this->isAllowedSharedNotePad(),
        );
    }
}
