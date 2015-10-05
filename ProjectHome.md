# Cut html string by keeping html tags as it is #
With the use of WYSIWYG editor user can enter html content. While displaying teaser(short content) of the content on home page or dashboard it is hard to cut the string properly. This project provide solutions in php, javascript languages.

### Added Python Implementation of cut html string ###
> For more information check http://pypi.python.org/pypi/htmlcutstring/1.0

### Using PHP code ###

Download php-cut-html-string.tar.gz/.zip file and extract it. Include the cutstring.php file and use like this


```
$data = "<span style='color:green;'>aa<em>BB</em><ul><li>one</li><li>two</li><li>three</li></ul></span>";
$wanted_count = 10; 
$cutstrObj = new HtmlCutString($data,$wanted_count);
$new_string = $cutstrObj->cut();
echo $new_string;
// output <span style='color:green;'>aa<em>BB</em><ul>\n<li>one</li>\n<li>two</li>\n</ul></span>
```

**Now we can directly use the cut\_html\_string function**

```
$data = "<span style='color:green;'>aa<em>BB</em><ul><li>one</li><li>two</li><li>three</li></ul></span>";
$wanted_count = 10; 
$new_string = cut_html_string($data,$wanted_count);
echo $new_string;
// output <span style='color:green;'>aa<em>BB</em><ul>\n<li>one</li>\n<li>two</li>\n</ul></span>
```

The above code examples will output `<span style='color:green;'>aa<em>BB</em><ul>\n<li>one</li>\n<li>two</li>\n</ul></span>`. Here after finising the li content two the 10 characters are finished so the output did not included the next li tag and output is still closing ul and span tags. The tag attributes style is kept as it is in the output also.

### Using Javascript code ###

Download javascript-cut-html-string.tar.gz/.zip file and extract it. Include the cutstring.js file in your html file and use like this.

```
var data = '<span style="font-weight:bold">aa<em>BB</em></span><span id="1">Test <b>Cutstring</b></span> bb';
var wanted_count = 10;
var cutstrObj = new CutString(data,wanted_count);
var newStr = cutstrObj.cut();
alert(newStr);
// alerts <span style="font-weight: bold;">aa<em>BB</em></span><span id="1">Test <b>C</b></span>
```

**Now we can directly use the cut\_html\_string function**

```
var data = '<span style="font-weight:bold">aa<em>BB</em></span><span id="1">Test <b>Cutstring</b></span> bb';
var wanted_count = 10;
var output = cutHtmlString(data, wanted_count);
alert(output);
// alerts <span style="font-weight: bold;">aa<em>BB</em></span><span id="1">Test <b>C</b></span>
```


The above examples will output `<span style="font-weight: bold;">aa<em>BB</em></span><span id="1">Test <b>C</b></span>`. Here after charcter "C" in b tag the 10 characters are over so b tag is just having 'C' and span tag is closed properly


For more examples check the test files in the code.