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

        if (($this->config->get('system.pages.markdown.extra')) &&
            (count($acronyms) > 0) &&
            ($config->get('enabled')))
        {
            // Get initial content
            $raw = $page->getRawContent(); 
            $raw .= "\n\n";

            // Append  acronyms to page
            foreach ($acronyms as $acronym) {
                $abbr = $acronym['abbr'];
                $full = $acronym['full'];
                $raw .= "*[${abbr}]: ${full}\n";
            }

            // Put content back in
            $page->setRawContent($raw);
        }
    }
}
