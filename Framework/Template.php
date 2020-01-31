<?php

namespace Framework;
use Exception;
class Template
{
    const FULL_TEMPLATE_PATH=ROOT_PATH.DS.'Presentation'.DS.'Template';
    protected $data;

    public function yield($filepath)
    {
        extract($this->data);
        require self::FULL_TEMPLATE_PATH.DS.$filepath;
    }

    public function with(array $data)
    {
        $this->data = $data;
    }

    public function render($filepath)
    {
      $templatePath=self::FULL_TEMPLATE_PATH.DS.$filepath;
      try
      {
        if(is_file($templatePath))
        {
          extract($this->data);
          require $templatePath;
          return $this;
        }
      }
      catch (TemplateNotFoundException $exception)
      {
        exit ($exception->getMessage());
      }

    }
}
