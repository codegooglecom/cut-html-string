from htmlcutstring import HtmlCutString, cutHtmlString

import unittest

class TestCustString(unittest.TestCase):
    def testdata1(self):
      data = 'aaa<span id="1">Test Cutstring</span>'
      output = HtmlCutString(data,5)
      self.assertEqual('aaa<span id="1">Te</span>',output.cut())

    def testdata2(self):
      data = 'word1,word2,word3'
      output = HtmlCutString(data,5)
      
      self.assertEqual('word1',output.cut())

    def testdata3(self):
      data = '<span id="1">Test</span>'
      output = HtmlCutString(data,5)
      
      self.assertEqual('<span id="1">Test</span>',output.cut())

    def testdata4(self):
      data = '<span id="1">Test Cutstring</span>'
      output = HtmlCutString(data,5)
      
      self.assertEqual('<span id="1">Test </span>',output.cut())
    
    def testdata5(self):
      data = 'aa<span id="1">Test Cutstring</span> bb'
      output =  HtmlCutString(data,5)
      
      self.assertEqual('aa<span id="1">Tes</span>',output.cut())
    
    def testdata6(self):
      data = 'aa<span id="1">Test <b>Cutstring</b></span> bb'
      output =  HtmlCutString(data,10)
      
      self.assertEqual('aa<span id="1">Test <b>Cut</b></span>',output.cut())
    
    def testdata7(self):
      data = '<span style="font-weight:bold">aa</span><span id="1">Test <b>Cutstring</b></span> bb'
      output =  HtmlCutString(data,10)
      
      self.assertEqual('<span style="font-weight:bold">aa</span><span id="1">Test <b>Cut</b></span>',output.cut())
    

    def testdata8(self):
      data = '<span style="font-weight:bold">aa<em>BB</em></span><span id="1">Test <b>Cutstring</b></span> bb'
      output =  HtmlCutString(data,10)
      
      self.assertEqual('<span style="font-weight:bold">aa<em>BB</em></span><span id="1">Test <b>C</b></span>',output.cut())
    
    def testdata9(self):
      data = '<p>aa<em>BB</em></p><br /><span id="1">Test <b>Cutstring</b></span> bb'
      output =  HtmlCutString(data,10)
      
      self.assertEqual('<p>aa<em>BB</em></p><br/><span id="1">Test <b>C</b></span>',output.cut())
    
    def testdata10(self):
      data = '<p>aa<em>BB</em></p><ul><li>one</li><li>two</li><li>three</li></ul>'
      output =  HtmlCutString(data,10)
      self.assertEqual("<p>aa<em>BB</em></p><ul><li>one</li><li>two</li></ul>",output.cut())
    

    def testdata11(self):
      data = '<span>aa<em>BB</em><ul><li>one</li><li>two</li><li>three</li></ul></span>'
      output =  HtmlCutString(data,10)
      self.assertEqual("<span>aa<em>BB</em><ul><li>one</li><li>two</li></ul></span>",output.cut())
    


    def testCutHtmlStringdata11(self):
      data = '<span>aa<em>BB</em><ul><li>one</li><li>two</li><li>three</li></ul></span>'
      output = cutHtmlString(data,10)
      self.assertEqual("<span>aa<em>BB</em><ul><li>one</li><li>two</li></ul></span>",output)
    

if __name__ == "__main__":
    unittest.main()   
