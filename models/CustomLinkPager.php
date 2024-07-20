<?php
namespace app\models;
use yii\widgets\LinkPager;

class CustomLinkPager extends LinkPager
{
    public function init()
    {
        parent::init();
        $this->options['class'] = 'pagination'; // Add the pagination class to the surrounding ul element
    }

    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $options = ['class' => empty($class) ? '' : $class];
        if ($active) {
            $options['class'] .= ' active';
        }
        if ($disabled) {
            $options['class'] .= ' disabled';
            $tag = 'span';
        } else {
            $tag = 'a';
            $options['href'] = $this->pagination->createUrl($page);
        }
        return "<li class=\"page-item\">" . \yii\helpers\Html::tag($tag, $label, $options) . "</li>";
    }

    protected function renderPrevPage($label, $page, $class, $disabled, $active)
    {
        $options = ['class' => empty($class) ? '' : $class];
        if ($active) {
            $options['class'] .= ' active';
        }
        if ($disabled) {
            $options['class'] .= ' disabled';
            $tag = 'span';
        } else {
            $tag = 'a';
            $options['href'] = $this->pagination->createUrl($page);
        }
        return "<li class=\"page-item previous\">" . \yii\helpers\Html::tag($tag, $label, $options) . "</li>";
    }

    protected function renderNextPage($label, $page, $class, $disabled, $active)
    {
        $options = ['class' => empty($class) ? '' : $class];
        if ($active) {
            $options['class'] .= ' active';
        }
        if ($disabled) {
            $options['class'] .= ' disabled';
            $tag = 'span';
        } else {
            $tag = 'a';
            $options['href'] = $this->pagination->createUrl($page);
        }
        return "<li class=\"page-item next\">" . \yii\helpers\Html::tag($tag, $label, $options) . "</li>";
    }
}