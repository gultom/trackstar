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
        ));
        // set the application user id to the first user in our users fixture data
        Yii::app()->user->setId($this->users('user1')->id);
        // save the new project, trigerring attribute validation
        $this->assertTrue($newProject->save());
        //$this->assertTrue($newProject->save(false));
        
        // Read back the newly created project to ensure the creation worked
        $retrievedProject = Projects::model()->findByPk($newProject->id);
        $this->assertTrue($retrievedProject instanceof Projects);
        $this->assertEquals($newProjectName, $retrievedProject->name);
        
        // ensure the user associated with creating the new project is the same as the application user we set
        // when saving project
        $this->assertEquals(Yii::app()->user->id, $retrievedProject->create_userid);
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
