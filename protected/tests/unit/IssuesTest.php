<?php

class IssuesTest extends CDbTestCase {
    
    public function testGetTypes() {
        $options = Issues::model()->typeOptions;
        $this->assertTrue(is_array($options));
        $this->assertTrue(3 == count($options));
        $this->assertTrue(in_array('Bug', $options));
        $this->assertTrue(in_array('Feature', $options));
        $this->assertTrue(in_array('Task', $options));
    }
}
?>
