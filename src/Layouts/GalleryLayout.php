<?php

namespace Kraenkvisuell\NovaCms\Layouts;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Kraenkvisuell\NovaCms\Fields\Hide;
use Kraenkvisuell\NovaCmsBlocks\Blocks;
use Kraenkvisuell\NovaCms\Fields\Anchor;
use Kraenkvisuell\NovaCms\Fields\Topline;
use Kraenkvisuell\NovaCms\Fields\Headline;
use Kraenkvisuell\NovaCmsMedia\MediaLibrary;
use Kraenkvisuell\NovaCms\Fields\HeadlineLink;
use Kraenkvisuell\NovaCmsBlocks\Layouts\Layout;

class GalleryLayout extends Layout
{
    protected $name = 'gallery';

    public function title()
    {
        return __('nova-cms::content_blocks.gallery');
    }

    public function fields()
    {
        $fields = [
            Hide::make(),
        ];

        if (config('nova-cms.content.with_collapsed_fields')) {
            $fields[] = Boolean::make(__('nova-cms::content_blocks.collapsed'), 'is_collapsed');
        }

        if (config('nova-cms.content.with_toplines')) {
            $fields[] = Topline::make();
        }

        return array_merge($fields, [
            Headline::make(),
            HeadlineLink::make(),
            Blocks::make(__('nova-cms::content_blocks.slides'), 'slides')
                ->addLayout(__('nova-cms::content_blocks.slide'), 'slide', [
                    MediaLibrary::make(__('nova-cms::content_blocks.image'), 'image')
                        ->types(['Image'])
                        ->stacked(),

                    Textarea::make(__('nova-cms::content_blocks.image_caption'), 'caption')
                        ->rows(2)
                        ->translatable()
                        ->stacked(),

                    MediaLibrary::make(__('nova-cms::content_blocks.download_file'), 'file')
                        ->stacked(),
                ])
                ->button(__('nova-cms::content_blocks.add_slide'))
                ->collapsed(),
            Anchor::make(),
        ]);
    }
}
