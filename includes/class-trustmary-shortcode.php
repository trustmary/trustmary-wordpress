<?php

class Trustmary_Shortcode {

  public function __construct() {
    add_shortcode('trustmary_widget', array($this, 'render_trustmary_widget'));
    add_shortcode('trustmary_embed', array($this, 'render_trustmary_embed'));
    add_shortcode('trustmary_experiment', array($this, 'render_trustmary_experiment'));
    add_shortcode('trustmary_survey', array($this, 'render_trustmary_survey'));
  }

  public function render_trustmary_widget($atts) {
    $id = $this->parse_id($atts);
    if(empty($id)) {
      return '';
    }
    return '<div data-trustmary-widget="'.$id.'"></div>';
  }
  
  public function render_trustmary_embed($atts) {
    $id = $this->parse_id($atts);
    if(empty($id)) {
      return '';
    }
    return '<div data-trustmary-embed="'.$id.'"></div>';
  }
  
  public function render_trustmary_experiment($atts) {
    $id = $this->parse_id($atts);
    if(empty($id)) {
      return '';
    }
    return '<div data-trustmary-experiment="'.$id.'"></div>';
  }
  
  public function render_trustmary_survey($atts) {
    $id = $this->parse_id($atts);
    if(empty($id)) {
      return '';
    }
    return '<div data-trustmary-survey="'.$id.'"></div>';
  }
  

  private function parse_id($atts) {
    $id = '';
    if(isset($atts['id']) && is_string($atts['id'])) {
      $id = $atts['id'];
    }
    if(isset($atts[0]) && is_string($atts[0])) {
      $id = $atts[0];
    }

    return $id;
  }
}
