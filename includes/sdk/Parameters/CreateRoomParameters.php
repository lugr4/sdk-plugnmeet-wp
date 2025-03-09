<?php

/**
 *
 */
class CreateRoomParameters
{
    /**
     * @var string
     */
    protected $roomId;
    /**
     * @var int
     */
    protected $emptyTimeout = 0;
    /**
     * @var int
     */
    protected $maxParticipants = 0;
    /**
     * @var RoomMetadataParameters
     */
    protected $roomMetadata;

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
     * @return int
     */
    public function getEmptyTimeout(): int
    {
        return $this->emptyTimeout;
    }

    /**
     * @param int $emptyTimeout
     */
    public function setEmptyTimeout(int $emptyTimeout)
    {
        $this->emptyTimeout = $emptyTimeout;
    }

    /**
     * @return int
     */
    public function getMaxParticipants(): int
    {
        return $this->maxParticipants;
    }

    /**
     * @param int $maxParticipants
     */
    public function setMaxParticipants(int $maxParticipants)
    {
        $this->maxParticipants = $maxParticipants;
    }

    /**
     * @return RoomMetadataParameters
     */
    public function getRoomMetadata(): RoomMetadataParameters
    {
        return $this->roomMetadata;
    }

    /**
     * @param RoomMetadataParameters $roomMetadata
     */
    public function setRoomMetadata(RoomMetadataParameters $roomMetadata)
    {
        $this->roomMetadata = $roomMetadata;
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        $body = array(
            "room_id" => $this->getRoomId(),
        );

        if ($this->maxParticipants > 0) {
            $body['max_participants'] = $this->getMaxParticipants();
        }

        if ($this->emptyTimeout > 0) {
            $body['empty_timeout'] = $this->getEmptyTimeout();
        }

        if ($this->roomMetadata !== null) {
            $body['metadata'] = $this->getRoomMetadata()->buildBody();
        }

        return $body;
    }
}
