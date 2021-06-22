<?php

namespace MusicEngine\Midleware;

use eftec\bladeone\BladeOne;

class RenderEngine extends BladeOne
{
    public function __construct(string $templatePath = "../resources/views", string $compiledPath = "../resources/cache", int $mode = 5)
    {
        parent::__construct($templatePath, $compiledPath, $mode);
    }
    public function renderPage()
    {
        return new BladeOne($this->templatePath,$this->compiledPath,$this->mode);
    }
}