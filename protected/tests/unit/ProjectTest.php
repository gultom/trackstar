<?php


class ProjectTest extends CDbTestCase {
    public $fixtures = array (
        'projects' => 'Projects',
        'users' => 'Users',
        'projUserAssign' => ':project_user_assignment'
    );
    
    public function testCreate() {
        // Create new Project
        $newProject = new Projects;
        $newProjectName = 'Test Project Creation';
        $newProject->setAttributes(array(
            'name' => $newProjectName,
            'description' => 'This is test of new project creation',
            'createTime' => '2012-07-18 00:00:00',
            'createUser' => '1',
            'updateTime' => '2012-07-18 00:00:00',
            'updateUser' => '1'
        ));
        $this->assertTrue($newProject->save(false));
        
        // Read back the newly created project to ensure the creation worked
        $retrievedProject = Projects::model()->findByPk($newProject->id);
        $this->assertTrue($retrievedProject instanceof Projects);
        $this->assertEquals($newProjectName, $retrievedProject->name);
    }
    
    public function testRead() {
        $retrievedObject = $this->projects('project1');
        $this->assertTrue($retrievedObject instanceof Projects);
        $this->assertEquals('Test Project 1', $retrievedObject->name);
    }
    
    public function testUpdate() {
        $project = $this->projects('project2');
        $updateProjectName = 'Updated Test Project 2';
        $project->name = $updateProjectName;
        $this->assertTrue($project->save(false));
        
        // read back the record again to ensure updated worked
        $updatedProject = Projects::model()->findByPk($project->id);
        $this->assertTrue($updatedProject instanceof Projects);
        $this->assertEquals($updateProjectName, $updatedProject->name);
    }
    
    public function testDelete() {
        $project = $this->projects('project3');
        $savedProjectId = $project->id;
        $this->assertTrue($project->delete());
        $deletedProject = Projects::model()->findByPk($savedProjectId);
        $this->assertEquals(NULL, $deletedProject);
    }
    
    public function testGetUserOptions() {
        $project = $this->projects('project1');
        $options = $project->userOptions;
        $this->assertTrue(is_array($options));
        $this->assertTrue(count($options) > 0);
    }
}
?>
