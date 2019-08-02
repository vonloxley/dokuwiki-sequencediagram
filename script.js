/* DOKUWIKI:include_once bower_components/bower-webfontloader/webfont.js */
/* DOKUWIKI:include_once bower_components/snap.svg/dist/snap.svg-min.js */
/* DOKUWIKI:include_once bower_components/underscore/underscore-min.js */
/* DOKUWIKI:include_once bower_components/js-sequence-diagrams/dist/sequence-diagram.js */

jQuery(
	function(){
		jQuery(".diagram").sequenceDiagram({theme: 'simple'})
	}
);
