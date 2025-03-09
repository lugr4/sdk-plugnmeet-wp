<?php
/**
 *
 */
class WaitingRoomFeaturesParameters
{
    /**
     * @var bool
     */
    protected $isActive = false;
    /**
     * @var string
     */
    protected $waitingRoomMsg;

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = filter_var($isActive, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return string
     */
    public function getWaitingRoomMsg(): string
    {
        return $this->waitingRoomMsg;
    }

    /**
     * @param string $waitingRoomMsg
     */
    public function setWaitingRoomMsg(string $waitingRoomMsg): void
    {
        if (!empty($waitingRoomMsg)) {
            $this->waitingRoomMsg = $waitingRoomMsg;
        }
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        $body = array(
            "is_active" => $this->isActive(),
        );

        if (!empty($this->waitingRoomMsg)) {
            $body["waiting_room_msg"] = $this->getWaitingRoomMsg();
        }

        return $body;
    }
}
