/*
 * jQuery stringToSlug plug-in 1.3.0
 *
 * Plugin HomePage http://leocaseiro.com.br/jquery-plugin-string-to-slug/
 *
 * Copyright (c) 2009 Leo Caseiro
 *
 * Based on Edson Hilios (http://www.edsonhilios.com.br/ Algoritm
 *
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */

jQuery.fn.stringToSlug=function(options){var defaults={setEvents:'keyup keydown blur',getPut:'#permalink',space:'-',prefix:'',suffix:'',replace:'',AND:'and',callback:false,};var opts=jQuery.extend(defaults,options);jQuery(this).bind(defaults.setEvents,function(){var text=jQuery(this).val();text=defaults.prefix+text+defaults.suffix;text=text.replace(defaults.replace,"");text=jQuery.trim(text.toString());var chars=[];for(var i=0;i<32;i++){chars.push('')}chars.push(defaults.space,'','','','','',defaults.AND,"",defaults.space,defaults.space,'','',defaults.space,defaults.space,defaults.space,defaults.space,'0','1','2','3','4','5','6','7','8','9',defaults.space,defaults.space,'',defaults.space,'','','','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',defaults.space,defaults.space,defaults.space,'',defaults.space,'','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',defaults.space,'',defaults.space,'','','C','A','','f','','','T','t','','','S','','CE','A','Z','A','A','','','','','',defaults.space,defaults.space,'','TM','s','','ae','A','z','Y','','','c','L','o','Y','','S','','c','a','','','','r',defaults.space,'o','','2','3','','u','p','','','1','o','','','','','','A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','x','O','U','U','U','U','Y','D','B','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','o','n','o','o','o','o','o','','o','u','u','u','u','y','','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','k','L','l','L','l','L','l','L','l','L','l','N','n','N','n','N','n','n','N','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','Ş','s','ş','s','Ç','c','ç','c','İ','i','ı','i','ğ','g','Ğ','g','ü','u','Ü','u','ö','o','Ö','o');var stringToSlug=new String();var lenChars=chars.length;for(var i=0;i<text.length;i++){var cCAt=text.charCodeAt(i);if(cCAt<lenChars)stringToSlug+=chars[cCAt]}stringToSlug=stringToSlug.replace(new RegExp('\\'+defaults.space+'{2,}','gmi'),defaults.space);stringToSlug=stringToSlug.replace(new RegExp('(^'+defaults.space+')|('+defaults.space+'$)','gmi'),'');stringToSlug=stringToSlug.toLowerCase();jQuery(defaults.getPut).val(stringToSlug);jQuery(defaults.getPut).html(stringToSlug);if(defaults.callback!=false){defaults.callback(stringToSlug)}return this});return this};