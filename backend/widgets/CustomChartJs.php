<?php

namespace backend\widgets;

use dosamigos\chartjs\ChartJs;

class CustomChartJs extends ChartJs
{
    public $removeGridLines = true;

    public function init()
    {
        parent::init();

        if ($this->removeGridLines) {
            if (is_array($this->clientOptions)) {
                $this->clientOptions['options']['scales']['xAxes'][0]['gridLines']['drawOnChartArea'] = false;
                $this->clientOptions['options']['scales']['yAxes'][0]['gridLines']['drawOnChartArea'] = false;
            }
        }
    }
}
