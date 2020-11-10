<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCms\Fields\BottomLinks;
use Kraenkvisuell\NovaCms\Fields\EditorText;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class TextLayout extends Layout
{
    protected $name = 'text';

    public function title()
    {
        return __('text');
    }

    public function fields()
    {
        return [
            Topline::make(),
            Headline::make(),
            Anchor::make(),
            EditorText::make(),
            BottomLinks::make()->stacked(),
        ];
    }
}
