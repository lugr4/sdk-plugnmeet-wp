<?php

/**
 *
 */
class FetchPastRoomsParameters
{
    /**
     * @var array
     */
    protected $roomIds = array();
    /**
     * @var int
     */
    protected $from = 0;
    /**
     * @var int
     */
    protected $limit = 20;
    /**
     * @var string
     */
    protected $orderBy = "ASC";

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function getRoomIds(): array
    {
        return $this->roomIds;
    }

    /**
     * @param array $roomIds
     */
    public function setRoomIds(array $roomIds): void
    {
        $this->roomIds = $roomIds;
    }

    /**
     * @return int
     */
    public function getFrom(): int
    {
        return $this->from;
    }

    /**
     * @param int $from
     */
    public function setFrom(int $from): void
    {
        $this->from = $from;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     */
    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @return string
     */
    public function getOrderBy(): string
    {
        return $this->orderBy;
    }

    /**
     * @param string $orderBy
     * value can be ASC or DESC
     */
    public function setOrderBy(string $orderBy): void
    {
        $this->orderBy = $orderBy;
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        return array(
            "room_ids" => $this->getRoomIds(),
            "from" => $this->getFrom(),
            "limit" => $this->getLimit(),
            "order_by" => $this->getOrderBy()
        );
    }
}
