<?php
/**
 * DokuWiki Plugin sequencediagram (Syntax Component)
 *
 * @author  K.-M. Hansche <mf-developing@hansche.de>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();

class syntax_plugin_sequencediagram extends DokuWiki_Syntax_Plugin {
    /**
     * @return string Syntax mode type
     */
    public function getType() {
        return 'substition';
    }
    /**
     * @return string Paragraph type
     */
    public function getPType() {
        return 'block'; // or normal?
    }
    /**
     * @return int Sort order - Low numbers go before high numbers
     */
    public function getSort() {
        return 999;
    }

    /**
     * Connect lookup pattern to lexer.
     *
     * @param string $mode Parser mode
     */
    public function connectTo($mode) {
        $this->Lexer->addSpecialPattern('<sequencediagram>.*?</sequencediagram>',$mode,'plugin_sequencediagram');
    }

//    public function postConnect() {
//        $this->Lexer->addExitPattern('</FIXME>','plugin_sequencediagram_sd');
//    }

    /**
     * Handle matches of the sequencediagram syntax
     *
     * @param string $match The match of the syntax
     * @param int    $state The state of the handler
     * @param int    $pos The position in the document
     * @param Doku_Handler    $handler The handler
     * @return array Data for the renderer
     */
    public function handle($match, $state, $pos, Doku_Handler $handler){
        $data = array();
        if ($state==DOKU_LEXER_SPECIAL){ 
            array_push($data, $match);
            //echo '<pre>';print_r($match);
            //print_r($data); echo '</pre>';
        }
        return $data;
    }

    /**
     * Render xhtml output or metadata
     *
     * @param string         $mode      Renderer mode (supported modes: xhtml)
     * @param Doku_Renderer  $renderer  The renderer
     * @param array          $data      The data from the handler() function
     * @return bool If rendering was successful.
     */
    public function render($mode, Doku_Renderer $renderer, $data) {
        if($mode == 'xhtml'){
            try {
                preg_match('/<sequencediagram>(.*?)<\/sequencediagram>/s', $data[0], $erg);
                $src = $renderer->_xmlEntities($erg[1]);
                $text="<div class=\"diagram\" style=\"overflow:auto;\">$src</div>";
                $renderer->doc .= $text;
            } catch (Exception $e) {
              $renderer->doc .= "<pre>".htmlentities($text)."\n".$e."</pre>";
            }
            return true;
        }

        return false;
    }
}

// vim:ts=4:sw=4:et:
