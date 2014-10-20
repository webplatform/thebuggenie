<?php
# vim: ai ft=php

/**
 * Generate a breadcrumb
 *
 * Expected output:
 * <code>
 *     <a href="...">first item</a><ul><li><a href="...">sub item 0</a></li></ul>
 * </code>
 *
 * @param  $in    array a list of items to iterate from. Tightly bound to TheBugGenie’s $tbg_response->getBreadcrumbs();
 * 
 * @return string a concatenated string
 **/
function wpd_breadcrumb($in) {
        $first = true;
        $dropdownItems = array('top'=>array(),'sub'=>array());
        foreach ($in['subitems'] as $subindex => $subitem) {
                $i = array();
                $i['current'] = false;
                $i['text'] = $subitem['title'];
                $i['href'] = (array_key_exists('url', $subitem)) ? $subitem['url'] : '#';
                $i['class'] = array();
                $i['params'] = array();

                if (strpos($subitem['title'], $in['title']) === 0) {
                        $i['class'][] = 'selected';
                }
                if ($first) {
                        $i['class'][] = 'rounded_list_first_item';
                }
                if (array_key_exists('url', $subitem) || $subitem['title'] == $in['title']) {
                        if (count($i['class']) >= 1) {
                                $i['params']['class'] = join(' ', $i['class']);
                        }
                        //$i['params']['data-subitem'] = str_replace('"',"'", str_replace("'", '\'', json_encode($subitem,true)));
                        if (strpos($subitem['title'], $in['title']) === 0) {
				// see: core/lib/ui.inc.php for link_tag function defn
                                $dropdownItems['top'] = link_tag($i['href'], $i['text'], $i['params']);
                        } else {
                                $dropdownItems['sub'][] = link_tag($i['href'], $i['text'], $i['params']);
                        }
                }
                $first = false;
        }

        $subItems = (is_array($dropdownItems['sub']))?'<ul><li>'.join('</li><li>', $dropdownItems['sub']) . '</li></ul>':'';

        return $dropdownItems['top'].$subItems;
}

