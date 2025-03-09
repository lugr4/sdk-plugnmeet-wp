<?php
/**
 *
 */
class RecordingDownloadTokenParameters
{
    /**
     * @var string
     */
    protected $recordId;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getRecordId(): string
    {
        return $this->recordId;
    }

    /**
     * @param string $recordId
     */
    public function setRecordId(string $recordId): void
    {
        $this->recordId = $recordId;
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        return array(
            "record_id" => $this->getRecordId(),
        );
    }
}
