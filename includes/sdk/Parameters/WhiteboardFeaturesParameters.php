<?php

/**
 *
 */
class WhiteboardFeaturesParameters
{
    /**
     * @var bool
     */
    protected $allowedWhiteboard = true;
    /**
     * @var string|null
     */
    protected $preloadFile = null;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return bool
     */
    public function isAllowedWhiteboard(): bool
    {
        return $this->allowedWhiteboard;
    }

    /**
     * @param bool $allowedWhiteboard
     */
    public function setAllowedWhiteboard(bool $allowedWhiteboard): void
    {
        $this->allowedWhiteboard = filter_var($allowedWhiteboard, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return string|null
     */
    public function getPreloadFile(): ?string
    {
        return $this->preloadFile;
    }

    /**
     * @param string $preloadFileUrl
     * Should be direct http/https link & no redirection
     * example: https://mydomain.com/text_book.pdf
     */
    public function setPreloadFile(string $preloadFileUrl): void
    {
        if (filter_var($preloadFileUrl, FILTER_VALIDATE_URL) === false) {
            return;
        }

        $context = stream_context_create(
            [
                'http' => array(
                    'method' => 'HEAD',
                    'follow_location' => 0
                )
            ]
        );
        $headers = get_headers($preloadFileUrl, true, $context);
        if (
            $headers &&
            strpos($headers[0], '200') !== false &&
            isset($headers["Content-Length"]) &&
            (int)$headers["Content-Length"] > 1
        ) {
            $this->preloadFile = $preloadFileUrl;
        }
    }

    /**
     * @return array
     */
    public function buildBody(): array
    {
        $body = array(
            "allowed_whiteboard" => $this->isAllowedWhiteboard(),
        );

        if (!empty($this->preloadFile)) {
            $body["preload_file"] = $this->getPreloadFile();
        }

        return $body;
    }
}
