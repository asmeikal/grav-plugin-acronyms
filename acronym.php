<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

class AcronymPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
        'onPageContentRaw' => ['onPageContentRaw', 0]
        ];
    }

    public function onPageContentRaw(Event $event)
    {
        // Defined acronyms
        $acronyms = $this->config->get('plugins.acronym.acronyms', array());

        $page = $event['page'];
        $config = $this->mergeConfig($page);

        $enabled = $config->get('enabled');

        // Check that page processes markdown
        $enabled = $enabled && $page->process()['markdown'];

        // Check that markdown extra is enabled
        if (isset($page->header()->markdown) &&
            array_key_exists('extra', $page->header()->markdown)) {
            $enabled = $enabled && $page->header()->markdown['extra'];
        } else {
            $enabled = $enabled && $this->config->get('system.pages.markdown.extra');
        }

        if ($enabled && (count($acronyms) > 0)) {
            // Get initial content
            $raw = $page->getRawContent(); 
            $raw .= "\n\n";

            // Append  acronyms to page
            foreach ($acronyms as $key => $value) {
                $raw .= "*[${key}]: ${value}\n";
            }

            // Put content back in
            $page->setRawContent($raw);
        }
    }
}
