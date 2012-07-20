<?php

class IssuesTest extends CDbTestCase {
    
    public $fixtures = array (
        'projects' => 'Projects',
        'issues' => 'Issues'
    );
    
    public function testGetTypes() {
        $options = Issues::model()->typeOptions;
        $this->assertTrue(is_array($options));
        $this->assertTrue(3 == count($options));
        $this->assertTrue(in_array('Bug', $options));
        $this->assertTrue(in_array('Feature', $options));
        $this->assertTrue(in_array('Task', $options));
    }
    
    public function testGetStatusText() {
        $this->assertTrue('OPEN' == $this->issues('issueBug')->getStatusText());
    }
    
    public function testGetTypeText() {
        $this->assertTrue('Bug' == $this->issues('issueBug')->getTypeText());
    }
}
?>
