<?php

/** 
 * LICENSE: ##LICENSE##.
 * 
 * @category   Anahita
 *
 * @author     Arash Sanieyan <ash@anahitapolis.com>
 * @author     Rastin Mehr <rastin@anahitapolis.com>
 * @copyright  2008 - 2010 rmdStudio Inc./Peerglobe Technology Inc
 * @license    GNU GPLv3 <http://www.gnu.org/licenses/gpl-3.0.html>
 *
 * @version    SVN: $Id$
 *
 * @link       http://www.GetAnahita.com
 */

/**
 * Usertype Elemen.
 * 
 * @category   Anahita
 *
 * @author     Arash Sanieyan <ash@anahitapolis.com>
 * @author     Rastin Mehr <rastin@anahitapolis.com>
 * @license    GNU GPLv3 <http://www.gnu.org/licenses/gpl-3.0.html>
 *
 * @link       http://www.GetAnahita.com
 */
class JElementUsertype extends JElement
{
    public function fetchElement($name, $value, &$node, $control_name)
    {
        $options = new KConfig();

        $options->append(array(
            'root_name' => 'Users',
            'inclusive' => false,
            'multiple_selection' => true,
        ));

        $name = $control_name.'['.$name.'][]';
        $acl = &JFactory::getACL();

        $gtree = $acl->get_group_children_tree(null, $options->root_name, $options->inclusive);

        $attr = '" size="'.count($gtree).'"';

        if ($options->multiple_selection) {
            $attr .= ' multiple ';
        }

        return JHTML::_('select.genericlist',  $gtree, $name, $attr, 'value', 'text', $value);
    }
}
