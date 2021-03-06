<?php
/**
 * Copyright 2011 Bas de Nooijer. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this listof conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * The views and conclusions contained in the software and documentation are
 * those of the authors and should not be interpreted as representing official
 * policies, either expressed or implied, of the copyright holder.
 */

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);

// set up an autoloader for PSR-0 class loading
spl_autoload_register(
    function ($class) {
        $paths = array(__DIR__.'/../library', __DIR__);
        foreach ($paths as $path) {
            $filename = $path.'/'.str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
            if (file_exists($filename)) {
                include $filename;
            }
        }
    }
);

$mockGeneratorFilePath = __DIR__ . "/patches/mock-object-generator-patched.php";
$mockMethodTemplateFilePath = __DIR__ . "/patches/mocked-method-tpl-patched.tpl.dist";

file_put_contents(
    __DIR__ . '/../vendor/phpunit/phpunit-mock-objects/src/Framework/MockObject/Generator.php',
    file_get_contents($mockGeneratorFilePath)
);

file_put_contents(
    __DIR__ . '/../vendor/phpunit/phpunit-mock-objects/src/Framework/MockObject/Generator/mocked_method.tpl.dist',
    file_get_contents($mockMethodTemplateFilePath)
);

require __DIR__.'/../vendor/autoload.php';
