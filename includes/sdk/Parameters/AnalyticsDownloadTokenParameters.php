<?php
/**
 *
 */
class AnalyticsDownloadTokenParameters
{
    /**
     * @var string
     */
    protected $fileId;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     */
    public function setFileId(string $fileId): void
    {
        $this->fileId = $fileId;
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        return array(
            "file_id" => $this->getFileId(),
        );
    }
}
