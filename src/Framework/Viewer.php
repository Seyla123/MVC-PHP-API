<?php 

namespace Framework;
class Viewer
{
    public function render(string $template, array $data=[]): void
    {
        extract($data, EXTR_SKIP);
        require "src/views/$template";
    }
}