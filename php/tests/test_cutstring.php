<?php
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once('../cutstring.php');


class TestCutstring extends UnitTestCase {
    function testdata1() {
      $data = 'aaa<span id="1">Test Cutstring</span>';
      $output = new HtmlCutString($data,5);
      
      $this->assertEqual('aaa<span id="1">Te</span>'."\n",$output->cut());
      //echo $output->cut()."\n";
      //echo 'aaa<span id="1">Te</span>';
    }
    function testdata2(){
      $data = 'word1,word2,word3';
      $output = new HtmlCutString($data,5);
      
      $this->assertEqual('word1'."\n",$output->cut());
    }

    function testdata3(){
      $data = '<span id="1">Test</span>';
      $output = new HtmlCutString($data,5);
      
      $this->assertEqual('<span id="1">Test</span>'."\n",$output->cut());
    }
    function testdata4(){
      $data = '<span id="1">Test Cutstring</span>';
      $output = new HtmlCutString($data,5);
      
      $this->assertEqual('<span id="1">Test </span>'."\n",$output->cut());
    }
    function testdata5(){
      $data = 'aa<span id="1">Test Cutstring</span> bb';
      $output = new HtmlCutString($data,5);
      
      $this->assertEqual('aa<span id="1">Tes</span>'."\n",$output->cut());
    }
    function testdata6(){
      $data = 'aa<span id="1">Test <b>Cutstring</b></span> bb';
      $output = new HtmlCutString($data,10);
      
      $this->assertEqual('aa<span id="1">Test <b>Cut</b></span>'."\n",$output->cut());
    }
    function testdata7(){
      $data = '<span style="font-weight:bold">aa</span><span id="1">Test <b>Cutstring</b></span> bb';
      $output = new HtmlCutString($data,10);
      
      $this->assertEqual('<span style="font-weight:bold">aa</span><span id="1">Test <b>Cut</b></span>'."\n",$output->cut());
    }

    function testdata8(){
      $data = '<span style="font-weight:bold">aa<em>BB</em></span><span id="1">Test <b>Cutstring</b></span> bb';
      $output = new HtmlCutString($data,10);
      
      $this->assertEqual('<span style="font-weight:bold">aa<em>BB</em></span><span id="1">Test <b>C</b></span>'."\n",$output->cut());
    }
    function testdata9(){
      $data = '<p>aa<em>BB</em></p><br /><span id="1">Test <b>Cutstring</b></span> bb';
      $output = new HtmlCutString($data,10);
      
      $this->assertEqual('<p>aa<em>BB</em></p><br><span id="1">Test <b>C</b></span>'."\n",$output->cut());
    }
    function testdata10(){
      $data = '<p>aa<em>BB</em></p><ul><li>one</li><li>two</li><li>three</li></ul>';
      $output = new HtmlCutString($data,10);
      // adding \n for the blocked elements. but this is not a big problem
      $this->assertEqual("<p>aa<em>BB</em></p><ul>\n<li>one</li>\n<li>two</li>\n</ul>"."\n",$output->cut());
    }

    function testdata11(){
      $data = '<span>aa<em>BB</em><ul><li>one</li><li>two</li><li>three</li></ul></span>';
      $output = new HtmlCutString($data,10);
      // adding \n for the blocked elements. but this is not a big problem
      $this->assertEqual("<span>aa<em>BB</em><ul>\n<li>one</li>\n<li>two</li>\n</ul></span>"."\n",$output->cut());
    }


    function testCutHtmlStringdata11(){
      $data = '<span>aa<em>BB</em><ul><li>one</li><li>two</li><li>three</li></ul></span>';
      $output = cut_html_string($data,10);
      // adding \n for the blocked elements. but this is not a big problem
      $this->assertEqual("<span>aa<em>BB</em><ul>\n<li>one</li>\n<li>two</li>\n</ul></span>"."\n",$output);
    }

    function testCutHtmlStringUtf8(){
      $data = '<span>aa<em>åèö</em><ul><li>one</li><li>two</li><li>three</li></ul></span>';
      $output = cut_html_string($data,10);
      // adding \n for the blocked elements. but this is not a big problem
      $this->assertEqual("<span>aa<em>&aring;&egrave;&ouml;</em><ul>\n<li>one</li>\n<li>tw</li>\n</ul></span>"."\n",$output);
    }


}
