<?php
namespace Tumf\PearBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle as BaseBundle;

/*
* This file is part of the PearBundle.
* (c) 2011 Yoshihiro TAKAHARA <y.takahara@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

class PearBundle extends BaseBundle
{
    /**
     * {@inheritdoc}
     */
    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return strtr(__DIR__, '\\', '/');
    }
}
