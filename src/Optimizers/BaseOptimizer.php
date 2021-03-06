<?php

namespace Spatie\ImageOptimizer\Optimizers;

use Spatie\ImageOptimizer\Optimizer;

abstract class BaseOptimizer implements Optimizer
{
    public $options = [];

    public $imagePath = '';
    
    public $binaryName;

    public function __construct($options = [])
    {
        $this->setOptions($options);
    }

    public function binaryName()
    {
        return $this->binaryName;
    }

    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    public function setOptions(array $options = [])
    {
        $this->options = $options;

        return $this;
    }

    public function getCommand()
    {
        $optionString = implode(' ', $this->options);

        return "'{$this->binaryName}' {$optionString} ".escapeshellarg($this->imagePath);
    }
}
