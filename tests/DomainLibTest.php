<?php

require_once 'PHPUnit/Framework.php';

include("domain.lib.php");

/**
 * Test case for the domain lib
 */
class DomainLibTest extends PHPUnit_Framework_TestCase {
  public function testDomain() {
    $this->assertTrue("" == get_domain('localhost'));
    $this->assertTrue("" == get_domain('http://localhost'));
    $this->assertTrue("" == get_domain('localhost/test'));
    $this->assertTrue("" == get_domain('127.0.0.1'));
    $this->assertTrue("" == get_domain('http://127.0.0.1'));
    $this->assertTrue("" == get_domain('127.0.0.1/test'));
    $this->assertTrue("" == get_domain('http://127.0.0.1/test'));
    $this->assertTrue("github.com" == get_domain('github.com'));
    $this->assertTrue("github.com" == get_domain('http://github.com'));
    $this->assertTrue("github.com" == get_domain('https://github.com'));
    $this->assertTrue("github.com" == get_domain('ftp://github.com'));
    $this->assertTrue("github.com" == get_domain('sftp://github.com'));
    $this->assertTrue("github.com" == get_domain('http://www.github.com'));
    $this->assertTrue("github.com" == get_domain('http://www.github.com/jimmiw'));
    $this->assertTrue("github.com" == get_domain('http://gist.github.com'));
    $this->assertTrue("westsworld.dk" == get_domain('http://westsworld.dk'));
  }
  
  public function testTld() {
    $this->assertTrue("" == get_tld('localhost'));
    $this->assertTrue("" == get_tld('http://localhost'));
    $this->assertTrue("" == get_tld('localhost/test'));
    $this->assertTrue("" == get_tld('127.0.0.1'));
    $this->assertTrue("" == get_tld('http://127.0.0.1'));
    $this->assertTrue("" == get_tld('127.0.0.1/test'));
    $this->assertTrue("" == get_tld('http://127.0.0.1/test'));
    $this->assertTrue("com" == get_tld('github.com'));
    $this->assertTrue("com" == get_tld('http://github.com'));
    $this->assertTrue("com" == get_tld('https://github.com'));
    $this->assertTrue("com" == get_tld('ftp://github.com'));
    $this->assertTrue("com" == get_tld('sftp://github.com'));
    $this->assertTrue("com" == get_tld('http://www.github.com'));
    $this->assertTrue("com" == get_tld('http://www.github.com/jimmiw'));
    $this->assertTrue("com" == get_tld('http://gist.github.com'));
    $this->assertTrue("dk" == get_tld('http://westsworld.dk'));
  }
}

?>