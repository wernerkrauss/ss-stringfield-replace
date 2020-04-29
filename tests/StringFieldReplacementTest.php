<?php


namespace Netwerkstatt\DBStringReplacement\Tests;


use Netwerkstatt\DBStringReplacement\ReplaceExtension;
use SilverStripe\Core\Config\Config;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\ORM\FieldType\DBString;
use SilverStripe\ORM\FieldType\DBVarchar;

class StringFieldReplacementTest extends SapphireTest
{
    public function testExtensionIsAppliedToDBString()
    {
        $dbString = DBVarchar::create();
        $this->assertTrue($dbString->hasExtension(ReplaceExtension::class,
            'DBString should have ReplaceExtension applied'));
    }

    public function testReplaceMethod()
    {
        $string= DBVarchar::create();
        $string->value = 'Test (c)';

        $this->assertEquals('Test &copy;', $string->Replace(), '(c) should become a html copyright symbol');
    }

    public function testAdditionalReplacementsByConfig()
    {
        Config::modify()->merge(DBString::class, 'replacements', ['foo' => 'bar']);

        $string= DBVarchar::create();
        $string->value = 'foo (c)';

        $this->assertEquals('bar &copy;', $string->Replace(), 'foo should be replaced by bar');

    }
}
