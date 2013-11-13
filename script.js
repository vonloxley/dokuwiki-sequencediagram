/* DOKUWIKI:include_once scripts/underscore.js */
/* DOKUWIKI:include_once scripts/raphael.js */
/* DOKUWIKI:include_once scripts/grammar.js */
/* DOKUWIKI:include_once scripts/diagram.js */
/* DOKUWIKI:include_once scripts/jquery-plugin.js */
/* DOKUWIKI:include_once scripts/sequence-diagram.js */

jQuery(
	function(){
		jQuery(".diagram").sequenceDiagram({theme: 'simple'})
	}
);
