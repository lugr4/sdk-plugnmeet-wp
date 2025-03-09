<?php
/**
 *
 */
class BreakoutRoomFeaturesParameters
{
    /**
     * @var bool
     */
    protected $isAllow = true;
    /**
     * @var int
     */
    protected $allowedNumberRooms = 6;

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
     * @return int
     */
    public function getAllowedNumberRooms(): int
    {
        return $this->allowedNumberRooms;
    }

    /**
     * @param int $allowedNumberRooms
     */
    public function setAllowedNumberRooms(int $allowedNumberRooms): void
    {
        if ($allowedNumberRooms > 0) {
            $this->allowedNumberRooms = $allowedNumberRooms;
        }
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        return array(
            "is_allow" => $this->isAllow(),
            "allowed_number_rooms" => $this->getAllowedNumberRooms()
        );
    }
}
