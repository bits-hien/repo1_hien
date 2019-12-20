<?php
class Human {
        public $users;
        public $experience;
        public $education;
        public $skill;
        public $interest;
        public $awards;
        public $presenters;
    
        function setExperience($experience){
            $this->experience = $experience;
        }
    
        function getExperience(){
            return $this->experience;
        }

        function setEducation($education){
            $this->education = $education;
        }
    
        function getEducation(){
            return $this->education;
        }

        function setSkills($skills){
            $this->skills = $skills;
        }
    
        function getSkills(){
            return $this->skills;
        }

        function setInterest($interest) {
            $this->interest = $interest;
        }
    
        function getInterest() {
            return $this->interest;
        }

        function setAwards($award) {
            $this->award = $award;
        }
    
        function getAwards() {
            return $this->award;
        }

        function setPresenters($presenters) {
            $this->presenters = $presenters;
        }
    
        function getPresenters() {
            return $this->presenters;
        }

        function setUsers($users) {
            $this->users = $users;
        }

        function getUsers() {
            return $this->users;
        }
    }
?>
