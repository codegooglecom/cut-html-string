/*jsl:option explicit*/
/*jsl:declare inherit*/
/*jsl:declare WebTestCase*/
/*jsl:declare nsTEST*/
/*jsl:declare CutString*/

//create namespace
if(typeof nsTEST == 'undefined'){
    nsTEST = {};
}

nsTEST.include = ['./cutstring.js'];

nsTEST.cutString = inherit(WebTestCase);

nsTEST.cutString.prototype.setUp = function(){
};

nsTEST.cutString.prototype.testCutString1 = function(){
    var output = new CutString('word1,word2,word3',5);
    this.assertEqual('word1',output.cut());
};

nsTEST.cutString.prototype.testCutString2 = function(){
    var output = new CutString('<span id="1">Test</span>',5);
    this.assertEqual('<span id="1">Test</span>',output.cut());
};

nsTEST.cutString.prototype.testCutString3 = function(){
    var output = new CutString('<span id="1">Test Cutstring</span>',5);
    this.assertEqual('<span id="1">Test </span>',output.cut());
};

nsTEST.cutString.prototype.testCutString4 = function(){
    var output = new CutString('aa<span id="1">Test Cutstring</span>',5);
    this.assertEqual('aa<span id="1">Tes</span>',output.cut());
};

nsTEST.cutString.prototype.testCutString5 = function(){
    var output = new CutString('aa<span id="1">Test Cutstring</span> bb',5);
    this.assertEqual('aa<span id="1">Tes</span>',output.cut());
};

nsTEST.cutString.prototype.testCutString6 = function(){
    var output = new CutString('aa<span id="1">Test <b>Cutstring</b></span> bb',10);
    this.assertEqual('aa<span id="1">Test <b>Cut</b></span>',output.cut());
};

nsTEST.cutString.prototype.testCutString7 = function(){
    var output = new CutString('<span style="font-weight:bold">aa</span><span id="1">Test <b>Cutstring</b></span> bb',10);
    var cutStr = output.cut();
    var cmpStr = '<span style="font-weight: bold;">aa</span><span id="1">Test <b>Cut</b></span>';
    this.assertEqual(cmpStr,cutStr);
};

nsTEST.cutString.prototype.testCutString8 = function(){
    var output = new CutString('<span style="font-weight:bold">aa<em>BB</em></span><span id="1">Test <b>Cutstring</b></span> bb',10);
    var cutStr = output.cut();
    var cmpStr = '<span style="font-weight: bold;">aa<em>BB</em></span><span id="1">Test <b>C</b></span>';
    this.assertEqual(cmpStr,cutStr);
};

nsTEST.cutString.prototype.testCutString9 = function(){
    var output = new CutString('<p>aa<em>BB</em></p><br /><span id="1">Test <b>Cutstring</b></span> bb',10);
    var cutStr = output.cut();
    var cmpStr = '<p>aa<em>BB</em></p><br><span id="1">Test <b>C</b></span>';
    this.assertEqual(cmpStr,cutStr);
};

nsTEST.cutString.prototype.testCutString10 = function(){
    var output = new CutString('<p>aa<em>BB</em></p><ul><li>one</li><li>two</li><li>three</li></ul>',10);
    var cutStr = output.cut();
    var cmpStr = '<p>aa<em>BB</em></p><ul><li>one</li><li>two</li></ul>';
    this.assertEqual(cmpStr,cutStr);
};

nsTEST.cutString.prototype.testCutString11 = function(){
    var output = new CutString('<span>aa<em>BB</em><ul><li>one</li><li>two</li><li>three</li></ul></span>',10);
    var cutStr = output.cut();
    var cmpStr = '<span>aa<em>BB</em><ul><li>one</li><li>two</li></ul></span>';
    this.assertEqual(cmpStr,cutStr);
};

nsTEST.cutString.prototype.testCutHtmlStringdata11 = function(){
    var output = cutHtmlString('<span>aa<em>BB</em><ul><li>one</li><li>two</li><li>three</li></ul></span>',10);
    var cmpStr = '<span>aa<em>BB</em><ul><li>one</li><li>two</li></ul></span>';
    this.assertEqual(cmpStr,output);
};


