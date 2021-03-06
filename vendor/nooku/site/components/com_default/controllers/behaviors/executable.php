<?php
/**
 * @version     $Id: executable.php 4628 2012-05-06 19:56:43Z johanjanssens $
 * @package     Nooku_Components
 * @subpackage  Default
 * @copyright   Copyright (C) 2007 - 2012 Johan Janssens. All rights reserved.
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Default Controller Authorization Command
 *
 * @author      Johan Janssens <johan@nooku.org>
 * @package     Nooku_Components
 * @subpackage  Default
 */
class ComDefaultControllerBehaviorExecutable extends KControllerBehaviorExecutable
{
 	/**
     * Command handler
     *
     * @param   string      The command name
     * @param   object      The command context
     * @return  boolean     Can return both true or false.
     * @throws  KControllerException
     */
    public function execute( $name, KCommandContext $context)
    {
        $parts = explode('.', $name);

        if($parts[0] == 'before')
        {
            if(!$this->_checkToken($context))
            {
                $context->setError(new KControllerException(
                	'Invalid token or session time-out', KHttpResponse::FORBIDDEN
                ));

                return false;
            }
        }

        return parent::execute($name, $context);
    }

    /**
     * Generic authorize handler for controller add actions
     *
     * @return  boolean     Can return both true or false.
     */
    public function canAdd()
    {
        $result = false;

        return $result;
    }

    /**
     * Generic authorize handler for controller edit actions
     *
     * @return  boolean     Can return both true or false.
     */
    public function canEdit()
    {
        $result = false;

        return $result;
    }

    /**
     * Generic authorize handler for controller delete actions
     *
     * @return  boolean     Can return both true or false.
     */
    public function canDelete()
    {
        $result = false;

        return $result;
    }

	/**
	 * Check the token to prevent CSRF exploits
	 *
	 * @param   object  The command context
	 * @return  boolean Returns FALSE if the check failed. Otherwise TRUE.
	 */
    protected function _checkToken(KCommandContext $context)
    {
        //Check the token
        if($context->caller->isDispatched())
        {
            $method = KRequest::method();

            //Only check the token for PUT, DELETE and POST requests
            if(($method != KHttpRequest::GET) && ($method != KHttpRequest::OPTIONS))
            {
                if( KRequest::token() !== JUtility::getToken()) {
                    return false;
                }
            }
        }

        return true;
    }
}