<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

/**
 *
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormSchemaFormatterTable.class.php 5995 2007-11-13 15:50:03Z fabien $
 */
class sfWidgetFormSchemaFormatterContacte extends sfWidgetFormSchemaFormatter
{
    protected

            $rowFormat       = "<tr ><td colspan=\"2\">%error%</td></tr><tr class='%class_error%'>\n  <th>%label%</th>\n  <td>%field%%help%%hidden_fields%</td>\n</tr>\n",
            $errorRowFormat  = "<tr><td colspan=\"2\">\n%errors%</td></tr>\n",
            $helpFormat      = '<br />%help%',
            $decoratorFormat = "<table>\n  %content%</table>";

    public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
    {
        return strtr($this->getRowFormat(), array(
                '%label%'         => $label,
                '%field%'         => $field,
                '%error%'         => $this->formatErrorsForRow($errors),
                '%class_error%'   => empty($errors) ? '' : 'error',
                '%help%'          => $this->formatHelp($help),
                '%hidden_fields%' => is_null($hiddenFields) ? '%hidden_fields%' : $hiddenFields,
        ));
    }
}
