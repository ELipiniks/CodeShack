<?php
namespace Framework;
use Exception;
class TemplateNotFoundException extends Exception
{
  public function __construct($templateFile)
  {
    parent::__construct("Template not found - {$templateFile} ");
  }
}
 ?>
