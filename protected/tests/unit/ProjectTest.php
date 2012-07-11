<?php


class ProjectTest extends CTestCase {
    private $i = 1;
    private $j = 1;
    
    public function testLogic() {
        if ($this->i === $this->j) {
            return true;
        }
        return false;
    }
    
    public function testConnection() {
        $this->assertTrue($this->testLogic());
    }
}
?>
