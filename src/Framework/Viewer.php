<?php 

namespace Framework;
class Viewer
{
    public function render(string $template, array $products): void
    {
        require "src/views/$template";
    }
}