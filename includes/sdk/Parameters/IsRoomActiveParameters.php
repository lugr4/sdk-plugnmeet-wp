<?php

/**
 *
 */
class IsRoomActiveParameters
{
    /**
     * @var string
     */
    protected $roomId;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getRoomId(): string
    {
        return $this->roomId;
    }

    /**
     * @param string $roomId
     */
    public function setRoomId(string $roomId)
    {
        $this->roomId = $roomId;
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        return array(
            "room_id" => $this->getRoomId(),
        );
    }
}
