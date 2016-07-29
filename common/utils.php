<?php


/**
 * @param string $icon
 * @param string $label
 * @param array  $attrs
 * @param string $font_prefix
 * @param string $tag
 * @return string
 */
function icon($icon, $label = '', $attrs = [], $font_prefix = 'glyphicon glyphicon-', $tag = 'i')
{
    $class = isset($attrs['class']) ? $attrs['class'] : '';
    if (isset($attrs['class'])) {
        unset($attrs['class']);
    }

    $attr_list = [];
    foreach ($attrs as $attr_key => $attr_value) {
        if (is_numeric($attr_key)) {
            continue;
        }
        $attr_list[] = sprintf("%s=\"%s\"", $attr_key, htmlspecialchars($attr_value, ENT_COMPAT, 'UTF-8'));
    }

    $attributes = implode(' ', $attr_list);
    return sprintf(
        '<%s %sclass="%s%s%s"></%s>%s',
        $tag,
        $attributes ? "{$attributes} " : '',
        $class ? "{$class} " : '',
        $font_prefix,
        $icon,
        $tag,
        $label ? " {$label}" : ''
    );
}

function gicon($icon, $label = '', $attrs = [], $tag = 'i')
{
    return icon($icon, $label, $attrs, 'glyphicon glyphicon-', $tag);
}

function ficon($icon, $label = '', $attrs = [], $tag = 'i')
{
    return icon($icon, $label, $attrs, 'fa fa-', $tag);
}
